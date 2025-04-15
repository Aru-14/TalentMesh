<?php 
include("connect.php");

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
  <div class="container " >
    <div class="row justify-content-center">
     
      <div class="col-md-8  p-4 rounded text-primary-emphasis mt-5 shadow p-3 mb-5 rounded">
        <h1 class="text-center mt-0 mb-5" style="color: slateblue;">Job Seeker Registration</h1>

        <form method="POST" enctype="multipart/form-data" autocomplete="off">
  
          <div class="row g-3 mb-3">
            <div class="col">
              <input type="text" class="form-control" placeholder="First Name" name="fname" required />
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Last Name" name="lname" required />
            </div>
          </div>
  
          <div class="mb-3">
            <label class="form-label">Date of Birth</label>
            <input type="date" class="form-control" name="dob" required />
          </div>
  
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" required />
          </div>
  
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" id="pass" name="pass" required />
          </div>
  
          <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="cpass" name="cpass" oninput="validatePass()" required />
            <span class="text-danger" id="error"></span>
          </div>
  
          <div class="mb-3">
            <label class="form-label">Education</label>
            <select class="form-select" name="edu" required>
              <option value="">Select Education</option>
              <option value="Graduate">Graduate</option>
              <option value="Undergraduate">Undergraduate</option>
              <option value="PostGraduate">PostGraduate</option>
            </select>
          </div>
  
          <div class="mb-3">
            <label class="form-label">Gender</label><br />
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="Gender" value="Male" required />
              <label class="form-check-label">Male</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="Gender" value="Female" />
              <label class="form-check-label">Female</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="Gender" value="Other" />
              <label class="form-check-label">Other</label>
            </div>
          </div>
          
          <div class="mb-3">
            <label class="form-label">State</label>
            <input type="text" class="form-control" name="state" required />
          </div>

          <div class="mb-3">
            <label class="form-label">City</label>
            <input type="text" class="form-control" name="city" required />
          </div>
  
          <div class="mb-3">
            <label class="form-label">Zip</label>
            <input type="text" class="form-control" name="zip" required />
          </div>
  
  
          <div class="mb-3">
            <label class="form-label">Upload Resume (PDF Only)</label>
            <input class="form-control" type="file" name="resume" accept=".pdf" required />
          </div>
  
         
          
         <div class="mb-3">
          <label class="form-label" for="experience">Experience in years (if any)</label>
          <input type="number" class="form-control" id="experience" name="experience">
         </div> 

         <div class="form-floating mb-3">
          <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="max-height: 34px;" name="skills"></textarea>
          <label for="floatingTextarea">Skills</label>
        </div>
        
        <div class="mb-3">
        <label for="linkedin" class="form-label">LinkedIn Profile</label>
        <input type="url" class="form-control" name="linkedin" id="linkedin" required>
        </div>

         <div class="d-grid">
          <button type="submit" name="submit" class="btn " style="background-color: slateblue;color:white">Submit</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
<!-- Go to home  -->
<div class="container">
        <div class='row justify-content-center mt-3 mb-3'>
        <div class='col-sm-4 d-grid'><a href='home.php' class='btn' style='background-color:slateblue;color:white;'>Go to home</a></div>
        </div>
        </div>
  <!-- JAVASCRIPT  -->
  <script>
    function validatePass() {
      const pass = document.getElementById('pass').value;
      const cpass = document.getElementById("cpass").value;
      const error = document.getElementById("error");

      if (pass != cpass) {
        error.textContent = "Passwords don't match";

      }
      else { error.textContent = ""; }

    }
  </script>
</body>

</html>

<?php 




$resume="";
if(isset($_FILES["resume"])){

  $fileName = basename($_FILES["resume"]["name"]);
  $uniqueName = uniqid() . "_" . $fileName;
  
  // Escape the unique name for safe DB insertion
  $resume = mysqli_real_escape_string($conn, $uniqueName);
  
  // Temporary file path
  $tempName = $_FILES["resume"]["tmp_name"];
  
  // Final destination folder
  $folder = "Resumes/".$resume;
  
  move_uploaded_file($tempName,$folder);

}
#Sending the data
if(isset($_POST['submit']))
{
$fname =$_POST['fname'];
$lname =$_POST['lname'];
$email=$_POST['email'];
$plainPass = $_POST['pass']; 
$hashedPass = password_hash($plainPass, PASSWORD_DEFAULT);
$skills=$_POST['skills'];
$dob = $_POST['dob'];
$gender = $_POST['Gender'];
$city = $_POST['city'];
$experience=$_POST['experience'];
$zip =$_POST['zip'];
$state =$_POST['state'];
$linkedIn=$_POST['linkedin'];
$edu= $_POST['edu'];
#validation
if($fname!="" && $lname!="" && $email!="" && $dob!="" && $gender!="" && $city!="" && $state!="" && $zip!="" && $fileName!="" && $edu!=""&& $linkedIn!="" && $skills!=""){
$query = "INSERT INTO user (FirstName, LastName,DOB, Email,Password,Education,Gender,  State, City,Zip, Resume, Experience,Skills,LinkedIn) 
              VALUES ('$fname', '$lname', '$dob', '$email','$hashedPass','$edu', '$gender' , '$state','$city', '$zip', '$resume', '$experience','$skills','$linkedIn')";
			  
			  
			  

$data = mysqli_query($conn,$query);

if($data){
	echo "Data inserted. Redirecting to login..";
  echo "<meta http-equiv='refresh' content='0,url=login_user.php'/>";
  
}
else{
	echo "Data not inserted".mysqli_error($conn);
}
}
else{
	echo "Enter entire data";
}
}


else{
	echo "Not submitted";
}


?>