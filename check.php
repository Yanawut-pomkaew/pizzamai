<?php 
  
    $connect = new mysqli('localhost', 'root', '', 'pizzamai');

    if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
      }

    $sql = "SELECT check_ingredient.IngredientID, check_ingredient.Name, check_amount.amount FROM check_ingredient INNER JOIN check_amount ON check_ingredient.IngredientID=check_amount.IngredientID;";
    $result = $connect->query($sql);


?>


<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <link rel="stylesheet" href="style.css">
            <title>Baker1</title>      
        </head>
        <body>
            <p class="C">ingredients in stock</p>
            <img src="Pizza.png" alt="มหาวิทยาลัยธรรมศาสตร์" width="38%" height="75%" class="left" style="float:left;" >
            <div class="Scroll">
            <table>
                <tr style="background-color:red; color: white;">
                    <th>วัตถุดิบ</th>
                    <th>ปริมาณ</th>
                    <th>หน่วย</th>
                </tr>

                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                 
                        <td><?php echo $row['Name'] ?></td>
                       
                        <td><?php echo $row['amount'] ?></td>
                        <td><?php echo "กก." ?></td>
                            
                    </tr>
   
                <?php endwhile ?>
                
            </table>
        </div>
        </body>
    </html>