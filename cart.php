<?php 

    session_start();
    
    $connect = new mysqli('localhost', 'root', '', 'pizzamai');

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
      }

    $url = $_SERVER['REQUEST_URI'];
    $components = parse_url($url);
    parse_str($components['query'], $results);
    $MenuID = $results['MID']; 

    $sql = "SELECT * FROM menu WHERE MID=$MenuID";
    $result = $connect->query($sql);
    
    

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart | PizzaMai</title>
    <link rel="icon" type="image/x-icon" href="Pizza.png">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="pizzamai.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

    <style>
        html, body {
            margin:0;
            padding:0;
            
        }

    </style>
</head>
<body>

   
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
            
        <a class="navbar-brand" href="index.html"><h2>Pizzaไหม</h2></a>
       
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index1.php">หน้าแรก
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item"><a class="nav-link" href="products.php">สินค้า</a></li>
                <li class="nav-item"><a class="nav-link" href="promotions.php">โปรโมชัน</a></li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">เกี่ยวกับผู้ใช้</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="show_info_user.php">ข้อมูลผู้ใช้</a>
                      <a class="dropdown-item" href="user_info.php">แก้ไขข้อมูลผู้ใช้</a>
                      <a class="dropdown-item" href="logout.php">ออกจากระบบ</a>
                    </div>
                </li>

            </ul>
          </div>
        </div>
      </nav>
    </header>

    <div class="page-heading about-heading header-text" style="background-image: url(Login__BG.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Pizza ไหม</h4>
              <h2>ตระกร้าสินค้า</h2>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="products call-to-action">
      <div class="container">
       
        <div class="inner-content">
          <div class="contact-form">    
    <form action="cart_db.php" method="POST">
      <?php while($row = $result->fetch_assoc()): ?>
            
            
            
            <div class="latest-products">
      <div class="container">
      
        <div class="row">
          <div class="col-md-4 col-xs-12">
            <div>
            <?php echo "<img src=".$row['Photo']." width='250' height='200'> "?>
            </div>
            <br>    
            <div class="row">
              <div class="col-sm-4 col-xs-6">
                <div>
                
                </div>
                <br>
              </div>
              <div class="col-sm-4 col-xs-6">
                <div>
                
                </div>
                <br>
              </div>
              <div class="col-sm-4 col-xs-6">
                <div>
              
                </div>
                <br>
              </div>
            </div>
          </div>

          <div class="col-md-8 col-xs-12">
              <h2><td><?php echo $row['Name']; ?></td><br></h2>

              <br>

              <p class="lead">
                <strong class="text-primary"><td><?php echo $row['Price'] ." บาท";  ?></td><br></strong>
              </p>

              <br>

              

              <br> 

              <div class="row">
                <div class="col-sm-4">
                  <label class="control-label">Size</label>
                  <div class="form-group">
                  <p><?php echo $row['Size']; ?></p>
                  </div>
                  <label class="control-label">แป้ง</label>
                  <div class="form-group">
                  <p><?php echo $row['FlourType']; ?></p>
                  </div>
                </div>
                
            
                  
                <?php endwhile ?>
                  
                    <div class="col-sm-6">
                      
                     <input name="MID" type="text" value='<?php echo $MenuID ?>' style="display:none"/>
                    
                     <label>จำนวน</label>
            <input name="quantity" type="text" placeholder="1" required/>
            
            <div class="col-sm-4;"><br>
                  <label class="control-label">การรับสินค้า</label>
                    <select class="form-control" name="Type">
                      <option value="รับที่ร้านค้า">รับที่ร้านค้า</option>
                      <option value="จัดส่งตามที่อยู่">จัดส่งตามที่อยู่</option>
                    </select>
            </div>
            <div class="row">
            <div class="col-sm-8">
            <label>รหัสการชำระเงิน</label>
            <input name="customerPaymentID" type="text" placeholder="" required/>
                 
                </div>
              </div>
           
          </div>
        </div>
      </div>
    </div>
 </tr>
                   
      </div>

           

           
            <br>
 

            <br>
           
                  <label class="control-label">ประเภทการจ่ายเงิน</label>
                    <select class="form-control" name="PaymentType">
                      <option value="เงินสด">เงินสด</option>
                      <option value="บัตรเครดิต">บัตรเครดิต</option>
                    </select>
            </div>
            <br>
            <p>คำอธิบาย</p>
            <textarea name="Comm" rows="4" cols="70" type="text" placeholder=""></textarea>
            
       
            <br>
        <button class="w3-button w3-white w3-border w3-border-red w3-round-large" type='submit' name='admit'>ยืนยัน</button>
            
    </form>

    <button class="w3-button w3-white w3-border w3-border-red w3-round-large" onclick="window.location.href='index1.php'" style="margin-left:10%;margin-top:-6%">ยกเลิก</button>

</body>
</html>