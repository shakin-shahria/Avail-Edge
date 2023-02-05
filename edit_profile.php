<?php
       
       include('db_connect.php');
       session_start();
       $umail = $_SESSION['email'];


if (isset($_POST['submit'])) {

    $uname = $_POST['user_name'];
    $age = $_POST['age'];

    $address = $_POST['address'];
    if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
    }
    $phone = $_POST['phone'];
    $nid = $_POST['nid'];
    $pass = $_POST['pass'];


    $error = [];

    if (empty($uname)) {
        $error['user_name'] = 'please write your Name';
    }
    if (empty($age)) {
        $error['age'] = 'please write your age';
    }
    if (empty($address)) {
        $error['address'] = 'please write your Address';
    }
    if (empty($gender)) {
        $error['gender'] = 'please select your Gender';
    }
    if (empty($phone)) {
        $error['phone'] = 'please write your Phone Number';
    }
    if (empty($nid)) {
        $error['nid'] = 'please write your NID';
    }
    if (empty($pass)) {
        $error['pass'] = 'please set a Password';
    }




    if (count($error) == 0) {
        $insert = ("UPDATE users SET user_name = '$uname',
                gender = '$gender', age = $age, address = '$address',
                phone = '$phone',nid = '$nid', pass= '$pass'
               WHERE  email= '$umail'");

        if (mysqli_query($conn, $insert)) {
            $Msg = " Profile has been up dated ";
            echo '<div class="alert alert-success">' . $Msg . '</div>';
        } else {
            $Msg = " Please Fill in the Blanks ";
            echo '<div class="alert alert-danger">' . $Msg . '</div>';
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
       <title>UPDATE</title>
   </head>
   <body>

    
   <?php
                       /* session variable */
                       $umail = $_SESSION['email'];
                       /* Query */
                       $query = mysqli_query($conn, "SELECT * FROM users  WHERE email = '$umail' ");

                       while ($row = mysqli_fetch_array($query)) {
                     ?>






       <?php include('header.php') ?>
       <div class="container" >
           <div class="row">
               <div class = "col-md-6 mx-auto"> 
                   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
                       <h1 class="p-3  mx-5 text-center"><a style="text-decoration:none" class= "text-secondary"href="index.html">Avail Edge</a></h1> 
                       <h4 class="p-3 mb-3 mx-5 text-black text-center">UPDATE</h4>
                       <div class="mb-3 mx-5">
                           <label>User Name</label>
                           <input type="text" name= "user_name" class= "form-control" placeholder="<?php echo $row['user_name'] ?>"
                           value = "<?php if(isset($uname)) {echo $uname;} ?>">
                           <span>
                               <?php
                                   if(isset($error['user_name'])){
                                       echo $error['user_name'];
                                   }
                               ?>
                           </span>
                       </div>
                       
                       <div class= "mb-3 mx-5">
                           <label>Age</label>
                           <input type="number" name = "age" class = "form-control" placeholder="<?php echo $row['age'] ?>"
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
                           <textarea name="address" class= "form-control"  placeholder="<?php echo $row['address'] ?>"><?php
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
                           <input type="text" name= "phone" class= "form-control" placeholder="<?php echo $row['phone'] ?>"
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
                           <input type="text" name= "nid" class= "form-control"  placeholder="<?php echo $row['nid'] ?>"
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
                       
                       
                       <div class="mb-5 mx-5">
                           <input type="submit" class= "btn btn-primary" value= "update detailes" name="submit">
                       </div>
                   </form>
               </div>
           </div>
       </div>
       <?php include('footer.php') ?>
   </body>
   
</html>
<?php } ?>
   