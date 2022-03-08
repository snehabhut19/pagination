<?php
require_once 'db.php';


$error = "";

if(isset($_REQUEST["submit"])){
    $pass=$_POST["password"];
    $conpass = $_POST['conpass'];

    if (empty($_POST["name"]))
    {
        echo "you didn't enter name";
    }
    
    if (empty($_POST["email"]))
    {
        
        echo "  <br> you didn't enter email";
    }
    elseif( $email =  !preg_match( "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST["email"] ) ) {
        echo '<br>Enter valid email';
      }
    if (empty($_POST["password"]))
    {
        echo " <br> you didn't enter password";
    }
    elseif (strlen($pass)<6){
        echo "<br>must be required 6 char in your pass";
    }
    if (empty($_POST["conpass"]))
    {
        echo " <br>you didn't enter confirm password";
    }
    if($pass != $conpass){
        echo "<br>password and confirm pass does not same";
    } 
    if (empty($_POST["gender"]))
    {
        echo "<br>you didn't enter gender";
    }
    if (empty($_POST["city"]))
    {
        echo "<br>you didn't enter city";
    }
    if(empty($_POST["hobbies"]))
    {
        echo "<br>you didn't enter hobbies";
    }
    
    if(empty($_POST["phone"])){
        echo "<br> you didn't enter phone";
    }

    else{ 
 
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        
        $conpass = $_POST['conpass'];
        $cp=md5($conpass);
        $gender = $_POST['gender'];
        $city = $_POST['city'];
        $hobbies = $_POST['hobbies'];
        $hobby=implode(",",$hobbies);
        $phone=$_POST['phone'];
        $file   = $_FILES['file']['name'];
        $tmp_file  = $_FILES['file']['tmp_name'];
        $fileSize  = $_FILES['file']['size'];
    
            if($file == "")
            {
            $error = "Please Upload Image";
            }
            else{
            
                $sql = "INSERT INTO user123( name, email, password, gender, phone, address, city, hobbies, file ) VALUES ('$name','$email', '$cp', '$gender', '$phone', '$address', '$city','$hobby','$file')";
                $src = mysqli_query( $conn, $sql );  


                if($src){
                     echo "new data created successfully<br>";
     
                        if(require("upload/1.php"))
                            {
                                 $error = "image upload";
                            }else
                             {
                                $error = "image is not upload";
                             }
    
                     }

            }
        }
    
}
?>


<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);


$alert = '';
$path="images/".$file_name;

if(isset($_POST[''])){
     $path =  $_FILES["file"]["name"];
     move_uploaded_file($_FILES["file"]["tmp_name"], $path);

     $mail->AddAttachment($path);
    
    

 
$message = '<tr>
<td width="30%">name</td>
<td width="70%">' . $_POST["name"] . '</td>
</tr>
<tr>
<td width="30%">email</td>
<td width="70%">' . $_POST["email"] . '</td>
</tr>
<tr>
<td width="30%">phone</td>
<td width="70%">' . $_POST["phone"] . '</td>
</tr>

<tr>
<td width="30%">address</td>
<td width="70%">' . $_POST["address"] . '</td>
</tr>
<tr>
<td width="30%">gender</td>
<td width="70%">' . $_POST["gender"] . '</td>
</tr>
<tr>
<td width="30%">city</td>
<td width="70%">' . $_POST["city"] . '</td>
</tr>
<tr>
<td width="30%">hobbies</td>
<td width="70%">' . $hobby . '</td>
</tr>
';

   
    $mail = new PHPMailer;
    $mail->IsSMTP();                                
    $mail->Host = 'smtp.gmail.com';        
    $mail->Port = '465';                                
    $mail->SMTPAuth = true;                            
    $mail->Username = 'snehampatel1904@gmail.com';                    
    $mail->Password = '@toqy4521HI@@';                    
    $mail->SMTPSecure = 'ssl';                            
    $mail->From = 'snehampatel1904@gmail.com';                    
    $mail->FromName = 'snehampatel1904@gmail.com';                
    $mail->AddAddress('snehampatel1904@gmail.com', 'snehampatel1904@gmail.com');     
    $mail->WordWrap = 50;                            
    $mail->IsHTML(true);                            
     $mail->AddAttachment($path);                    
    $mail->Subject = 'user Details';                
    $mail->Body = $message;                            
    if ($mail->Send())                                
    {
        $message = '<div class="alert alert-success">Application Successfully Submitted</div>';
          
    } else {
        $message = '<div class="alert alert-danger">There is an Error</div>';
    }
    
}


if(isset($_POST[''])){
    $message = '<b>Thanks for regestration.</b> ';
        $mail = new PHPMailer;
        $mail->IsSMTP();                           
        $mail->Host = 'smtp.gmail.com';        
        $mail->Port = '465';                                
        $mail->SMTPAuth = true;                            
        $mail->Username = 'snehampatel1904@gmail.com';                    
        $mail->Password = '@toqy4521HI@@';                    
        $mail->SMTPSecure = 'ssl';                            
        $mail->From = 'snehabhut19@gmail.com';                    
        $mail->FromName = 'snehabhut19@gmail.com';                
        $mail->AddAddress($_POST["email"], 'snehabhut19@gmail.com');      
        $mail->WordWrap = 50;                            
        $mail->IsHTML(true);                                                
        $mail->Subject = 'user Details';                
        $mail->Body = $message;                           
        if ($mail->Send())                                
        {
            $message = '<div class="alert alert-success">Application Successfully Submitted</div>';
          
        } else {
            $message = '<div class="alert alert-danger">There is an Error</div>';
        }
        
    }
    
?>