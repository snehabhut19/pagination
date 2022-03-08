
<?php


require 'db.php';

$limit = 3;

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}


$offset = ($page-1)* $limit;


$sql="select * from user123 LIMIT {$offset},{$limit}";
$result=mysqli_query($conn,$sql);

?>
<html>
    <head>
        <title>fetchdata</title>
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        

</head>
<body>
   
    

<table border="2">
    <thead>
    <tr>
        <th>Id</th>
        <th>name</th>
        <th>email</th>
        <th>gender</th>
        <th>phone</th>
        <th>address</th>
        <th>city</th>
        <th>hobbies</th>
        <th>file</th>
    
    
        <th>Operation</th>
        
       
    </tr>
</thead>
<tbody>
    

<?php

if(mysqli_num_rows($result)>0){
    while( $row=mysqli_fetch_assoc( $result ) ){  
        
        ?>
        <tr>
            <td><?php echo $row['Id'];?></td>
            <td><input type="text" value="<?php echo $row['name'];?>"></td>
            <td><input type="text" value="<?php echo $row['email'];?>"></td>
            <td><input type="text" value="<?php echo $row['gender'];?>"></td>
            <td><input type="text" value="<?php echo $row['phone'];?>"></td>
            <td><input type="text" value="<?php echo $row['address'];?>"></td>
            <td><input type="text" value="<?php echo $row['city'];?>"></td>
            <td><input type="text" value="<?php echo $row['hobbies'];?>"></td>
            <td><img src="<?php echo "images/".$row['file'];?>" width="50px" height="50px" alt="image"></td>
           
            
            
            <td>
                <form method="POST">
                    <input type=hidden name=id value="<?php echo $row['Id'];?>" >
                    <input type=submit value=Delete name=delete  >
                </form>
            </td>
            <td>
                <form  action="updatehtml.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['Id'];?>">
                    <input type="submit" value="update" name="update">
                </form>
            </td>
           <!-- <td><button class="btn btn-primary"><a href="updatehtml.php? Id='.$Id.'" class="text-light">update</a></button></td> -->
        </tr>
        <?php
       
    }
    
    }else{
        echo "0 results";
    }
    


    if (isset($_POST['delete'])){
        
        $did=$_POST['id'];
        $query="delete From user123 where Id='$did'";
        $result=mysqli_query($conn,$query);
    }

    // if (isset($_REQUEST['update'])){
    //     $did=$_POST['id'];


     
    //     $name = $_POST['name'];
    //     $email = $_POST['email'];
    //     $address = $_POST['address'];
    //     $gender = $_POST['gender'];
    //     $city = $_POST['city'];
    //     $hobbies = $_POST['hobbies'];
    //     $hobby=implode(",",$hobbies);
    //     $phone=$_POST['phone'];
        
    //     $sql="update user123 set Id='$did', name='$name',email='$email',gender='$gender',phone='$phone',address='$address',city='$city',hobbies='$hobby' where Id='$did'";
       

    //     $result=mysqli_query($conn,$sql);

    // }



?>
</tbody>

</table>
<?php

$sql1 = "select * from user123";
$result1 = mysqli_query($conn,$sql1) or die ("Query failed");

 if(mysqli_num_rows($result1)>0){

    $total_records = mysqli_num_rows($result1);
 
    $total_page = ceil($total_records / $limit);
    ?>
    <div style="color:blue;text-align:center;">
    <?php

    echo '<ul class ="pagination admin-pagination" >';
    if($page > 1){
    echo '<li><a href="fetchdata.php?page='.($page - 1).'">prev</a></li>';
    }

    for($i = 1; $i <= $total_page; $i++){

        if($i == $page){
            $active = "active";

        }else{
            $active = "";

        }
        echo '<li class="'.$active.'"><a href="fetchdata.php?page='.$i.'">'.$i.'</a></li>';
    }
    if($total_page > $page){
    echo '<li><a href="fetchdata.php?page='.($page + 1).'">Next</a></li>';
    }
    echo '</ul>';
    ?>
    </div>
    <?php

 }
?>


   

</body>
</html>
