<?php
    session_start();
    include('db_connect.php');

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        if(isset($_POST['job'])) {$job = $_POST['job'];}
        if(isset($_POST['place'])) {$place = $_POST['place']; $places = implode(', ',$place);}
        $payment = $_POST['payment'];
        $time = $_POST['time'];
        $des = $_POST['des'];
    
        $error = [];

        if(empty($id)){
            $error['id'] = 'Please write your id';
        }
        if(empty($job)){
            $error['job'] = 'Please select a Job';
        }
        if(empty($place)){
            $error['place'] = 'A place must be selected';
        }
        if(empty($payment)){
            $error['payment'] = 'Please write your payment';
        }
        if(empty($time)){
            $error['time'] = 'Please write your time';
        }
        if(empty($des)){
            $error['des'] = 'Please write your description';
        }
        
        if(count($error)==0){
            $check_id = $_SESSION['user_id'];
            if($id != $check_id){
                $match_id = "Id not Match";
            }
            else{
                $insert = "INSERT INTO job(user_id,job,place,payment,time,des,category) VALUES
                ('$id','$job','$places','$payment','$time','$des','Monthly')";

                if(mysqli_query($conn,$insert)){
                    header('Location: index.php');
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
    <title>Post Ad Monthly</title>
</head>
<body>
    <?php include('header.php') ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <h1 class="p-3  mx-5 text-center">Monthly Job</h1>
                    <div class="mb-3 mx-5">
                        <label>Id</label>
                        <input type="text" name= "id" class="form-control" placeholder="User Id"
                        value = "<?php if(isset($id)) {echo $id;} ?>">
                        <span>
                            <?php
                                if(isset($error['id'])){
                                    echo $error['id'];
                                }
                            ?>
                        </span>
                        <span>
                            <?php
                                if(isset($match_id)){
                                    echo $match_id;
                                }
                            ?>
                        </span>
                    </div> 
                    <div class="mb-3 mx-5">
                        <label>Job Category</label>
                        <br>
                        <input type="radio" name = "job" value= "Teacher"
                        <?php if(isset($job) && $job == 'Teacher') {echo 'checked';} ?>>Teacher<br>
                        <input type="radio" name = "job" value= "Data Collector"
                        <?php if(isset($job) && $job == 'Data Collector') {echo 'checked';} ?>>Data Collector <br>
                        <input type="radio" name = "job" value= "Account Manager"
                        <?php if(isset($job) && $job == 'Account Manager') {echo 'checked';} ?>>Account Manager <br>
                        <input type="radio" name = "job" value= "Others"
                        <?php if(isset($job) && $job == 'Others') {echo 'checked';} ?>>Others<br>
                        <span>
                            <?php
                                if(isset($error['job'])){
                                    echo $error['job'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="mb-3 mx-5">
                        <label>Work Place</label>
                        <br>
                        <input type="checkbox" name = "place[]" value= "Dhaka" 
                        <?php if(isset($place)){if(in_array('Dhaka',$place)){echo 'checked';}} ?>>Dhaka <br>
                        <input type="checkbox" name = "place[]" value= "Gazipur"
                        <?php if(isset($place)){if(in_array('Gazipur',$place)){echo 'checked';}} ?>>Gazipur <br>
                        <input type="checkbox" name = "place[]" value= "Savar"
                        <?php if(isset($place)){if(in_array('Savar',$place)){echo 'checked';}} ?>>Savar <br>
                        <input type="checkbox" name = "place[]" value= "Cumilla"
                        <?php if(isset($place)){if(in_array('Cumilla',$place)){echo 'checked';}} ?>>Cumilla <br>
                        <span>
                            <?php
                                if(isset($error['place'])){
                                    echo $error['place'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="mb-3 mx-5">
                        <label>Payment</label>
                        <input type="text" name= "payment" class="form-control"
                        value = "<?php if(isset($payment)) {echo $payment;} ?>">
                        <span>
                            <?php
                                if(isset($error['payment'])){
                                    echo $error['payment'];
                                }
                            ?>
                        </span>
                    </div> 
                    <div class="mb-3 mx-5">
                        <label>Time</label>
                        <textarea name="time" class="form-control" placeholder="1pm - 3pm , 4pm - 5:30pm"><?php
                            if(isset($time)) {echo $time;} 
                        ?></textarea>
                        <span>
                            <?php
                                if(isset($error['time'])){
                                    echo $error['time'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="mb-3 mx-5">
                        <label>Description</label>
                        <textarea name="des" class="form-control" placeholder="Write Short description about your service"><?php
                            if(isset($des)){echo $des;}
                         ?></textarea>
                         <span>
                            <?php
                                if(isset($error['des'])){
                                    echo $error['des'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="mb-5 mx-5">
                        <input type="submit" class= "btn btn-primary" value= "Submit" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include('footer.php') ?>
</body>
</html>