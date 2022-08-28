<?php include('logout_navbar.php'); ?>;


    <body style="background-color:rgb(254, 254, 255);">

  <div style="margin-top:140px;">
    <table style="width:100%" class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Category</th>
            <th scope="col" style="text-align:center;">Description of the issue</th>
            <th scope="col">officer</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
        <?php 
                                 $s=$_SESSION['id'];
                                    $query = "SELECT * FROM status WHERE userId='$s'";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $student)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $student['category']; ?></td>
                                                <td><?= $student['description']; ?></td>
                                                <td>
                                               
                                                <?php 
                                                
                                                $off=$student['officeId'];
                                                if($off){
                                                  ?><h5><?=
                                                 $student['officeId'];
                                                 ?></h5><?php
                                                }
                                                else{
                                                  ?>
                                                  <h5>Not aligned to officer</h5>
                                                  <?php
                                                }
                                                ?>
                                               
                                                
                                                <td>
                                                    <?php if($student['status']=="Accepted"){
                                                    ?>
                                                <button class="btn btn-block btn-success"  type="button" disabled><?= $student['status']; ?></button>
                                                <?php 
                                                    }
                                                else{
                                                    ?>
                                                 <button class="btn btn-block btn-primary" id="b2" type="button" disabled><?= $student['status']; ?></button>
                                                <?php }?>
                                        </td>
                                
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
        </tbody>
      </table>

  </div>
</body>
</html>