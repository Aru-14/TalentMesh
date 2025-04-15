<?php
session_start();
include("connect.php");

if(isset($_POST['submit'])){
$email = $_POST['email'];
$password=$_POST['password'];

$query="SELECT * FROM user WHERE Email='$email'";
$data = mysqli_query($conn,$query);

if($data){
  if(mysqli_num_rows($data)>0){
  $row = mysqli_fetch_assoc($data);
 
  if(password_verify($password, $row['Password'])){
      $_SESSION['UserEmail'] = $email;
?>
   <meta http-equiv="refresh" content="0;url=user_details.php">
<?php
  }
  else{
    echo "wrong pass";
  }
}
else{
  ?>
  <!-- Error message  -->
  <div class="container mt-5">
      <div class="row justify-content-center">
          <div class="col-md-6">
              <div class="card border-danger shadow">
                  <div class="card-body text-center">
                      <h4 class="card-title text-danger fw-bold">Invalid Email</h4>
                      <p class="card-text text-muted">The Email you entered is incorrect or does not exist in our system. Please try again.</p>
                  
                  </div>
              </div>
          </div>
      </div>
  </div>
  
  <?php 
}
}
else{
?>
<!-- Error message  -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-danger shadow">
                <div class="card-body text-center">
                    <h4 class="card-title text-danger fw-bold">Invalid Email</h4>
                    <p class="card-text text-muted">The email you entered is incorrect or does not exist in our system. Please try again.</p>
                
                </div>
            </div>
        </div>
    </div>
</div>

<?php
}}
else{
  echo "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
      <h3 class="text-center mb-4" style="color:slateblue">Login ( Job Seeker)</h3>

      <form action="#" method="POST" autocomplete="off">
        
        <!-- Email -->
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="name@example.com" required>
          <label for="floatingEmail" >Email</label>
        </div>

        <!-- Password -->
        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
          <label for="floatingPassword">Password</label>
        </div>

        <!-- Submit Button -->
        <div class="d-grid">
          <button type="submit" class="btn " name="submit" style="background-color: slateblue;color:white">Login</button>
        </div>

       
        <div class="form-floating mb-3">
            <p class="text-center mt-2">Don't have an account? <a href="http://localhost/Project/user_registration.php" style="color: rgb(149, 4, 137)">Register</a></p>
          </div>
      </form>
    </div>
  </div>

  <!-- Go to home  -->

  <div class="row justify-content-center">
    <div class="col-sm-4 d-grid mb-3">
    <a href='home.php' class='btn' style='background-color:slateblue;color:white;'>Go to home</a>
    </div>
 
</div>
</body>
</html>

