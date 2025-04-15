<?php
include("connect.php");
session_start();
$OfficialMail = $_SESSION['email'];
$emp_id=$_GET['emp_id'];
echo $emp_id;

if(isset($_SESSION['email'])){
   $query = "SELECT * FROM job_posts WHERE emp_id='$emp_id'";
    
   if(mysqli_query($conn,$query)){

    $data = mysqli_query($conn,$query);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>Your Job Posts</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
    </head>
    <body>
      <div class="container mt-4">
        <h2 class="text-center mb-4" style="color:slateblue;">Your Job Posts</h2>
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
       
           <div class="col-sm-6">
        <div class="card shadow-lg rounded-4 mb-4 border-0">
  <div class="card-body p-4 ">
    <div class="d-flex justify-content-center align-items-center mb-5">
      <div>
        <h4 class="card-title fw-bolder mb-2 text-center" style="color:slateblue;"><?php echo $jobTitle; ?></h4>
        <h6 class="card-subtitle text-muted text-center mb-2 "><?php echo "$companyName · $employmentType"; ?></h6>
       
      </div>
     
    </div>
    <hr>
    <div class="row g-3">
      <div class="col-md-6">
      <p class="mb-1"><i class="bi bi-geo-alt-fill"></i> <strong>Job ID:</strong>
                  <?php echo $jobId; ?>
                </p>
        <p class="mb-1"><i class="bi bi-geo-alt-fill"></i> <strong>Location:</strong> <?php echo $location; ?></p>
        <p class="mb-1"><i class="bi bi-cash-stack"></i> <strong>Salary:</strong> <?php echo $salaryRange; ?></p>
        <p class="mb-1"><i class="bi bi-briefcase-fill"></i> <strong>Experience:</strong> <?php echo $experience; ?></p>
      </div>
      <div class="col-md-6">
      <p class="mb-1"><i class="bi bi-envelope-fill"></i> <strong>Contact:</strong> <?php echo $category; ?></p>
        <p class="mb-1"><i class="bi bi-calendar-event-fill"></i> <strong>Deadline:</strong> <?php echo $deadline; ?></p>
        <p class="mb-1"><i class="bi bi-envelope-fill"></i> <strong>Contact:</strong> <?php echo $contact; ?></p>
      </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-sm-6"><p class="mt-3"><strong>Description:</strong><br><?php echo nl2br($description); ?></p>
      </div>
      <div class="col-sm-6"> <p><strong>Requirements:</strong><br><?php echo nl2br($requirements); ?></p></div>
    </div>
    

    <div class="d-flex justify-content-end flex-wrap gap-2 mt-4">
    <a href="user_applied.php?job_id=<?php echo $jobId; ?>" class="btn btn-outline-info">
         See Applicants
      </a>
      <a href="update_job.php?id=<?php echo $jobId; ?>&emp_id=<?php echo $emp_id; ?>" class="btn btn-outline-warning">Update
      </a>
      <a href="delete_job.php?id=<?php echo $jobId; ?>&emp_id=<?php echo $emp_id; ?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this job post?');"> Delete
      </a>
    </div>
  </div>
</div>
</div> 

    
        <?php }
        // back to profile 
        echo "</div>
        
        <div class='row justify-content-center'>
        <div class='col-sm-4'><a href='employer_details.php' class='btn' style='background-color:slateblue;color:white;'>Back to profile</a></div>
        </div>";} 
         else { ?>
          <div class="alert alert-info text-center">No job posts found.</div>
          <div class='row justify-content-center'>
        <div class='col-sm-4 d-grid'><a href='employer_details.php' class='btn' style='background-color:slateblue;color:white;'>Back to profile</a></div>
        </div>
        <?php }}
        else{
            echo "".mysqli_error($conn);
        }
         }
        else{
            echo "<meta http-equiv='refresh' content='1,url=login_employer.php'>";

        } ?>
      </div>
    </body>
    </html> 