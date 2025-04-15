<?php

$user_id=$_GET['user_id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title>Home</title>
</head>

<body>
    <div class="container-fluid">
        <form action="search.php?" method="GET">
            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <div class="row">

                        <div class="col-sm-10 mt-5 d-flex justify-content-end">
                            <input type="text" class="form-control shadow border-0" name="search"
                                placeholder="e.g. Backend Developer">
                        </div>
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        <div class="col-sm-2 mt-5">
                            <button type="submit" class="btn shadow" name="submit" value="search"
                                style="background-color:slateblue;color:white;">Search</button>
                        </div>
                    </div>
                </div>
            </div>
           
        </form>
    </div>
</body>

</html>

<?php
include('jobs_for_users.php');
?>