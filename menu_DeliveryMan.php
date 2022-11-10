<?php 
     session_start();
    
    $connect = new mysqli('localhost', 'root', '', 'pizzamai');

    // Check Connection

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
      }

    $sql = "SELECT * FROM menu";
    $result = $connect->query($sql);
  

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
    <link rel="stylesheet" href="menu_employee.css" type="text/css" />
    
    <title>Menu Employee | PizzaMai</title>
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
                <li class="nav-item">
                    <a class="nav-link active" href="menu_DeliveryMan.php">เมนู
                    <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item "><a class="nav-link" href="DeliveryMan_order.php">รายละเอียดคำสั่งซื้อ-การขนส่ง
                    </a></li>
                
            



            </ul>
          </div>
        </div>
      </nav>
    </header>
    <div class="latest-products">
    <div class="content">
       


    </div>

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
        
        
        
        </div>
    </div>

</body>
</html>