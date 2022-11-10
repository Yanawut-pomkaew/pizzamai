<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pizzamai";

$conn = mysqli_connect($servername, $username, $password, $dbname);

session_start();

    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $_SESSION['searchKeyword'] = $search;

    header('location: search.php');

?>