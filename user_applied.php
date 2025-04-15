<?php
session_start();
include('connect.php');
if(isset($_SESSION['email'])){
$job_id = $_GET['job_id'];

// Get applicants 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous" />
  <title>Document</title>
</head>

<body>
  <?php
 $query = "SELECT * FROM user 
           INNER JOIN
           application 
           ON user.ID = application.user_id
           WHERE application.job_id = '$job_id'";
$data = mysqli_query($conn,$query);


if($data){

    if($rows=mysqli_num_rows($data)>0){

while($row = mysqli_fetch_assoc($data)){
$fname=$row['FirstName'];
$lname=$row['LastName'];
$email = $row['Email'];
$skills = $row['Skills'];
$experience=$row['Experience'];
$edu = $row['Education'];
$resume =$row['Resume'];
$linkedin = $row['LinkedIn'];
?>

  <div class="card p-3 border-0 shadow mb-4 container">
    <div class="row">
      <div class="card-body col-sm-8 ">
        <h4 class="card-title " style="color:slateblue;">
          <?php echo $fname." ".$lname; ?>
        </h4>
        <p class="card-text"><strong>Email:</strong>
          <?php echo $email; ?>
        </p>
        <p class="card-text"><strong>Skills:</strong>
          <?php echo $skills; ?>
        </p>
        <p class="card-text"><strong>Experience:</strong>
          <?php echo $experience; ?>
        </p>
        <p class="card-text"><strong>Education:</strong>
          <?php echo $edu; ?>
        </p>
        <p class="card-text"><strong>Resume:</strong> <a href="<?php echo "Resumes/".$resume; ?>" style="color:slateblue;"
            target="_blank">View Resume</a></p>
        <p class="card-text"><strong>LinkedIn:</strong> <a href="<?php echo $linkedin; ?>" style="color:slateblue;"
            target="_blank">LinkedIn Profile</a></p>
      </div>

      <div class="col-sm-4 d-flex flex-wrap justify-content-between align-items-end mb-3">

        <!-- Accept Reject  -->

        <?php  if($row['status']=="accepted"){ ?>
        <button class="btn" style='background-color:slateblue;color:white;' disabled>Accepted</button>
        <?php }
        else{?>
        <a href="accept.php?user_id=<?php echo $row['ID']; ?>&job_id=<?php echo $job_id; ?>" class="btn"
          style='background-color:slateblue;color:white;'>Accept</a>
        <?php } ?>


        <?php   if($row['status']=="rejected"){ ?>
        <button class="btn" style='background-color:slateblue;color:white;' disabled>Rejected</button>
        <?php      }
        else{
          ?>
        <a href="reject.php?user_id=<?php echo $row['ID']; ?>&job_id=<?php echo $job_id; ?>" class="btn"
          style='background-color:slateblue;color:white;'>Reject</a>
        <?php } ?>

      </div>
    </div>
  </div>
  <?php
}
   ?>
  <!-- Back to Profile  -->
  <div class='row justify-content-center mt-5 mb-5'>
    <div class='col-sm-4 d-grid'><a href='employer_details.php' class='btn'
        style='background-color:slateblue;color:white;'>Back to profile</a></div>
  </div>
  <?php
}
else{
 ?>
  <!-- Error  -->

  <div class='container my-4'>
    <div class='card border-danger shadow text-danger'>
      <div class='card-body text-center'>
        <h5 class='card-title fw-bold'>No Applications Found</h5>
        <p class='card-text'>There are currently no job applications for this post.</p>
      </div>
    </div>
  </div>
  <!-- Back to Profile  -->
  <div class='row justify-content-center mt-5 mb-5'>
    <div class='col-sm-4 d-grid'><a href='employer_details.php' class='btn'
        style='background-color:slateblue;color:white;'>Back to profile</a></div>
  </div>
  <?php
  
}

}

else{
    echo mysqli_error($conn);
}
}
else{
    echo "<meta http-equiv='refresh' content='1,url=login_employer.php'>";
}
?>

      </div>
</body>

</html>