<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>

    <!--navbar starts -->
    <nav class="navbar navbar-expand-lg sticky-top fw-bold text-uppercase" style = "background-color:#009d63">
        <div class="container">
          <a class="navbar-brand" href="index.php"style = "color:#553939">
            <i class="fab fa-buysellads me-2 ps-3" style='font-size:36px'></i>
            Avail Edge
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="">
                <a class="nav-link text-white" href="profile.php">Profile</a>
              </li>
              <li class="">
                <a class="nav-link text-white" href="contact-us.php">Contact Us</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  post service
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="postadd_hourly.php">Hourly</a></li>
                  <li><a class="dropdown-item" href="postadd_daily.php">Daily</a></li>
                  <li><a class="dropdown-item" href="postadd_monthly.php">Monthly</a></li>
                </ul>
              </li>
              <li class="">
                <a class="nav-link text-white" href="logout.php">logout</a>
              </li>
            </ul>
            
          </div>
        </div>
    </nav>
    <!--navbar ends-->

    <!--slider-->
    
     <!--slider ends-->

     <!--About us -->
     <div class="section">

     </div>
     
        <div class="row "style="height:10px">    
            <img src="assets/css/r.jpg" class="w-100" alt="">
        </div>
      
     <!--About us ends -->


     <!--services-->
     <div class="section bg-light">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 text-center">
                  <br><br><br>
                  <h2 class="mb-4">Services</h2>  
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="assets/css/work_icon.png" style="width: 200px;" class="mx-auto" alt="...">
                        <div class="card-body bg-light text-center">
                          <h5 class="card-title">Hourly</h5>
                          <p class="card-text">Sent Request to the Service to hire</p>
                          <a href="hourly.php" class="btn btn-primary">Hired</a>
                        </div>
                      </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src= "assets/css/work_icon.png" style="width: 200px;"class="mx-auto"alt="...">
                        <div class="card-body bg-light text-center">
                          <h5 class="card-title">Daily</h5>
                          <p class="card-text">Sent Request to the Service to hire</p>
                          <a href="dailyjob.php" class="btn btn-primary">Hired</a>
                        </div>
                      </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src= "assets/css/work_icon.png"style="width: 200px;"class="mx-auto" alt="...">
                        <div class="card-body bg-light text-center">
                          <h5 class="card-title">Monthly</h5>
                          <p class="card-text">Sent Request to the Service to hire</p>
                          <a href="monthly.php" class="btn btn-primary">Hired</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
     </div>
    <!--services ends-->

     <!--profile-->



    <!--profile-->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
