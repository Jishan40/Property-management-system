<?php
    include('../model/db.php');


    $errorinfo=$s_id="";
    $radio1=$radio2=$radio3="";
    $fname=$lname=$email=$dob=$phone= $gender= $aphoto="";
    $err_fname = $err_lname = $err_dob = $err_gender = $err_phone =$err_email ="";
    $s_id= $_GET['id'];
    $connection = new db();
    $conobj=$connection->OpenCon();
    $userQuery1=$connection->searchSeller($conobj,"seller",$s_id);

    $hasError = false;

    if ($userQuery1->num_rows!=null) {
        if ($userQuery1->num_rows > 0) {
        while($row = $userQuery1->fetch_assoc()) {
            $username = $row["s_username"];
            $fname=$row["s_firstname"];
            $lname = $row["s_lastname"];
            $email=$row["s_email"];
            $dob =$row["s_dob"];
            $phone=$row["s_phone"];
            $aphoto= $row["s_photo"];
            if(  $row["s_gender"]=="Female" )
            { $radio1="checked"; }
            else if($row["s_gender"]=="Male")
            { $radio2="checked"; }
            else{$radio3="checked";}  
            } 
           
        }
    }else{
        $errorinfo= "No result found";
    }
    if (isset($_POST['update'])) {
        $fnameCheck = htmlspecialchars($_POST["fname"]);

		if(empty ($fnameCheck)){
			$err_fname="First name required";
			$hasError = true;
		}else if(!preg_match('/^[a-zA-Z\s]+$/',$fnameCheck)){
			$err_fname="Enter a valid name";
			$hasError = true;
		}
		else{
			$fname = $fnameCheck;
		}

		$lnameCheck = htmlspecialchars($_POST["lname"]);
		if(empty ($lnameCheck)){
			$lname = $_POST['lname'];
		}else if(!preg_match('/^[a-zA-Z\s]+$/',$lnameCheck)){
			$err_lname="Enter a valid name";
			$hasError = true;
		}else{
			$lname = $_POST['lname'];
		}
		
		if(empty($_POST["dob"])){
			$err_dob="Date of birth required";
			$hasError =true;	
		}
		else{
			$dob =($_POST["dob"]);
		}
		if(empty($_POST["gender"])){
			$err_gender="Gender required";
			$hasError =true;	
		}
		else{
			$gender =($_POST["gender"]);
            if($_POST["gender"]=="Female")
            { $radio1="checked"; }
            else if($_POST["gender"]=="Male")
            { $radio2="checked"; }
            else{$radio3="checked";}  
		}

		$phoneCheck = htmlspecialchars($_POST["phone"]);
		if(empty ($phoneCheck)){
			$err_phone="Phone number required";
			$hasError = true;
		}else if(!preg_match('/^[0-9]*$/', $phoneCheck)){
			$err_phone="Enter a valid phone number";
			$hasError = true;
		}else if(strlen($phoneCheck) > 11){
			$err_phone="Phone number not more then 11 digit";
			$hasError = true;
		}else{
			$phone = $phoneCheck;
		}
		
		if (empty($_POST["email"]) || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $_POST["email"]))
        {
            $err_email = "Provide a valid email";
			$hasError = true;
        }
        else
        {
			$email = htmlspecialchars($_POST["email"]);
		}

        if(!$hasError){
            $connection = new db();
            $conobj=$connection->OpenCon();
            $userQuery=$connection->UpdateUser($conobj,"seller",$_POST["username"],$_POST['fname'],$_POST['lname'], $_POST['dob'],$_POST['gender'],$_POST['phone'], $_POST['email']);
            if($userQuery==TRUE)
            {
                $errorinfo= "Update successful"; 
            }
            else
            {
                $errorinfo= "Could not update";    
            }
            $connection->CloseCon($conobj);

        }
    }
        
            
        
?>