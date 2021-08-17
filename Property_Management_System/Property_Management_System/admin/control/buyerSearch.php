<?php
  include('../model/db.php');
  $connection = new db();
  $conobj=$connection->OpenCon();
  $userQuery=$connection->searchBoxBuyer($conobj,"buyer");

  if ($userQuery->num_rows > 0) {
    while($row = $userQuery->fetch_assoc()){ 
      $b[] = $row['b_firstname']." ".$row['b_lastname'];
    }
  }

  $q = $_REQUEST["q"];

  $hint = "";


  if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($b as $name) {
      if (stristr($q, substr($name, 0, $len))) {
        if ($hint === "") {
          $hint = $name;
        } else {
          $hint .= "<br> $name";
        }
      }
    }
  }

  // Output "no suggestion" if no hint was found or output correct values
  echo $hint === "" ? "no suggestion" : $hint;
?>