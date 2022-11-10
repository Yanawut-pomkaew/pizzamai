<?php 
     session_start();
    
    $connect = new mysqli('localhost', 'root', '', 'pizzamai');

    // Check Connection

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
      }

    $sql = "SELECT * FROM menu";
    $result = $connect->query($sql);
  

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
    <title>Menu Employee | PizzaMai</title>
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
                <li class="nav-item active">
                    <a class="nav-link" href="menu_employee.php">เมนู
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item"><a class="nav-link" href="order_at_store.php">รายการที่รับที่ร้านค้า</a></li>
                
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
    
 
         

    <div class="list">
        <?php while($row = $result->fetch_assoc()): ?>

            <div class="l" style="text-align:center;">
                    <tr>

                        <td><?php echo " (". $row['MID'].") "; ?>
                        <td><?php echo $row['Name']; ?></td><br>
                        <td class="name">
                         <?php echo "<img src=".$row['Photo']." width='180' height='150'> "?>
                        </td><br>
                        <td><?php echo "ขนาด ". $row['Size']; ?></td></br>
                        <td><?php echo "แป้ง". $row['FlourType']; ?></td></br>
                        <td><?php echo $row['Price'] ." บาท";  ?></td>
                    
                    </tr>
            </div>
        <?php endwhile ?>
        
        
        <button type="submit" name="Done" class="btn" style="background:#89E05A;border:1px solid black;height:40px;width:150px;margin-top:40px;margin-left:30%;margin-bottom:5%;" onclick="location.href='add_menu.php'">เพิ่ม/ลบ รายการสินค้า</button>
        <button type="button" name="logout" class="btn" style="background:#F52D39;border:1px solid black;height:40px;width:100px;margin-left:2%;margin-top:40px" onclick="document.location='logout.php'">Logout</button>
  
   
    </div>
</body>
</html>