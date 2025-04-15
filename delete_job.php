<?php
include("connect.php");
session_start();
$job_id = $_GET['id'];
$emp_id =$_GET['emp_id'];
$deleteQuery= "DELETE FROM job_posts WHERE job_id ='$job_id'";

if(mysqli_query($conn,$deleteQuery)){
    echo "<script>alert('Deleted Job successfully')</script>";
    echo "<meta http-equiv='refresh' content='0,url=jobs_display.php?emp_id=$emp_id'>"; 
}
else{
    echo "<script>alert('Failed to delete Job')</script>";
    echo "<meta http-equiv='refresh' content='0,url=jobs_display.php?emp_id=$emp_id'>"; 
}