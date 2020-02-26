<?php
require_once './dbcon.php';

session_start();

if (isset($_POST['regidtration'])) {
    $name = $_POST ['name'];
    $email = $_POST['email'];
    $username = $_POST ['username'];
    $password = $_POST ['password'];
    $c_password = $_POST ['c_password'];

    $photo = explode('.', $_FILES['photo']['name']);
    $photo = end($photo);
    $photo_name = $username . '.' . $photo;

    $input_error = array();

    if (empty($name)) {
        $input_error['name'] = "The Name Field required.";
    }
    if (empty($email)) {
        $input_error['email'] = "The Email Field required.";
    }
    if (empty($username)) {
        $input_error['username'] = "The Username Field required.";
    }
    if (empty($password)) {
        $input_error['password'] = "The password Field required.";
    }
    if (empty($c_password)) {
        $input_error['c_password'] = "The Conform Password Field required.";
    }
    if (count($input_error) == 0) {
        $email_chack = mysqli_query($linnk, "SELECT * FROM `users` WHERE `email`='$email';");
        if (mysqli_num_rows($email_chack) == 0) {
            $username_chack = mysqli_query($linnk, "SELECT * FROM `users` WHERE `username`='$username';");

            if (mysqli_num_rows($username_chack) == 0) {
                if (strlen($username) > 7) {
                    if (strlen($password) > 7) {
                        if ($password == $c_password) {
                            $password = md5($password);

                            $query = "INSERT INTO `users`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$email','$username','$password','$photo_name','inactive')";
                           
                             $result= mysqli_query($linnk,$query);
                            if ($result) {
                                $_SESSION['data_insert_success'] = "Data Insert Success!";
                                 $result= move_uploaded_file($_FILES['photo']['tmp_name'],'users_images/'.$photo_name);
                               
                                header('location: registration.php');
                               
                                 
                            } else {
                                $_SESSION['data_insert_error'] = "Data Insert Error";
                            }
                        } else {
                            $password_not_match = "Coform password Not Match.";
                        }
                    } else {
                        $password_l = "password More Than 8 Characters.";
                    }
                } else {
                    $username_l = "Username More Than 8 Characters.";
                }
            } else {
                $username_error = "This Username Address Already Exists.";
            }
        } else {
            $email_error = "This Email Address Already Exists.";
        }
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
        <title>User Registration Form </title>

        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="style.css" media="all" >
        <style>
            .container{

                width: 1100px;
                height: 682px;
                background-color: rgba(0,0,0,0.5);
                margin: 0 auto;
                margin-top: 15px;
                padding-top: 14px;
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
            
            body {
                font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
                font-size: 14px;
                line-height: 1.42857143;
                color: #333;
                background-color: #fff;



            }



        </style>
    <br/>
    <div class="btn-primary"><marquee>Devloper By AK Md Akramul Haque Computer Deprtment. </marquee></div>
    </head>
    <body style="background-color:#008080;">
        <div class="container">
            <h1>User Registration Form  </h1>

            <hr />
            <?php
            if (isset($_SESSION['data_insert_success'])) {
                echo '<div class="alert alert-success">' . $_SESSION['data_insert_success'] . '</div>';
            }
            ?>


            <?php
            if (isset($_SESSION['data_insert_error'])) {
                echo '<div class="alert alert-warning">' . $_SESSION['data_insert_error'] . '</div>';
            }
            ?> 



            <div class="row">
                <div class="col-md-12">
                    <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <div class="form-group">

                            <label for="name" class= "control-label col-sm-1" > Name</label>

                            <div class="col-sm-4">
                                <input class="form-control" id="name" type="text" name="name" placeholder="Enter Your Name...." value="<?php
            if (isset($name)) {
                echo $name;
            }
            ?>" />
                            </div>
                            <label class="error"><?php
                                if (isset($input_error['name'])) {
                                    echo $input_error ['name'];
                                }
            ?></label>

                        </div>

                        <div class="form-group">

                            <label for="email" class= "control-label col-sm-1" > E-mail</label>

                            <div class="col-sm-4">
                                <input class="form-control" id="email" type="email" name="email" placeholder="Enter Your Email Name...." value="<?php
                                if (isset($email)) {
                                    echo $email;
                                }
            ?>" />
                            </div>
                            <label class="error"><?php
                                if (isset($input_error['email'])) {
                                    echo $input_error ['email'];
                                }
            ?></label>
                            <label class="error"><?php
                                if (isset($email_error)) {
                                    echo $email_error;
                                }
            ?></label>      
                        </div>

                        <div class="form-group">

                            <label for="username" class= "control-label col-sm-1" > Username</label>

                            <div class="col-sm-4">
                                <input class="form-control" id="username" type="text" name="username" placeholder="Enter Your Username...."  value="<?php if (isset($username)) {
                                    echo $username;
                                } ?>" />
                            </div>
                            <label class="error"><?php if (isset($input_error['username'])) {
                                    echo $input_error ['username'];
                                } ?></label>
                            <label class="error"><?php
                                       if (isset($username_error)) {
                                           echo $username_error;
                                       }
            ?></label> 
                            <label class="error"><?php
                                if (isset($username_l)) {
                                    echo $username_l;
                                }
                                ?></label> 
                        </div>

                        <div class="form-group">

                            <label for="password" class= "control-label col-sm-1" > password</label>

                            <div class="col-sm-4">
                                <input class="form-control" id="password" type="password" name="password" placeholder="Enter Your Password...." value="<?php
                                if (isset($password)) {
                                    echo $password;
                                }
                                ?>" />
                            </div>

                            <label class="error"><?php
                                if (isset($input_error['password'])) {
                                    echo $input_error ['password'];
                                }
                                ?></label>
                            <label class="error"><?php
                                if (isset($password_l)) {
                                    echo $password_l;
                                }
                                ?></label>
                        </div>

                        <div class="form-group">

                            <label for="c_password" class= "control-label col-sm-1" > Conform Password</label>

                            <div class="col-sm-4">
                                <input class="form-control" id="c_password" type="password" name="c_password" placeholder="Enter Your Conform Password...." value="<?php if (isset($c_password)) {
                                    echo $c_password;
                                } ?>" />
                            </div>

                            <label class="error"><?php if (isset($input_error['c_password'])) {
                                    echo $input_error ['c_password'];
                                } ?></label>
                            <label class="error"><?php if (isset($password_not_match)) {
                                    echo $password_not_match;
                                } ?></label>

                        </div>

                        <div class="form-group">

                            <label for="photo" class= "control-label col-sm-1" > Photo</label>

                            <div class="col-sm-4" >
                                <input  id="photo" type="file" name="photo"  />
                            </div>

                        </div>

                        <div class="col-sm-4 col-sm-offset-1">
                            <input type="submit" value="Regidtration" name="regidtration" class="btn btn-primary" /> 

                        </div>

                    </form>

                </div>
            </div>
             

            <br/>
            <p>If you have an account ? than please <a href="login.php">Login</a></p>


            <hr />

            <p>Copyright &copy; <?= date('Y') ?> All Rights Reserved.</p>
            <hr />
            <p>Computer Depertment 6th Semester Project Student Menagement System </p></br>
          
            
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="js/bootstrap.min.js"></script>
            
    </body>
</html>