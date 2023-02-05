<?php
    
    session_start();
    include('db_connect.php');

    $login_id = $_SESSION['user_id'];
    

    if(isset ($_GET['id'])){
        $request_id = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT request_status.request_id,request_status.post_id,request_status.service_id,request_status.status,job.category,job.payment,users.user_name,job.job
            FROM request_status
            INNER JOIN job
            ON job.post_id = request_status.post_id
            INNER JOIN users 
            ON request_status.service_id = users.user_id
            WHERE request_status.user_id = '$login_id'";

        
        $result = mysqli_query($conn, $sql); 
        $details = mysqli_fetch_assoc($result);
    }
    

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
                            <div class="col-md-12"><label class="labels">Request Id</label><input type="text" class="form-control" placeholder="<?php echo $details['request_id'] ?>" readonly></div>
                            <div class="col-md-12"><label class="labels">Post Id</label><input type="text" class="form-control" placeholder="<?php echo $details['post_id'] ?>" readonly></div>
                            <div class="col-md-12"><label class="labels">Server user id</label><input type="text" class="form-control" placeholder="<?php echo $details['service_id'] ?>" readonly></div>
                            <div class="col-md-12"><label class="labels">Server User name</label><input type="text" class="form-control" placeholder="<?php echo $details['user_name'] ?>" readonly></div>
                            <div class="col-md-12"><label class="labels">Work</label><input type="text" class="form-control" placeholder="<?php echo $details['job'] ?>" readonly></div>
                            <div class="col-md-12"><label class="labels">Payment</label><input type="text" class="form-control" placeholder="<?php echo $details['payment'] ?>" readonly></div>
                            <div class="col-md-12"><label class="labels">Category</label><input type="text" class="form-control" placeholder="<?php echo $details['category'] ?>" readonly></div>
                            <div class="col-md-12"><label class="labels">Status</label><textarea cols="10" rows="4" class="form-control" placeholder="<?php echo $details['status'] ?>"></textarea></div>
                        </div>
                        
                        <div class="mt-5 text-center"><a class="btn btn-danger" href="dltmsg.php?id=<?php echo $details['request_id']?>">Cancel request</a></div>
                        
                    </div>
            </div>
        </div>
    </div>






    
    <?php include('footer.php') ?>
</body>
</html>