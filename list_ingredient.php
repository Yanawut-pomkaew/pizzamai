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

<style>

    .asd {
        width:100%;
    }

    .xyz {
        width:100%;
        padding:20px;
    }

    .xyz:hover {
        background-color:#C8644C;
    }

</style>

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
                    <a class="nav-link active" href="Baker_ingredient.php">กลับสู่หน้าหลัก
                    <span class="sr-only">(current)</span>
                    </a>
                </li> 

            </ul>
          </div>
        </div>
      </nav>
    </header>
    <div class="latest-products" >
   

    <div class="asd">
            <div class="xyz" style="text-align:center;" >
                
                <h3>ซีฟู้ด</h3>
                <img src="seafood.jpg" width="300" height="250">
                <h5>แป้ง x1.5 ก.ก / x2 ก.ก / x3 ก.ก / x4 ก.ก (S/M/L/XL)</h5>
                <h5>กุ้ง x0.2 ก.ก / x0.4 ก.ก / x0.6 ก.ก / x1.0 ก.ก (S/M/L/XL)</h5>
                <h5>ปูอัด x0.3 ก.ก / x0.5 ก.ก / x0.8 ก.ก / x1.1 ก.ก (S/M/L/XL)</h5>
                <h5>เบคอน x0.1 ก.ก / x0.2 ก.ก / x0.3 ก.ก / x0.4 ก.ก (S/M/L/XL)</h5>
                <h5>สับปะรด x0.1 ก.ก / x0.15 ก.ก / x0.20 ก.ก / x0.25 ก.ก (S/M/L/XL)</h5>
                <h5>ชีส x0.2 ก.ก / x0.25 ก.ก / x0.3 ก.ก / x0.5 ก.ก (S/M/L/XL)</h5>
                <h5>เนย x0.2 ก.ก / x0.3 ก.ก / x0.4 ก.ก / x0.5 ก.ก (S/M/L/XL)</h5>

            </div>
    </div>
    <div class="asd">
            <div class="xyz" style="text-align:center;" >
                
                <h3>ดับเบิ้ลชีส</h3>
                <img src="DoubleCheese.jpg" width="300" height="250">
                <h5>แป้ง x1.5 ก.ก / x2 ก.ก / x3 ก.ก / x4 ก.ก (S/M/L/XL)</h5>
                <h5>ชีส x1 ก.ก / x1.5 ก.ก / x2.5 ก.ก / x4 ก.ก (S/M/L/XL)</h5>
                <h5>เนย x0.3 ก.ก / x0.8 ก.ก / x1.2 ก.ก / x1.5 ก.ก (S/M/L/XL)</h5>

            </div>
    </div>
    <div class="asd">
            <div class="xyz" style="text-align:center;" >
                
                <h3>ฮาวายเอี้ยน</h3>
                <img src="Hawaii.jpg" width="300" height="250">
                <h5>แป้ง x1.5 ก.ก / x2 ก.ก / x3 ก.ก / x4 ก.ก (S/M/L/XL)</h5>
                <h5>แฮม x0.7 ก.ก / x1.2 ก.ก / x1.8 ก.ก / x2.2 ก.ก (S/M/L/XL)</h5>
                <h5>สับปะรด x0.1 ก.ก / x0.15 ก.ก / x0.20 ก.ก / x0.25 ก.ก (S/M/L/XL)</h5>
                <h5>ชีส x0.2 ก.ก / x0.25 ก.ก / x0.3 ก.ก / x0.5 ก.ก (S/M/L/XL)</h5>
                <h5>เนย x0.2 ก.ก / x0.3 ก.ก / x0.4 ก.ก / x0.5 ก.ก (S/M/L/XL)</h5>

            </div>
    </div>
    <div class="asd">
            <div class="xyz" style="text-align:center;" >
                
                <h3>เปปเปอร์โรนี</h3>
                <img src="pepperoi.jpg" width="300" height="250">
                <h5>แป้ง x1.5 ก.ก / x2 ก.ก / x3 ก.ก / x4 ก.ก (S/M/L/XL)</h5>
                <h5>เปปเปอร์โรนี x0.4 ก.ก / x0.8 ก.ก / x1.2 ก.ก / x1.6 ก.ก (S/M/L/XL)</h5>
                <h5>ชีส x0.2 ก.ก / x0.25 ก.ก / x0.3 ก.ก / x0.5 ก.ก (S/M/L/XL)</h5>
                <h5>เนย x0.2 ก.ก / x0.3 ก.ก / x0.4 ก.ก / x0.5 ก.ก (S/M/L/XL)</h5>

            </div>
    </div>
    <div class="asd">
            <div class="xyz" style="text-align:center;" >
                
                <h3>ต้มยำกุ้ง</h3>
                <img src="tomyumkung.jpg" width="300" height="250">
                <h5>แป้ง x1.5 ก.ก / x2 ก.ก / x3 ก.ก / x4 ก.ก (S/M/L/XL)</h5>
                <h5>กุ้ง x0.2 ก.ก / x0.3 ก.ก / x0.4 ก.ก / x0.5 ก.ก (S/M/L/XL)</h5>
                <h5>พริกไทย x0.01 ก.ก / x0.02 ก.ก / x0.3 ก.ก / x0.05 ก.ก (S/M/L/XL)</h5>
                <h5>หมึก x0.2 ก.ก / x0.4 ก.ก / x0.6 ก.ก / x0.8 ก.ก (S/M/L/XL)</h5>
                <h5>ชีส x0.2 ก.ก / x0.25 ก.ก / x0.3 ก.ก / x0.5 ก.ก (S/M/L/XL)</h5>
                <h5>เนย x0.2 ก.ก / x0.3 ก.ก / x0.4 ก.ก / x0.5 ก.ก (S/M/L/XL)</h5>

            </div>
    </div>
    <div class="asd">
            <div class="xyz" style="text-align:center;" >
                
                <h3>แฮมและปูอัด</h3>
                <img src="Hamandpoo.jpg" width="300" height="250">
                <h5>แป้ง x1.5 ก.ก / x2 ก.ก / x3 ก.ก / x4 ก.ก (S/M/L/XL)</h5>
                <h5>ปูอัด x0.3 ก.ก / x0.5 ก.ก / x0.6 ก.ก / x0.8 ก.ก (S/M/L/XL)</h5>
                <h5>แฮม x0.4 ก.ก / x0.8 ก.ก / x1.2 ก.ก / x1.5 ก.ก (S/M/L/XL)</h5>
                <h5>สับปะรด x0.1 ก.ก / x0.15 ก.ก / x0.20 ก.ก / x0.25 ก.ก (S/M/L/XL)</h5>
                <h5>ชีส x0.2 ก.ก / x0.25 ก.ก / x0.3 ก.ก / x0.5 ก.ก (S/M/L/XL)</h5>
                <h5>เนย x0.2 ก.ก / x0.3 ก.ก / x0.4 ก.ก / x0.5 ก.ก (S/M/L/XL)</h5>

            </div>
    </div>
    </div>

</body>
</html>