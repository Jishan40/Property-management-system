<?php
    include "../model/db.php";
    $s_id= $_GET['id'];
    $connection = new db();
    $conobj=$connection->OpenCon();
    $userQuery=$connection->sellerDeleteId($conobj,"seller",$s_id);
    $connection->CloseCon($conobj);
    header ("location: ../view/sellerDetails.php");
?>