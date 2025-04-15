<?php
session_start();
include('connect.php');
if(isset($_SESSION['UserEmail'])){
$user_id=$_GET['user_id'];
$job_id=$_GET['job_id'];

$query="INSERT INTO application(user_id,job_id,applied) VALUES('$user_id','$job_id','1')";

$data = mysqli_query($conn,$query);
if($data){
echo "applied for ".$job_id." successfully";
echo "<meta http-equiv='refresh' content='0,url=user_home.php?user_id=$user_id'/>";
}
else{
  
    echo "<meta http-equiv='refresh' content='0,url=user_home.php?user_id=$user_id'/>";
}
}
else{
   
    echo "<meta http-equiv='refresh' content='0,url=login_user.php'/>";
}
?>