<?php
    session_start();
    include('db_connect.php');

    $login_user = $_SESSION['user_id'];

    if(isset($_GET['id'])){
        $post_id = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT post_id,user_id from job where post_id = $post_id";

        
        $result = mysqli_query($conn, $sql); 
        $details = mysqli_fetch_assoc($result);

        $service_id = $details['user_id'];

        if($service_id == $login_user){
            $fail_msg1 = "Cannot Sent Request to yourself";
        }
        else{
            $check = mysqli_query($conn, "SELECT *FROM request_status where user_id = '$login_user' and post_id = '$post_id'");
            $check_count = mysqli_num_rows($check);
            if($check_count != 0){
                $fail_msg2 = "Request Already Sent!!! Wait for the user to accept your request";
            }
            else{
                $insert = "INSERT INTO request_status (post_id,user_id,service_id,status) VALUES
                            ('$post_id','$login_user','$service_id','pending')";
                if(mysqli_query($conn, $insert)){
                    $success_msg = "Request Sent Successfully!!! Wait for the user to accept your request";
                }
            }
        }
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
    <title>Request Message</title>
</head>
<body>
    <?php include('header.php') ?>
    <br><br>
    <?php if(isset($success_msg)){ ?>
        <div class="alert alert-success mx-5" role="alert">
            <h4 class="alert-heading"><?php echo $success_msg ?></h4>            
        </div>
    <?php }?>
    <?php if(isset($fail_msg1)){ ?>
        <div class="alert alert-danger mx-5" role="alert">
            <h4 class="alert-heading"><?php echo $fail_msg1 ?></h4>           
        </div>
    <?php }?>
    <?php if(isset($fail_msg2)){ ?>
        <div class="alert alert-warning mx-5" role="alert">
            <h4 class="alert-heading"><?php echo $fail_msg2 ?></h4>
        </div>
    <?php }?>
</body>
</html>