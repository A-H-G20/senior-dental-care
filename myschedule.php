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
				
						
							
				<!--	<div class="alert alert-info">Office Hours</div>
						<p>Monday - Firday (9:30 am to 1:00 pm)</p>
						<p>Monday - Friday (3:00 pm to 5:00 pm)</p>
					
					
					
			<div class="alert alert-info">Testimonial</div>
				<div class="testimonial_div">
					<p>
					I was delighted with the treatment. Despite me being a somewhat difficult patient Dr. Terry Lee was really gentle, patient and understanding.
					The treatment was explained precisely to me and the price was quoted right at the beginning which is exactly what the price was at the end.
					The transformation to my teeth and to my life in general has been amazing. 
					I know have a smile that I’m not afraid to show anymore. I am extremely happy with the quality of the treatment.
					</p>
					</div>		-->
				</div>
				<div class="span6">
					<img src="img/dr.jpg">
					<br>
					<br>
					
				<div class="alert alert-info">My Schedule</div>
	
					<table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
                            
                                <thead>
                                    <tr>
                                        <th>My Number</th>
                                        <th>Date</th>                                 
                                        <th>Service</th>                                 
                                        <th>Price</th>                                 
                              
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php $user_query=mysqli_query($conn,"select * from schedule where member_id = '$session_id' ")or die(mysqli_error($conn));
									while($row=mysqli_fetch_array($user_query)){
									$id=$row['id'];
									$member_id = $row['member_id'];
									$service_id = $row['service_id'];
									/* member query  */
									$member_query = mysqli_query($conn,"select * from members where member_id = ' $member_id'")or die(mysqli_error($conn));
									$member_row = mysqli_fetch_array($member_query);
									/* service query  */
									$service_query = mysqli_query($conn,"select * from service where service_id = '$service_id' ")or die(mysqli_error($conn));
									$service_row = mysqli_fetch_array($service_query);
									?>
									
									 <tr class="del<?php echo $id ?>">
									 <td width="100"><?php  echo $row['Number'];  ?></td>
                                    <td><?php  echo $row['date'];  ?></td> 
                                    <td><?php  echo $service_row['service_offer'];  ?></td> 
                                    <td><?php  echo $service_row['price'];  ?></td> 
                             
							
									</tr>
									<?php } ?>
                           
                                </tbody>
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
				
				
			</div>
		</div>
    </div>
<?php include('footer.php') ?>