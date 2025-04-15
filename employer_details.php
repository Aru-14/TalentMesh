<?php
session_start();
include("connect.php");

if (isset($_SESSION['email'])) {
    $emailEmployer = $_SESSION['email'];
    $query = "SELECT * FROM employer WHERE OfficialMail='$emailEmployer'";
    $data = mysqli_query($conn, $query);
    if ($data && mysqli_num_rows($data) === 1) {
        $row = mysqli_fetch_assoc($data);
        $FirstName = $row['FirstName'];
        $LastName = $row['LastName'];
        $LinkedIn = $row['LinkedIn'];
        $Company = $row['Company'];
        $OfficialMail = $row['OfficialMail'];
        $PersonalMail = $row['Email'];
        $GSTIN = $row['GSTIN'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Dashboard</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
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

                <!-- Official Mail Row -->
                <div class="row my-2">
                    <div class="col-sm-5 fw-bold" style="text-align: end;">Official Email:</div>
                    <div class="col-sm-7" style="overflow-wrap: break-word;">
                        <?php echo $OfficialMail; ?>
                    </div>
                </div>

                <!-- Personal Mail Row -->
                <div class="row my-2">
                    <div class="col-sm-5 fw-bold" style="text-align: end;">Personal Email:</div>
                    <div class="col-sm-7" style="overflow-wrap: break-word;">
                        <?php echo $PersonalMail; ?>
                    </div>
                </div>

                <!-- Company Row -->
                <div class="row my-2">
                    <div class="col-sm-5 fw-bold" style="text-align: end;">Company:</div>
                    <div class="col-sm-7" style="overflow-wrap: break-word;">
                        <?php echo $Company; ?>
                    </div>
                </div>

                <!-- GSTIN Row -->
                <div class="row my-2">
                    <div class="col-sm-5 fw-bold" style="text-align: end;">GSTIN:</div>
                    <div class="col-sm-7" style="overflow-wrap: break-word;">
                        <?php echo $GSTIN; ?>
                    </div>
                </div>

                <!-- LinkedIn Row -->
                <div class="row my-2">
                    <div class="col-sm-5 fw-bold" style="text-align: end;">LinkedIn:</div>
                    <div class="col-sm-7" style="overflow-wrap: break-word;">
                        <a href="<?php echo $LinkedIn; ?>" target="_blank" style='text-decoration:none;color: black;'>
                            <?php echo $LinkedIn ?>
                        </a>
                    </div>
                </div>

                <!-- Buttons for Actions -->
                <div class="row justify-content-center">
                    <div class="col-sm-12 d-grid my-3">
                        <a href="job_post.php?emp_id=<?php echo $row['ID']; ?>" class="btn mb-2" role="button" style="background-color:slateblue;color:white">Add Job Posting</a>
                        <a href="jobs_display.php?emp_id=<?php echo $row['ID'];?>" class="btn " style="background-color:slateblue;color:white" role="button">Check Your Job Posts</a>
                    </div>
                </div>

                <!-- Logout -->
                <div class="row justify-content-center">
                    <div class="col-sm-7 d-grid my-3">
                        <a href="logout.php" class="btn" style="background-color:slateblue;color:white" role="button">Logout</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>

<?php
 
    } else {
        echo "No employer found";
    }
} else {
    echo "<meta http-equiv='refresh' content='0;url=login_employer.php'>";
}
?>
