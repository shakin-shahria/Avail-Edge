
<?php
    session_start();
    include('../db_connect.php');

    $session_name = $_SESSION['name'];


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
                    <i class="fas fa-paperclip me-2"></i>Job request
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
                    <li><a href="admin_profile.php" class="dropdown-item">Profile</a></li>
                    <li><a href="admin_login.php" class="dropdown-item">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!--navbar ends-->  





 <!--profile-->
  
 <div class="profile">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10 offset-5 " >
           <div class="card" style ="width: 340px">
                              
                  <ul class="list-group list-group-flush">
               
                    <?php
                       /* session variable */
                       $session_name = $_SESSION['name'];
                       /* Query */
                       $query = mysqli_query($conn, "SELECT * FROM admin_user  WHERE name = '$session_name' ");

                       while ($row = mysqli_fetch_array($query)) {
                     ?>

<br><br>
    <h1 class="text-center mb-7">Admin Information</h1>
    
    <div class="container rounded bg-white mt-10 mb-10">
        <div class="row">
            <div class="col-md-10 mx-auto">
                
                    <div class="p-19 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-8">
                            
                        </div>
                        
                        <div class="row mt-10">
                            <div class="col-md-12"><label class="labels">Admin Id</label><input type="text" class="form-control" placeholder="<?php echo $row['admin_id'] ?>" readonly></div>
                            <div class="col-md-12"><label class="labels">Admin Name</label><input type="text" class="form-control" placeholder="<?php echo $row['name'] ?>" readonly></div>
                            <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="<?php echo $row['email'] ?>" readonly></div>
                            
                        </div>
            
            </div>
           </div>
         </div>
       </div>
     </div>
  </div>
  <?php }
 
 ?>

    <!--profile-->
































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
