<?php
require ("connection.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <link rel="stylesheet" href="css/my.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <div class="login-form">
        <h2>ADMIN LOGIN</h2>
        <form method="POST">
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" name="AdminName" placeholder="Admin Name">
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="AdminPassword" placeholder=" Admin_Password">
                <span><i class="fa fa-eye" aria-hidden="true" onclick="toggle()"></i></span>
            </div>
            <input type="submit" value="sign in" class="btn" name="signin">
        </form>
    </div>

<?php

if(isset($_POST['signin'])){
    $username = $_POST['AdminName'];
    $password = $_POST['AdminPassword'];

    $query = "SELECT * FROM admin_login WHERE Admin_Name = '$username'
    AND  Admin_Password = '$password'";

    $result = mysqli_query($conn , $query);

    if (mysqli_num_rows($result)==1) {
        session_start();
        $_SESSION['AdminloginId'] = $_POST['AdminName'];
        header("location:display.php");
      }
      else{
        echo "<script> alert('Incorrect Password');</script>";
      }

}



?>

















    <script>
    var state = false;
    function toggle(){
        if(state){
            document.getElementById("password").setAttribute("type","password");
            state = "false";
        }
        else{
            document.getElementById("password").setAttribute("type","text");
            state = "true";

        }
    }
    </script>

</body>
</html>