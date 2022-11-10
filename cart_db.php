<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pizzamai";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    session_start();

    if(isset($_POST['admit'])) {
        
        $MID = mysqli_real_escape_string($conn, $_POST['MID']);
        $Unit = mysqli_real_escape_string($conn, $_POST['quantity']);
        $Type = mysqli_real_escape_string($conn, $_POST['Type']);
        $customerPaymentID = mysqli_real_escape_string($conn, $_POST['customerPaymentID']);
        $PaymentType = mysqli_real_escape_string($conn, $_POST['PaymentType']);
        $Comm = mysqli_real_escape_string($conn, $_POST['Comm']);

        $r1= mysqli_query($conn, "SELECT MAX(OID) AS maximum FROM order_goods");
        $row1 = mysqli_fetch_assoc($r1); 
        $OID = $row1['maximum'];
        $OID = $OID+1;

        $query1 = "INSERT INTO order_goods VALUES ('$OID', '$MID', '{$_SESSION['CID']}', '$Unit', 0)";
        $result1 = mysqli_query($conn,$query1);

        $query2 = "INSERT INTO order_manage VALUES ('$OID', CURRENT_TIMESTAMP, '$Comm', '$Type', '$customerPaymentID')";
        $result2 = mysqli_query($conn,$query2);

        $query3 = "INSERT INTO order_type VALUES ('$OID', '$PaymentType')";
        $result3 = mysqli_query($conn,$query3);

        $query4 = "INSERT IGNORE INTO order_district VALUES ('{$_SESSION['District']}', '{$_SESSION['Zipcode']}' , '{$_SESSION['Province']}')";
        $result4 = mysqli_query($conn,$query4);

        $query4 = "INSERT INTO orderlocation VALUES ('$OID', '{$_SESSION['Number']}' , '{$_SESSION['Street']}', '{$_SESSION['District']}')";
        $result4 = mysqli_query($conn,$query4);

        header('location:history.php');
       
    }

    
?>