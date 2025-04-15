<?php
session_start();
include('connect.php');

if(isset($_SESSION['UserEmail'])){
    $user_id=$_GET['user_id'];
// See applications 
$query = "SELECT * FROM application WHERE user_id='$user_id'";
$data = mysqli_query($conn,$query);
if($data){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Dashboard</title>

</head>

<body>
<?php
if(mysqli_num_rows($data)>0){
    while($row=mysqli_fetch_assoc($data)){
$job_id=$row['job_id'];
$status=$row['status'];
?>
        <div class="card container border-0 shadow mb-4">
            <div class="card-body text-center">
                <h5 class="card-title">Applied Job ID: <span class="text-primary"><?php echo $job_id; ?></span></h5>
                <p class="card-text">
                    Status:
                    <span class="badge" style="background-color:slateblue;color:white;"><?php echo $status; ?></span>
                </p>
            </div>
        </div>
<?php
    }
    
    ?>
   <!-- Back to User Profile  -->
   <div class='row justify-content-center'>
        <div class='col-sm-4 d-grid mb-3'><a href='user_details.php' class='btn'
            style='background-color:slateblue;color:white;'>Back to profile</a></div>
      </div>
    </body>
    </html>
    <?php
}
 else{
  ?>
  <!-- Error  -->
  <div class="container my-4">
  <div class="card border-danger text-danger shadow">
    <div class="card-body text-center">
      <h5 class="card-title fw-bold">No Applications Found</h5>
      <p class="card-text">There are currently no job applications for this post.</p>
    </div>
  </div>
</div>

 <!-- Back to user profile  -->
 <div class="container ">
 </div>
     
     <div class='row justify-content-center'>
     <div class='col-sm-4 mb-4 d-grid'><a href='user_details.php' class='btn' style='background-color:slateblue;color:white;'>Back to profile</a></div>
     </div>
    </div>
  <?php 
 }
}
else{
    echo mysqli_error($conn);
}
}
else{
    echo "<meta http-equiv='refresh' content='1,url=login_user.php'>";

}
?>
