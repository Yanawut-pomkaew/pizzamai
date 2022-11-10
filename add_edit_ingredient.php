<?php 
    session_start();
    $connect = new mysqli('localhost', 'root', '', 'pizzamai');

    // Check Connection

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="icon" type="image/x-icon" href="Pizza.png">
    <link rel="stylesheet" href="Baker_ingredient.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="add_menu.css" type="text/css" />
    <title>Add/Edit Ingredients | PizzaMai</title>
</head>
<body>
<header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
            
        <a class="navbar-brand" href="index.html"><h2>Pizzaไหม</h2></a>
       
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

    <div class="products call-to-action">
      <div class="container">
    <div class="row">

          <div class="col-md-12">       
          <div class="inner-content">
          <div class="contact-form">

    <form action="Baker_ingredient_db.php" method="POST">
                   <div class="row">
                     
                        
                     <div class="col-sm-6 col-xs-12">
                             <div class="form-group">
                                  <label class="control-label">ชื่อวัตถุดิบที่ต้องการใส่:</label>
                                  <input type="text" name="NameIngredient" placeholder="ชื่อ" class="form-control "required>
                                  <input type="text" name="EID" value="<?php echo $_SESSION['EID']; ?>" style="display:none"/>
                             </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                             <div class="form-group">
                                  <label class="control-label">จำนวนวัตถุดิบที่ต้องการใส่:</label>
                                  <input type="text" name="amount" placeholder="จำนวน (กก.)" class="form-control"required>
                             </div>
                        </div>

                        </div>
                   
                   <div class="clearfix">
                        
                        
                        <button type="submit" name="add_ingredient" class="filled-button pull-right">เพิ่มวัตถุดิบ</button>
                   </div>
                   </div>
          </div>
        
      
    </form>  
    <div class="products call-to-action">
    


          <div class="col-md-12">       
          <div class="inner-content">
          <div class="contact-form">
    <form action="Baker_ingredient_db.php" method="POST">
                   <div class="row">
                     
                        
                     <div class="col-sm-6 col-xs-12">
                             <div class="form-group">
                                  <label class="control-label">รหัสวัตถุดิบที่ต้องการเปลี่ยน:</label>
                                  <input type="text" name="IngredientID" placeholder="รหัส" class="form-control "required>
                                  <input type="text" name="EID" value="<?php echo $_SESSION['EID']; ?>" style="display:none"/>
                             </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                             <div class="form-group">
                                  <label class="control-label">จำนวนวัตถุดิบที่ต้องการเปลี่ยน:</label>
                                  <input type="text" name="amount" placeholder="จำนวน (กก.)" class="form-control"required>
                             </div>
                        </div>

                        </div>
                   
                   <div class="clearfix">
                        
                        
                        <button type="submit" name="edit_ingredient" class="filled-button pull-right">เปลี่ยนจำนวนวัตถุดิบ</button>
                   </div>
              
          </div>
        </div>
      </div>
    </div>
    </form> 






   
    </div>
</body>
</html>