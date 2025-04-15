<?php
session_start();
include("connect.php");

if(isset($_SESSION['email'])){
$job_id = $_GET['job_id'];
$user_id = $_GET['user_id'];

#update application status
$query_user = "UPDATE application SET status='accepted' WHERE job_id = '$job_id' AND user_id = '$user_id'";

$data_user = mysqli_query($conn,$query_user);
if($data_user){
echo "";
}
else{
    echo mysqli_error($conn);
}


// Sending message 
$query = "SELECT Email FROM user WHERE ID='$user_id'";
$data =mysqli_query($conn,$query);
if($data){
    if(mysqli_num_rows($data)>0){
    $row=mysqli_fetch_assoc($data);
    ?>
        <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>Your Job Posts</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
    </head>
    <body>
<form action='sent.php' method="GET">
 <div class="container">
    <div class="row">
        <div class="col-sm-10">
            <input type="text" placeholder="Type message to send" class="form-control" name="message" required>
            <input type="hidden" name="user_email" value="<?php echo $row['Email']; ?>">
            <input type="hidden" name="emp_email" value="<?php echo $_SESSION['email']; ?>">
            <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
        </div>
        <div class="col-sm-2">
            <button type="submit" class="btn" style='background-color:slateblue;color:white;'>Send</button>
        </div>
    </div>
    </div>
    </form>

    <!-- Back to Applications  -->
    <div class="row justify-content-center">
        <div class="d-grid col-sm-3">
            <div class='row justify-content-center'>
                <div class='col-sm-4 mt-5'>
                    <a href='user_applied.php?job_id=<?php echo $job_id; ?>' class='btn' style='background-color:slateblue;color:white;'>Back to Applications</a></div>
            </div>
        </div>

    </div>
    
    </body>
    </html>
  
    <?php
    }
    else{
        echo "No user found";
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