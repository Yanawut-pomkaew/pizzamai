<?php 
    
    session_start();
    include('server.php');

    $errors = array();

    if(isset($_POST['add'])) {
        $MenuID = mysqli_real_escape_string($conn, $_POST['MenuID']);
        $Name = mysqli_real_escape_string($conn, $_POST['Name']);
        $Photo = mysqli_real_escape_string($conn, $_POST['Photo']);
        $Size = mysqli_real_escape_string($conn, $_POST['Size']);
        $Price = mysqli_real_escape_string($conn, $_POST['Price']);
        $FlourType = mysqli_real_escape_string($conn, $_POST['FlourType']);

        $query = "INSERT IGNORE INTO menu(MID,`Name`, Photo, Size, Price, FlourType) VALUES ($MenuID,'$Name', '$Photo', '$Size', '$Price', '$FlourType')";
        $result = mysqli_query($conn,$query);
        header('location:menu_employee.php');
       
    }
    
    if(isset($_POST['remove'])) {
        $nameMenu = mysqli_real_escape_string($conn, $_POST['nameMenu']);
        $sizeMenu = mysqli_real_escape_string($conn, $_POST['sizeMenu']);
        $flourMenu = mysqli_real_escape_string($conn, $_POST['flourMenu']);

        $query = "DELETE FROM menu WHERE Name='$nameMenu' AND Size='$sizeMenu' AND FlourType='$flourMenu'";
        $result = mysqli_query($conn,$query);
        header('location:menu_employee.php');
       
    }
        

    
?>