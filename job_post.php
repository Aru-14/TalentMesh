<?php
session_start();
include("connect.php");
$emp_id = $_GET['emp_id'];
if (isset($_SESSION['email'])) {
    $emailUser = $_SESSION['email'];
    // Ensure that employer's session is verified

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Job Posting</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 shadow p-5 rounded mt-5">
        <h2 class="text-center mb-4" style="color: slateblue;">Job Posting</h2>

        <form method="POST" enctype="multipart/form-data">

          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Job Title</label>
              <input type="text" class="form-control" name="job_title" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Company Name</label>
              <input type="text" class="form-control" name="company_name" required>
            </div>
          </div>

          <div class="mt-3">
            <label class="form-label">Job Description</label>
            <textarea class="form-control" name="job_description" rows="2" required></textarea>
          </div>

          <div class="mt-3">
            <label class="form-label">Location</label>
            <input type="text" class="form-control" name="location" required>
          </div>

          <div class="mt-3">
            <label class="form-label">Employment Type</label>
            <select class="form-select" name="employment_type" required>
              <option value="Full-time">Full-time</option>
              <option value="Part-time">Part-time</option>
              <option value="Contract">Contract</option>
            </select>
          </div>

          <div class="mt-3">
            <label class="form-label">Salary Range</label>
            <input type="text" placeholder="e.g. 0-20k" class="form-control" name="salary_range" required>
          </div>

          <div class="mt-3">
            <label class="form-label">Experience Required</label>
            <input type="text" class="form-control" name="experience_required" placeholder="yes or no" required>
          </div>

          <div class="mt-3">
            <label class="form-label">Job Requirements</label>
            <textarea class="form-control" name="job_requirements" rows="3" required></textarea>
          </div>

          <div class="mt-3">
            <label class="form-label">Application Deadline</label>
            <input type="date" class="form-control" name="application_deadline" required>
          </div>

          <div class="mt-3">
            <label class="form-label">Contact Email</label>
            <input type="email" class="form-control" name="contact_info" required>
          </div>

          <div class="mt-3">
            <label class="form-label">Job Category</label>
            <input type="text" class="form-control" name="job_category" required>
          </div>

          <div class="d-grid mt-4">
            <button type="submit" class="btn" style="background-color: slateblue; color: white" name="submit">Post Job</button>
          </div>

        </form>
      </div>
    </div>
  </div>
<div class="container">
<div class='row justify-content-center mt-5 mb-5'>
        <div class='col-sm-4 d-grid'><a href='employer_details.php' class='btn' style='background-color:slateblue;color:white;'>Back to profile</a></div>
        </div>
</div>
<div class="row mt-5 justify-content-center">
        <div class="col-sm-6 mt-5 text-center d-grid" style="color:grey">&copy; 2025 Arunima Paunikar. All rights reserved.</p></div>
     
      </div>
</body>
</html>


<?php
 if (isset($_POST['submit'])) {
    // Get posted data
    $jobTitle=$_POST['job_title'];
    $jobDescription = $_POST['job_description'];
    $companyName =$_POST['company_name'];
    $location=$_POST['location'];
    $employmentType=$_POST['employment_type'];
    $salaryRange =$_POST['salary_range'];
    $experienceRequired =  $_POST['experience_required'];
    $jobRequirements = $_POST['job_requirements'];
    $applicationDeadline =  $_POST['application_deadline'];
    $contactInfo =  $_POST['contact_info'];
    $jobCategory =  $_POST['job_category'];
    if (!empty($jobTitle) && !empty($jobDescription) && !empty($companyName) && !empty($location) && 
    !empty($employmentType) && !empty($salaryRange) && !empty($experienceRequired) && 
    !empty($jobRequirements) && !empty($applicationDeadline) && !empty($contactInfo) && 
    !empty($jobCategory)) {
    // Insert job posting into the database
    $query = "INSERT INTO job_posts (emp_id,job_title, job_description, company_name, location, employment_type, 
              salary_range, experience_required, job_requirements, application_deadline, contact_info, job_category)
              VALUES ('$emp_id','$jobTitle', '$jobDescription', '$companyName', '$location', '$employmentType', 
              '$salaryRange', '$experienceRequired', '$jobRequirements', '$applicationDeadline', '$contactInfo', '$jobCategory')";

    if (mysqli_query($conn, $query)) {
        echo "Job posted successfully!";
        echo  "<meta http-equiv='refresh' content='1;url=http://localhost/Project/employer_details.php'>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
else{
    echo "<script>alert('Fill all the fields properly);</script>";
}
 }

} else {
    echo "<meta http-equiv='refresh' content='3;url= http://localhost/Project/login_employer.php'>";  
}
?>
