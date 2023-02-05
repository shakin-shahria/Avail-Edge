<?php
    session_start();
    include('db_connect.php');

    if(isset($_POST['login'])){
       $login_email = $_POST['login_email'];
       $login_pass = $_POST['login_pass'];
       
       $error = [];

       if(empty($login_email)){
        $error['login_email'] = "Please write your Email";
       }
       if(empty($login_pass)){
        $error['login_pass'] = "Please write your Password";
       }

        if(count($error)==0){
            $login_info = mysqli_query($conn, "SELECT* FROM users WHERE email = '$login_email'");

            if (mysqli_num_rows($login_info) > 0){
            
                $row = mysqli_fetch_assoc($login_info);

                if ($row['pass'] == $login_pass) 
                {
                    if ($row['active'] == 1) {  
                        $_SESSION['email'] = $login_email;
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['uname'] = $row['user_name'];
                        $_SESSION['age'] = $row['age'];
                        $_SESSION['address'] = $row['address'];
                        $_SESSION['gender'] = $row['gender'];
                        $_SESSION['phone'] = $row['phone'];
                        $_SESSION['nid'] = $row['nid'];
                        header('Location: index.php');
                    }
                    else
                    {
                    $Msg = " You have been blocked ";
                    echo '<div class="alert alert-danger">' . $Msg . '</div>';
                    }
                }
                else 
                {
                $pass_match = 'Password Incorrect';
                }
            } 

            else
            {
                $email_match = 'User not found';
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
    <title>Log in</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light fw-bold text-uppercase">
            <a class="navbar-brand" href="index.html"style = "color:#553939">
            <i class="fab fa-buysellads me-2 ps-3" style='font-size:32px'></i>
                Avail-Edge
            </a>
    </nav>
    <section >
    
        <div class="px-4 py-5 px-md-5 text-center text-lg-start" style= "background-color:#EEF2E6">
            <div class="container">
            <div class="row gx-lg-5 align-items-center" >
                <div class="col-lg-6 mb-5 mb-lg-0">
                <h1 class="my-5 display-3 fw-bold ls-tight text-secondary">
                    Avail Edge <br />
                    <span class="text-info">for your help</span>
                </h1>
                <p style="color: hsl(217, 10%, 50.8%)">
                    It's a service providing employment-oriented system. A platform
                    where you can post, request, and get right job for yourself. This platform makes professional
                    network easier than ever before. Our system is mainly focus on part time job, hiring job and
                    contractual job fields.
                </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="card">
                    <div class="card-body py-5 px-md-5">
                    <form action= "<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
                        <h3 class="fw-bold ls-tight">
                            LOG IN
                        </h3>
                        <br>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label>Email address</label>
                            <input type="email" name="login_email" class="form-control"
                            value = "<?php if(isset($login_email)){echo $login_email;}?>">
                            <span>
                                <?php if(isset($error['login_email']))
                                        {
                                            echo $error['login_email'];
                                        }
                                ?>
                            </span>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label>Password</label>
                            <input type="password" name= "login_pass" class="form-control"
                            value = "<?php if(isset($login_pass)){echo $login_pass;}?>">                          
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

                        <!-- Submit button -->
                        <div class="mb-3">
                            <input type="submit" name="login" value="Login" class="btn btn-primary">
                        </div>
                        <div>
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
        </div>
        
    </section>
    <br><br><br><br><br>
    <?php include('footer.php') ?>
</body>
</html>