<?php

    include('db_connect.php');

    if(isset ($_POST['submit'])){
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        if(isset($_POST['gender'])){$gender = $_POST['gender'];}
        $phone = $_POST['phone'];
        $nid = $_POST['nid'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
    

        $error = [];

        if(empty($uname)){
            $error['uname'] = 'please write your Name';
        }
        if(empty($email)){
            $error['email'] = 'please write your Email';
        }
        if(empty($age)){
            $error['age'] = 'please write your age';
        }
        if(empty($address)){
            $error['address'] = 'please write your Address';
        }
        if(empty($gender)){
            $error['gender'] = 'please select your Gender';
        }
        if(empty($phone)){
            $error['phone'] = 'please write your Phone Number';
        }
        if(empty($nid)){
            $error['nid'] = 'please write your NID';
        }
        if(empty($pass)){
            $error['pass'] = 'please set a Password';
        }
        if(empty($cpass)){
            $error['cpass'] = 'please confirm your Password';
        }

        if(count($error) == 0){
            $check_email = mysqli_query($conn, "SELECT *FROM users where email = '$email' ");
            $email_count = mysqli_num_rows($check_email);
            if($email_count != 0){
                $email_match = 'Email Already Exist';
            }
            else{
                if($pass == $cpass){
                    $insert = "INSERT INTO users (user_name,email,age,address,gender,phone,nid,pass) VALUES
                    ('$uname', '$email', '$age' , '$address', '$gender', '$phone', '$nid', '$pass')";

                    
                    if(mysqli_query($conn, $insert)){
                        header('Location: login.php');
                    }
                    else{
                        echo 'Query Error: '. mysqli_query($conn);
                    }
                }else{
                    $pass_match = 'Password Not Match';
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
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light fw-bold text-uppercase">
            <a class="navbar-brand" href="index.html"style = "color:#553939">
                <i class="fab fa-buysellads me-2 ps-5" style='font-size:32px'></i>
                Avail-Edge
            </a>
    </nav>
    <div class="container" >
        <div class="row">
            <div class = "col-md-6 mx-auto"> 
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
                    <h1 class="p-3  mx-5 text-center"><a style="text-decoration:none" class= "text-secondary"href="index.html">Avail Edge</a></h1> 
                    <h4 class="p-3 mb-3 mx-5 text-black text-center">Registration</h4>
                    <div class="mb-3 mx-5">
                        <label>User Name</label>
                        <input type="text" name= "uname" class= "form-control"
                        value = "<?php if(isset($uname)) {echo $uname;} ?>">
                        <span>
                            <?php
                                if(isset($error['uname'])){
                                    echo $error['uname'];
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
                    <div class= "mb-3 mx-5">
                        <label>Age</label>
                        <input type="number" name = "age" class = "form-control"
                        value = "<?php if(isset($age)){echo $age;} ?>">
                        <span>
                            <?php
                                if(isset($error['age'])){
                                    echo $error['age'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="mb-3 mx-5">
                        <label>Address</label>
                        <textarea name="address" class= "form-control"><?php
                            if(isset($address)){echo $address;} 
                        ?></textarea>
                        <span>
                            <?php
                                if(isset($error['address'])){
                                    echo $error['address'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="mb-3 mx-5">
                        <label>Gender</label>
                        <br>
                        <input type="radio" name= "gender" value= "Male"
                        <?php if(isset($gender) && $gender == 'Male'){echo 'checked';} ?>> Male
                        <input type="radio" name= "gender" value= "Female"
                        <?php if(isset($gender) && $gender == 'Female'){echo 'checked';} ?>> Female
                        <br>
                        <span>
                            <?php
                                if(isset($error['gender'])){
                                    echo $error['gender'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="mb-3 mx-5">
                        <label>Enter your phone number</label>
                        <input type="text" name= "phone" class= "form-control"
                        value = "<?php if(isset($phone)) {echo $phone;} ?>">
                        <span>
                            <?php
                                if(isset($error['phone'])){
                                    echo $error['phone'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="mb-3 mx-5">
                        <label>NID</label>
                        <input type="text" name= "nid" class= "form-control"
                        value = "<?php if(isset($nid)) {echo $nid;} ?>">
                        <span>
                            <?php
                                if(isset($error['nid'])){
                                    echo $error['nid'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="mb-3 mx-5">
                        <label>Password</label>
                        <input type="password" name= "pass" class= "form-control"
                        value = "<?php if(isset($pass)) {echo $pass;} ?>">
                        <span>
                            <?php
                                if(isset($error['pass'])){
                                    echo $error['pass'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="mb-4 mx-5">
                        <label>Confirm Password</label>
                        <input type="password" name= "cpass" class= "form-control"
                        value = "<?php if(isset($cpass)) {echo $cpass;} ?>">
                        <span>
                            <?php
                                if(isset($error['cpass'])){
                                    echo $error['cpass'];
                                }
                            ?>
                        </span>
                        <span>
                            <?php
                                if(isset($pass_match)){
                                    echo $pass_match;
                                }
                            ?>
                        </span>
                    </div>
                    <div class="mb-5 mx-5">
                        <input type="submit" class= "btn btn-primary" value= "Registration" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include('footer.php') ?>
</body>

</html>