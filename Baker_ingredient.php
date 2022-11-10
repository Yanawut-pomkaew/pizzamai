    <?php 
    session_start();
    $connect = new mysqli('localhost', 'root', '', 'pizzamai');

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
      }

    $sql = "SELECT * FROM ((check_ingredient INNER JOIN check_amount ON  check_ingredient.IngredientID=check_amount.IngredientID) INNER JOIN ingredient ON check_ingredient.IngredientID=ingredient.IngredientID)";

    $result = $connect->query($sql);


?>

<!DOCTYPE html>
    <html>
        <head>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="menu_employee.css" type="text/css" />
    <link rel="icon" type="image/x-icon" href="Pizza.png">
    <link rel="stylesheet" href="Baker_ingredient.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

            <title>Stock | PizzaMai</title>
            
        </head>
        <body>
        <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
            
        <a class="navbar-brand" href="menu_Baker.php"><h2>Pizzaไหม</h2></a>
       
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="menu_Baker.php">เมนู
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item active"><a class="nav-link" href="Baker_ingredient.php">วัตถุดิบในคลัง</a></li>
                
                <li class="nav-item"><a class="nav-link" href="Baker_list.php">รายการ</a></li>

                <li class="nav-item"><a class="nav-link" href="list_ingredient.php">ส่วนประกอบ</a></li>


                <li class="nav-item">
            <?php if (isset($_SESSION['EID'])) : ?>
            <?php if (isset($_SESSION['Fname'])) : ?>
            <?php if (isset($_SESSION['Lname'])) : ?>
                    
                    <p style="color:white">      ชื่อ:<strong><?php echo " " . $_SESSION['Fname']; ?></strong><strong><?php echo " ". $_SESSION['Lname']; ?></strong>
                
                <?php endif ?>
                
            <?php endif ?>
            
            <p style="color:white">   พนักงานหมายเลข:<strong><?php echo" ". $_SESSION['EID']; ?></strong>
         <?php endif ?>
            </li></p>



            </ul>
          </div>
        </div>
      </nav>
    </header>

    <form action="search_db.php" method="POST">
      <div class="col-sm-12 col-xs-12" style="margin-top:100px;margin-bottom:-160px">
        <div class="form-group">
          <input type="text" name="search" placeholder="ชื่อวัตถุดิบที่ต้องการค้นหา (กดปุ่ม Enter เพื่อทำการค้นหา)" class="form-control"required>
        </div>
      </div>
    </form>

    <div class="latest-products">
            <div class="Scroll">

            <table id="list">
                <tr style="background-color:#f33f3f; color: white;">
                    <th>รหัสวัตถุดิบ</th>
                    <th>วัตถุดิบ</th>
                    <th>ปริมาณ</th>
                    <th>หน่วย</th>
                    <th>เปลี่ยนแปลงโดย</th>
                </tr>
                
                <?php while($row = $result->fetch_assoc()): ?>
                    
                    <tr>
                        <th><?php echo $row['IngredientID'] ?> </th>
                        <th><?php echo $row['Name'] ?> </th>
                        <th><?php echo $row['amount'] ?> </th>
                        <th><?php echo "กก." ?> </th>
                        <th><?php echo $row['EID'] ?> </th>
                    </tr>
        
                <?php endwhile ?>
            </table>
            
            
            <button type="submit" name="editIngredient" class="btn" style="background:#89E05A;border:1px solid black;height:40px;width:120px;margin-top:40px;margin-left:45%;margin-bottom:5%;" onclick="location.href='add_edit_ingredient.php'">เพิ่ม/ลดวัตถุดิบ</button>

            </div>
            </div>
        
        
        </body>
    </html>