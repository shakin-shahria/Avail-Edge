
<?php
    session_start();
    include('../db_connect.php');

    $sql_1 = mysqli_query($conn, "SELECT COUNT(*) as contact_us_count FROM contact_us");
    $row1 = mysqli_fetch_assoc($sql_1);

   

    $sql5 = 'SELECT* FROM contact_us';
    $result = mysqli_query($conn, $sql5);
    $i=0; 
    
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel = "stylesheet" href = "../assets/css/bootstrap.min.css">
    <link rel = "stylesheet" href = "style.css">
    <title>Admin Home</title>
</head>
<body>


<!--Sidbar Start -->


<div class="d-flex" id = "wrapper">
        
        <div class = "bg-white" id = "sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                <i class="fab fa-buysellads me-2" style='font-size:36px'></i>Avail-Edge
            </div>

            <div class="list-group list-group-flush my-3">
                <a href="admin_index.php" class ="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                </a>
                <a href="all_service.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-address-card me-2"></i>All Post
                </a>
                <a href="message.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-comment-dots me-2"></i>Message
                </a>
                <a href="job_request.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-paperclip me-2"></i>Job Request
                </a>
                <a href="admin_logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                    <i class="fas fa-sign-out me-2"></i>Logout
                </a>
            </div>

        </div>
        <!--Sidbar End-->























 <!--navbar start-->

 <div id ="page-content-wrapper">

<nav class ="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
    <div class="d-flex align-items-center">
        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
        <h2 class="fs-2 m-0">Dashboard</h2>
    </div>

    <button class = "navbar-toggler" type = "button" data-bs-toggler = "collapse"
            data-bs-target = "#navbarSupportedContent" aria-controls= "navbarSupportedContent"
            aria-expanded = "false" aria-label = "Toggle navigation">
            <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class = "nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle second-text fw-bold" id="navbarDropdown"
                   role="button" data-bs-toggle= "dropdown" aria-expanded= "false">
                   <i class="fas fa-user me-2"></i><?php echo $_SESSION['name'] ?>
                </a>
                <ul class = "dropdown-menu" aria-labelledby ="navbarDropdown">
                    <li><a href="#" class="dropdown-item">Profile</a></li>
                    <li><a href="admin_login.php" class="dropdown-item">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!--navbar ends-->





<!--icon starts-->


<div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $row1['contact_us_count']; ?></h3>
                                <p class="fs-5">Total messages</p>
                            </div>
                            <i class="fas fa-user fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    


              <!--icon ends-->





              <!--details start-->
              <div class="row my-5">
                    <h3 class="fs-4 mb-3">All Message Details</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                        <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">User Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">email</th>
                                    <th scope="col">message</th>           
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($row = mysqli_fetch_assoc($result)){
                                        $i++;
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['user_id'] ?></td>
                                        <td><?php echo $row['user_name'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['message'] ?></td>
                                        
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
         </div>
    </div>


              <!--details ends-->
























    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>
</html>