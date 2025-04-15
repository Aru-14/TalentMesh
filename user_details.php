<?php
session_start();
include("connect.php");


if(isset($_SESSION['UserEmail'])){
    $emailUser = $_SESSION['UserEmail'];
$query="SELECT * FROM user WHERE Email='$emailUser'";
$data = mysqli_query($conn,$query);
if ($data) {
$row = mysqli_fetch_assoc($data);
$FirstName =$row['FirstName'];
$LastName = $row['LastName'];
$Email = $row['Email'];
$City =$row['City'];
$State=$row['State'];
$Zip = $row['Zip'];
$LinkedIn=$row['LinkedIn'];
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
    <div class="container-fluid ">
        <div class="row justify-content-center ">
            <div class="col-sm-6 rounded shadow mt-5 p-5">
                <!-- Profile Picture Row -->
                <div class="row justify-content-center">
                    <div class="col-sm-3">
                        <img class="img-fluid" src="user.png" alt="profile_pic" class="img-fluid rounded-circle">
                    </div>
                </div>

                <!-- Name Row -->
                <div class="row justify-content-center">
                    <div class="col-sm-12 text-center" style="overflow-wrap: break-word;">
                        <?php echo "<h1 style='color:slateblue'>$FirstName $LastName</h1>"; ?>
                    </div>
                </div>

                <!-- Email Row -->
                <div class="row my-2">
                    <div class="col-sm-5 fw-bold" style="text-align: end;">Email:</div>
                    <div class="col-sm-7" style="overflow-wrap: break-word;">
                        <?php echo $Email; ?>
                    </div>
                </div>

                <!-- State Row -->
                <div class="row my-2">
                    <div class="col-sm-5 fw-bold" style="text-align: end;">State:</div>
                    <div class="col-sm-7" style="overflow-wrap: break-word;">
                        <?php echo $State; ?>
                    </div>
                </div>

                <!-- City Row -->
                <div class="row my-2">
                    <div class="col-sm-5 fw-bold" style="text-align: end;">City:</div>
                    <div class="col-sm-7" style="overflow-wrap: break-word;">
                        <?php echo $City; ?>
                    </div>
                </div>

                <!-- Zip Row -->
                <div class="row my-2">
                    <div class="col-sm-5 fw-bold" style="text-align: end;">Zip:</div>
                    <div class="col-sm-7" style="overflow-wrap: break-word;">
                        <?php echo $Zip; ?>
                    </div>
                </div>

                <!-- LinkedIn Row -->
                <div class="row my-2">
                    <div class="col-sm-5 fw-bold" style="text-align: end;">LinkedIn:</div>
                    <div class="col-sm-7 " style="overflow-wrap: break-word;">
                        <a href="<?php echo $LinkedIn; ?>" target="_blank" style='text-decoration:none;color: black;'>
                            <?php echo $LinkedIn ?>
                        </a>
                    </div>
                </div>
                
                <!-- Logout -->
                 <div class="row justify-content-center">
                    <div class="col-sm-7 d-grid my-3">
                        <a href="logout.php" class="btn shadow" style="background-color: slateblue;color: white;" role="button" data-bs-toggle="button">Logout</a>
                    </div>
                 </div> 
                <!-- Search jobs -->
                 <div class="row justify-content-center">
                    <div class="col-sm-7 d-grid my-3">
                        <a href="user_home.php?user_id=<?php echo $row['ID']?>" class="btn shadow" style="background-color: slateblue;color: white;" role="button" data-bs-toggle="button">Explore jobs</a>
                    </div>
                 </div>

                 <!-- See applications and status  -->

                 <div class="row justify-content-center">
                    <div class="col-sm-7 d-grid my-3">
                        <a href="user_status.php?user_id=<?php echo $row['ID']?>" class="btn shadow" style="background-color: slateblue;color: white;" role="button" data-bs-toggle="button">See Applications</a>
                    </div>
                 </div>

            </div>
        </div>
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
    header("location:login.php");
}
?>