<?php
    session_start(); 
    include 'db_connect.php'; 

    if(isset ($_GET['id'])){
        $request_id = mysqli_real_escape_string($conn, $_GET['id']);
        
        $sql1 = "SELECT status FROM request_status where request_id = '$request_id'";
        $result1 = mysqli_query($conn, $sql1);
        $status = mysqli_fetch_assoc($result1);
        $sts = $status['status'];
        

        if($sts == "pending"){
            $sts_msg = "Work Status is not accepted yet!!!";
        }

        $sql2 = "SELECT * from users where user_id =  (SELECT service_id from request_status where request_id = '$request_id' )";
        $result2 = mysqli_query($conn, $sql2);
        $details = mysqli_fetch_assoc($result2); 
        
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
    <title>Service Contact</title>
</head>
<body>
    <?php include('header.php') ?>
    <br><br>
    <?php
        if(isset($sts_msg)){ ?>
            <div class="alert alert-warning px-5" role="alert">
                <h3> Work Status is not accepted yet!!! </h3>
            </div>
    <?php } 
        else{ ?>
                <div class="container rounded bg-white mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-5 mx-auto">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h3 class="text-right">Service Contact Info</h3>
                                    </div>
                                    
                                    <div class="row mt-3">
                                        <div class="col-md-12"><label class="labels">Service User Id</label><input type="text" class="form-control" placeholder="<?php echo $details['user_id'] ?>" readonly></div>
                                        <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" placeholder="<?php echo $details['user_name'] ?>" readonly></div>
                                        <div class="col-md-12"><label class="labels">Address</label><textarea cols="10" rows="4" class="form-control" placeholder="<?php echo $details['address'] ?>"></textarea></div>
                                        <div class="col-md-12"><label class="labels">phone</label><input type="text" class="form-control" placeholder="<?php echo $details['phone'] ?>" readonly></div>
                                        
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
    <?php } ?>




    
    <?php include('footer.php') ?>
</body>
</html>