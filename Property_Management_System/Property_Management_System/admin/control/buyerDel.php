<?php
    include "../model/db.php";
    $b_id= $_GET['id'];
    $connection = new db();
    $conobj=$connection->OpenCon();
    $userQuery=$connection->buyerDeleteId($conobj,"buyer",$b_id);
    $connection->CloseCon($conobj);
    header ("location: ../view/buyerDetails.php");
?>