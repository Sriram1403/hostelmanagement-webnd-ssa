<?php
session_start();
?>

<html>
    <head>
        <title>SIGNIN</title>
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
            <h3 style="font-size:45px;">Signin</h3>
            </div>
            <?php include('message.php'); ?>
           
            <form action="code.php" method="post">
            <div class="form-group first">
            <label>Username</label>
            <input type="text" name="name" class="form-control" >
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Phone number</label>
                <input type="text" name="phone" class="form-control">
            </div>
            <div class="form-group">
                <label>Year</label>
                <input type="text" name="year" class="form-control">
            </div>
            <div class="form-group">
                <label>Department</label>
                <input type="text" name="dept" class="form-control">
            </div>
            <div class="form-group">
                <label>Register number</label>
                <input type="text" name="regno" class="form-control">
                </div>
                <div class="form-group">
                <label>Hostel Name</label>
                <input type="text" name="hname" class="form-control">
                </div>
                <div class="form-group">
                <label>Room Number</label>
                <input type="text" name="rno" class="form-control">
                </div>
                <div class="form-group last mb-4">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
            <button type="submit"  class="btn btn-block btn-primary" name="save_student"> Register</button>
            <span class="d-block text-left my-4 text-muted">Have an account?<a href="login.php"> click here to login</a></span>
            </form>
                     
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
    </body>
    </body>
</html>