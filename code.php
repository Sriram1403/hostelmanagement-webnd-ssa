<?php
session_start();
require 'dbcon.php';


if(isset($_POST['log_Admin'])){
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['password']);


    $sql = "SELECT id FROM office  WHERE email = '$email' and password = '$password'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);
      if($count == 1) {
         $_SESSION['Adminid'] = implode(" ",$row);
        
         header("location: admin.php");
         exit(0);
      }else {
        $_SESSION['message']="InvalidLogin";
        
        header("location: Adminlogin.php");
        exit(0);
      }
   }
   if(isset($_POST['log_out'])){
    session_start(); //to ensure you are using same session
    session_destroy(); //destroy the session
    header("location: index.php"); //to redirect back to "index.php" after logging out
    exit(0);
        
      }
   



if(isset($_POST['complain'])){
    $s=$_SESSION['id'];
    if(empty($_POST["hostelname"])){
        $_SESSION['message']="Please Enter Hostelname";
        header("Location:RaiseComplaint.php");
        exit(0);
       }
       else{
    
        $hname=mysqli_real_escape_string($con,$_POST['hostelname']);
       }
      
        $category=mysqli_real_escape_string($con,$_POST['category']);
       
       
        $description=mysqli_real_escape_string($con,$_POST['description']);
   // $query="INSERT INTO status(category,description,userId,status) VALUES ('$category','$description','$s')";
   $query="INSERT INTO status(category,description,userId) VALUES ('$category','$description','$s')";


    
    $query_run=mysqli_query($con,$query);
   
   if($query_run)
    {
        $_SESSION['message']="Complained Raised Successfully";
        header("Location:RaiseComplaint.php");
        exit(0);
    }
    else{
        $_SESSION['message']=("Error!!!");
        header("Location:RaiseComplaint.php");
        exit(0);
    }
    // if (!$con -> query("INSERT INTO status(category,description,userId) VALUES ('$category','$description','$s')")) {
    //     if($con -> error){
    //     $_SESSION['message']=$con -> error ;
    //         header("Location:RaiseComplaint.php");
    //         exit(0);
    //     }
    //     else{
    //         $_SESSION['message']= "Complaint Sent";
    //         header("Location:RaiseComplaint.php");
    //         exit(0);
    //     }
    //   }

}
if(isset($_POST['update_student']))
{
    $s=$_SESSION['id'];

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $year = mysqli_real_escape_string($con, $_POST['year']);
    $dept = mysqli_real_escape_string($con, $_POST['dept']);
    $regno = mysqli_real_escape_string($con, $_POST['regno']);
    $hname = mysqli_real_escape_string($con, $_POST['hname']);
    $rno = mysqli_real_escape_string($con, $_POST['rno']);
    $query = "UPDATE user SET name='$name', email='$email', phoneno='$phone', year='$year',department='$dept', regno='$regno', hostelname='$hname',roomno='$rno'  WHERE Uid='$s'";
    $query_run = mysqli_query($con, $query);

    

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: change_profile.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: change_profile.php");
        exit(0);
    }

}
if(isset($_POST['Escalate'])){
    $s=$_SESSION['Adminid'];
    $issueId = mysqli_real_escape_string($con, $_POST['Escalate']);
    $query = "UPDATE status  SET officeId =$s+1 WHERE issueId='$issueId'";
    $query_run = mysqli_query($con, $query);

    

    if($query_run)
    {
        $_SESSION['message'] = "Issue Escalate";
        header("Location: Admin_accepted.php");
        exit(0);
        
    }
    else{
        $_SESSION['message'] = "Error in Escalate";
        header("Location: Admin_accepted.php");
        exit(0);
    }

}
if(isset($_POST['Resolve'])){

    $issueId = mysqli_real_escape_string($con, $_POST['Resolve']);
    $query = "UPDATE status  SET status='Resolve',officeId =NULL WHERE issueId='$issueId'";
    $query_run = mysqli_query($con, $query);

    

    if($query_run)
    {
        $_SESSION['message'] = "Issue resolved";
        header("Location: Admin_accepted.php");
        exit(0);
        
    }
    else{
        $_SESSION['message'] = "Error in Resolvement";
        header("Location: Admin_accepted.php");
        exit(0);
    }

}

