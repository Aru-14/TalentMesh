<?php
session_start();
include("connect.php");
$user_id = $_GET['user_id']; 

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

if(isset($_SESSION['UserEmail'])){
$search = mysqli_real_escape_string($conn, $_GET['search']);
$keywords = explode(" ", $search);
$conditions = [];

foreach ($keywords as $word) {
    $word = trim($word);
    if (!empty($word)) {
        $word = mysqli_real_escape_string($conn, $word);
        $conditions[] = "job_title LIKE '%$word%' 
        OR company_name LIKE '%$word%' 
        OR location LIKE '%$word%' 
        OR job_category LIKE '%$word%' 
        OR job_description LIKE '%$word%' 
        OR employment_type LIKE '%$word%' 
        OR job_requirements LIKE '%$word%'";
    }
}


$whereClause = implode(" OR ", $conditions);
$query = "SELECT * FROM job_posts WHERE $whereClause";
$data = mysqli_query($conn,$query);
if($data){

  // if no jobs found 

    if(mysqli_num_rows($data)==0){
       ?>
     
    <div class="container">
        <div class="card shadow border-danger mb-4 ">
  <div class="card-body text-danger">
    <h5 class="card-title">No Jobs Found</h5>
    <p class="card-text">Sorry, we couldn't find any job listings matching your search.</p>
  </div>
</div>
</div>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-sm-3 d-grid">
    <a href="user_home.php?user_id=<?php echo $user_id?>" class="btn btn-secondary"> Go to Home
</a>
</div>
    </div>
    </div>
        <?php
    }

     // if jobs found 

    else{
    while($row = mysqli_fetch_assoc($data)){
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



      <div class="card shadow-lg mb-4 container  ">
  <div class="card-body">
    <!-- Job Title and Company Name -->
    <h4 class="card-title " style="color:slateblue;"><?php echo $jobTitle; ?></h4>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $companyName; ?> · <?php echo $employmentType; ?></h6>
    <div class="row">
    <!-- Job Details -->
     <div class="col-sm-8">
    <div class="mt-3">
      <p><strong>Location:</strong> <?php echo $location; ?></p>
      <p><strong>Salary:</strong> <?php echo $salaryRange; ?></p>
      <p><strong>Experience Required:</strong> <?php echo $experience; ?></p>
      <p><strong>Deadline:</strong> <?php echo $deadline; ?></p>
    </div>
    
    <!-- Job Description and Requirements -->
    <div class="mt-3">
      <p><strong>Description:</strong> <?php echo $description; ?></p>
      <p><strong>Requirements:</strong> <?php echo $requirements; ?></p>
    </div>
    </div>
    
  <div class="col-sm-4 d-flex justify-content-end align-items-end">
      <!-- Apply Button -->
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
  </div>
</div>
</html>

<?php 
    }
    ?>
    <!-- Back to user profile  -->
     <div class="container ">
        <div class="row justify-content-center">
            <div class="col-sm-3 d-grid">
    <a href="user_home.php?user_id=<?php echo $user_id?>" class="btn btn-secondary"> Go to Home
</a>
</div>
    </div>
    </div>
    <?php
    }

}
else{
    echo "No jobs";
}
}
else{
 
    echo "<meta http-equiv='refresh' content='0,url='login_user.php'/>";
}
?>
</body>
</html>