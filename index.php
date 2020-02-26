<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Student Menagement System </title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">


        <style>
            .container{
                width:1000px;
                height:500px;
                background-color:rgba(0,128,128);
                margin: 0 auto;
                margin-top: 40px;
                padding-top: 10px;
                padding-left: 50px;
                border_radius:15px;
                -webkit-border-radius: 15px;
                -o-border-radius:15px;
                -moz-border-radius: 15px;
                color: white;
                font-weight: bolder;
                
                
            }
        
            .table {
                width:400px;
                height:150px;
                background-color:rgba(0,0,0,0.6);
                margin: 0 auto;
                margin-top: 40px;
                padding-top: 10px;
                padding-left: 40px;
                border_radius:15px;
                -webkit-border-radius: 15px;
                -o-border-radius:15px;
                -moz-border-radius: 15px;
                color: white;
                font-weight: bolder;
                box-shadow: inset -4px -4px rgba (0,0,0,0.5);
                font-size: 12px;
                
                
                

            }




        </style>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body >
        <div class="container">
            </br>
            <a class="btn btn-primary pull-right" href="admin/login.php">Login</a>
            </br>
            <div class="card text-center p-3 mb-2 bg-dark text-white">
                <h3 style="color:chartreuse">TMSS Polytechnic Institute R k Road,Rangpur</h3>
              <h5>Computer All Semester Result & All Data </h5>
              </br>
            
            </div>
            <h1>Welcome To Student Management System</h1>
                    <hr/>
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-3">
                            <form action="" method="post">

                                <table class="table table-bordered">
                                    <tr>

                                        <td colspan="4" class="text-center"><label>Student Information </label></td>
                                    </tr>

                                    <tr>
                                        <td><label for="choose">Choose class</label></td>
                                        <td>
                                            <select class="form-control" id="choose" Name="choose">
                                                <option value="">select</option>
                                                <option value="1st">1st</option>
                                                <option value="2nd">2nd</option>


                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="roll">Roll</label></td>
                                        <td><input class="form-control" type="text" name="roll" pattern="[0-9]{6}" placeholder="Roll" /></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2" class="text-center"><input class="btn btn-default" type="Submit" value="Show info" name="Show_Info" /></td>

                                    </tr>

                                </table>

                            </form>


                        </div>



                    </div>
                    
       
                    
                      <br/>
                    <br/>
                    <br/>
                    <?php
                    require_once './admin/dbcon.php';

                    if (isset($_POST['Show_Info'])) {
                        $choose = $_POST['choose'];
                        $roll = $_POST['roll'];

                        $result = mysqli_query($linnk, "SELECT * FROM `student_info` WHERE `class`='$choose' and `roll`='$roll'");
                        if (mysqli_num_rows($result) == 1) {
                            $row = mysqli_fetch_assoc($result);
                            ?>
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">

                                    <table class="table table-bordered">
                                        <tr>
                                            <td rowspan="4">
                                                <img style="width:150px" src="admin/student_images/<?= $row['photo'] ?>" class="img-thumbnail"alt="" />
                                            </td>
                                            <td>Name</td>
                                            <td><?= $row['name'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Roll</td>
                                            <td><?= $row['roll'] ?></td>

                                        </tr>
                                        <tr>
                                            <td>Class</td>
                                            <td><?= $row['class'] ?></td>

                                        </tr>
                                        <tr>
                                            <td>City</td>
                                            <td><?= $row['city'] ?></td>

                                        </tr>




                                    </table>
                                </div>


                            </div>
                            <?php
                        } else {
                            ?>
                            <script type="text/javascript">
                                alert('Data Not Found');
                            </script>
        <?php }
}
?>

                </h5>

        </div>
            
   <marquee>Student Management System FUll Project Success! </marquee>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>