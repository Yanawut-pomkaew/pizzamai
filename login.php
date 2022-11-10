<?php 
    session_start();
    include('server.php'); 

    
?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="icon" type="image/x-icon" href="Pizza.png">
            <title>Login | Pizza Mai</title>
        </head>
    <body style="text-align:center;margin-top:10%;background-image:url('Login__BG.jpg');background-size: cover;">
    
    <img src="profile.png" width="180px">
    
    <form action="login_db.php" method="post">

        <div class="input-group">
              
                <input type="text" name="username" placeholder="ID" style="width:300px;height:20px;margin-bottom:15px;margin-top:10px"required>
        </div>
        
        <div class="input-group">
               
                <input type="password" name="password" placeholder="Password" style="width:300px;height:20px;margin-bottom:10px" required>
        </div>

         <!-- notification message-->
        <?php if (isset($_SESSION['error'])) : ?>
                    <div class="error">
                        <h3 style="color:#ECDE34">
                            <?php 
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            ?>
                        </h3>
                    </div>
        <?php endif ?>
        
        <div class="input-group">
                <button type="submit" name="login_user" class="btn" style="background:#F7E93E;border:1px solid black;height:30px;width:100px;border-radius: 12px;">Login</button>
        </div>
        <p>ยังไม่เป็นสมาชิก? สามารถเข้าร่วมกับพวกเราได้ที่ <a href="register.php" style="color:yellow">Register</a></p> 

    </form>
                
    </body>
</html>