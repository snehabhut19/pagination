<?php
 include 'db.php';
 if(count($_POST)>0) {
    mysqli_query($conn,"UPDATE user123 set name='" . $_POST['name'] . "', email='" . $_POST['email'] . "', gender='" . $_POST['gender'] . "' ,phone='" . $_POST['phone'] . "', address='" . $_POST['address'] . "', city='" . $_POST['city'] . "', hobbies='" . $_POST['hobbies'] . "' WHERE name='" . $_POST['name'] . "'");
    $message = "Record Modified Successfully";
    }
    $result = mysqli_query($conn,"SELECT * FROM user123 WHERE name='" . $_GET['name'] . "'");
    $row= mysqli_fetch_array($result);

?>
<html>
    <head>
        <title>update data</title>
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
    <form name="my form" action="" id="frm" method="post" class="form" enctype="multipart/form-data">
    <div><?php if(isset($message)) { echo $message; } ?>
    </div>

            <div class ="row">
                <div class="col">
                    <label >NAME :</label>     
                    <input type="text" id="name" name="name" class="form-control"value="<?php echo $row['name']; ?>">
                    
                </div>
                <div class="col">
                     <label>EMAIL :</label>    
                    <input type="text" id="email" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                </div>
             </div>
            
            <br>
            <div class="row">
                <div class="col">
                    <label>GENDER :</label>
                    <input type="radio" name="gender" value="<?php echo $row['gender']; ?>">Female
                    <input type="radio" name="gender" value="<?php echo $row['gender']; ?>" >Male
                    <input type="radio" name="gender" value="<?php echo $row['gender']; ?>">Other
                </div>
                <div class="col">
                    <label> PHONE : </label>  
                    <input type="text" name="country code"  value="+91" size="2"/>   
                    <input type="text" name="phone" size="10" value="<?php echo $row['phone']; ?>"/> <br> <br>  
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>ADDRESS :</label>
                    <textarea name="address" id="address" value="<?php echo $row['address']; ?>"> </textarea>
                </div>
                <div class="col">
                    <label>CITY : </label>
                    <select id="city" name="city" value="<?php echo $row['city']; ?>">
                    <option value="">select city </option>
                    <option value="rajkot">rajkot</option>
                    <option value="ahmedabad">ahmedabad</option>
                    <option value="surat"> surat</option>
                    </select>
                </div>
            </div>
        
            <br>
            <div class="row">
                <div class="col">
                    <label>HOBBIES :</label>
                    <input type="checkbox" id="hobbies1" name="hobbies[]" value="<?php echo $row['hobbies']; ?>">reading
                    <input type="checkbox" id="hobbies2" name="hobbies[]" value="<?php echo $row['hobbies']; ?>">writting
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
