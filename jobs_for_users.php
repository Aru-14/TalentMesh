<?php
session_start();
include("connect.php");




if(isset($_SESSION['UserEmail'])){
  $user_mail=$_SESSION['UserEmail'];
   $query = "SELECT * FROM job_posts ";
  $query_user="SELECT ID FROM  user WHERE Email='$user_mail'";
  $data_user= mysqli_query($conn,$query_user);
  $row_user=mysqli_fetch_assoc($data_user);
  $user_id=$row_user['ID'];
   if(mysqli_query($conn,$query)){

    $data = mysqli_query($conn,$query);
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Jobs</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  <div class="container mt-4">
    <h2 class="text-center mb-4" style="color:slateblue;">Available Jobs</h2>
    <div class="row">
      <?php
        if (mysqli_num_rows($data) > 0) {
          while ($row = mysqli_fetch_assoc($data)) {
            $jobId = $row['job_id'];
            $jobTitle = $row['job_title'];
            $companyName = $row['company_name'];
            $location = $row['location'];
            $employmentType = $row['employment_type'];
            $salaryRange = $row['salary_range'];
            $experience = $row['experience_required'];
            $deadline = $row['application_deadline'];
            $description = $row['job_description'];
            $requirements = $row['job_requirements'];
            $category = $row['job_category'];
            $contact = $row['contact_info'];
        ?>
  <!-- Job Card  -->

      <div class="col-sm-6">
        <div class="card shadow-lg rounded-4 mb-4 border-0">
          <div class="card-body p-4 ">
            <div class="d-flex justify-content-center align-items-center mb-5">
              <div>
                <h4 class="card-title fw-bolder mb-2 text-center" style="color:slateblue;">
                  <?php echo $jobTitle; ?>
                </h4>
                <h6 class="card-subtitle text-muted mb-2 ">
                  <?php echo "$companyName · $employmentType"; ?>
                </h6>
              </div>

            </div>
            <hr>
            <div class="row g-3">
              <div class="col-md-6">
              <p class="mb-1"><i class="bi bi-geo-alt-fill"></i> <strong>Job ID:</strong>
                  <?php echo $jobId; ?>
                </p>
                <p class="mb-1"><i class="bi bi-geo-alt-fill"></i> <strong>Location:</strong>
                  <?php echo $location; ?>
                </p>
                <p class="mb-1"><i class="bi bi-cash-stack"></i> <strong>Salary:</strong>
                  <?php echo $salaryRange; ?>
                </p>
                <p class="mb-1"><i class="bi bi-briefcase-fill"></i> <strong>Experience:</strong>
                  <?php echo $experience; ?>
                </p>
              </div>
              <div class="col-md-6">
                <p class="mb-1"><i class="bi bi-envelope-fill"></i> <strong>Contact:</strong>
                  <?php echo $category; ?>
                </p>
                <p class="mb-1"><i class="bi bi-calendar-event-fill"></i> <strong>Deadline:</strong>
                  <?php echo $deadline; ?>
                </p>
                <p class="mb-1"><i class="bi bi-envelope-fill"></i> <strong>Contact:</strong>
                  <?php echo $contact; ?>
                </p>
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col-sm-6">
                <p class="mt-3"><strong>Description:</strong><br>
                  <?php echo nl2br($description); ?>
                </p>
              </div>
              <div class="col-sm-6">
                <p><strong>Requirements:</strong><br>
                  <?php echo nl2br($requirements); ?>
                </p>
              </div>
            </div>
            <?php 
$checkQuery = "SELECT * FROM application WHERE user_id='$user_id' AND job_id='$jobId'";
$checkResult = mysqli_query($conn, $checkQuery);
$applied = mysqli_num_rows($checkResult) > 0; 
if($applied){
    echo "<button  class='btn' style='background-color:slateblue;color:white;' disabled>Applied</button>";
}
else{
  echo "<a href='apply_job.php?job_id= $jobId&user_id=$user_id' class='btn' style='background-color:slateblue;color:white;' >Apply</a>";
}
?>

          </div>
        </div>
      </div>


      <?php }
        # Back to Profile 
        echo "</div>
     
        <div class='row justify-content-center'>
        <div class='col-sm-4 mb-4'><a href='user_details.php' class='btn' style='background-color:slateblue;color:white;'>Back to profile</a></div>
        </div>";} 

         else { ?>
      <div class="alert alert-info text-center">No job posts found.</div>

      <!-- Back to user Profile  -->

      <div class='row justify-content-center'>
        <div class='col-sm-4 d-grid mb-5'><a href='user_details.php' class='btn' style='background-color:slateblue;color:white;'>Back to profile</a></div>
      </div>
      <?php }}
        else{
            echo "".mysqli_error($conn);
        }
         }
        else{
            echo "<meta http-equiv='refresh' content='1,url=login_user.php'>";

        } ?>
    </div>
</body>

</html>