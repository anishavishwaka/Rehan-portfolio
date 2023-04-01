<?php
session_start();
if(!isset($_SESSION['AdminloginId'])){
    //header("location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="css/display.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;1,600&display=swap" rel="stylesheet">

  <style>
    div.head{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0px 60px;
        background-color: blueviolet;
    }
  </style>
</head>
<body>
    <div class="main-div">

        <div class="head">
        <h1>List of persons that contact me</h1>
        <form method="post">
         <button name= "logout">Logout</button>
        </form>

        </div>
        <div class="center-div">
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>sr</th>
                            <th>Name</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>message</th>
                            <th colspan="2">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'connection.php';
                        $selectquery = "select * from  member";
                        $query = mysqli_query($conn,$selectquery);
                        
                        $nums = mysqli_num_rows($query);
                        
                        $res = mysqli_fetch_array($query);
                         while($res = mysqli_fetch_array($query)){
                            ?>
                         <tr>
                            <td><?php echo $res['sr']; ?></td>
                            <td><?php echo $res['Name']; ?></td>                            
                            <td><span class="email-style"><?php echo $res['email']; ?></span></td>
                            <td><?php echo $res['phone']; ?></td>
                            <td><?php echo $res['message']; ?></td>                            
                            <td><i class='bx bxs-edit'></i>
</td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                         </tr>

                         <?php
                         }
                        
                        ?>
                     

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <?php
    if(isset($_POST['logout']))
    {
        session_destroy();
        header("location:signin.php");

        echo "logout";
    }
    
    ?>
</body>





</html>