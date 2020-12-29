<?php 
                  // Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
                
 if (isset($_POST['send-email'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
                 

  // Load Composer's autoloader
                       require 'vendor/autoload.php';
  
                       // Instantiation and passing `true` enables exceptions
                       $mail = new PHPMailer(true);
  
                       try {
                                                //Server settings
                            //$mail->SMTPDebug = 2;  //SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                            $mail->isSMTP();                                            // Send using SMTP
                            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                            $mail->Username   = 'jocktech23@gmail.com';                     // SMTP username
                            $mail->Password   = '@jocktech19';                               // SMTP password
                            $mail->SMTPSecure = 'tls';   //PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                            
      //Recipients
                           $mail->setFrom('admin@sxm.co.za', 'Admin');
                           $mail->addAddress($email);     // Add a recipient
                           // $mail->addAddress('ellen@example.com');               // Name is optional
                           // $mail->addReplyTo('info@example.com', 'Information');
                           // $mail->addCC('cc@example.com');
                           // $mail->addBCC('bcc@example.com');
  
                                
  
                                                // Content
                            $mail->isHTML(true);                                  // Set email format to HTML
                            $mail->Subject = 'Here is the subject';
                           $mail->Body    = $username;
                           $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
                           $mail->send();
                           echo "<script>alert('message sent')</script>";
                           echo "<script>window.open('employees.php','_self')</script>";
                       } catch (Exception $e) {
                           //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                           echo "<script>alert('eMessage could not be sent. Mailer Error:'{$mail->ErrorInfo}')</script>";
                           echo "<script>window.open('employees.php','_self')</script>";
                       }
                   }
?>
