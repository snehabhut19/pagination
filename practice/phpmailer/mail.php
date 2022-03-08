<?php
// using phpmailer
use PHPMailer\PHPMailer\PHPMailer;
$message = '';


if (isset($_POST["submit"])) {
    $hobby = '';
    foreach ($_POST["checkbox"] as $row) {
        $hobby .= $row . ', ';
    }
    $hobby = substr($hobby, 0, -2);


    $root = 'upload/' . $_FILES["resume"]["name"];
    move_uploaded_file($_FILES["resume"]["tmp_name"] , $root);

   
    $message = '
		<h3 align="center">User Details</h3>
		<table border="3" width="100%" cellpadding="6" cellspacing="6">
			<tr>
				<td>1) First name:</td>
				<td>' . $_POST["fname"] . '</td>
			</tr>
            <tr>
				<td>2) Last name:</td>
				<td>' . $_POST["lname"] . '</td>
			</tr>
            <tr>
				<td>3) Email Address:</td>
				<td>' . $_POST["email"] . '</td>
			</tr>
        
			<tr>
				<td>4) Address:</td>
				<td>' . $_POST["address"] . '</td>
			</tr>
			<tr>
				<td>5) Gender:</td>
				<td>' . $_POST["gender"] . '</td>
			</tr>
            <tr>
				<td>6) City:</td>
				<td>' . $_POST["city"] . '</td>
			</tr>
			<tr>
				<td>7) Hobbies:</td>
				<td>' . $hobby . '</td>
			</tr>
			
			
		</table>
	';



    require_once 'phpmailer/Exception.php';
    require_once 'phpmailer/PHPMailer.php';
    require_once 'phpmailer/SMTP.php';

    $mail = new PHPMailer;
    $mail->IsSMTP();    // send message using SMTP                           

    
    // ADMIN DETAILS 
    $mail->Host = 'smtp.gmail.com';        
    $mail->Port = '465';                               
    $mail->SMTPAuth = true;                           
    $mail->Username = 'krunalkb11@gmail.com';                    
    $mail->Password = 'Web_developer';                   
    $mail->SMTPSecure = 'ssl';                            
    $mail->AddAddress('krunalkb11@gmail.com', 'admin');        
    
    $mail->WordWrap = 50;                           
    $mail->IsHTML(true);                            
    $mail->AddAttachment($root);                    
    $mail->Subject = 'User Detail';               
    $mail->Body = $message;      
    
    if ($mail->Send())                                
    {
        $message = 'Application Successfully Submitted';
        unlink($root);
    } 
   else {
        $message = 'There is an Error';
    }
}
if (isset($_POST["emailme"])) {
  

    $mailme = $_POST["email"];
    $message = '
        <h2>Thank you for register.</h2>
	';



    require_once 'phpmailer/Exception.php';
    require_once 'phpmailer/PHPMailer.php';
    require_once 'phpmailer/SMTP.php';

    $mail = new PHPMailer;
    $mail->IsSMTP();    // send message using SMTP                           

    
    // ADMIN DETAILS 
    $mail->Host = 'smtp.gmail.com';        
    $mail->Port = '465';                               
    $mail->SMTPAuth = true;                           
    $mail->Username = 'krunalkb11@gmail.com';                    
    $mail->Password = 'Web_developer';                   
    $mail->SMTPSecure = 'ssl';                            
    $mail->AddAddress( $mailme, 'admin');        
    
    $mail->WordWrap = 50;                           
    $mail->IsHTML(true);                            
    $mail->AddAttachment($root);                    
    $mail->Subject = 'User Detail';               
    $mail->Body = $message;      
    
    if ($mail->Send())                                
    {
        $message = 'Application Successfully Submitted';
    } 
   else {
        $message = 'There is an Error';
    }
}


