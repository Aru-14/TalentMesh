<?php
session_start();
include("connect.php");

if(isset($_SESSION['email'])){
$job_id = $_GET['job_id'];
$user_id = $_GET['user_id'];

#update application status
$query_user = "UPDATE application SET status='rejected' WHERE job_id = '$job_id' AND user_id = '$user_id'";

$data_user = mysqli_query($conn,$query_user);
if($data_user){

echo "<meta http-equiv='refresh' content='1,url=login_employer.php'>";
}
else{
    echo mysqli_error($conn);
    echo "<meta http-equiv='refresh' content='0;url=user_applied.php?job_id=$job_id'>";
}

}
else{
    echo "<meta http-equiv='refresh' content='1,url=login_employer.php'>";

}
?>