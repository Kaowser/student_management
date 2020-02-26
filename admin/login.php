<?php
require_once './dbcon.php';
session_start();
if (isset($_SESSION ['user_login'])) {

    header('location:index.php');
}

if (isset($_POST['login'])) {
    $username = $_POST ['username'];
    $password = $_POST ['password'];


    $username_chack = mysqli_query($linnk, "SELECT * FROM `users` WHERE `username`='$username'");
    if (mysqli_num_rows($username_chack) > 0) {
        $row = mysqli_fetch_assoc($username_chack);

        if ($row['password'] == md5($password)) {
            if ($row['status'] == 'active') {
                $_SESSION['user_login'] = $username;
                header('location:index.php');
            } else {
                $status_inactive = "Your Status Inactive.";
            }
        } else {
            $wrong_not_found = "This Password Wrong";
        }
    } else {
        $username_not_found = "This Username Not Found";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Student Menagement System </title>

        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <style>
            .container {
                
                    width: 876px;
                    height: 600px;
                    background-color: rgba(0,0,215);
                    margin: 0 auto;
                    margin-top: 40px;
                    padding-top: 10px;
                    padding-left: 50px;
                    border_radius: 15px;
                    -webkit-border-radius: 15px;
                    -o-border-radius: 15px;
                    -moz-border-radius: 15px;
                    color: white;
                    font-weight: bolder;
                    box-shadow: inset -4px -4px rgba (0,0,0,0.5);
                    font-size: 18px;




                }



            </style>
            <br/>
              <div class="alert-danger bg-primary"> <marquee >If you have an account ? Than please Login </marquee></div>
        </head>
        <body style="background-color:#008080;">
            <div class="container" >
                <h1 class="text-center">Student Menagement System </h1>
                </br>
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                        <h2>Admin Login Form</h2>

                        <form action="login.php" method="post">
                            <div>
                                <input type="text" placeholder="Username" name="username" required="" class="form-control" value="<?php if (isset($username)) {
    echo $username;
} ?>"/>
                                </br>
                                <input type="password" placeholder="Password" name="password"required="" class="form-control" value="<?php if (isset($password)) {
    echo $password;
} ?>" />

                            </div>
                            <br/>
                            <div class="text-right">
                                <input type="Submit" value="Login" name="login" class="btn btn-info"/>

                            </div>
                            <a href="../">Back</a>

                            <form>

                                </div>


                                </div>
                                <br/>
                                <?php if (isset($username_not_found)) {
                                    echo'<div class="alert alert-danger col-sm-4 col-sm-offset-4">' . $username_not_found . '</div>';
                                } ?> 
                                <?php if (isset($wrong_not_found)) {
                                    echo'<div class="alert alert-danger col-sm-4 col-sm-offset-4">' . $wrong_not_found . '</div>';
                                } ?>           
<?php if (isset($status_inactive)) {
    echo'<div class="alert alert-danger col-sm-4 col-sm-offset-4">' . $status_inactive . '</div>';
} ?>           


                                </div>
                                <hr/>
                                <div ><p>If you have an account ? than please <a href="Registration.php">Singup</a></p></div>

                                </body>
                                </html>