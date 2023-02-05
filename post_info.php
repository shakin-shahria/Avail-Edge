<?php
    
    session_start();
    include('db_connect.php');

    if(isset ($_GET['id'])){
        $post_id = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT * FROM job 
                INNER JOIN users
                ON job.user_id = users.user_id
                WHERE job.post_id = $post_id";

        
        $result = mysqli_query($conn, $sql); 
        $details = mysqli_fetch_assoc($result);
    }
    $post_id = $details['post_id'];
    $service_id = $details['user_id'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "assets/css/bootstrap.min.css">
    <link rel = "stylesheet" href = "assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>More Info</title>
</head>
<body>
    <?php include('header.php') ?>
    <br><br>
    <h1 class="text-center mb-5">Post Information</h1>
    
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-5 mx-auto">
                
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="text-right">Hourly Job</h3>
                        </div>
                        
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Post Id</label><input type="text" class="form-control" placeholder="<?php echo $details['post_id'] ?>" readonly></div>
                            <div class="col-md-12"><label class="labels">User Id</label><input type="text" class="form-control" placeholder="<?php echo $details['user_id'] ?>" readonly></div>
                            <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" placeholder="<?php echo $details['user_name'] ?>" readonly></div>
                            <div class="col-md-12"><label class="labels">Job title</label><input type="text" class="form-control" placeholder="<?php echo $details['job'] ?>" readonly></div>
                            <div class="col-md-12"><label class="labels">Area</label><input type="text" class="form-control" placeholder="<?php echo $details['place'] ?>" readonly></div>
                            <div class="col-md-12"><label class="labels">Payment</label><input type="text" class="form-control" placeholder="<?php echo $details['payment'] ?>" readonly></div>
                            <div class="col-md-12"><label class="labels">Time</label><input type="text" class="form-control" placeholder="<?php echo $details['time'] ?>" readonly></div>
                            <div class="col-md-12"><label class="labels">Description</label><textarea cols="10" rows="4" class="form-control" placeholder="<?php echo $details['des'] ?>"></textarea></div>
                        </div>
                        
                        <div class="mt-5 text-center"><a class="btn btn-success" href="requestmsg.php?id=<?php echo $post_id?>">Sent request</a></div>
                        
                    </div>
            </div>
        </div>
    </div>

  
    <?php include('footer.php') ?>
</body>
</html>