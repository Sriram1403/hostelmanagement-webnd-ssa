<?php
session_start();
require 'dbcon.php';


if(isset($_SESSION['id'])){
?>
<html>
    <head>
        <title>change_profile</title>
        <link rel="stylesheet" href="css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <div class="content" style="margin-top:90px;">
            <div class="container border border-white w-100 p-3" style="background-color: rgb(255, 255, 255);">
            <div class="row">
                <div class="col-md-6" style="margin-top:100px;">
                    <img src="css/2.jpg" alt="image" class="img-fluid">
                </div>
            <div class="col-md-6">
            <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="mb-4">
            <h3 style="font-size:45px;">Change profile</h3>
            </div>
            <?php include('message.php'); 
                         $s=$_SESSION['id'];
                        if(isset($_SESSION['id']))
                        {
                            
                            $query = "SELECT * FROM user  WHERE Uid='$s'";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
           
            <form action="code.php" method="post">
            <div class="form-group first">
            <label>Username</label>
            <input type="text" name="name"  value="<?=$student['Name'];?>"class="form-control" >
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email"  value="<?=$student['email'];?>"  class="form-control">
            </div>
            <div class="form-group">
                <label>Phone number</label>
                <input type="text" name="phone"   value="<?=$student['phoneno'];?>"   class="form-control">
            </div>
            <div class="form-group">
                <label>Year</label>
                <input type="text" name="year"    value="<?=$student['year'];?>"      class="form-control">
            </div>
            <div class="form-group">
                <label>Department</label>
                <input type="text" name="dept"  value="<?=$student['email'];?>"  class="form-control">
            </div>
            <div class="form-group">
                <label>Register number</label>
                <input type="text" name="regno"   value="<?=$student['regno'];?>"           class="form-control">
                </div>
                <div class="form-group">
                <label>Hostel Name</label>
                <input type="text" name="hname"    value="<?=$student['hostelname'];?>"               class="form-control">
                </div>
                <div class="form-group">
                <label>Room Number</label>
                <input type="text" name="rno"   value="<?=$student['roomno'];?>"   class="form-control">
                </div>
              
            <button type="submit"  class="btn btn-block btn-primary" name='update_student'> Edit</button>
        
            </form>
            <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>".$s;
                            }
                        }
                        ?>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
    </body>
    </body>
</html>
<?php
}
else{

    header("location: login.php");
}


?>