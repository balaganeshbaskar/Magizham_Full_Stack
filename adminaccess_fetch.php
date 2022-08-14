<?php

session_start();
error_reporting(E_ERROR | E_PARSE);

	require('connect.php');


	if(isset($_POST["edit_staff_details"]))  
	{  	
		$s_id = $_POST["edit_staff_details"];

		$teacher = $mysqli->query("SELECT * FROM teachers WHERE s_id = '$s_id'") or die($mysqli->error);
		$tea = $teacher->fetch_assoc();
		 

		$data = [];

		// // CONTINUE FROM HERE! GET DATA FROM ALL TABLES AND PUT THEM INTO DATA VARIABLE!
		$data += array('s_s_id' => $s_id);
		$data += array('t_fname' => $tea['t_fname']);
		$data += array('t_sname' => $tea['t_sname']);
		$data += array('t_grade' => $tea['t_grade']);
		$data += array('t_subject' => $tea['t_subject']);
		$data += array('t_id' => $tea['t_id']);
		$data += array('t_classteacher' => $tea['classteacher']);

		echo json_encode($data);  
	}

	else if(isset($_POST["delete_staff_details"]))  
	{  	
		$data = [];

		$data += array('res' => "Done");

		$mysqli->query("SET AUTOCOMMIT=0");
  		$mysqli->query("START TRANSACTION");
		
		$s_id = $_POST["delete_staff_details"];
		$deleted_teachers = $mysqli->query("DELETE FROM teachers WHERE s_id = '$s_id'") or die($mysqli->error);

		$deleted_creds = $mysqli->query("DELETE FROM credentials WHERE s_id = '$s_id'") or die($mysqli->error);
		// $deleted_teachers = 1;
		// $deleted_creds = 1;

		if($deleted_teachers and $deleted_creds)
		{
			$mysqli->query("COMMIT");

			$_SESSION['message'] = "Record has been deleted!";
			$_SESSION['msg_type'] = "success";

		}
		else
		{        
			$mysqli->query("ROLLBACK");

			$_SESSION['message'] = "Record has not been deleted!";
			$_SESSION['msg_type'] = "danger";
		}

		echo json_encode($data);  
		// header("location: magizham/adminaccess.php"); 
	}

	else if(isset($_POST["reset_pass"]))  
	{  	
		$s_id_type = $_POST["reset_pass"];
		$str_arr = explode ("_%_", $s_id_type); 

		$s_id = $str_arr[0];
		$typ = $str_arr[1];

		if(strlen($typ) > 8)
		{
			$str_arr1 = explode (" ", $typ);
			$type = $str_arr1[0];
		}
		else
		{
			$type = $typ;
		}

		$repass = 'password';

		$mysqli->query("SET AUTOCOMMIT=0");
  		$mysqli->query("START TRANSACTION");

		$hash = password_hash($repass, PASSWORD_DEFAULT);
		 
		$pass_reset = $mysqli->query("UPDATE credentials SET pass='$hash', attempts=3 where s_id='$s_id' and type='$type'") or die($mysqli->error);

		// $pass_reset = $mysqli->query("UPDATE credentials SET pass='$hash' where s_id='$s_id' and type='$type'") or die($mysqli->error);

		// $mysqli->query("UPDATE credentials SET pass='$hash' where s_id='$s_id' and type='$type'") or die($mysqli->error());

		if($pass_reset)
		{
			$mysqli->query("COMMIT");

			$_SESSION['message'] = "Password has been reset to 'password'!";
			$_SESSION['msg_type'] = "success";
		}
		else
		{
			$mysqli->query("ROLLBACK");

			$_SESSION['message'] = "Password could not be reset! Try again!";
			$_SESSION['msg_type'] = "danger";
		}

		$data = [];
		$data += array('res' => "Done");
		$data += array('s_id' => $pass_reset);
		$data += array('type' => $type);

		// // CONTINUE FROM HERE! GET DATA FROM ALL TABLES AND PUT THEM INTO DATA VARIABLE!
		// $data += array('s_s_id' => $s_id);
		// $data += array('t_fname' => $tea['t_fname']);
		// $data += array('t_sname' => $tea['t_sname']);
		// $data += array('t_grade' => $tea['t_grade']);
		// $data += array('t_subject' => $tea['t_subject']);
		// $data += array('t_id' => $tea['t_id']);

		echo json_encode($data);  
	}













?>
