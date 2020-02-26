<h1 class="text-primary"><i class="fa fa-user-plus"></i> Add Student <small> Add New Student</small></h1>
<ol class="breadcrumb">

    <li><a href="index.php?page=dashboard" >Dashboard</a></li>
    <li class="active"><i class="fa fa-user-plus"></i> Add Student</li>
</ol>

<?php
 
if(isset($_POST['add-student'])){
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $city = $_POST['city'];
    $class = $_POST['class'];
    $depertment = $_POST['depertment'];
    $gpa = $_POST['gpa'];
    
    $photo = explode('.', $_FILES['photo']['name']);
    
     $photo_ex= end($photo);
     
     $photo_name =$roll.'.'.$photo_ex;
     
      $query="INSERT INTO `student_info`(`name`, `roll`,  `city`,`class`, `photo`,`gpa`, `depertment`) VALUES ('$name','$roll','$city','$class','$photo_name','gpa','depertment')";
     
      
      $result= mysqli_query($linnk,$query);
      
      if($result){
          $success ="Data Insert Success!";
          
          move_uploaded_file($_FILES['photo']['tmp_name'],'student_images/'.$photo_name);
          
      }else{
          $error ="Worng";
      }
}



?>

<div class="row">
    <?php if(isset($success)){echo '<p class="alert alert-success col-sm-6"> '.$success.' </p>';}?>
     <?php if(isset($worng)){ echo '<p class="alert alert-danger col-sm-6">'.$error.'</p>';} ?>

</div>
<div class="row">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data">
            <div calss="form-group">
                <label for="name"> Student Name </label>
                <input type="text" name="name" placeholder="Student Name...." id="name" class="form-control" required=""/>


            </div>
            <br/>

            <div calss="form-group">
                <label for="roll"> Student Roll </label>
                <input type="text" name="roll" placeholder="Student Roll...." id="roll" class="form-control" required="" />


            </div>
            <br/>
            <div calss="form-group">
                <label for="city"> City </label>
                <input type="text" name="city" placeholder="City...." id="city" class="form-control" required="" />


            </div>
            <br/>
            <div calss="form-group">
                <label for="class"> Class </label>
                <select id="class" class="form-control" name="class" required="">
                    <option value="">Select</option>
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>

                </select>
                <br/>

                <div calss="form-group">
                    <label for="depertment"> Depertment </label>
                    <select id="depertment" class="form-control" name="depertment" />
                        <option value="">Select</option>
                        <option value="Bangla">Bangla</option>
                        <option value="English">English</option>
                        <option value="Math">Math</option>
                        <option value="ICT">ICT</option>



                    </select>


                </div>
                <br/>
                <div calss="form-group">
                    <label for="gpa"> GPA </label>
                    <input type="text" name="gpa" placeholder="Student GPA...." id="gpa" class="form-control"  />


                </div>
                <br/>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" id="photo" />


                </div>
                <div class="form-group">
                    <input type="submit" value="Add Student" name="add-student" class="btn btn-primary pull-right" />

                </div>



        </form>

    </div>



</div>