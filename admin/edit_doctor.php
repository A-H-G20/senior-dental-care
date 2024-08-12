<div id="edit<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-info"><strong>Edit Doctor</strong></div>
	<form class="form-horizontal" method="post">
			<div class="control-group">
				<label class="control-label" for="inputEmail">FirstName</label>
				<div class="controls">
				<input type="hidden" id="inputEmail" name="id" value="<?php echo $row['doctor_id']; ?>" required>
				<input type="text" id="inputEmail" name="FirstName" value="<?php echo $row['FirstName']; ?>" required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">LastName</label>
				<div class="controls">
				<input type="text" name="LastName" id="inputPassword" value="<?php echo $row['LastName']; ?>" required>
				</div>
			</div>
            <div class="control-group">
				<label class="control-label" for="inputPassword">Major</label>
				<div class="controls">
				<input type="text" name="Major" id="inputPassword" value="<?php echo $row['major']; ?>" required>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
				<button name="edit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Update</button>
				</div>
			</div>
    </form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </div>
	
	<?php
if (isset($_POST['edit'])) {
    $user_id = $_POST['id'];
    $firstname = $_POST['FirstName'];
    $lastname = $_POST['LastName'];
    $major = $_POST['Major'];

    $query = "UPDATE doctor SET FirstName='$firstname', Lastname='$lastname', Major='$major' WHERE doctor_id='$user_id'";
    mysqli_query($conn, $query) or die(mysqli_error($conn)); 
    ?>
    <script>
        window.location = "doctor.php";
    </script>
    <?php
}
?>
