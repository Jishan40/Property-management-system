<?php
	include('../model/db.php');
	$fname = $lname = $username = $dob = $gender = $phone = $email = $pass = $msg = "";
	$err_fname = $err_lname =$err_username = $err_dob = $err_gender = $err_phone =$err_email = $err_pass = $err_file ="";
	
	$hasError=false;
	
	if(isset($_POST["signup"])){
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
		
		if(empty($_POST["uname"])){
			$err_username="Username required";
			$hasError =true;	
		}
		elseif(strlen($_POST["uname"]) < 6){
			$err_username="Username must be 6 characters long";
			$hasError = true;
		}
		else{
			$username = htmlspecialchars($_POST["uname"]);
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

		$passCheck = htmlspecialchars($_POST['pass']);
		$number = preg_match('@[0-9]@', $passCheck);
		$uppercase = preg_match('@[A-Z]@', $passCheck);
		$lowercase = preg_match('@[a-z]@', $passCheck);
		
		if(strlen($passCheck) < 6 || !$number || !$uppercase || !$lowercase) {
			$err_pass = "Password must be 6 characters<br>Must be use [(0-9), (A-Z), (a-z)]";
			$hasError = true;
		} else {
			$pass = $passCheck;
		}
		$target_file = "../files/".$_FILES["aImage"]["name"];
		if(is_uploaded_file($_FILES['aImage']['tmp_name'])){

        	move_uploaded_file($_FILES["aImage"]["tmp_name"], $target_file);

        } else{
			$err_file = "You have to upload a Photo";
            $hasError = true;
        }
		if(!$hasError){
			//include "../readWriteData/agentDataWrite.php";
			$connection = new db();
			$conobj=$connection->OpenCon();
			$userQuery=$connection->AddAgent($conobj,"agent", $fname, $lname, $username, $dob, $gender, $phone, $email, $pass, $target_file);
			$connection->CloseCon($conobj);
			$msg = "Data Inserted Successfully";	
		}
	}

	if(isset($_POST["sellerSignup"])){
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
		
		if(empty($_POST["uname"])){
			$err_username="Username required";
			$hasError =true;	
		}
		elseif(strlen($_POST["uname"]) < 6){
			$err_username="Username must be 6 characters long";
			$hasError = true;
		}
		else{
			$username = htmlspecialchars($_POST["uname"]);
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

		$passCheck = htmlspecialchars($_POST['pass']);
		$number = preg_match('@[0-9]@', $passCheck);
		$uppercase = preg_match('@[A-Z]@', $passCheck);
		$lowercase = preg_match('@[a-z]@', $passCheck);
		
		if(strlen($passCheck) < 6 || !$number || !$uppercase || !$lowercase) {
			$err_pass = "Password must be 6 characters<br>Must be use [(0-9), (A-Z), (a-z)]";
			$hasError = true;
		} else {
			$pass = $passCheck;
		}
		$target_file = "../files/".$_FILES["aImage"]["name"];
		if(is_uploaded_file($_FILES['aImage']['tmp_name'])){

        	move_uploaded_file($_FILES["aImage"]["tmp_name"], $target_file);

        } else{
			$err_file = "You have to upload a Photo";
            $hasError = true;
        }
		if(!$hasError){
			//include "../readWriteData/agentDataWrite.php";
			$connection = new db();
			$conobj=$connection->OpenCon();
			$userQuery=$connection->AddAgent($conobj,"seller", $fname, $lname, $username, $dob, $gender, $phone, $email, $pass, $target_file);
			$connection->CloseCon($conobj);
			$msg = "Data Inserted Successfully";	
		}
	}
?>