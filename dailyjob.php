<?php
    session_start();
    include('db_connect.php');

    $sql = "SELECT* FROM job WHERE category LIKE 'Daily'";
    $result = mysqli_query($conn, $sql);
    $i = 0;

    if(isset($_GET['job'])){
        $job = mysqli_real_escape_string($conn, $_GET['job']);
        $sqlj = "SELECT* FROM job WHERE category LIKE 'Daily' and job = '$job'";
        $resultj = mysqli_query($conn, $sqlj);
        $j = 0;
    }
    if(isset($_POST['submit'])){
        
        $search =   $_POST['search'];

        if($search != null){
            if(!mysqli_query($conn,"SELECT* FROM job WHERE category LIKE 'Daily' and 
            place LIKE '%$search%' or payment LIKE '$search' or time LIKE '$search' or user_id = $search")){
                $found = 0;
                echo("Error description: " . mysqli_error($conn));
            }
            else{
                $found = 1;
                $sqlsrh = "SELECT* FROM job WHERE category LIKE 'Daily' and user_id = '$search' or
                          place LIKE '%$search%' or payment LIKE '$search' or time LIKE '$search'";
                $resultsrh = mysqli_query($conn, $sqlsrh);
            }
            $k = 0;
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
    <title>Daily Job</title>
    
</head>
<body>
    <?php include('header.php') ?>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form class="form-inline  mb-3 mx-5" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="form-group mb-3">
                        <input type="text" class="form-control mr-sm-2" name="search" placeholder="Search">
                    </div>
                    <div class="form-group">
                        <input type="submit" class= "btn btn-success float-end" value= "Submit" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class = "container mt-5">
        <div class="row">
            <div class="col-xxl-12">
                <h1 class="text-center mb-5"style = "border-bottom: 1px solid #000000; padding-bottom:20px">Daily Job</h1>
            </div>
        </div>
        <div class="row mx-auto"style= "flex-wrap: unset">
            <div class="col-xxl-4" style = "width:15%">
                <ul class="list-group">
                    <li class="list-group-item active"><a href="dailyjob.php"style="text-decoration:none; color:#000000">Daily Jobs</a></li>
                    <li class="list-group-item"><a href="dailyjob.php?job=electrician"style="text-decoration:none; color:#000000">Electrician</a></li>
                    <li class="list-group-item"><a href="dailyjob.php?job=Technician"style="text-decoration:none; color:#000000">Technician</a></li>
                    <li class="list-group-item"><a href="dailyjob.php?job=Plumber"style="text-decoration:none; color:#000000">Plumber</a></li>
                    <li class="list-group-item"><a href="dailyjob.php?job=Others"style="text-decoration:none; color:#000000">Others</a></li>
                </ul>
            </div>
            <div class="col-xxl-4" >
                <table class = "table table-sm table-secondary table-hover">
                    <tr class= table-active>
                        <th>SL.</th>
                        <th>Post Id</th>
                        <th>User Id</th>
                        <th>Job</th>
                        <th>Places</th>
                        <th>Payment</th>
                        <th>Time</th>
                        <th>Details</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        if(isset($job)){
                            while($row = mysqli_fetch_assoc($resultj)){
                                $i++;
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['post_id']; ?></td>
                            <td><?php echo $row['user_id']; ?></td>
                            <td><?php echo $row['job']; ?></td>
                            <td><?php echo $row['place']; ?></td>
                            <td><?php echo $row['payment']; ?></td>
                            <td><?php echo $row['time']; ?></td>
                            <td><?php echo $row['des']; ?></td>
                            <td>
                             <div class="d-grid gap-2 d-md-block">
                                <a class="btn btn-info" href="post_info.php?id=<?php echo $row['post_id']?>">More Info</a>
                             </div>
                            </td>
                        </tr>
                    <?php
                            }
                        }
                        else if(isset($search)&& isset($found)){
                            while($row = mysqli_fetch_assoc($resultsrh)){
                                $i++; 
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['post_id']; ?></td>
                            <td><?php echo $row['user_id']; ?></td>
                            <td><?php echo $row['job']; ?></td>
                            <td><?php echo $row['place']; ?></td>
                            <td><?php echo $row['payment']; ?></td>
                            <td><?php echo $row['time']; ?></td>
                            <td><?php echo $row['des']; ?></td>
                            <td>
                             <div class="d-grid gap-2 d-md-block">
                                <a class="btn btn-info" href="post_info.php?id=<?php echo $row['post_id']?>">More Info</a>
                             </div>
                            </td>
                        </tr>
                    <?php
                            }
                        }
                        else{
                            while($row = mysqli_fetch_assoc($result)){
                                $i++;
                        
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['post_id']; ?></td>
                            <td><?php echo $row['user_id']; ?></td>
                            <td><?php echo $row['job']; ?></td>
                            <td><?php echo $row['place']; ?></td>
                            <td><?php echo $row['payment']; ?></td>
                            <td><?php echo $row['time']; ?></td>
                            <td><?php echo $row['des']; ?></td>
                            <td>
                             <div class="d-grid gap-2 d-md-block">
                                <a class="btn btn-info" href="post_info.php?id=<?php echo $row['post_id']?>">More Info</a>
                             </div>
                            </td>
                        </tr>
                    <?php
                            }
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <?php include('footer.php') ?>
</body>
</html>