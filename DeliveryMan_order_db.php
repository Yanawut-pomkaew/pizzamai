<?php 
 
    $connect = new mysqli('localhost', 'root', '', 'pizzamai');

    // Check Connection

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
      }

    $sql = "SELECT orderlocation.Number, orderlocation.Street, orderlocation.District,order_district.Zipcode, order_district.Province ,order_manage.Type, order_goods.Unit,order_goods.OID, order_goods.MID, menu.Name, menu.Size, menu.Price, menu.FlourType, order_manage.Date, order_manage.Comm FROM ((((order_goods INNER JOIN menu ON order_goods.MID = menu.MID) INNER JOIN order_manage ON order_goods.OID = order_manage.OID) INNER JOIN orderlocation ON order_manage.OID = orderlocation.OID) INNER JOIN order_district ON orderlocation.District= order_district.District) WHERE order_manage.Type='จัดส่งตามที่อยู่' ";
 
    $result = $connect->query($sql);

    if(isset($_POST['Done'])) {
        $OID = mysqli_real_escape_string($connect, $_POST['OID']);
        $sql = $connect->query("UPDATE order_goods SET Done=1 WHERE OID=$OID");
        header('location:DeliveryMan_order.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }


?>


