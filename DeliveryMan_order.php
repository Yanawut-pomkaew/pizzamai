<?php 
    session_start();
    $connect = new mysqli('localhost', 'root', '', 'pizzamai');

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
      }

    $sql = "SELECT * FROM (((((order_goods INNER JOIN menu ON order_goods.MID = menu.MID) INNER JOIN order_manage ON order_goods.OID = order_manage.OID) INNER JOIN orderlocation ON order_manage.OID = orderlocation.OID) INNER JOIN order_district ON orderlocation.District= order_district.District) INNER JOIN customer ON customer.CID=order_goods.CID) WHERE order_manage.Type='จัดส่งตามที่อยู่' AND order_goods.Done=0";

    $result = $connect->query($sql);

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }

    if(!isset($_SESSION["EID"])){
        header("location:login.php");
        exit();
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
    <link rel="stylesheet" href="DeliveryMan_order.css" type="text/css" />
    

    <title>DeliveryMan_order</title>
</head>
<body>
<header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
            
        <a class="navbar-brand" href="menu_DeliveryMan.php"><h2>Pizzaไหม</h2></a>
       
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="menu_DeliveryMan.php">เมนู
                     
                    </a>
                </li> 

                <li class="nav-item  active"><a class="nav-link" href="DeliveryMan_order.php">รายละเอียดคำสั่งซื้อ-การขนส่ง
                    <span class="sr-only">(current)</span></a></li>
                
            



            </ul>
          </div>
        </div>
      </nav>
    </header>

    
    <div class="latest-products">
    <div class="side">
        <img src="profile_employee.png" alt="profile" width="160" height="160" style="margin-top:5%;margin-left:5%">

        <?php if (isset($_SESSION['Fname'])) : ?>
            <?php if (isset($_SESSION['Lname'])) : ?>
                <p style="margin-left:5%">ชื่อ : <strong><?php echo $_SESSION['Fname']; ?></strong><strong><?php echo " ". $_SESSION['Lname']; ?></strong></p>
            <?php endif ?>
        <?php endif ?>
        <?php if (isset($_SESSION['EID'])) : ?>
           
            <p style="margin-left:5%">หมายเลขพนักงาน: <strong><?php echo $_SESSION['EID']; ?></strong></p>
        <?php endif ?>

        <div class="input-group" style="margin-left:7%;margin-top:12%">
            <button type="button" name="logout" class="btn" style="background:#F52D39;border:1px solid black;height:30px;width:100px;" onclick="document.location='logout.php'">Logout</button>
        </div>
    </div>

    <form action="DeliveryMan_order_db.php" method="POST">
    <div class="content">
        <?php while($row = $result->fetch_assoc()): ?>
          
            <div id="done" style="padding-left:30px;padding-bottom:20px;padding-top:20px;background-color:#D8D8D4;margin:5px">
                <?php echo "วันเวลาที่สั่ง: ". $row['Date'] ?><br>
                <?php echo "Order ID : ". $row['OID'] ?><br>
                
                <?php echo " X".$row['Unit'] ." ". $row['Name'] ." ขนาด: ". $row['Size'] ." ". $row['FlourType']?><br>
                <?php echo $row['Unit']*$row['Price']. " บาท"?><br><br>
                <?php echo "หมายเหตุ: ". $row['Comm']?><br>

                <div class="location">
                    <?php echo "บ้านเลขที่ ".$row['Number']. " ถนน ". $row["Street"]. " ตำบล/เขต". $row['District']?><br>
                    <?php echo "จังหวัด ". $row['Province']. " เลขไปรษณีย์ ". $row['Zipcode']?><br><?php echo "เบอร์โทร ". $row['Telnum']?><br>
                </div>

                <input id="comfirm" type="text" name="OID" style="margin-top:30px;display:none" value="<?php echo $row['OID'] ?>">
                <button type="submit" name="Done" class="btn" style="background:#89E05A;border:1px solid black;height:30px;width:100px;margin-top:40px;margin-left:38%">เสร็จสิ้น</button>
                
            </div>
           
        <?php endwhile ?>

        <?<php>
    
        </php>

    </div>
    </form>
    
</body>
</html>