
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
  <body></body>







<?php
    
    session_start();
    include('../db_connect.php');
   
    
    //blocking usser
    if(isset ($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "UPDATE users set active='0' where user_id='$id'";

        


        if ($result = mysqli_query($conn, $sql)) {
            
            $Msg = " Blocked succesfully ";
            echo '<div class="alert alert-success">' . $Msg . '</div>';
        

    } else {
        $Msg = " Error ";
        echo '<div class="alert alert-danger">' . $Msg . '</div>';


    }
        
    }
    
    //unblocking user

    if(isset ($_GET['id2'])){
        $id2 = mysqli_real_escape_string($conn, $_GET['id2']);

        $sql = "UPDATE users set active='1' where user_id='$id2'";


        if ($result = mysqli_query($conn, $sql)) {
            $Msg = " Unblocked succesfully ";
            echo '<div class="alert alert-success">' . $Msg . '</div>';
    } else {
        $Msg = " Error ";
        echo '<div class="alert alert-danger">' . $Msg . '</div>';


    }

 
        
    }
    
?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>