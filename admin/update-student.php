<h1 class="text-primary"><i class="fa fa-pencil-square-o"></i> Update Student <small> Update Student</small></h1>
<ol class="breadcrumb">

    <li><a href="index.php?page=dashboard" ><i class="fa fa-dashboard"></i> Dashboard</a></li>
     <li><a href="index.php?page=all-students" ><i class="fa fa-users"></i> All Student</a></li>
    <li class="active"><i class="fa fa-pencil-square-o"></i> update Student</li>
</ol>
<?php

  $id= base64_decode($_GET['id']);
  $db_data = mysqli_query($linnk, "SELECT * FROM `student_info` WHERE `id`='$id'");
  $db_row = mysqli_fetch_assoc($db_data);
  
if(isset($_POST['update-student'])){
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $city = $_POST['city'];
    $class = $_POST['class'];
    $depertment = $_POST['depertment'];
    $gpa = $_POST['gpa'];
    
  
     
      $query="UPDATE `student_info` SET `name`='$name',`roll`='$roll',`city`='$city',`class`='$class' WHERE `id`='$id'";
    
      
      $result= mysqli_query($linnk,$query);
      if($result){
       header('location: index.php?page=all-students');
      }
      
     
}


?>



<div class="row">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data">
            <div calss="form-group">
                <label for="name"> Student Name </label>
                <input type="text" name="name" placeholder="Student Name...." id="name" class="form-control" required="" value="<?= $db_row['name']?>"/>


            </div>
            <br/>

            <div calss="form-group">
                <label for="roll"> Student Roll </label>
                <input type="text" name="roll" placeholder="Student Roll...." id="roll" class="form-control" required="" value="<?= $db_row['roll']?>"/>


            </div>
            <br/>
            <div calss="form-group">
                <label for="city"> City </label>
                <input type="text" name="city" placeholder="City...." id="city" class="form-control" required="" value="<?= $db_row['city']?>" />


            </div>
            <br/>
            <div calss="form-group">
                <label for="class"> Class </label>
                <select id="class" class="form-control" name="class" required="" />
                    <option value="" >Select</option>
                    <option <?php echo $db_row['class']=='1st' ? 'selected=""':''?> value="1st" >1st</option>
                    <option <?php echo $db_row['class']=='2nd' ? 'selected=""':''?> value="2nd">2nd</option>

                </select>
                <br/>

                <div calss="form-group">
                    <label for="depertment"> Depertment </label>
                    <select id="depertment" class="form-control" name="depertment"  />
                        <option value="">Select</option>
                        <option <?php echo $db_row['depertment']=='Bangla' ? 'selected=""':''?>value="Bangla">Bangla</option>
                        <option value="English">English</option>
                        <option value="Math">Math</option>
                        <option value="ICT">ICT</option>



                    </select>


                </div>
                <br/>
                <div calss="form-group">
                    <label for="gpa"> GPA </label>
                    <input type="text" name="gpa" placeholder="Student GPA...." id="gpa" class="form-control" />


                </div>
                <br/>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" id="photo"  />


                </div>
                <div class="form-group">
                    <input type="submit" value="update Student" name="update-student" class="btn btn-primary pull-right" />

                </div>



        </form>

    </div>



</div>