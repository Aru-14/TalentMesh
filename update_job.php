<?php include("connect.php");
$job_id = $_GET['id'];
$emp_id = $_GET['emp_id'];

$query = "SELECT * FROM job_posts WHERE job_id='$job_id'";
$data = mysqli_query($conn,$query);

$result = mysqli_fetch_assoc($data);
echo $emp_id;
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
              <input type="text" class="form-control" name="job_title" value="<?php echo $result['job_title'];?>" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Company Name</label>
              <input type="text" class="form-control" name="company_name" value="<?php echo $result['company_name'];?>" required>
            </div>
          </div>

          <div class="mt-3">
            <label class="form-label">Job Description</label>
            <textarea class="form-control" name="job_description" rows="2"  required><?php echo $result['job_description'];?></textarea>
          </div>

          <div class="mt-3">
            <label class="form-label">Location</label>
            <input type="text" class="form-control" value="<?php echo $result['location'];?>" name="location" required>
          </div>

          <div class="mt-3">
            <label class="form-label">Employment Type</label>
            <select class="form-select" name="employment_type" required>
              <option value="Full-time" <?php echo ($result['employment_type']=='Full-time')?"selected":""?>>Full-time</option>
              <option value="Part-time" <?php echo ($result['employment_type']=='Part-time')?"selected":""?>>Part-time</option>
              <option value="Contract" <?php echo ($result['employment_type']=='Contract')?"selected":""?>>Contract</option>
            </select>
          </div>

          <div class="mt-3">
            <label class="form-label">Salary Range</label>
            <input type="text" placeholder="e.g. 0-20k" class="form-control" name="salary_range" value="<?php echo $result['salary_range'];?>" required>
          </div>

          <div class="mt-3">
            <label class="form-label">Experience Required</label>
            <input type="text" class="form-control" name="experience_required" placeholder="yes or no" value="<?php echo $result['experience_required'];?>" required>
          </div>

          <div class="mt-3">
            <label class="form-label">Job Requirements</label>
            <textarea class="form-control" name="job_requirements" rows="3"  required><?php echo $result['job_requirements'];?></textarea>
          </div>

          <div class="mt-3">
            <label class="form-label">Application Deadline</label>
            <input type="date" class="form-control" name="application_deadline" value="<?php echo $result['application_deadline'];?>" required>
          </div>

          <div class="mt-3">
            <label class="form-label">Contact Email</label>
            <input type="email" class="form-control" name="contact_info" value="<?php echo $result['contact_info'];?>" required>
          </div>

          <div class="mt-3">
            <label class="form-label">Job Category</label>
            <input type="text" class="form-control" name="job_category" value="<?php echo $result['job_category'];?>" required>
          </div>

          <div class="d-grid mt-4">
            <button type="submit" class="btn" style="background-color: slateblue; color: white" name="update">Update Job</button>
          </div>

        </form>
      </div>
    </div>
  </div>

</body>
</html>

<?php 
#Sending the data
if(isset($_POST['update']))
{
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


#validation
if (!empty($jobTitle) && !empty($jobDescription) && !empty($companyName) && !empty($location) && 
!empty($employmentType) && !empty($salaryRange) && !empty($experienceRequired) && 
!empty($jobRequirements) && !empty($applicationDeadline) && !empty($contactInfo) && 
!empty($jobCategory)) {

$query = "UPDATE job_posts SET job_title='$jobTitle',job_description='$jobDescription',company_name='$companyName',location='$location',employment_type='$employmentType',salary_range='$salaryRange',experience_required='$experienceRequired', job_requirements='$jobRequirements', application_deadline='$applicationDeadline', contact_info='$contactInfo', job_category='$jobCategory' WHERE job_id = '$job_id'";
             
$data = mysqli_query($conn,$query);

if($data){
	echo "<script>alert('Job updated');</script>";
	#for refreshing and redirecting to display
	?>
	<meta http-equiv = "refresh" content="0; url=http://localhost/Project/jobs_display.php?emp_id=<?php echo $_GET['emp_id'];?>"/>
	
	<?php
}
else{
	echo "Job not updated";
}
}
else{
	echo "<script>alert('Enter entire data')</script>";
}
}


else{
	echo "Not submitted";
}



?>