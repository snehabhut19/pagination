
<?php
require 'db.php';
$uid=$_POST['id'];
$sql="select * from user123 where Id=$uid";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

$a=$row["hobbies"];
$b=explode(",",$a);


$name=$row['name'];
$email=$row['email'];
$address=$row['address'];
$gender=$row['gender'];
$city=$row['city'];
$hobbies=$row['hobbies'];
$phone=$row['phone'];
?>
<html>
<head>
    <title> signup form </title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<style>
    h2{
        text-align:center;
    }
    .button{
        text-align:center;
    }
    .error {color: #FF0000;}

    </style>

    
</head>
<body>



    <div class="container">
        <h2 >SIGNUP FORM</h2>
    </div>
    <br>
    <form name="my-form" action="updateconnect.php" id="frm" method="post" class="form" enctype="multipart/form-data">
            <div class ="row">
                <div class="col">
                <input type="hidden" name="id" class="txtField" value="<?php echo $_POST['id']; ?>">
                    <label >NAME :</label>     
                    <input type="text" id="name" name="name" class="form-control" value=<?php echo $name;?>>
                    
                </div>
                <div class="col">
                     <label>EMAIL :</label>    
                    <input type="text" id="email" name="email" class="form-control" value=<?php echo $email;?>>
                </div>
             </div>
            
            <br>
            <div class="row">
                <div class="col">
                    <label >GENDER :</label>
                    <input type="radio" name="gender" value="female" 
                    <?php 
                    if($row["gender"]=='female'){
                        echo "checked";
                    }
                    ?>
                    >Female
                    <input type="radio" name="gender" value="male"
                    <?php 
                    if($row["gender"]=='male'){
                        echo "checked";
                    }
                    ?>
                    >Male
                    <input type="radio" name="gender" value="other"
                    <?php 
                    if($row["gender"]=='other'){
                        echo "checked";
                    }
                    ?>
                    >Other
                </div>
                <div class="col">
                    <label> PHONE : </label>  
                    <input type="text" name="country code"  value="+91" size="2">   
                    <input type="text" name="phone" size="10" value=<?php echo $phone;?>> <br> <br>  
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>ADDRESS :</label>
                    <textarea name="address" id="address" > <?php echo $address;?></textarea>
                </div>
                <div class="col">
                    <label>CITY : </label>
                    <select id="city" name="city">
                    <option value="">select city </option>
                    <option value="rajkot"
                    <?php
                    if($row["city"]=='rajkot'){
                        echo "selected";
                    }
                    ?>
                    >rajkot</option>
                    <option value="ahmedabad"
                    <?php
                    if($row["city"]=='ahmedabad'){
                        echo "selected";
                    }
                    ?>
                    >ahmedabad</option>
                    <option value="surat"
                    <?php
                    if($row["city"]=='surat'){
                        echo "selected";
                    }
                    ?>
                    > surat</option>
                    </select>
                </div>
            </div>
        
            <br>
            <div class="row">
                <div class="col">
                    <label>HOBBIES :</label>
                    <input type="checkbox" id="hobbies1" name="hobbies[]" value="reading"
                    <?php

                    if(in_array("reading",$b))
                    {
                        echo "checked";
                    }
                    ?>
                    >reading
                    <input type="checkbox" id="hobbies2" name="hobbies[]" value="writting"
                    <?php

                    if(in_array("writting",$b))
                    {
                        echo "checked";
                    }
                    ?>
                    >writting
                </div>

               
            </div>

            <br>

           
            <div class="button">
                <input type="submit" id="submit" name="submit" class="btn btn-primary" >
            </div>
</form>
</div>

</body>
    </html>