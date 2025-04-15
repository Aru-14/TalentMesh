<?php
session_start();
include("connect.php");

if(isset($_POST['submit'])){
$OfficialEmail = $_POST['email'];
echo $OfficialEmail;
$password=$_POST['password'];

$query="SELECT Password FROM employer WHERE OfficialMail='$OfficialEmail'";
$check_verified="SELECT is_verified FROM employer WHERE OfficialMail='$OfficialEmail'";
$data = mysqli_query($conn,$query);
$data_verified=mysqli_query($conn,$check_verified);
$row_verified = mysqli_fetch_assoc($data_verified);

if($data && mysqli_num_rows($data) === 1 && $row_verified['is_verified']==1){
  $row = mysqli_fetch_assoc($data);
  echo $row['Password'];
  echo $password;
  if(password_verify($password, $row['Password'])){
      $_SESSION['email'] = $OfficialEmail;
     
?>
<meta http-equiv="refresh" content="0;url=employer_details.php" />
<?php
  }
  else{
    echo "wrong password";
  }
}
else{
  ?>
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
}
}
else{
  echo "";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Login Form</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
  </head>

  <body class="bg-light">
    <div
      class="container d-flex justify-content-center align-items-center"
      style="min-height: 100vh"
    >
      <div class="card shadow p-4" style="width: 100%; max-width: 400px">
        <h3 class="text-center mb-4" style="color: slateblue">Login (Employer)</h3>
        <form action="#" method="POST" autocomplete="off">
          <!-- Email -->
          <div class=" mb-3">
            <input
              type="email"
              class="form-control"
              id="floatingEmail"
              name="email"
             placeholder="Enter Official mail"
              required
            />
           
          </div>

          <!-- Password -->
          <div class="form-floating mb-3">
            <input
              type="password"
              class="form-control"
              id="floatingPassword"
              name="password"
              placeholder="Password"
              required
            />
            <label for="floatingPassword">Password</label>
          </div>

          <!-- Submit Button -->
          <div class="d-grid">
            <button
              type="submit"
              class="btn "
              name="submit"
              style="background-color: slateblue;color:white"
            >
              Login
            </button>
          </div>
          <div class="form-floating mb-3">
            <p class="text-center mt-2">Don't have an account? <a href="http://localhost/Project/employer_registration.php" style="color: rgb(149, 4, 137)">Register</a></p>
          </div>
         


        </form>
      </div>
    </div>

    <!-- Go to Home -->
   
  <div class="row justify-content-center">
    <div class="col-sm-4 d-grid mb-3">
    <a href='home.php' class='btn' style='background-color:slateblue;color:white;'>Go to Home</a>
    </div>
 
</div>
  </body>
</html>
