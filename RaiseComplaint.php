<?php
session_start();
require 'dbcon.php';


if(isset($_SESSION['id'])){
?>


<html>
    <head>
        <title>COMPLAINT</title>
        <link rel="stylesheet" href="css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg fixed-top py-3 py-lg-4">
            <div class="container">      
                <a class="navbar-brand" id="a" href="index.php">HOSTELMANIA</a>
            <div class="d-flex">
                     <ul class="navbar-nav ml-auto" style="margin-left:310px;">
                    
                    <li class="nav-item" id="l">
                        <a href="index.php" id="a1">HOME</a>
                    </li>
                </ul>
            </div>
            
            <div class="d-flex">
                <ul class="navbar-nav ml-auto">
                          <li class="nav-item">
                   <a href="profile.html">
                           <img src="css/3.jpg" alt="HTML tutorial" style="width:90px;
                             height:90px;border-radius:50%;border: 2px solid rgb(99, 73, 1);;"></a>
               </li>
           </ul>
       </div>
      </div>
      </nav>
  <div style="margin-top:250px;">
    <div class="container-xl px-4 mt-4">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="card mb-4">
                    <div class="card-header"><b>RAISE YOUR COMPLAINT</b></div>
                    <div class="card-body">
                        <form action="code.php" method="post">
                      
                        <?php include('message.php'); ?>
                        
                            <div class="mb-3">
                                <label class="mb-1">Name of the hostel</label>
                                <input class="form-control" name="hostelname" placeholder="Hostel name">
                            </div>
                            <div class="mb-3">
                                <label class="mb-1" for="category">Category of the issue</label>
                                <select class="form-select" name="category">
                                    <option selected>Choose category</option>
                                    <option >Cleanliness</option>
                                    <option >Electricity</option>
                                    <option >Water Supply</option>
                                    <option >Internet Connection</option>
                                    <option >Food</option>
                                    <option >Others</option>
                                  </select>
                            </div>
                            <div class="mb-3">
                                <label class="mb-1">Description of the issue</label>
                                <textarea class="form-control" name="description" type="text" placeholder="About the issue"></textarea>
                            </div>
                            <button class="btn btn-block btn-primary" name="complain" type="submit">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</body>
</html>

<?php
}
else{

    header("location: login.php");
}


?>