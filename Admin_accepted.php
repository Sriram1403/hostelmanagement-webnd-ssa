<?php
session_start();
require 'dbcon.php';

if(isset($_SESSION['Adminid'])){
    ?>
    
?>


<html>
    <head>
        <title>ADMIN</title>
        <link rel="stylesheet" href="css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/home.css">
    </head>
    <body style="background-color:rgb(254, 254, 255);">
        <nav class="navbar navbar-expand-lg fixed-top py-3 py-lg-4">
            <div class="container">      
                <a class="navbar-brand" id="a" href="index.php">HOSTELMANIA</a>
            <div class="d-flex">
                    <ul class="navbar-nav ml-auto" style="margin-left:310px;">
                        <li class="nav-item" id="l">
                            <a href="officer.html" id="a1">Issuelog</a>
                        </li>
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
                   <a href="profile.html">
                           <img src="css/3.jpg" alt="HTML tutorial" style="width:90px;
                             height:90px;border-radius:50%;border: 2px solid rgb(99, 73, 1);;"></a>
               </li>
           </ul>
       </div>
      </div>
      </nav>
      
  <div style="margin-top:140px;">

      <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>
      
    <table style="width:100%" class="table table-bordered">
        <thead>
          <tr>
          <th scope="col">Name</th>
          <th scope="col">Hostel Name</th>
          <th scope="col">Contact</th>
          <th scope="col">Office Id</th>
            <th scope="col" style="text-align:center;">Description of the issue</th>
            <th scope="col">Category</th>

            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
        <?php
          if(isset($_GET['search']))
          {
          include('message.php'); 

           $s=$_SESSION['Adminid'];
           $filtervalues = $_GET['search'];

        $sql = "SELECT  * from user INNER JOIN status on user.Uid=status.userid WHERE CONCAT(Name,description,category,hostelName,officeId)  LIKE '%$filtervalues%' and officeId=$s";
        $result = $con->query($sql);
        //display data on web page
        while($row = mysqli_fetch_array($result)){
           
                       ?>

          <tr>
            <td><?= $row['Name']?></td>
            <td><?= $row['hostelname']?></td>
            <td><?= $row['phoneno']?></td>
            <td><?= $row['officeId']?></td>
            <td><?= $row['description']?></td>
            <td><?= $row['category']?></td>
            
            <td><form action="code.php" method="POST" class="d-inline">
     <button type="submit" name="Resolve" value="<?=$row['issueId'];?>" class="btn btn-primary btn">Resolve</button>
                                                    </form><br><br>
          <?php

          if($s!=3){ ?>
                <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="Escalate" value="<?=$row['issueId'];?>" class="btn btn-danger btn">Escalate</button>
                                                    </form>
           <?php  } ?>    
          </tr>
          <?php
        }
    }
          ?>
        </tbody>
      </table>
  </div>
</body>
</html>

<?php } 

else{

    header("location: Adminlogin.php");
}

?>