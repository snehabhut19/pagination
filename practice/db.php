<?php
$servername="localhost";
$username="root";
$password="mysql123";
$dbname="user";

$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!conn){
    die("connection fail".mysqli_connect_error());

}
//echo "connection successfully";
?>