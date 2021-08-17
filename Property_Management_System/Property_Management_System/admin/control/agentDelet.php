<?php
    include "../model/db.php";
    $a_id= $_GET['id'];
    $connection = new db();
    $conobj=$connection->OpenCon();
    $userQuery=$connection->agentDeleteId($conobj,"agent",$a_id);
    $connection->CloseCon($conobj);
    header ("location: ../view/agentDetails.php");
?>