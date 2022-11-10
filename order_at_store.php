<?php 
     session_start();
    $connect = new mysqli('localhost', 'root', '', 'pizzamai');

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
      }

    $sql = "SELECT customer.Telnum, order_goods.CID, order_goods.Done ,order_manage.Type, order_goods.Unit,order_goods.OID, order_goods.MID, menu.Name, menu.Size, menu.Price, menu.FlourType, order_manage.Date, order_manage.Comm FROM (((order_goods INNER JOIN menu ON order_goods.MID = menu.MID) INNER JOIN order_manage ON order_goods.OID = order_manage.OID)INNER JOIN customer ON customer.CID=order_goods.CID) WHERE order_goods.Done=0 AND order_manage.Type='รับที่ร้านค้า'";

    $result = $connect->query($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="Pizza.png">
    <link rel="stylesheet" href="order_at_store.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
 
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <title>Order Pick up at Store | PizzaMai</title>
</head>
<body>

        <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
            
        <a class="navbar-brand" href="menu_employee.php"><h2>Pizzaไหม</h2></a>
       
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="menu_employee.php">เมนู
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item active"><a class="nav-link" href="order_at_store.php">รายการที่รับที่ร้านค้า</a></li>
                
                <li class="nav-item"><a class="nav-link" href="order.php">รายการสินค้า</a></li>

                <li class="nav-item"><a class="nav-link" href="history_casheir.php">ประวัติการขาย</a></li>
                <li class="nav-item">
            <?php if (isset($_SESSION['EID'])) : ?>
            <?php if (isset($_SESSION['Fname'])) : ?>
            <?php if (isset($_SESSION['Lname'])) : ?>
                    
                    <p style="color:white">      ชื่อ:<strong><?php echo " " . $_SESSION['Fname']; ?></strong><strong><?php echo " ". $_SESSION['Lname']; ?></strong>
                
                <?php endif ?>
                
            <?php endif ?>
            
            <p style="color:white">   พนักงานหมายเลข:<strong><?php echo" ". $_SESSION['EID']; ?></strong>
         <?php endif ?>
            </li></p>



            </ul>
          </div>
        </div>
      </nav>
    </header>
            
    <div class="latest-products">
    <?php while($row = $result->fetch_assoc()): ?>
       
        <div style="margin-top:6%;margin-left:5%">
       <?php echo "Order ID : ". $row['OID'] ?><br>
       <?php echo "วันเวลาที่สั่ง: ". $row['Date'] ?><br>
       <?php echo "รหัสลูกค้าที่สั่ง: ". $row['CID'] ?><br>
        </div>
        <form action="order_at_store_db.php" method="POST"> 
       <div style="background-color:#D8D8D4;height:auto;width:700px;margin-left:25%;padding:20px;margin-top:-3%">
            <?php echo " x". $row['Unit'] ?>
            <?php echo $row['Name'] ?>
            <?php echo $row['Size'] ?>
            <?php echo $row['FlourType'] ?>
            
            <?php echo $row['Price']. " บาท" ?><br>
            <?php echo " รวม ". $row['Unit']*$row['Price']. " บาท" ?><br>
            <?php echo "หมายเหตุ : ". $row['Comm'] ?><br>
            <?php echo "เบอร์โทร : ". $row['Telnum'] ?><br>
            <input id="comfirm" type="text" name="OID" style="margin-top:30px;display:none" value="<?php echo $row['OID'] ?>">
            <button type="submit" name="Done" class="btn" style="background:#89E05A;border:1px solid black;height:30px;width:100px;margin-top:40px;margin-left:38%">เสร็จสิ้น</button>
        </div>
        </form>
      
    <?php endwhile ?>
    </div>
</body>
</html>