if(isset($_POST['Accept'])){

    $issueId = mysqli_real_escape_string($con, $_POST['Accept']);
    $query = "UPDATE status  SET status='Accepted', officeId= 1 WHERE issueId='$issueId'";
    $query_run = mysqli_query($con, $query);

    

    if($query_run)
    {
        $_SESSION['message'] = "Issue Accepted";
        header("Location: Admin_accepted.php");
        exit(0);
        
    }
    else{
        $_SESSION['message'] = "Error in Acceptance";
        header("Location: admin.php");
        exit(0);
    }

}
if(isset($_POST['Reject'])){

    $issueId = mysqli_real_escape_string($con, $_POST['Reject']);
    $query = "UPDATE status  SET status='Rejected' WHERE issueId='$issueId'";
    $query_run = mysqli_query($con, $query);

    

    if($query_run)
    {
        $_SESSION['message'] = "Issue Rejected";
        header("Location: admin.php");
        exit(0);
        
    }
    else{
        $_SESSION['message'] = "Error in Rejection";
        header("Location: admin.php");
        exit(0);
    }

}

if(isset($_POST['log_student'])){
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    

    $sql = "SELECT Uid FROM user  WHERE email = '$email' and password = '$password'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);
      if($count == 1) {
         $_SESSION['id'] = implode(" ",$row);
        
         header("location: index.php");
         exit(0);
      }else {
        $_SESSION['message']="Login failed";
        
        header("location: login.php");
        exit(0);
      }
   }
if(isset($_POST['save_student']))

{  

    if (empty($_POST["name"])){
        $_SESSION['message']="Please Enter name";
        header("Location:register.php");
        exit(0);
    }
    else{
        $name=mysqli_real_escape_string($con,$_POST['name']);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $_SESSION['message']="Only letters and white space allowed";
            header("Location:register.php");
            exit(0);
        }
    }


    if (empty($_POST["email"])){
        $_SESSION['message']="Please Enter Email";
        header("Location:register.php");
        exit(0);
    }
    else{
        $email=mysqli_real_escape_string($con,$_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $_SESSION['message']="The Email Address is incorrect";
            exit(0);

            }
    
    }

    if (empty($_POST["phone"])){
        $_SESSION['message']="Please Enter phone number";
        header("Location:register.php");
        exit(0);
    }
    
  else{
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
    if(!preg_match('/^[0-9]{10}+$/', $phone)) {
        $_SESSION['message']="Please Enter Valid  Phone Number";
        header("Location:register.php");
        exit(0);
    
}
}
   if(empty($_POST["dept"])){
    $_SESSION['message']="Please Enter Department";
    header("Location:register.php");
    exit(0);
   }
   else{

    $department=mysqli_real_escape_string($con,$_POST['dept']);
   }
   if(empty($_POST["year"])){
    $_SESSION['message']="Please Enter year";
    header("Location:register.php");
    exit(0);
   }
   else{

    $year=mysqli_real_escape_string($con,$_POST['year']);
   }
   if(empty($_POST["regno"])){
    $_SESSION['message']="Please Enter regno";
    header("Location:register.php");
    exit(0);
   }
   else{

    $regno=mysqli_real_escape_string($con,$_POST['regno']);
   }
   if(empty($_POST["hname"])){
    $_SESSION['message']="Please Enter Hostelname";
    header("Location:register.php");
    exit(0);
   }
   else{

    $h=mysqli_real_escape_string($con,$_POST['hname']);
   }
   if(empty($_POST["rno"])){
    $_SESSION['message']="Please Enter Roomno";
    header("Location:register.php");
    exit(0);
   }
   else{

    $r=mysqli_real_escape_string($con,$_POST['rno']);
   }
   
    
    
    $pass=mysqli_real_escape_string($con,$_POST['password']);
    

// Validate password strength
// $uppercase = preg_match('@[A-Z]@', $pass);
// $lowercase = preg_match('@[a-z]@', $pass);
// $number    = preg_match('@[0-9]@', $pass);
// $specialChars = preg_match('@[^\w]@', $pass);

if(strlen($pass) < 8) {
    $_SESSION['message']="Please Check the Strength of the password!. Password is too short";
    header("Location:register.php");
    exit(0);
}

//  if (!$con -> query("INSERT INTO user(Name,email,department,phoneno,year,regno,password) VALUES ('$name','$email','$department','$phone','$year','$regno','$pass')")) {
    
//      $_SESSION['message']= $con -> error;
//          header("Location:register.php");
//          exit(0);
//    }
     
    $query="INSERT INTO user(Name,email,department,phoneno,year,regno,password,hostelname,roomno) VALUES ('$name','$email','$department','$phone','$year','$regno','$pass','$h','$r')";


    
    $query_run=mysqli_query($con,$query);
   
   if($query_run)
    {
        $_SESSION['message']="Student Created Successfully";
        header("Location:register.php");
        exit(0);
    }
    else{
        $_SESSION['message']=("Error!!!");
        header("Location:register.php");
        exit(0);
    }
}


?>