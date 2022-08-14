<?php

	session_start();
	error_reporting(E_ERROR | E_PARSE);

	require('connect.php');

	// $mysqli = new mysqli('localhost', 'root', '', 'psk') or die(mysql_error($mysqli));

	// Student login
	$stu_uname = '';
	$stu_pass = '';
	$par_uname = '';
	$par_pass = '';

	$update = false;

	$photo_id = '';

	$name = '';
	$dob = '';
	$age = '';
	$gender = '';
	$grade = '';
	$lastschool = '';
	$mtongue = '';
	$address = '';
	$aadhar = '';
	$religion = '';
	$country = '';
	$bloodtype = '';
	$siblings = '';
	$specialneeds = '';
	$specialneedsfull = '';

	$fname = '';
	$fqual = '';
	$focc = '';
	$fcomp = '';
	$fsal = '';
	$fnum = 0;
	$fmail = '';

	$mname = '';
	$mqual = '';
	$mocc = '';
	$mcomp = '';
	$msal = '';
	$mnum = 0;
	$mmail = '';

	$doa = '';
	$roll_no = '';
	$attendance = 0;

	$gaurdian = '';
	$gname = '';
	$gnum = '';
	$gaddr = '';

	function random_str(
    $length,
    $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
	)
	{
	    $str = '';
	    $max = mb_strlen($keyspace, '8bit') - 1;
	    if ($max < 1) {
	        throw new Exception('$keyspace must be at least two characters long');
	    }
	    for ($i = 0; $i < $length; ++$i) {
	        $str .= $keyspace[random_int(0, $max)];
	    }
	    return $str;
	}



	if(isset($_POST['updatestu']))
	{

		// echo "this works!!!";
		$s_id = $_POST['student_id'];
		$name = $_POST['name'];
		$dob = $_POST['dob'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$aadhar = $_POST['aadhar'];
		$grade = $_POST['grade'];
		$roll_no = $_POST['roll_number'];
		$prevschool = $_POST['lastschool'];
		$mothertongue = $_POST['mtongue'];
		$address = $_POST['address'];
		$religion = $_POST['religion'];
		$country = $_POST['country'];
		$bloodgroup = $_POST['bloodtype'];
		$siblings = $_POST['siblings'];
		$specialneeds = $_POST['specialneeds'];
		$specialneedsfull = $_POST['specialneedsfull'];

		$fname = $_POST['fname'];
		$fqual = $_POST['fqual'];
		$focc = $_POST['focc'];
		$fcomp = $_POST['fcomp'];
		$fsal = $_POST['fsal'];
		$fnum = $_POST['fnum'];
		$fmail = $_POST['fmail'];

		$mname = $_POST['mname'];
		$mqual = $_POST['mqual'];
		$mocc = $_POST['mocc'];
		$mcomp = $_POST['mcomp'];
		$msal = $_POST['msal'];
		$mnum = $_POST['mnum'];
		$mmail = $_POST['mmail'];
		
		$doa = $_POST['doa'];

		$gaurdian = $_POST['gaurdian'];

		$photo_id = $_POST['photo_id'];
		
		$stu_uname = $_POST['stu_uname'];
		$stu_pass = $_POST['stu_pass'];
		$par_uname = $_POST['par_uname'];
		$par_pass = $_POST['par_pass'];


		$mysqli->query("SET AUTOCOMMIT=0");
		$mysqli->query("START TRANSACTION");
		// 	// $mysqli->query("COMMIT");
		// 	// $mysqli->query("ROLLBACK");

		if($gaurdian == 'no')
		{
			$gname = $gaurdian;
			$gnum = 0;
			$gaddr = '';
		}
		else
		{
			$gname = $_POST['gname'];
			$gnum = $_POST['gnum'];
			$gaddr = $_POST['gaddr'];
		}
		
		$parentcheck = $mysqli->query("UPDATE parents SET fname = '$fname', fqual= '$fqual', focc= '$focc', fcomp= '$fcomp', fsal= '$fsal', fnum= '$fnum', fmail= '$fmail', mname= '$mname', mqual= '$mqual', mocc= '$mocc', mcomp= '$mcomp', msal= '$msal', mnum= '$mnum', mmail= '$mmail', gname= '$gname', gnum= '$gnum', gaddr= '$gaddr'  where s_id='$s_id'") or die($mysqli->error());
			
	
			if($specialneeds == 'yes')
			{
				$specialn = $specialneedsfull;
			}
			else
			{
				$specialn = 'no';
			}

		// 	echo "<br>-----------------------------";
		// 	echo "<br>".$name;
		// 	echo "<br>".$dob;
		// 	echo "<br>".$age;
		// 	echo "<br>".$gender;
		// 	echo "<br>".$aadhar;
		// 	echo "<br>".$grade;
		// 	echo "<br>".$prevschool;
		// 	echo "<br>".$mothertongue;
		// 	echo "<br>".$address;
		// 	echo "<br>".$religion;
		// 	echo "<br>".$country;
		// 	echo "<br>".$bloodgroup;
		// 	echo "<br>".$siblings;
		// 	echo "<br>".$specialneeds;
		// 	echo "<br>".$specialneedsfull;
		// 	echo "<br>-----------------------------------";


		$personalcheck = $mysqli->query("UPDATE personal SET name = '$name', gender = '$gender', dob = '$dob', age = '$age', aadhar = '$aadhar', country = '$country', religion = '$religion', address = '$address', prevschool = '$prevschool', mothertongue = '$mothertongue', specialneeds = '$specialn', bloodgroup = '$bloodgroup', siblings = '$siblings', photo_id = '$photo_id'  where s_id='$s_id'") or die($mysqli->error());

		$studentcheck = $mysqli->query("UPDATE student SET roll_no = '$roll_no', grade = '$grade'  where s_id='$s_id'") or die($mysqli->error());

		// $stucredcheck = $mysqli->query("UPDATE credentials SET uname = '$stu_uname', pass = '$stu_pass'  where s_id='$s_id' and type='student'") or die($mysqli->error());

		// $parcredcheck = $mysqli->query("UPDATE credentials SET uname = '$par_uname', pass = '$par_pass'  where s_id='$s_id' and type='parent'") or die($mysqli->error());
		

		echo "<br>"."Parent: ".$parentcheck."<br>";
		echo "Personal: ".$personalcheck."<br>";
		echo "Student: ".$studentcheck."<br>";
		// echo "Stu Creds: ".$stucredcheck."<br>";
		// echo "Par Creds: ".$parcredcheck."<br>";

		if ($parentcheck and $personalcheck and $studentcheck ) // and $stucredcheck and $parcredcheck
		{
			$mysqli->query("COMMIT");
			echo "<br> Commit!";

			$_SESSION['message'] = "Record has been updated!";
			$_SESSION['msg_type'] = "success";
		}
		else
		{        
			$mysqli->query("ROLLBACK");
			echo "<br> Rollback!";

			$_SESSION['message'] = "Record has not been updated!";
			$_SESSION['msg_type'] = "danger";
		}

		header("location: studentprofile.php?aca_year=current");
	}

	else if(isset($_POST['update_user_password']))
	{
		// $uname = $_POST['stu_pass_id'];

		$s_id_uname = $_POST["stu_pass_id"];
		$str_arr = explode ("_%_", $s_id_uname);

		$s_id = $str_arr[0];
		$uname = $str_arr[1];
		
		$user_current_password = $_POST['user_current_password'];

		$user_new_password = $_POST['user_new_password'];
		$user_new_password_again = $_POST['user_new_password_again'];

		if(strlen($user_current_password) > 0 and strlen($user_new_password) > 0 and strlen($user_new_password_again) > 0)
		{
			//create some sql statement        
			$result = $mysqli->query("SELECT * FROM credentials where uname='$uname' and s_id='$s_id'") or die($mysqli->error);

			if($result)
			{
			$data = $result->fetch_assoc();
			$passhash = $data['pass']; 
		
			// echo "<br>Hashed: ".$passhash;
			// echo "<br>password: ".$pass;
		
			if (!password_verify($user_current_password, $passhash))
			{
				$_SESSION['message'] = "Wrong Password! Try Again!";
				$_SESSION['msg_type'] = "danger";

				header("location: studentprofile.php?aca_year=current");

			}
			else
			{
				$hash = password_hash($user_new_password_again, PASSWORD_DEFAULT);

				$mysqli->query("SET AUTOCOMMIT=0");
				$mysqli->query("START TRANSACTION");

				$check = $mysqli->query("UPDATE credentials SET pass = '$hash', attempts=3 where uname='$uname' and s_id='$s_id'") or die($mysqli->error());

				if ($check)
				{
					$mysqli->query("COMMIT");
					// echo "<br> Commit!";

					$_SESSION['message'] = "Password has been updated!";
					$_SESSION['msg_type'] = "success";
				}
				else
				{        
					$mysqli->query("ROLLBACK");
					// echo "<br> Rollback!";

					$_SESSION['message'] = "Password could not be updated! Try again!";
					$_SESSION['msg_type'] = "danger";
				}

				header("location: studentprofile.php?aca_year=current");
			}

			}
			else
			{
				$_SESSION['message'] = "User Not Found!";
				$_SESSION['msg_type'] = "danger";

				header("location: studentprofile.php?aca_year=current");
			}
		}
		else
		{
			$_SESSION['message'] = "Please fill all the fields! Password not updated!";
			$_SESSION['msg_type'] = "danger";

			header("location: studentprofile.php?aca_year=current");
		}

	}

	else if(isset($_POST['update_teacher_password']))
	{
		$sss_id = $_POST['stu_pass_id'];
		
		$user_current_password = $_POST['user_current_password'];

		$user_new_password = $_POST['user_new_password'];
		$user_new_password_again = $_POST['user_new_password_again'];

		if(strlen($user_current_password) > 0 and strlen($user_new_password) > 0 and strlen($user_new_password_again) > 0)
		{
			//create some sql statement        
			$result = $mysqli->query("SELECT * FROM credentials where s_id='$sss_id'") or die($mysqli->error);

			if($result)
			{
			$data = $result->fetch_assoc();
			$passhash = $data['pass']; 
		
			// echo "<br>Hashed: ".$passhash;
			// echo "<br>password: ".$pass;
		
			if (!password_verify($user_current_password, $passhash))
			{
				$_SESSION['message'] = "Wrong Password! Try Again!";
				$_SESSION['msg_type'] = "danger";

				header("location: adminpanel.php");

			}
			else
			{
				$hash = password_hash($user_new_password_again, PASSWORD_DEFAULT);

				$mysqli->query("SET AUTOCOMMIT=0");
				$mysqli->query("START TRANSACTION");

				$uname = $data['uname']; 

				$check = $mysqli->query("UPDATE credentials SET pass = '$hash' where uname='$uname'") or die($mysqli->error());

				if ($check)
				{
					$mysqli->query("COMMIT");
					// echo "<br> Commit!";

					$_SESSION['message'] = "Password has been updated!";
					$_SESSION['msg_type'] = "success";
				}
				else
				{        
					$mysqli->query("ROLLBACK");
					// echo "<br> Rollback!";

					$_SESSION['message'] = "Password could not be updated! Try again!";
					$_SESSION['msg_type'] = "danger";
				}

				header("location: adminpanel.php");
			}

			}
			else
			{
				$_SESSION['message'] = "User Not Found!";
				$_SESSION['msg_type'] = "danger";

				header("location: adminpanel.php");
			}
		}
		else
		{
			$_SESSION['message'] = "Please fill all the fields! Password not updated!";
			$_SESSION['msg_type'] = "danger";

			header("location: adminpanel.php");
		}

	}

?>