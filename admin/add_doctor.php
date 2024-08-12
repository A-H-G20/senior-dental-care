<!-- Button to trigger modal -->
<a href="#add_service" role="button" class="btn btn-info" data-toggle="modal"><i class="icon-plus icon-large"></i>&nbsp;Add Doctor</a>
<br>
<br>
<!-- Modal -->
<div id="add_service" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <div class="alert alert-info">Add Doctor</div>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" method="POST" enctype="multipart/form-data">
            <div class="control-group">
                <label class="control-label" for="inputEmail">FirstName</label>
                <div class="controls">
                    <input type="text" name="FirstName" id="inputEmail" placeholder="FirstName" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputPassword">LastName</label>
                <div class="controls">
                    <input type="text" name="LastName" id="inputPassword" placeholder="LastName" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputPassword">Major</label>
                <div class="controls">
                    <input type="text" name="Major" id="inputPassword" placeholder="Major" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputImage">Image</label>
                <div class="controls">
                    <input type="file" name="image" id="inputImage" required>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" name="ad" class="btn btn-info">Add</button>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>

<?php
if (isset($_POST['ad'])) {
    $firstname = $_POST['FirstName'];
    $lastname = $_POST['LastName'];
    $major = $_POST['Major'];
    
    // File upload handling
    $targetDirectory = "images/"; // Directory where images will be stored
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["ad"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    
    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    
    // Extracting only the image name
    $image_name = basename($_FILES["image"]["name"]);

    // Insert data into database
    // Assuming you have $conn as your database connection
    mysqli_query($conn,"INSERT INTO doctor (FirstName, LastName, major, image) VALUES ('$firstname', '$lastname', '$major', '$image_name')") or die(mysqli_error($conn));

    ?>
    <script>
        window.location="doctor.php";
    </script>
    <?php
}
?>
