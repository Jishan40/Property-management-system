<?php
    session_start(); 
    include "../model/db.php";

    $uname=$pass="";

    $error="";
    $sinfo="";


    if (isset($_POST['submit'])) {
        $ad_id= "1";
        $connection = new db();
        $conobj=$connection->OpenCon();
        $userQuery=$connection->adminLogin($conobj,"admin",$ad_id);
        while($row = $userQuery->fetch_assoc()) {
            $username = $row["ad_username"];
            $pass=$row["ad_password"];
        }
        
        if(!empty($_POST['username']) || !empty($_POST['password'])){
            if (($_POST['username']== $username) && ($_POST['password']== $pass)) {
                $_SESSION["username"] = $_POST['username'];
                $_SESSION["password"] = $_POST['password'];
            }
            else
            {
                $error = "Username or Password is invalid";
            }
        }
        else{
            $error = "Please enter a valid username and password";
        }
    }
    if (isset($_POST['confirm'])) {
        if($_POST['npass'] == $_POST['cnpass']){
            $pass = $_POST['cnpass'];
            $ausername= $_POST['username'];
            $asecurityq= $_POST['securityQ'];
            $connection = new db();
            $conobj=$connection->OpenCon();
            $userQuery=$connection->adminPassChange($conobj,"admin",$ausername,$asecurityq, $pass);
        }else{
            $sinfo = "Password doesn't match";
        }
    }

?>