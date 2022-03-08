<?php
require 'db.php';






if(isset($_REQUEST["submit"])){

  

         $uid=$_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $city = $_POST['city'];
        $hobbies = $_POST['hobbies'];
        $hobby=implode(",",$hobbies);
        $phone=$_POST['phone'];
        

        $sql="update user123 set Id='$uid', name='$name',email='$email',gender='$gender',phone='$phone',address='$address',city='$city',hobbies='$hobby' where Id='$uid'";
       

        $result=mysqli_query($conn,$sql);

        if($result){
            echo "update succesfully";
        }else{
            echo "error";
        }

        
}
?>