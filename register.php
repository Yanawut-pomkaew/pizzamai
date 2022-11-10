<?php 

include('register_server.php'); 


?>
<!DOCTYPE html>
<html>
<style>
    html, body {
        height:110%;
    }
    .title_bar {
        width: 96.1%;
        height: auto;
        padding: 30px;
        background-color: rgb(255, 0, 0);
        position: absolute;
        top: 0px;
        left: 0px;
        color: #FFFFFF;
        text-align: center;
        font-size: 40px;
    }
    .center {
        margin-top: 70px;
        margin-left: 30%;
        margin-right: 30%;
        font-size: 20px;
        position: relative;
    }
    input[type=text] {
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 3px solid rgb(215, 232, 235);
        background-color: rgb(215, 232, 235);
    }
    .button {
    position: absolute;
    background-color: #fffb00;
    border: none;
    color: rgb(0, 0, 0);
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
    width: 30%;
    right: 35%;
    border-radius: 25px;
    }
    .button1 {
    background-color: #fffb00; 
    color: black; 
    border: 2px solid #000000;
    }

    .button1:hover {
    background-color: #aab02f;
    color: rgb(0, 0, 0);
    }

    .error {
        text-align:center;
    }
</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="Pizza.png">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <title>Register Page</title>
    
</head>
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
            
        <a class="navbar-brand" ><h2>Member Register</h2></a>
       
        <a class="navbar-brand" ><h2>PIZZAไหม</h2></a>
            </ul>
          </div>
        </div>
      </nav>
    </header>  


    <div style = "position:relative; left:5px; top:0px;">
        <img src="PizzaMai.png" width="100" height="100">
    </div>
    <?php if (isset($_SESSION['error'])) : ?>
                    <div class="error">
                        <h3 style="color:#F4120F">
                            <?php 
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            ?>
                        </h3>
                    </div>
        <?php endif ?>

    <div class = 'center'>
        <form action="register_server.php" method="POST">
            ชื่อ<br>
            <input type="text" id="fname" name="fname" placeholder="ชื่อจริง (ภาษาอังกฤษ)" style="width: 40%;"><input type="text" id="lname" name="lname" placeholder="นามสกุล (ภาษาอังกฤษ)" style="width: 40%;right: 15%;position: absolute;">
            <br>ที่อยู่<br>
            <input type="text" id="homenumber" name="homenumber" placeholder="บ้านเลขที่" style="width: 20%;"><input type="text" id="district" name="district" placeholder="แขวง/ตำบล" style="width: 35%;left: 25%;position: absolute"><input type="text" id="street" name="street" placeholder="ถนน/ซอย" style="width: 35%;right: 0%;position: absolute;">
            <br>
            <input type="text" id="zipcode" name="zipcode" placeholder="รหัสไปรษณีย์" style="width: 35%;right: 0%;margin-top:14px;position: absolute;"><br>
            <input type="text" id="country" name="province" placeholder="จังหวัด" style="width: 60%;margin-top:-2%;">
            <br>เบอร์โทรศัพท์ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username ที่อยากตั้ง<br>
            <input type="text" id="country" name="phoneNum" placeholder="0984561239" style="width: 33%;"><input type="text" id="username" name="usernameforlogin" placeholder="Username ที่อยากตั้ง" style="width: 50%;margin-left:4%">
            <br>รหัสสำหรับเข้าสู่ระบบ<br>
            <input type="text" id="password" name="Password" placeholder="รหัสที่อยากตั้ง" style="width: 33%;">
            <br><br>
            <button type='submit' name='reg_user' class="button button1" class="btn">Register</button>
        </form>
    </div>

   
</body>
</html>