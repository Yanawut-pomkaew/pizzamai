<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pizzamai";

    $errors = array();
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    session_start();

    if(isset($_POST['update_user'])) {
        $CID = mysqli_real_escape_string($conn, $_POST['CID']);
        $usernameforlogin = mysqli_real_escape_string($conn, $_POST['usernameforlogin']);
        $MemID = mysqli_real_escape_string($conn, $_POST['MemID']);
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $homenumber = mysqli_real_escape_string($conn, $_POST['homenumber']);
        $district = mysqli_real_escape_string($conn, $_POST['district']);
        $street = mysqli_real_escape_string($conn, $_POST['street']);
        $zipcode = mysqli_real_escape_string($conn, $_POST['zipcode']);
        $province = mysqli_real_escape_string($conn, $_POST['province']);
        $phoneNum = mysqli_real_escape_string($conn, $_POST['phoneNum']);
        $Password = mysqli_real_escape_string($conn, $_POST['Password']);

        $select = mysqli_query($conn, "SELECT * FROM member_info WHERE Username = '$usernameforlogin'");
        if(mysqli_num_rows($select)) {
            array_push($errors, "Duplicated Username");
            $_SESSION['error'] = "Username นี้มีผู้ใช้ไปแล้ว! ลองเปลี่ยนเป็นชื่ออื่นสิ.";
            header('location: user_info.php');
        }else {

        $query1 = "UPDATE customer SET Fname='$fname', Lname='$lname', Telnum='$phoneNum' WHERE CID='$CID'";
        $result1 = mysqli_query($conn,$query1);

        $resultset = mysqli_query($conn,"select * from customer_district where district='$district' ");
        $count = mysqli_num_rows($resultset);

        if($count ==0) {
            $query2 = "UPDATE customer_district INNER JOIN customer_location ON customer_district.district=customer_location.district SET district='$district', zipcode='$zipcode', province='$province' WHERE customer_location.CID=$CID";
            $result2 = mysqli_query($conn,$query2);
        }
        
       
        $query3 = "UPDATE customer_location SET Number='$homenumber', Street='street', District='$district' WHERE CID='$CID'";
        $result3 = mysqli_query($conn,$query3);
        

        $query5 = "UPDATE member_info SET Username='$usernameforlogin' WHERE MemID='$MemID'";
        $result5 = mysqli_query($conn,$query5);
       
        $query4 = "UPDATE member_account SET Password='$Password' WHERE MemID='$MemID'";
        $result4 = mysqli_query($conn,$query4);

        header('location:user_info.php');

        }
       
    }

    
?>