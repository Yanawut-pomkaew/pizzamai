<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pizzamai";

    $errors = array();
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    session_start();

    if(isset($_POST['reg_user'])) {
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $homenumber = mysqli_real_escape_string($conn, $_POST['homenumber']);
        $district = mysqli_real_escape_string($conn, $_POST['district']);
        $street = mysqli_real_escape_string($conn, $_POST['street']);
        $zipcode = mysqli_real_escape_string($conn, $_POST['zipcode']);
        $province = mysqli_real_escape_string($conn, $_POST['province']);
        $phoneNum = mysqli_real_escape_string($conn, $_POST['phoneNum']);
        $usernameforlogin = mysqli_real_escape_string($conn, $_POST['usernameforlogin']);
        $Password = mysqli_real_escape_string($conn, $_POST['Password']);

        $select = mysqli_query($conn, "SELECT * FROM member_info WHERE Username = '$usernameforlogin'");
        if(mysqli_num_rows($select)) {
            array_push($errors, "Duplicated Username");
            $_SESSION['error'] = "Username นี้มีผู้ใช้ไปแล้ว! ลองใช้ชื่ออื่นสิ.";
            header('location: register.php');
        }else {

        $r1= mysqli_query($conn, "SELECT MAX(CID) AS maximum FROM customer");
        $row1 = mysqli_fetch_assoc($r1); 
        $customerID = $row1['maximum'];
        $customerID = $customerID+1;
        

        $r2= mysqli_query($conn,"SELECT MAX(MemID) AS maximum FROM member");
        $row2 = mysqli_fetch_assoc($r2); 
        $memberID = $row2['maximum'];
        $memberID = $memberID +1;
        $_SESSION['ID'] = $memberID;

        $query1 = "INSERT INTO customer VALUES ('$customerID', '$fname', '$lname', '$phoneNum', 0)";
        $result1 = mysqli_query($conn,$query1);

        $resultset = mysqli_query($conn,"select * from customer_location where district='$district' ");
        $count = mysqli_num_rows($resultset);

        if($count == 0) {
            $query2 = "INSERT INTO customer_district VALUES ('$district', '$zipcode', '$province')";
            $result2 = mysqli_query($conn,$query2);
        }
        
       
        $query3 = "INSERT INTO customer_location VALUES ('$customerID', '$homenumber', '$street', '$district')";
        $result3 = mysqli_query($conn,$query3);
        
        $query6 = "INSERT INTO member VALUES ('$memberID', '$customerID')";
        $result6 = mysqli_query($conn,$query6);

        $query5 = "INSERT INTO member_info VALUES ('$memberID', '$usernameforlogin', NOW(), 0, 0)";
        $result5 = mysqli_query($conn,$query5);
       
        $query4 = "INSERT INTO member_account VALUES ('$memberID', '$Password')";
        $result4 = mysqli_query($conn,$query4);

        

       header('location:login.php');
       }
    }

   
    

    
?>