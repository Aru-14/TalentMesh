<?php
include('connect.php');
$expiry_time = 10; //in minutes
$token=$_GET['token'];

$query = "SELECT * FROM employer WHERE token='$token' AND is_verified=0";
$data = mysqli_query($conn, $query);
if (mysqli_num_rows($data) > 0) {
    $row=mysqli_fetch_assoc($data);
    $token_time = strtotime($row['token_created_at']);
    $current_time = time();
    if($current_time-$token_time<=($expiry_time*60)){
       $update_status = "UPDATE employer SET is_verified=1, token='', token_created_at=NULL WHERE token='$token'";
       if(mysqli_query($conn, $update_status)){
        echo "Email verified successfully!";
        #head to login page
        echo "redirecting to login...";
        echo "<meta http-equiv='refresh' content='4;url=http://localhost/Project/login_employer.php'>";
       }

    }
    else {
        echo "Token expired. Please register again. Redirecting....";
        echo "<meta http-equiv='refresh' content='4;url=http://localhost/Project/employer_registration.php'>";
    }
}
else {
    echo "Invalid token register again.";
    #if not updated go back to registration
    echo "<meta http-equiv='refresh' content='0;url=http://localhost/Project/employer_registration.php'>";
}

?>