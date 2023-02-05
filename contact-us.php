<?php
     error_reporting(0);
    include('db_connect.php');


if (isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $error = [];

    if (empty($user_id)) {
        $error['user_id'] = 'please write your id';
    }

    if (empty($user_name)) {
        $error['user_name'] = 'please write your Name';
    }
    if (empty($email)) {
        $error['email'] = 'please write your Email';
    }

    if (empty($message)) {
        $error['message'] = 'please write your message';
    }


            $insert = "INSERT INTO contact_us (user_id,user_name,email,message) VALUES
                    ('$user_id','$user_name', '$email',  '$message')";


        if (mysqli_query($conn, $insert)) {
            $Msg = " Your Message Has Been Sent ";
            echo '<div class="alert alert-success">' . $Msg . '</div>';
        } else {
            $Msg = " Please Fill in the Blanks ";
            echo '<div class="alert alert-danger">' . $Msg . '</div>';
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
    <title>Contact-us</title>
</head>
<body>
    <?php include('header.php') ?>
    <div class="container" >
        <div class="row">
            <div class = "col-md-6 mx-auto"> 
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
                    <h1 class="p-3  mx-5 text-center"><a style="text-decoration:none" class= "text-secondary"href="index.html">Avail Edge</a></h1> 
                    <h4 class="p-3 mb-3 mx-5 text-black text-center">Contact-us</h4>
                   
                   



                    
                    <div class="mb-3 mx-5">
                        <label>User_id</label>
                        <input type="text" name= "user_id" class= "form-control"
                        value = "<?php if(isset($user_id)) {echo $user_id;} ?>">
                        <span>
                            <?php
                                if(isset($error['user_id'])){
                                    echo $error['user_id'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="mb-3 mx-5">
                        <label>User Name</label>
                        <input type="text" name= "user_name" class= "form-control"
                        value = "<?php if(isset($user_name)) {echo $user_name;} ?>">
                        <span>
                            <?php
                                if(isset($error['user_name'])){
                                    echo $error['user_name'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="mb-3 mx-5">
                        <label>Email</label>
                        <input type="email" name= "email" class= "form-control"
                        value = "<?php if(isset($email)) {echo $email;} ?>">
                        <span>
                            <?php
                                if(isset($error['email'])){
                                    echo $error['email'];
                                }
                            ?>
                        </span>
                        <span>
                            <?php
                                if(isset($email_match)){
                                    echo $email_match;
                                }
                            ?>
                        </span>
                    </div>

                    <div class="mb-3 mx-5">
                        <label>Message</label>
                        <input type="text" name= "message" class= "form-control"
                        value = "<?php if(isset($message)) {echo $message;} ?>">
                        <span>
                            <?php
                                if(isset($error['message'])){
                                    echo $error['message'];
                                }
                            ?>
                        </span>
                   
                   
                    
                   
                    
                    <div class="mb-5 mx-5">
                        <input type="submit" class= "btn btn-primary" value= "submit" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include('footer.php') ?>
</body>

</html>