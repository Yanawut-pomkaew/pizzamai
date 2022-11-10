<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pizzamai";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    session_start();

    if(isset($_GET['show_info_user'])) {

        $CID = mysqli_real_escape_string($conn, $_GET['CID']);
        $MemID = mysqli_real_escape_string($conn, $_GET['MemID']);

        $sql = "SELECT * FROM (((((member_info INNER JOIN member_account ON member_account.MemID=member_info.MemID) INNER JOIN member) INNER JOIN customer ON member.CID=customer.CID) INNER JOIN customer_location ON customer_location.CID=customer.CID) INNER JOIN customer_district ON customer_location.district=customer_district.district) WHERE customer.CID='$CID' AND member_account.MemID='$MemID'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $customerID = $row['CID'];
        $Fname = $row['Fname'];
        $Lname = $row['Lname'];
        $MemID = $row['MemID'];
        $Telnum = $row['Telnum'];
        $Number = $row['Number'];
        $Street = $row['Street'];
        $District = $row['District'];
        $Zipcode = $row['Zipcode'];
        $_SESSION['Zipcode'] = $Zipcode;
        $Province = $row['Province'];
        $_SESSION['Province'] = $Province;
        $_SESSION['District'] = $District;
        $_SESSION['Street'] = $Street;
        $_SESSION['Number'] = $Number;
        $_SESSION['Telnum'] = $Telnum;
        $_SESSION['MemID'] = $MemID;
        $_SESSION['customerID'] = $customerID;
        $_SESSION['Fname'] = $Fname;
        $_SESSION['Lname'] = $Lname;
        $memberDate = $row['memberDate'];
        $_SESSION['memberDate'] = $memberDate;
        $Point = $row['Point'];
        $_SESSION['Point'] = $Point;
        $Password = $row['Password'];
        $_SESSION['Password'] = $Password;
        $Username = $row['Username'];
        $_SESSION['Username'] = $Username;
        header('location: show_info_user.php');
       
    }

    
?>