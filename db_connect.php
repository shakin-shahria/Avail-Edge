<?php

    $conn = mysqli_connect('localhost','availedge','avail123','availedge');

    if(!$conn){
        echo 'connection error: '. mysqli_connect_error();
    }

?>