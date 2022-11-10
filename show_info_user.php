<?php 
    session_start();
    $connect = new mysqli('localhost', 'root', '', 'pizzamai');

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
    }

?>

<!DOCTYPE html>
<html lang="en">
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
    <title>Your info | PizzaMai</title>
</head>
    <style>
        .html, body {
            padding:0;
            margin:0;
        }
        .header{
            background-color:red;
            height:15%;
            margin-top:-1.5%;
            padding-bottom:20px;
        }
    </style>
<body>
<header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
            
        <a class="navbar-brand" href="index1.php"><h2>Pizzaไหม</h2></a>
        
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                    <a class="nav-link" href="index1.php">หน้าแรก
                      
                    </a>
                </li> 
                <li class="nav-item">
                    
                    <a class="nav-link" href="user_info.php">แก้ไขข้อมูล
                     
                    </a>
                </li> 
                <input type="text" id="CID" name="CID" value="<?php echo $_SESSION['CID']; ?>" style="width: 66%;display:none">
                 <input type="text" id="MemID" name="MemID" value="<?php echo $_SESSION['MemID']; ?>" style="width: 66%;display:none">
                <li class="nav-item" type="submit" name="show_info_user"><a class="nav-link active" href="show_info_user.php">ข้อมูลส่วนตัว <span class="sr-only">(current)</span></a></li>
                
                <li class="nav-item"><a class="nav-link" href="history.php">ประวัติ</a></li>

                
            </ul>
          </div>
        </div>
      </nav>
    </header> 
    <div class="latest-products"><div class="col-md-4">
    <div style="background-color:lightgray;padding:20px;margin-left:75%;width:600px;height:250px;border-radius:6px;margin-top:50%;padding-top:6%" >
    
    <span style="margin-left:5%">รหัสลูกค้า : <strong><?php echo $_SESSION['customerID']; ?></strong></span><span style="margin-left:5%">รหัสสมาชิก : <strong><?php echo $_SESSION['MemID']; ?></strong></span><span style="margin-left:5%">Username : <strong><?php echo $_SESSION['Username']; ?></strong></span>
    <br><br>
    <span style="margin-left:5%">ชื่อ : <strong><?php echo $_SESSION['Fname']; ?></strong></span><span style="margin-left:5%">นามสกุล : <strong><?php echo $_SESSION['Lname']; ?></strong></span><span style="margin-left:5%">เบอร์โทรศัพท์ : <strong><?php echo $_SESSION['Telnum']; ?></strong></span>
    <br><br>
    <span style="margin-left:5%">เลขที่บ้าน : <strong><?php echo $_SESSION['Number']; ?></strong></span><span style="margin-left:5%">ถนน : <strong><?php echo $_SESSION['Street']; ?></strong></span><span style="margin-left:5%">ตำบล/แขวง : <strong><?php echo $_SESSION['District']; ?></strong></span>
    <br><br>
    <span style="margin-left:5%">รหัสไปรษณีย์ : <strong><?php echo $_SESSION['Zipcode']; ?></strong></span><span style="margin-left:5%">จังหวัด : <strong><?php echo $_SESSION['Province']; ?></strong></span>
    <br><br>
    <span style="margin-left:5%">วันที่เป็นสมาชิก : <strong><?php echo $_SESSION['memberDate']; ?></strong></span><span style="margin-left:5%">คะแนน : <strong><?php echo $_SESSION['Point']; ?></strong></span><span style="margin-left:5%">รหัสผ่านของคุณ : <strong><?php echo $_SESSION['Password']; ?></strong></span>
    </div>
         
</body>
</html>