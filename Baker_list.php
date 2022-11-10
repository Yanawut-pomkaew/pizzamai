<?php 
    session_start();
    $connect = new mysqli('localhost', 'root', '', 'pizzamai');

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
      }

    $sql = "SELECT order_goods.CID, order_goods.Done ,order_manage.Type, order_goods.Unit,order_goods.OID, order_goods.MID, menu.Name, menu.Size, menu.Price, menu.FlourType, order_manage.Date, order_manage.Comm FROM ((order_goods INNER JOIN menu ON order_goods.MID = menu.MID) INNER JOIN order_manage ON order_goods.OID = order_manage.OID) WHERE order_goods.Done=0";

    $result = $connect->query($sql);


?>

<!DOCTYPE html>
    <html>
        <head>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="menu_employee.css" type="text/css" />
    <link rel="icon" type="image/x-icon" href="Pizza.png">
    <link rel="stylesheet" href="Baker_ingredient.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

            <title>To do | PizzaMai</title>    
             
        </head>

        <body>
            <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
            
        <a class="navbar-brand" href="menu_Baker.php"><h2>Pizzaไหม</h2></a>
       
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="menu_Baker.php">เมนู
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item"><a class="nav-link" href="Baker_ingredient.php">วัตถุดิบในคลัง</a></li>
                
                <li class="nav-item active"><a class="nav-link" href="Baker_list.php">รายการ</a></li>

                <li class="nav-item"><a class="nav-link" href="list_ingredient.php">ส่วนประกอบ</a></li>
                
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
            <div class="Scroll">
                <table id="list" style="margin-right: auto;">
                    <tr style="background-color:#f33f3f; color: white;">
                        <th style="width: 100px;">Order ID</th>
                        <th style="width: 100px;">Customer ID</th>
                        <th style="width: 160px;">เวลาสั่งซื้อ</th>
                        <th style="width: 15px;">จำนวน</th>
                        <th>หน้าพิซซ่า</th>
                        <th style="width: 10px;">ขนาด</th>
                        <th >แป้ง</th>
                        <th>หมายเหตุ</th>
                    </tr>

                    <?php while($row = $result->fetch_assoc()): ?>
                    
                    <tr>
                        <td><?php echo $row['OID'] ?> </td>
                        <td><?php echo $row['CID'] ?> </td>
                        <td><?php echo $row['Date'] ?> </td>
                        <td><?php echo $row['Unit'] ?> </td>
                        <td><?php echo $row['Name'] ?> </td>
                        <td><?php echo $row['Size'] ?> </td>
                        <td><?php echo $row['FlourType'] ?> </td>
                        <td><?php echo $row['Comm'] ?> </td>
                    </tr>
        
                    <?php endwhile ?>
                     
                </table>

                
            </div>

            
        
        </body>
    </html>