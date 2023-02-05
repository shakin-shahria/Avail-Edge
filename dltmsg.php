<?php
    session_start();
    include('db_connect.php');

    $request_id = $_GET['id'];
    $sql = "DELETE FROM request_status WHERE request_id = $request_id";
    $delete = mysqli_query($conn, $sql);

    if($delete){
        header('Location: profile.php');
    }
?>
