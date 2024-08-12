   
<div class="alert alert-info">Please Enter The Details Below</div>
<div class="lgoin_terry">
<form method="post" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="inputPassword">Username</label>
			<div class="controls">
			<input type="text" name="username"  placeholder="Username" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Password</label>
			<div class="controls">
			<input type="password" name="password" placeholder="Password" required>
			</div>
		</div>
		<div class="control-group">
			
			<div class="controls">
			<div class="please">Please fill in the fields</div>	
			</div>
			
		</div>
		<div class="control-group">
			<div class="controls">
			<button name="submit1" type="submit" class="btn btn-info"><i class="icon-signin icon-large"></i>&nbsp;Login</button>
			</div>
			
		</div>
		<?php
if (isset($_POST['submit1'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Assuming $conn is your database connection object
    // Prepare the statement for members table
    $query_members = "SELECT * FROM members WHERE username=? AND password=?";
    $stmt_members = mysqli_prepare($conn, $query_members);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt_members, "ss", $username, $password);
    
    // Execute the statement
    mysqli_stmt_execute($stmt_members);
    
    // Store result
    $result_members = mysqli_stmt_get_result($stmt_members);
    $num_row_members = mysqli_num_rows($result_members);
    $row_members = mysqli_fetch_array($result_members);

    // Prepare the statement for admins table
    $query_admins = "SELECT * FROM users WHERE username=? AND password=?";
    $stmt_admins = mysqli_prepare($conn, $query_admins);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt_admins, "ss", $username, $password);
    
    // Execute the statement
    mysqli_stmt_execute($stmt_admins);
    
    // Store result
    $result_admins = mysqli_stmt_get_result($stmt_admins);
    $num_row_admins = mysqli_num_rows($result_admins);
    $row_admins = mysqli_fetch_array($result_admins);

    if ($num_row_members > 0 && $row_members['verified'] == 1) { 
        $_SESSION['id'] = $row_members['member_id'];
        ?>
        <script>
            window.location = "dasboard.php";
        </script>
        <?php
    } elseif ($num_row_admins > 0) { 
        $_SESSION['id'] = $row_admins['user_id'];
        ?>
        <script>
            window.location = "admin/dasboard.php";
        </script>
        <?php
    } else {
        ?>
        <div class="alert alert-danger"><strong>Login Error!</strong>&nbsp;Please check your Username and Password</div>
        <?php
    }	
}
?>


		
	</form>
	</div>