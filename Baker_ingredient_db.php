<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pizzamai";

$conn = mysqli_connect($servername, $username, $password, $dbname);

session_start();

if(isset($_POST['add_ingredient'])) {

    $Name = mysqli_real_escape_string($conn, $_POST['NameIngredient']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $EID = mysqli_real_escape_string($conn, $_POST['EID']);

    $sql = "SELECT * FROM ((ingredient INNER JOIN check_ingredient ON check_ingredient.IngredientID=ingredient.IngredientID)INNER JOIN check_amount ON check_amount.IngredientID=check_ingredient.IngredientID)";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $r1= mysqli_query($conn, "SELECT MAX(IngredientID) AS maximum FROM check_ingredient");
    $row1 = mysqli_fetch_assoc($r1); 
    $ingredientID = $row1['maximum'];
    $ingredientID = $ingredientID+1;
    
    $next_due_date = date('Y-m-d', strtotime("+30 days"));

    $query3 = "INSERT INTO ingredient VALUES ('$EID', '$ingredientID')";
    $result3 = mysqli_query($conn,$query3);

    $query1 = "INSERT INTO check_ingredient VALUES ('$ingredientID', '$Name', '$next_due_date')";
    $result1 = mysqli_query($conn,$query1);

    $query2 = "INSERT INTO check_amount VALUES ('$ingredientID', '$amount')";
    $result2 = mysqli_query($conn,$query2);
    
    header('location: Baker_ingredient.php');
   
}

if(isset($_POST['edit_ingredient'])) {

    $IngredientID = mysqli_real_escape_string($conn, $_POST['IngredientID']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $EID = mysqli_real_escape_string($conn, $_POST['EID']);

    $sql = "SELECT * FROM check_amount";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();


    $query1 = "UPDATE check_amount SET amount='$amount' WHERE IngredientID='$IngredientID'";
    $result1 = mysqli_query($conn,$query1);

    $query3 = "INSERT INTO ingredient VALUES ('$EID', '$ingredientID')";
    $result3 = mysqli_query($conn,$query3);
    
    
    header('location: Baker_ingredient.php');
   
}

?>