<?php 
    ini_set('session.gc_maxlifetime', 1200);
    session_start();
    include('server.php');

    $errors = array();
    $MID;
    if(isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
       
    }

    if(count($errors)==0){
        $MID = $username;
        $password = md5($password);
        $query = "SELECT * FROM (member_account INNER JOIN member_info ON member_info.MemID=member_account.MemID) WHERE Username = '$username' AND md5(Password) = '$password' ";
        $result = mysqli_query($conn,$query);

        $q = "SELECT * FROM employee_account WHERE EID = '$username' AND md5(Password) = '$password' ";
        $ans = mysqli_query($conn,$q);

        if (mysqli_num_rows($result)==1) {

            $sql = "SELECT * FROM member_info INNER JOIN member ON member_info.MemID=member.MemID WHERE Username = '$username'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $MemID = $row['MemID'];
            $Username = $row['Username'];
            $_SESSION['MemID'] = $MemID;
            $_SESSION['Username'] = $Username;
            

            $sql1 = "SELECT * FROM member_info INNER JOIN member ON member_info.MemID=member.MemID WHERE Username = '$username'";
            $result1 = $conn->query($sql1);
            $row1 = $result1->fetch_assoc();
            $CID = $row1['CID'];
            $_SESSION['CID'] = $CID;
  
            // $_SESSION['success'] = "You are now logged in";
            header('location: index1.php');
            
        } else if (mysqli_num_rows($ans)==1) {


                $sql = "SELECT EID, Fname, Lname FROM employee WHERE EID = '$username'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $username = $row['EID'];
                $Fname = $row['Fname'];
                $Lname = $row['Lname'];
                $_SESSION['EID'] = $username;
                $_SESSION['Fname'] = $Fname;
                $_SESSION['Lname'] = $Lname;
                $username = strval($username);
                if(substr($username, 0, 2) === "21") {
                    header('location: menu_employee.php');
                }else if(substr($username, 0, 2) === "22") {
                    header('location: Baker_ingredient.php');
                }else {
                    header('location: DeliveryMan_order.php');
                }
                
                
                
            
        }else {
            array_push($errors, "Wrong ID/password combination");
            $_SESSION['error'] = "Wrong ID/password, Please try again!!";
            header('location: login.php');
        }

        
    }

    
?>