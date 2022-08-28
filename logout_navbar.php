<?php
session_start();
require 'dbcon.php';


if(isset($_SESSION['id'])){
?>



<html>
    <head>
        
        <link rel="stylesheet" href="css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/lognavbar.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg fixed-top py-3 py-lg-4">
        <div class="container">      
            <a class="navbar-brand" id="a" href="index.php">HOSTELMANIA</a>
        <div class="d-flex">
                 <ul class="navbar-nav ml-auto" style="margin-left:650px;">
                <li class="nav-item" id="l">
                    <form action="code.php" method=post>
                        <button id="a1" name="log_out" type="submit" >
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        
        <div class="d-flex">
            <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
               <a href="change_profile.php">
                       <img src="css/3.jpg" alt="HTML tutorial" style="width:90px;
                         height:90px;border-radius:50%;border: 2px solid rgb(99, 73, 1);"></a>
           </li>
       </ul>
   </div>
  </div>
  </nav>

<?php } 

else{

    header("location: login.php");
}

?>