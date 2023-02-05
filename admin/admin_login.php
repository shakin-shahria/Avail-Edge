<?php
    session_start();
    include('C:\xampp\htdocs\DBMSProject\db_connect.php');

    if(isset($_POST['login'])){
        $login_email = $_POST['login_email'];
        $login_pass = $_POST['login_pass'];

        $error = [];
        
        if(empty($login_email)){
            $error['login_email'] = "Please Write your email";
        }
        if(empty($login_pass)){
            $error['login_pass'] = "Please Write your password";
        }

        if(count($error) == 0){
            $login_info = mysqli_query($conn, "SELECT* FROM admin_user WHERE email = '$login_email'");
            if(mysqli_num_rows($login_info) > 0)
            {
                $row = mysqli_fetch_assoc($login_info);
                if($row['password'] == $login_pass){
                    $_SESSION['email'] = $login_email;
                    $_SESSION['admin_id'] = $row['admin_id'];
                    $_SESSION['name'] = $row['name'];
                    header('Location: admin_index.php');
                }
                else{
                    $pass_match = 'Password Incorrect';
                }
            }
            else
            {
            $email_match =  'User not found';
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
    <link rel = "stylesheet" href = "../assets/css/bootstrap.min.css">
    
    <title>Document</title>
</head>
<body style = "background-color:#c1efde">
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-white text-dark" style="border-radius: 1rem; ">
                        <div class="card-body p-2 text-center">
                            <form action= "<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
                                <div class="mb-md-5 mt-md-4 pb-5">
                                    <h2 class="fw-bold mb-2 text-uppercase">Admin</h2>
                                    <h4 class="fw-bold mb-2 text-uppercase">Login</h4>
                                    <p class="text-dark-50 mb-5">Please enter your login and password!</p>
                                        
                                    <div class="form-outline form-dark mb-4">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control form-control-lg" name="login_email"
                                        value = "<?php if(isset($login_email)){echo $login_email;}?>"/>
                                        <span>
                                            <?php if(isset($error['login_email']))
                                                {
                                                    echo $error['login_email'];
                                                }
                                            ?>
                                        </span>
                                    </div>

                                    <div class="form-outline form-dark mb-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="login_pass" class="form-control form-control-lg" 
                                        value = "<?php if(isset($login_pass)){echo $login_pass;}?>"/>
                                        <span>
                                            <?php if(isset($error['login_pass']))
                                                {
                                                    echo $error['login_pass'];
                                                }
                                            ?>
                                            <?php if(isset($pass_match))
                                                {
                                                    echo $pass_match;
                                                }
                                            ?>
                                        </span>
                                    </div>

                                    <br>
                                    <input class="btn btn-outline-dark btn-lg px-5" name="login" type="submit" value ="Log in">
                                    <br><br><br>
                                    <span>
                                        <?php
                                            if(isset($email_match)){
                                                echo $email_match;
                                            }
                                        ?>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>