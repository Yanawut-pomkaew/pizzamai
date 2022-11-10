<?php 
    session_start();
    $connect = new mysqli('localhost', 'root', '', 'pizzamai');

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
    }

    $sel = $_SESSION['CID'];
    $sql = "SELECT * FROM ((((order_goods INNER JOIN menu ON order_goods.MID = menu.MID) INNER JOIN order_manage ON order_goods.OID = order_manage.OID) INNER JOIN orderlocation ON order_manage.OID = orderlocation.OID) INNER JOIN order_district ON orderlocation.District= order_district.District) WHERE order_goods.CID='$sel'";
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
                <li class="nav-item" type="submit" name="show_info_user"><a class="nav-link" href="show_info_user.php">ข้อมูลส่วนตัว </a></li>
                
                <li class="nav-item active"><a class="nav-link" href="history.php">ประวัติ<span class="sr-only">(current)</span></a></li>

                
            </ul>
          </div>
        </div>
      </nav>
    </header> 

    <div class="latest-products">   
    <?php while($row = $result->fetch_assoc()): ?>
          
        <div id="done" style="padding-left:30px;padding-bottom:20px;padding-top:20px;background-color:#D8D8D4;margin:5px">
                <?php echo "วันเวลาที่สั่ง: ". $row['Date'] ?><br>
                <?php echo "Order ID : ". $row['OID'] ?><br>
                
                <?php echo " X".$row['Unit'] ." ". $row['Name'] ." ขนาด: ". $row['Size'] ." ". $row['FlourType']?><br>
                <?php echo $row['Unit']*$row['Price']. " บาท"?><br><br>
                <?php echo "หมายเหตุ: ". $row['Comm']?><br><br>

                <div class="location">
                    <?php echo "บ้านเลขที่ ".$row['Number']. " ถนน ". $row["Street"]. " ตำบล/เขต". $row['District']?><br>
                    <?php echo "จังหวัด ". $row['Province']. " เลขไปรษณีย์ ". $row['Zipcode']?><br><br>
                </div>
                
            </div>
                
    <?php endwhile ?>
    
         
</body>
</html>