<?php 
    session_start();
    $connect = new mysqli('localhost', 'root', '', 'pizzamai');

    // Check Connection

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
    }

?>
<!DOCTYPE html>
<html>
<style>
    .html, body {
        padding:0;
        margin:0;
    }
    .title_bar {
        width: 96.1%;
        height: auto;
        max-height:50px;
        padding: 30px;
        background-color: rgb(255, 0, 0);
        position: absolute;
        top: 0px;
        left: 0px;
        color: #FFFFFF;
        text-align: left;
        font-size: 40px;
    }
    .center {
        margin-top: -8%;
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
    width: 20%;
    right: 5%;
    bottom: 10% ;
    }
    .button1 {
    background-color: #fffb00; 
    color: black; 
    }

    .button1:hover {
    background-color: #aab02f;
    color: rgb(0, 0, 0);
    }
    .img_round {
        position: absolute;
        border-radius: 50%;
        width : 125px;
        height : 125px;
        left : 8%;
        top : 30%;
    }
    .header{
    background-color:red;
    height:15%;
    margin-top:-1.5%;
    padding-bottom:20px;
    }

    #info-personal:focus {
        outline:0;
    }

    .error {
        text-align:center;
    }
</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="menu_employee.css" type="text/css" />
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
    <title>Edit | PizzaMai</title>
    
</head>
<header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
            
        <a class="navbar-brand" href="index1.php"><h2>Pizzaไหม</h2></a>
       
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                <li class="nav-item">
                    <a class="nav-link" href="index1.php">หน้าแรก
                      
                    </a>
                </li> 
                    <a class="nav-link active" href="user_info.php">แก้ไขข้อมูล
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 
                <form action="show_info_user_db.php" method="GET">
                <input type="text" id="CID" name="CID" value="<?php echo $_SESSION['CID']; ?>" style="width: 66%;display:none">
                 <input type="text" id="MemID" name="MemID" value="<?php echo $_SESSION['MemID']; ?>" style="width: 66%;display:none">
               
                 <button id="info-personal" type="submit" name="show_info_user" style="background-color:#f33f3f;width:200px;border:none;cursor:pointer;padding-top:7%;margin-left:6%"><h6 class="topic" style="color:white;">ข้อมูลส่วนบุคคล</h6></button>
                 </form>
                <li class="nav-item"><a class="nav-link" href="history.php">ประวัติ</a></li>

                
            </ul>
          </div>
        </div>
      </nav>
    </header>   
   <br><br><br> <br><br>

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
    

   <div class="latest-products">
   
    <div class = 'center'>
    <form action="update_server.php" method="POST">
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
           
            <input type="text" id="CID" name="CID" value="<?php echo $_SESSION['CID']; ?>" style="width: 66%;display:none">
            <input type="text" id="MemID" name="MemID" value="<?php echo $_SESSION['MemID']; ?>" style="width: 66%;display:none">
            <button type='submit' name='update_user' class="button button1">แก้ไข</button>
            
        </form>
    </div>
    
</body>
</html>