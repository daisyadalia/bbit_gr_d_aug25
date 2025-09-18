[17:19, 18/09/2025] Daisy: <?php
$servername = "localhost";
$username = "root"; 
$password = "1234";
$dbname = "emailapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO users (id,f_name, l_name, email)
VALUES ('U004','Daisy', 'Adalia', 'daisy.amolloh@strathmore.edu')";

if ($conn->query($sql) === TRUE) {
  echo "<div style='padding:15px; background-color:#e6ffe6; color:#2d662d; border:1px solid #b2d8b2; border-radius:5px; font-family:Arial,sans-serif;'>
          <strong>Success!</strong> New record created successfully.
        </div>";
} else {
  echo "<div style='padding:15px; background-color:#ffe6e6; color:#662d2d; border:1px solid #d8b2b2; border-radius:5px; font-family:Arial,sans-serif;'>
          <strong>Error:</strong> " . htmlspecialchars($sql) . "<br>" . htmlspecialchars($conn->error) . "
        </div>";
}

$conn->close();
?>
[17:19, 18/09/2025] Daisy: mail.php code:

<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'Adds-on/PHPMailer/vendor/autoload.php';

//Create an instance; passing true enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                         //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                   //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'daisy.amolloh@strathmore.edu';        //SMTP username
    $mail->Password   = 'psrs geuw mzhp jcsb';                  //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

    //Recipients
    $mail->setFrom('daisy.amolloh@strathmore.edu', 'BCOM 2.2');
    $mail->addAddress('daisylexinne@gmail.com', 'Precious');
    //$mail->addAddress('sirwoosah@gmail.com', 'MwiziRaeli');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Welcome to BCOM 2.2! Account Verification ';
    $mail->Body    = '<p>Hello Precious<br>
                      <br>
                      You requested an account on BCOM 2.2.<br>
                      <br>
                      In order to use this account, you need to <a href="https://your-registration-link.com">Click Here</a> to complete the registration process.<br>
                      <br>
                      Regards,<br>
                      Systems Admin<br>
                      BCOM 2.2</p>
                       ';

// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();
echo '<div style="padding:20px; background:#111a11; border:1px solid #0d2a0d; border-radius:8px; color:#cce6cc; font-family:Arial, sans-serif; max-width:400px; margin:30px auto; text-align:center;">
    <span style="font-size:1.5em; font-weight:bold;">&#10004; Message Sent!</span>
    <div style="margin-top:10px;">Your email has been sent successfully.</div>
      </div>';
} catch (Exception $e) {
echo '<div style="padding:20px; background:#1a1111; border:1px solid #2a0d0d; border-radius:8px; color:#e6cccc; font-family:Arial, sans-serif; max-width:400px; margin:30px auto; text-align:center;">
    <span style="font-size:1.5em; font-weight:bold;">&#10060; Error!</span>
    <div style="margin-top:10px;">Your email could not be sent.<br>Mailer Error: ' . htmlspecialchars($mail->ErrorInfo) . '</div>
      </div>';
}