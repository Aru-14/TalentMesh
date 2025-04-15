<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Company Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 shadow p-5 rounded mt-5 ">
        <h2 class="text-center mb-4 " style='color:slateblue;'>Employer Registration Form</h2>

        <form method="POST" enctype="multipart/form-data" autocomplete="off">

          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">First Name</label>
              <input type="text" class="form-control" name="FirstName" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Last Name</label>
              <input type="text" class="form-control" name="LastName" required>
            </div>
          </div>

          <div class="mt-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="Email" required>
          </div>

          <div class="mt-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="Password" id="password" required>
          </div>

          <div class="mt-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirmPassword" oninput="validatePassword()" required>
            <span class="text-danger" id="passError"></span>
          </div>
 
          <div class="mt-3">
            <label class="form-label">Contact Number</label>
            <input type="tel" class="form-control" name="Contact" pattern="[0-9]{10}" placeholder="10-digit mobile number" required>
          </div>

          <div class="mt-3">
        <label for="linkedin" class="form-label">LinkedIn Profile</label>
        <input type="url" class="form-control" name="linkedin" id="linkedin" required>
        </div>
          <div class="mt-3">
            <label class="form-label">Industry</label>
            <input type="text" class="form-control" name="Industry" required>
          </div>

          <div class="mt-3">
            <label class="form-label">Company</label>
            <input type="text" class="form-control" name="Company" required>
          </div>

          <div class="mt-3">
            <label class="form-label">GSTIN</label>
            <input type="text" class="form-control" name="GSTIN" required>
          </div>

          <div class="mt-3">
            <label class="form-label">About</label>
            <textarea class="form-control" name="About" rows="1" style="max-height: 23px;" placeholder="Tell us about your company..."  required></textarea>
          </div>

          <div class="mt-3">
            <label class="form-label">Official Email</label>
            <input type="email" class="form-control" name="OfficialMail" required>
            <?php $token = bin2hex(random_bytes(16));
            $created_at = date("Y-m-d H:i:s");
            ?>
          </div>
          
          <div class="d-grid mt-4">
            <button type="submit" class="btn" style="background-color: slateblue;color:white"name="submit">Register</button>
          </div>

        </form>
      </div>
    </div>
  </div>
  </div>
  <!-- Go to home  -->
        <div class="container">
        <div class='row justify-content-center mt-3 mb-3'>
        <div class='col-sm-4 d-grid'><a href='home.php' class='btn' style='background-color:slateblue;color:white;'>Go to home</a></div>
        </div>
        </div>
  <script>
    function validatePassword() {
      const pass = document.getElementById("password").value;
      const confirmPass = document.getElementById("confirmPassword").value;
      const error = document.getElementById("passError");

      if (pass !== confirmPass) {
        error.textContent = "Passwords do not match";
      } else {
        error.textContent = "";
      }
    }
  </script>

</body>
</html>

<?php
include("connect.php");
 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);



if(isset($_POST['submit'])){
  $fname=$_POST['FirstName'];
  $lname=$_POST['LastName'];
  $email=$_POST['Email'];
  $pass=$_POST['Password'];
  $hashedPass=password_hash($pass, PASSWORD_BCRYPT);
  $contact=$_POST['Contact'];
  $industry=$_POST['Industry'];
  $company =$_POST['Company'];
  $gstin=$_POST['GSTIN'];
  $about = $_POST['About'];
  $officialMail=$_POST['OfficialMail'];
  $linkedIn=$_POST['linkedin'];
  if($fname!="" &&  $lname!="" && $email!="" && $pass!="" && $contact!="" && $industry!="" && $company!="" &&  $gstin!="" && $about!="" && $officialMail!=""){ 
   
  

  $query = "INSERT INTO employer(	FirstName,	LastName,	Email,	Password,	Contact,LinkedIn,	Industry,	Company,	GSTIN,	About,	OfficialMail,token,token_created_at) VALUES(' $fname',' $lname','$email','$hashedPass','$contact','$linkedIn','$industry','$company','$gstin','$about','$officialMail','$token','$created_at')";
  $data="";
try{
$data = mysqli_query($conn,$query);}
catch (mysqli_sql_exception $e) {
  echo "MySQLi Error: " . $e->getMessage(); 
}
if($data){
echo "<meta http-equiv='refresh' content='0;url=verify_mail.php?token=$token&email=$officialMail'>";
}

}
else{
  echo "<script>alert('Fill all the fields');</script>";
}
}

?>