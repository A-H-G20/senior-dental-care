<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('dbcon.php'); ?>
<?php include('navbar_dasboard.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">
				
				<div class="span3">
					   
						<p><strong>Today is:</strong></p>
				 <div class="alert alert-success">
                        <i class="icon-calendar icon-large"></i>
                        <?php
					$new = date('l, F d, Y');
					echo $new;
					?>
                    </div>		
                    <div class="alert alert-info">List of Doctors</div>
                    <table class="table  table-bordered">

<thead>
    <tr>
        <th>Name</th>
        <th>Major</th>


    </tr>
</thead>
<tbody>

    <?php
    $user_query = mysqli_query($conn, "select * from doctor") or die(mysqli_error($conn));
    while ($row = mysqli_fetch_array($user_query)) {
        $id = $row['doctor_id'];
        ?>

        <tr class="del<?php echo $id ?>">
            <td><?php echo $row['FirstName'] . ' ' . $row['LastName']; ?></td>
            <td><img src="http://localhost/apr/admin/images/<?php echo $row['image'] ?>" alt=""
                    height="30" width="30"><?php echo $row['major']; ?></td>

        </tr>

    <?php } ?>

</tbody>
</table>
				
						
							
				
					
					
					
				<!--<div class="alert alert-info">Testimonial</div>
				<div class="testimonial_div">
					<p>
					I was delighted with the treatment. Despite me being a somewhat difficult patient Dr. Terry Lee was really gentle, patient and understanding.
					The treatment was explained precisely to me and the price was quoted right at the beginning which is exactly what the price was at the end.
					The transformation to my teeth and to my life in general has been amazing. 
					I know have a smile that I’m not afraid to show anymore. I am extremely happy with the quality of the treatment.
					</p>
					</div>-->
				</div>
				<div class="span6">
					<img src="img/dr.jpg">
					<br>
					<br>
					
				<div class="alert alert-info">Feedback</div>
	
					

                <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
                <style>
.my-input {
    width: 500px; /* Adjust the width as needed */
    height: 40px; /* Adjust the height as needed */
    font-size: 16px; /* Adjust the font size as needed */
    padding: 8px; /* Adjust the padding as needed */
}
.button {
  display: inline-block;
  padding: 10px 20px;
  background-color: lightblue;
  color: black;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  transition: background-color 0.3s ease;
}

/* Hover Effect */
.button:hover {
  background-color: lightblue;
}
</style>
    
    <!--  <h1 class="heading">Feedback <span>put your experience</span></h1>-->
    <center>
      <form action="" method="post">
      <input type="text" name="name" placeholder="Name" class=" my-input" ><br>    
      <input type="email" name="email" placeholder="Email" class="my-input"><br>
      
      <input type="text" name="message" placeholder="Message" class="my-input" ></input><br>
      
      <input type="submit" value="send message" class="button">
  </form>
  </center>
</table>
	
	
	
				</div>
				<div class="span3">
				<img src="img/32x32/facebook.png">
				<img src="img/32x32/twitter.png">
				
				<div class="alert alert-info">List of Services</div>
              

                <table class="table  table-bordered">
                            
                            <thead>
                                <tr>
                                    <th>Service Offer</th>
                                    <th>Price</th>                                 
                                 
                                </tr>
                            </thead>
                            <tbody>
                             
                              <?php $user_query=mysqli_query($conn,"select * from service")or die(mysqli_error($conn));
                                while($row=mysqli_fetch_array($user_query)){
                                $id=$row['service_id']; ?>
                                 <tr class="del<?php echo $id ?>">
                                <td><?php echo $row['service_offer']; ?></td> 
                                <td><?php echo $row['price']; ?></td>                         
                                <?php } ?>
                       
                            </tbody>
                        </table>

 
 

<?php
include "dbcon.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare the SQL statement to prevent SQL injection
    $query = "INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    // Bind parameters and execute the statement
    mysqli_stmt_bind_param($stmt,"sss", $name, $email, $message);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        // Error handling
    } else {
        echo 'Success feedback message';
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
				
				
			</div>
		</div>
    </div>
<?php include('footer.php') ?>