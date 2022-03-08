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
    <form name="my form" action="connect.php" id="frm" method="post" class="form" enctype="multipart/form-data">

            <div class ="row">
                <div class="col">
                    <label >NAME :</label>     
                    <input type="text" id="name" name="name" class="form-control">
                    
                </div>
                <div class="col">
                     <label>EMAIL :</label>    
                    <input type="text" id="email" name="email" class="form-control">
                </div>
             </div>
            <div class="row">
                <div class="col">
                    <label>PASSWORD : </label>    
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="col">
                    <label>CON*PASSWORD : </label>    
                    <input type="password" id="conpass" name="conpass" class="form-control">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label>GENDER :</label>
                    <input type="radio" name="gender" value="female">Female
                    <input type="radio" name="gender" value="male">Male
                    <input type="radio" name="gender" value="other">Other
                </div>
                <div class="col">
                    <label> PHONE : </label>  
                    <input type="text" name="country code"  value="+91" size="2"/>   
                    <input type="text" name="phone" size="10"/> <br> <br>  
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>ADDRESS :</label>
                    <textarea name="address" id="address"> </textarea>
                </div>
                <div class="col">
                    <label>CITY : </label>
                    <select id="city" name="city">
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
                    <input type="checkbox" id="hobbies1" name="hobbies[]" value="reading">reading
                    <input type="checkbox" id="hobbies2" name="hobbies[]" value="writting">writting
                </div>

                <div class="col">
                    <label>FILE :</label>
                    <input type="file" id="file" name="file" >
                </div>
            </div>

            <br>

            <div>
                <input type="checkbox" id="checkbox" name="checkbox">email me
            </div>
            <div class="button">
                <input type="submit" id="submit" name="submit" class="btn btn-primary" >
            </div>
</form>
</div>

</body>
    </html>