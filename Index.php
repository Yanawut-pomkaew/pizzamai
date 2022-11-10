<?php 
     session_start();
    
    $connect = new mysqli('localhost', 'root', '', 'pizzamai');

    // Check Connection

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
      }

    $sql = "SELECT * FROM menu";
    $result = $connect->query($sql);

    $store = "SELECT * FROM store INNER JOIN store_district ON store.district=store_district.district";
    $re = $connect->query($store);
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="product.css" type="text/css" />
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
.w3-btn {margin-bottom:10px;}
</style>
    <title>Menu product | PizzaMai</title>
</head>
<body>

 <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
   
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
            
        <a class="navbar-brand" href="index.php"><h2>Pizza<em>ไหม</em></h2></a>
       
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">หน้าแรก
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item"><a class="nav-link" href="login.php">เข้าสู่ระบบ</a></li>
                

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
              <h4>Pizza Homemade</h4>
              <h2>Pizza ไหม</h2>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>โปรโมชั่น</h2>
            
            </div>
          </div>

    <div class="col-md-4">
            <div class="product-item">
              <a href="product-details.html"><img src="pro1.jpg" alt=""></a>
              <div class="down-content">
                <a href="product-details.html"><h4>เชฟจัดประหยัดจริง โปรสุดค้มพิซซ่า M 2 ถาด</h4></a>
                <h6><small><del>฿258.00 </del></small> ฿199.00</h6>
                <p>พิซซ่าไซส์กลาง 2 ถาด จากราคา 258 บาท เหลือเพียง 199 บาทเท่านั้น!!!!</p>
              </div>
            </div>
          </div>   
    
    <div class="col-md-4">
            <div class="product-item">
              <a href="product-details.html"><img src="pro2.jpg" alt=""></a>
              <div class="down-content">
                <a href="product-details.html"><h4>ซีฟู้ด * 2 combo</h4></a>
                <h6><small><del>฿318.00 </del></small> ฿199.00</h6>
                <p>พิซซ่าซีฟู้ด 2 ถาดในราคาสุดพิเศษ</p>
              </div>
            </div>
          </div>   

     <div class="col-md-4">
            <div class="product-item">
              <a href="product-details.html"><img src="pro3.jpg" alt=""></a>
              <div class="down-content">
                <a href="product-details.html"><h4>พิเศษเฉพาะลูกค้าที่เกิดเดือนพฤษภาคม ซื้อ 2 แถม 1</h4></a>
                <h6><small><del>฿387.00 </del></small> ฿199.00</h6>
                <p>พิซซ่า 3 ถาด จ่ายเพียง 2 ถาดสำหรับลูกค้าท่านไหนที่เกิดเดือนพฤษภาคม</p>
              </div>
            </div>
          </div>           

            </div>
            <div class="col-md-12">
            <div class="section-heading">
              <h2>พิซซ่า</h2>
              
            </div>
          </div>
            <?php while($row = $result->fetch_assoc()): ?>
            
            
            
            <div class="latest-products">
      <div class="container">
      
        <div class="row">
          <div class="col-md-4 col-xs-12">
            <div>
            <?php echo "<img src=".$row['Photo']." width='300' height='200'> "?>
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
                <strong class="text-danger"><td><?php echo $row['Price'] ." บาท";  ?></td><br></strong>
              </p>

              <br>

              <br> 

              <div class="row">
                <div class="col-sm-4">
                  <label class="control-label">Size</label>
                  <div class="form-group" style="border:1px solid #CEC7C5;border-radius:6px;padding:6px">
                    <option value="0"><?php echo $row['Size']; ?></option>
                  </div>
      
                  
                </div>
                
                <div class="col-sm-8">
                  <label class="control-label">แป้ง</label>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group" style="border:1px solid #CEC7C5;border-radius:6px;padding:6px">
                        <option value="0"><?php echo $row['FlourType']; ?></option>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
           
            
                        
                        
                        
                        
                       
                        
                        
                        
                      
                    
                    </tr>
                   
            </div>
        <?php endwhile ?>

        
        <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <?php while($r = $re->fetch_assoc()): ?>
                <p><?php echo $r['Name']; ?></p>
                <p><?php echo " โอนธนาคาร: ". $r['StorePaymentID']; ?></p>
                <p><span><?php echo " ที่อยู่ร้าน: ถนน. ". $r['Street']; ?><?php echo " แขวง. ". $r['District']; ?><?php echo " จังหวัด. ". $r['Province']; ?><?php echo " รหัสไปรษณีย์. ". $r['Zipcode']; ?></span></p>
                <p><?php echo " เบอร์โทรศัพท์: ". $r['TelNum']; ?></p>
              <?php endwhile?>
            </div>
          </div>
        </div>
      </div>
      
    </footer>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
</body>
</html>