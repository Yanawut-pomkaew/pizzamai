<?php 
 
    $connect = new mysqli('localhost', 'root', '', 'pizzamai');

    // Check Connection

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
      }

    $sql = "SELECT order_goods.Done ,order_manage.Type, order_goods.Unit,order_goods.OID, order_goods.MID, menu.Name, menu.Size, menu.Price, menu.FlourType, order_manage.Date, order_manage.Comm FROM ((order_goods INNER JOIN menu ON order_goods.MID = menu.MID) INNER JOIN order_manage ON order_goods.OID = order_manage.OID) WHERE order_goods.Done=0 AND order_manage.Type='รับที่ร้านค้า'";

    $result = $connect->query($sql);

    if(isset($_POST['Done'])) {
        $OID = mysqli_real_escape_string($connect, $_POST['OID']);
        $sql = $connect->query("UPDATE order_goods SET Done=1 WHERE OID=$OID");
        header('location:order_at_store.php');
    }


?>


