<?php
session_start();
require 'dbcon.php';

$s=$_SESSION['Adminid'];
if($s!=1)
{

  header("Location: Admin_accepted.php");
}
else{
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
                <a class="navbar-brand" id="a" href="home.html">HOSTELMANIA</a>
            <div class="d-flex">
                    <ul class="navbar-nav ml-auto" style="margin-left:310px;">
                        <li class="nav-item" id="l">
                            <a href="Adminlogin.php" id="a1">Login</a>
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
    <table style="width:100%" class="table table-bordered">
        <thead>
          <tr>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Contact</th>
            <th scope="col" style="text-align:center;">Description of the issue</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
        <?php
          include('message.php'); 
        $sql = "SELECT  * from user INNER JOIN status on user.Uid=status.userid where  status='pending'";
        $result = $con->query($sql);
        //display data on web page
        while($row = mysqli_fetch_array($result)){
           
                       ?>

          <tr>
            <td><?= $row['Name']?></td>
            <td><?= $row['email']?></td>
            <td><?= $row['phoneno']?></td>
            <td><?= $row['description']?></td>
            
            
            <td><form action="code.php" method="POST" class="d-inline">
     <button type="submit" name="Accept" value="<?=$row['issueId'];?>" class="btn btn-primary btn">Accept</button>
                                                    </form><br><br>

                <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="Reject" value="<?=$row['issueId'];?>" class="btn btn-danger btn">Reject</button>
                                                    </form>
                
          </tr>
          <?php
        }
          ?>
        </tbody>
      </table>
  </div>
</body>
</html>
<?php }?>