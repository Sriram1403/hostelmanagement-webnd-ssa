<?php
session_start();
?>
<html>
    <head>
        <title>LOGIN</title>
        <link rel="stylesheet" href="css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <div class="content" style="margin-top:150px;" >
            <div class="container border border-white w-100 p-3" style="background-color:rgb(255, 255, 255);" id="box">
            <div class="row" style="margin-top:80px;">
            <div class="col-md-6 order-md-2">
            <img src="css/1.jpeg" alt="image" class="img-fluid">
            </div>
            <div class="col-md-6 contents">
            <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="mb-4">
            <h3 style="font-size:45px;">Admin Login</h3>
            </div>
            
            <?php include('message.php'); ?>
            
            <form action="code.php" method="post">
            <div class="form-group first">
            <label>Email</label>
            <input type="text" class="form-control" name="email">
            </div>
            <div class="form-group last mb-4">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" name="log_Admin" class="btn text-black btn-block btn-primary">LogIN</button>
            
            </form>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
    </body>
</html>