<?php include ('header.php'); ?>
<?php include ('session.php'); ?>
<?php include ('dbcon.php'); ?>
<?php include ('navbar_dasboard.php'); ?>
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




			</div>
			<div class="span6">


				<div class="alert alert-info">Edit Personal Information</div>
				<?php
				$member_query = mysqli_query($conn, "select * from members where member_id='$session_id'") or die(mysqli_error($conn));
				$member_row = mysqli_fetch_array($member_query);
				?>
				<form class="form-horizontal" method="POST">
					<div class="control-group">
						<label class="control-label" for="inputEmail">Firstname</label>
						<div class="controls">
							<input type="text" value="<?php echo $member_row['firstname']; ?>" name="firstname"
								id="inputEmail" placeholder="Firstname" required>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputPassword">Lastname</label>
						<div class="controls">
							<input type="text" name="lastname" id="inputPassword" placeholder="Lastname"
								value="<?php echo $member_row['lastname']; ?>" required>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputPassword">Middlename</label>
						<div class="controls">
							<input type="text" name="middlename" id="inputPassword"
								value="<?php echo $member_row['middlename']; ?>" placeholder="Middlename" required>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputPassword">Address</label>
						<div class="controls">
							<input type="text" name="address" value="<?php echo $member_row['address']; ?>"
								id="inputPassword" placeholder="Address" required>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputPassword">Email</label>
						<div class="controls">
							<input type="text" name="email" id="inputPassword"
								value="<?php echo $member_row['email']; ?>" placeholder="Email" required>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputPassword">contact_no</label>
						<div class="controls">
							<input type="text" name="phone" id="inputPassword"
								value="<?php echo $member_row['contact_no']; ?>" placeholder="contact_no" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputPassword">Gender</label>
						<div class="controls">
							<select class="span2" name="gender" required>
								<option><?php echo $member_row['gender']; ?></option>
								<option>Male</option>
								<option>Female</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputPassword">Password</label>
						<div class="controls">
							<input type="text" name="password" value="<?php echo $member_row['password']; ?>"
								id="inputPassword" placeholder="password" required>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<button type="submit" name="update" class="btn btn-success"><i
									class="icon-pencil"></i>&nbsp;Update</button>
						</div>
					</div>
				</form>

				<?php
				if (isset($_POST['update'])) {
					$firstname = $_POST['firstname'];
					$lastname = $_POST['lastname'];
					$middlename = $_POST['middlename'];
					$address = $_POST['address'];

					$gender = $_POST['gender'];

					$phone = $_POST['phone'];
					$password = $_POST['password'];
					mysqli_query($conn, "update members set firstname='$firstname' , lastname='$lastname' , middlename='$middlename' , address='$address' ,
	gender='$gender', contact_no='$phone',password='$password' where member_id='$session_id' ") or die(mysqli_error($conn));
					?>
					<script>
						window.location = 'edit_info.php'; 
					</script>
					<?php
				}
				?>




			</div>
			<div class="span3">
				<img src="img/32x32/facebook.png">
				<img src="img/32x32/twitter.png">

				<ul class="nav nav-list">
					<div class="alert alert-danger">
						<li class="nav-header">NOTE</li>
					</div>


					<?php
					$note_query = mysqli_query($conn, "select * from note ") or die(mysqli_error($conn));
					$note_count = mysqli_num_rows($note_query);
					while ($note_row = mysqli_fetch_array($note_query)) {
						if ($note_count > 0) { ?>

							<li><i class="icon-stop icon-large"></i>&nbsp;<?php echo $note_row['message'] ?></li>
							<?php
						}
					}
					?>
				</ul>
				<br>


				<div class="alert alert-info">List of Services</div>
				<table class="table  table-bordered">

					<thead>
						<tr>
							<th>Service Offer</th>
							<th>Price</th>

						</tr>
					</thead>
					<tbody>

						<?php $user_query = mysqli_query($conn, "select * from service") or die(mysqli_error($conn));
						while ($row = mysqli_fetch_array($user_query)) {
							$id = $row['service_id']; ?>
							<tr class="del<?php echo $id ?>">
								<td><?php echo $row['service_offer']; ?></td>
								<td><?php echo $row['price']; ?></td>
							<?php } ?>

					</tbody>
				</table>

			</div>

		</div>
	</div>
</div>
<?php include ('footer.php') ?>