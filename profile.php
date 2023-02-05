<?php

  session_start(); 
  include 'db_connect.php'; 
  if (!isset($_SESSION['email'])) 
  {

      header('location:login.php');


  }
  /* session variable */
  $umail = $_SESSION['email'];

  $login_id = $_SESSION['user_id'];
  $sql1 = "SELECT request_status.request_id,request_status.post_id,request_status.user_id,users.user_name,users.address,request_status.status
          FROM request_status
          INNER JOIN users
          ON request_status.user_id = users.user_id
          WHERE request_status.service_id = $login_id";
  $request_gain = mysqli_query($conn, $sql1);
  $i = 0;

  $sql2 = "SELECT request_status.request_id,request_status.post_id,request_status.service_id,request_status.status,job.category,job.payment,users.user_name,job.job
            FROM request_status
            INNER JOIN job
            ON job.post_id = request_status.post_id
            INNER JOIN users 
            ON request_status.service_id = users.user_id
            WHERE request_status.user_id = '$login_id' ";
  $request_sent = mysqli_query($conn, $sql2);
  $j = 0;

  if(isset($_POST["unsent"])){
    
    echo $_POST["unsent"] ;
    
  }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>

 <!--navbar starts -->
 <nav class="navbar navbar-expand-lg sticky-top " style = "background-color:#009d63">
        <div class="container">
          <a class="navbar-brand fw-bold text-uppercase"style = "color:#553939" href="index.php">
             <i class="fab fa-buysellads me-2 ps-5" style='font-size:32px'></i>
            Avail Edge
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              




              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class = "nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle second-text fw-bold" id="navbarDropdown"
                               role="button" data-bs-toggle= "dropdown" aria-expanded= "false">
                               <i class="fas fa-user me-2"></i><?php echo $_SESSION['email'] ?>
                            </a>
                            <ul class = "dropdown-menu" aria-labelledby ="navbarDropdown">
                                <li><a href="profile.php" class="dropdown-item">Profile</a></li>
                                <li><a href="login.php" class="dropdown-item">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </ul>
            
          </div>
        </div>
    </nav>
    <!--navbar ends-->



  
<!--profile-->
                    <?php
                       /* session variable */
                       $umail = $_SESSION['email'];
                       /* Query */
                       $query = mysqli_query($conn, "SELECT * FROM users  WHERE email = '$umail' ");

                       while ($row = mysqli_fetch_array($query)) {
                     ?>

 
<br><br>
    <h1 class="text-center mb-5">Profile Information</h1>
    
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-5 mx-auto">
                
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            
                        </div>
                        
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">User Id</label><input type="text" class="form-control" placeholder="<?php echo $row['user_id'] ?>" readonly></div>
                            <div class="col-md-12"><label class="labels">User Name</label><input type="text" class="form-control" placeholder="<?php echo $row['user_name'] ?>" readonly></div>
                            <div class="col-md-12"><label class="labels">Gender</label><input type="text" class="form-control" placeholder="<?php echo $row['gender'] ?>" readonly></div>
                            <div class="col-md-12"><label class="labels">Age</label><input type="text" class="form-control" placeholder="<?php echo $row['age'] ?>" readonly></div>
                            <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="<?php echo $row['address'] ?>" readonly></div>
                            <div class="col-md-12"><label class="labels">email</label><input type="text" class="form-control" placeholder="<?php echo $row['email'] ?>" readonly></div>
                            <div class="col-md-12"><label class="labels">Phone</label><input type="text" class="form-control" placeholder="<?php echo $row['phone'] ?>" readonly></div>
                            <div class="col-md-12"><label class="labels">Nid</label><input type="text" class="form-control" placeholder="<?php echo $row['nid'] ?>" readonly></div>
                        </div>
                        <div class="mt-5 text-center"> <a class="btn btn-primary" href="edit_profile.php" role="button">Edit</a></div>
                        <?php }  ?>

                        <!--profile-->

                        
                    </div> 
            </div>                  
        </div>
    </div>

    <!--request gain Start-->
    <div class = "container mt-5 mb-5">
        <div class="row">
            <div class="col-xxl-12">
                <h1 class="text-center mb-5">Request Received</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-8">
                <table class = "table table-sm table-secondary table-hover">
                    <tr class= table-active>
                        <th>SL.</th>
                        <th>Request Id</th>
                        <th>Post Id</th>
                        <th>Client Id</th>                     
                        <th>Client name</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        while($r_gain = mysqli_fetch_assoc($request_gain)){
                            $i++;
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $r_gain['request_id']; ?></td>
                            <td><?php echo $r_gain['post_id']; ?></td>
                            <td><?php echo $r_gain['user_id']; ?></td>
                            <td><?php echo $r_gain['user_name']; ?></td>
                            <td><?php echo $r_gain['address']; ?></td>
                            <td><?php echo $r_gain['status']; ?></td>
                            <td>
                             <div class="d-grid gap-2 d-md-block">
                                <a class="btn btn-success" href="rqst_accept.php?id=<?php echo $r_gain['request_id']?>">Accept</a>
                             </div>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <!--request gain Done -->


    <!--request sent Start-->
    <div class = "container mt-5 mb-5">
        <div class="row">
            <div class="col-xxl-12">
                <h1 class="text-center mb-5">Request Sent</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-8">
                <table class = "table table-sm table-secondary table-hover">
                    <tr class= table-active>
                        <th>SL.</th>
                        <th>Request Id</th>
                        <th>Post Id</th>
                        <th>Server User Id</th>                     
                        <th>Server name</th>
                        <th>Work</th>
                        <th>Payment</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        while($r_sent = mysqli_fetch_assoc($request_sent)){
                            $j++;
                    ?>
                        <tr>
                            <td><?php echo $j; ?></td>
                            <td><?php echo $r_sent['request_id']; ?></td>
                            <td><?php echo $r_sent['post_id']; ?></td>
                            <td><?php echo $r_sent['service_id']; ?></td>
                            <td><?php echo $r_sent['user_name']; ?></td>
                            <td><?php echo $r_sent['job']; ?></td>
                            <td><?php echo $r_sent['payment']; ?></td>
                            <td><?php echo $r_sent['category']; ?></td>
                            <td><?php echo $r_sent['status']; ?></td>
                            <td>
                             <div class="d-grid gap-2 d-md-block">
                                <a class="btn btn-danger" href="rqst_unsent.php?id=<?php echo $r_sent['request_id']?>">Delete</a>
                                <a class="btn btn-info" href="service_contact.php?id=<?php echo $r_sent['request_id']?>">Contact</a>
                             </div>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <!--request sent Done -->

              


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

 



