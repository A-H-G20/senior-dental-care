<?php
// Start output buffering
ob_start();

include ('dbcon.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ahmadghosen20@gmail.com'; // Your Gmail address
        $mail->Password = 'qgmsruvemmtgxeve'; // Your Gmail password or App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email content
        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        $mail->setFrom('your_email@gmail.com', 'Wisdom_Care Administrator');
        $mail->addAddress($email, $firstname);
        $mail->isHTML(true);
        $mail->Subject = 'Email verification';
        $mail->Body = '<p>Dear <b>' . $firstname . '</b>,</p><p>Your verification code is: <b style="font-size: 15px;">' . $verification_code . '</b></p>
                       <p>Regards,</p><p>Wisdom_Care Administrator</p> ';

        // Send email
        $mail->send();

        // Prepare and execute SQL insert statement using prepared statement
        $stmt = $conn->prepare("INSERT INTO members (firstname, lastname, middlename, gender, address, email, contact_no, username, password, verification_code, email_verified_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NULL)");
        $stmt->bind_param("ssssssssss", $firstname, $lastname, $middlename, $gender, $address, $email, $contact_no, $username, $password, $verification_code);
        $stmt->execute();
        $stmt->close();

        // Redirect to email verification page
        header("Location: email-verification.php?email=" . $email);
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    } catch (mysqli_sql_exception $e) {
        echo "Database Error: {$e->getMessage()}";
    }
}

// End output buffering and flush output
ob_end_flush();
?>
	<link href="img\log.png" rel="icon">
<form method="post">
    <div class="span5">
        <div class="form-horizontal">
            <div class="control-group">
                <label class="control-label" for="firstname">Name:</label>
                <div class="controls">
                    <input type="text" name="firstname" placeholder="Firstname" required><br><br>
                    <input type="text" name="lastname" placeholder="Lastname" required><br><br>
                    <input type="text" name="middlename" placeholder="Middlename" required><br><br>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="gender">Gender:</label>
                <div class="controls">
                    <select name="gender" required>
                        <option value=""></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="username">Username:</label>
                <div class="controls">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="password">Password:</label>
                <div class="controls">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
            </div>

            <div class="span6">
                <div class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label" for="address">Address:</label>
                        <div class="controls">
                            <input type="text" name="address" placeholder="Address" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="contact_no">Contact No:</label>
                        <div class="controls">
                            <input type="text" name="contact_no" placeholder="Contact No" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="email">Email Address:</label>
                        <div class="controls">
                            <input type="email" name="email" placeholder="Email Address" required>
                        </div>

                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button name="submit" type="submit" class="btn btn-info"><i
                            class="icon-signin icon-large"></i>&nbsp;Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <div class="center-container">
        <div class="center">
            <a href="login.php">you are a Member? login</a>
        </div>
    </div>
</form>