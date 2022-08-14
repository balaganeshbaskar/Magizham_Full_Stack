<?php

	session_start();
	error_reporting(E_ERROR | E_PARSE);

	require('../../connect.php');

	// $mysqli = new mysqli('localhost', 'root', '', 'psk') or die(mysql_error($mysqli));

	// Student login
	$uname = '';
	$pass = '';

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

	$attempts = 3;

	$gaurdian = '';
	$gname = '';
	$gnum = '';
	$gaddr = '';

	// $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'

	function random_str(
    $length,
    $keyspace = '0123456789'
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



	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$dob = $_POST['dob'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$aadhar = $_POST['aadhar'];
		$grade = $_POST['grade'];
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
		$gname = $_POST['gname'];
		$gnum = $_POST['gnum'];
		$gaddr = $_POST['gaddr'];



		//******************************** Uploading image STARTS here ********************************

		$target_dir = "profilepictures/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check != false)
		{
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		}
		else
		{
			echo "File is not an image.";
			$uploadOk = 0;

			$_SESSION['message'] = "Image not uploaded! Try Again...";
			$_SESSION['msg_type'] = "danger";
		}

		// Check if file already s
		if (file_exists($target_file))
		{
		  echo "Sorry, file already exists.";
		  $uploadOk = 0;

		  $_SESSION['message'] = "Image already Exists! Try renaming it...";
			$_SESSION['msg_type'] = "danger";
		}

		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 2000000)
		{
		  echo "Sorry, your file is too large.";
		  $uploadOk = 0;

		  $_SESSION['message'] = "Image size too large! Image size should be < 2MB";
		  $_SESSION['msg_type'] = "danger";
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") 
		{
		  echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
		  $uploadOk = 0;

		  $_SESSION['message'] = "Image Format is wrong!";
		  $_SESSION['msg_type'] = "danger";
		}

		$temp = explode(".", $_FILES["fileToUpload"]["name"]);
		$newfilename = $name."_".$fname.".jpg";
		$target_file = $target_dir . $newfilename;

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0)
		{
		  echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		  $photo_id = '';
		} 
		else
		{
		  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
		  {
		    //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
		  	$photo_id = $newfilename;
		  }
		  else
		  {
		    echo "Sorry, there was an error uploading your file.";
		    $photo_id = '';

		    $_SESSION['message'] = "Error during upload! Try Again...";
			$_SESSION['msg_type'] = "danger";
		  }
		}

		//******************************** Uploading image ENDS here ********************************
		// FOR REFERENCE
		// https://www.sqlshack.com/rollback-sql-rolling-back-transactions-via-the-rollback-sql-query/
		// https://www.javatpoint.com/mysql-transaction
		// https://stackoverflow.com/questions/2708237/php-mysql-transactions-examples

		echo "PHOTO ID:";
		echo $photo_id;

		if($photo_id != '')
		{	
			$mysqli->query("SET AUTOCOMMIT=0");
			$mysqli->query("START TRANSACTION");
			// $mysqli->query("COMMIT");
			// $mysqli->query("ROLLBACK");

			if($gaurdian == 'no')
			{
				$gname = $gaurdian;
				$gnum = 0;
				$gaddr = '';
			}

		   $parentcheck = $mysqli->query("INSERT INTO parents (fname, fqual, focc, fcomp, fsal, fnum, fmail, mname, mqual, mocc, mcomp, msal, mnum, mmail, gname, gnum, gaddr) VALUES ('$fname', '$fqual', '$focc', '$fcomp', '$fsal', '$fnum', '$fmail', '$mname', '$mqual', '$mocc', '$mcomp', '$msal', '$mnum', '$mmail', '$gname', '$gnum', '$gaddr')");

			
			$tquery = $mysqli->query("SELECT * FROM parents where fname = '$fname'");
			$temp = $tquery->fetch_array();
			$s_id = $temp['s_id'];
			echo "<br> S_ID: ".$s_id;

			
			if($specialneeds == 'yes')
			{
				$specialn = $specialneedsfull;
			}
			else
			{
				$specialn = 'no';
			}

			echo "<br>-----------------------------";
			echo "<br>".$name;
			echo "<br>".$dob;
			echo "<br>".$age;
			echo "<br>".$gender;
			echo "<br>".$aadhar;
			echo "<br>".$grade;
			echo "<br>".$prevschool;
			echo "<br>".$mothertongue;
			echo "<br>".$address;
			echo "<br>".$religion;
			echo "<br>".$country;
			echo "<br>".$bloodgroup;
			echo "<br>".$siblings;
			echo "<br>".$specialneeds;
			echo "<br>".$specialneedsfull;
			echo "<br>-----------------------------------";

			$personalcheck = $mysqli->query("INSERT INTO personal (name, gender, dob, age, aadhar, country, religion, address, prevschool, mothertongue, specialneeds, bloodgroup, siblings, s_id, photo_id) VALUES ('$name', '$gender', '$dob', '$age', '$aadhar', '$country', '$religion', '$address', '$prevschool', '$mothertongue', '$specialn', '$bloodgroup', '$siblings', '$s_id', '$photo_id')");


			$studentcheck = $mysqli->query("INSERT INTO student (s_id, roll_no, grade, doa) VALUES ('$s_id', '$roll_no', '$grade', '$doa')");


			$current_month = (int)date('m');
			$current_year = date('Y');

			// echo $current_month."<br>";
			// echo $current_year."<br>";

			if($current_month > 5)
			{
				$yr = $current_year;
				$yr_next = $yr+1;
			}
			else
			{
				$yr = $current_year-1;
				$yr_next = $yr+1;
			}

			$final_aca_year = (string)$yr."-".(string)$yr_next;

			// $att = $mysqli->query("SELECT DISTINCT year FROM attendance") or die($mysqli->error);
			// $att = $mysqli->query("SELECT DISTINCT year FROM attendance ORDER BY year DESC") or die($mysqli->error);
			// $a = $att->fetch_assoc();
			// $yr = $a['year'];

			$attendancecheck = $mysqli->query("INSERT INTO attendance(s_id, year, jan, feb, mar, apr, may, june, july, aug, sept, oct, nov, december, total) VALUES ('$s_id', '$final_aca_year', 0,0,0,0,0,0,0,0,0,0,0,0,0)");
			// while($a = $att->fetch_assoc())
			// {	
			// 	$yr = $a['year'];
			// 	$attendancecheck = $mysqli->query("INSERT INTO attendance(s_id, year, jan, feb, mar, apr, may, june, july, aug, sept, oct, nov, december, total) VALUES ('$s_id', '$yr', 0,0,0,0,0,0,0,0,0,0,0,0,0)");
			// }

			// Login credentials for Student
			$checking_for_uname = 0;
			$yesorno = 0;

			while($checking_for_uname == 0)
			{
				$rand_num_generated = random_str(3);
				$uname_1 = str_replace(' ', '', $name);
				$uname = $uname_1.$rand_num_generated;

				$cred_uname_checker = $mysqli->query("SELECT * FROM credentials;");
				while($cred_checker = $cred_uname_checker->fetch_assoc())
				{	
					$existing_unames = $cred_checker['uname'];

					if($existing_unames == $uname)
					{
						$yesorno = 1;
					}
				}

				if($yesorno == 1)
				{
					$checking_for_uname = 0;
				}
				else
				{
					$checking_for_uname = 1;
				}
			}

			// $rand_num_generated = random_str(3);
			// $uname_1 = str_replace(' ', '', $name);
			// $uname = $uname_1.$rand_num_generated;
			
			$pass = 'password';
			$hash = password_hash($pass, PASSWORD_DEFAULT);


			/////////////////////////////////////////////////////////////////////////////////////////


			// Login credentials for Parent
			$checking_for_par_uname = 0;
			$yesorno_par = 0;

			while($checking_for_par_uname == 0)
			{
				$rand_num_generated = random_str(3);
				$uname_par = str_replace(' ', '', $fname);
				$uname_par_1 = $uname_par.$rand_num_generated;

				$cred_uname_checker_par = $mysqli->query("SELECT * FROM credentials;");
				while($cred_checker_par = $cred_uname_checker_par->fetch_assoc())
				{	
					$existing_unames = $cred_checker_par['uname'];

					if($existing_unames == $uname_par_1)
					{
						$yesorno_par = 1;
					}
				}

				if($yesorno_par == 1)
				{
					$checking_for_par_uname = 0;
				}
				else
				{
					$checking_for_par_uname = 1;
				}
			}

			/////////////////////////////////////////////////////////////////////////////////////////


			$credcheck = $mysqli->query("INSERT INTO credentials (uname, pass, type, s_id, attempts) VALUES ('$uname', '$hash', 'student', '$s_id', '$attempts')");

			$credcheck_par = $mysqli->query("INSERT INTO credentials (uname, pass, type, s_id, attempts) VALUES ('$uname_par_1', '$hash', 'parent', '$s_id', '$attempts')");

			echo "<br>"."Parent: ".$parentcheck."<br>";
			echo "Personal: ".$personalcheck."<br>";
			echo "Student: ".$studentcheck."<br>";
			echo "Attendance: ".$attendancecheck."<br>";
			echo "Credentials: ".$credcheck."<br>";
			echo "Credentials_par: ".$credcheck_par."<br>";


			if ($parentcheck and $personalcheck and $studentcheck and $attendancecheck and $credcheck and $credcheck_par)
			{

				$dumbcounter = 0;
				$selfs = array("self", "parent", "teacher");
				$whilec = count($selfs)-1;
				while($whilec > -1 )
				{
					$assescheck = $mysqli->query("INSERT INTO assessment(s_id, who) VALUES ('$s_id', '$selfs[$whilec]')");

					$evs = $mysqli->query("INSERT INTO evs(s_id, who) VALUES ('$s_id', '$selfs[$whilec]')");

					$lang1check = $mysqli->query("INSERT INTO lang1(s_id, who) VALUES ('$s_id', '$selfs[$whilec]')");

					$lang2check = $mysqli->query("INSERT INTO lang2(s_id, who) VALUES ('$s_id', '$selfs[$whilec]')");

					$mathcheck = $mysqli->query("INSERT INTO mathematics(s_id, who) VALUES ('$s_id', '$selfs[$whilec]')");

					$sciencecheck = $mysqli->query("INSERT INTO science(s_id, who) VALUES ('$s_id', '$selfs[$whilec]')");

					$sscheck = $mysqli->query("INSERT INTO socialstudies(s_id, who) VALUES ('$s_id', '$selfs[$whilec]')");

					$vocationalcheck = $mysqli->query("INSERT INTO vocational(s_id, who) VALUES ('$s_id', '$selfs[$whilec]')");

					echo "<br>"."Assessment: ".$assescheck."<br>";
					echo "EVS: ".$evs."<br>";
					echo "Lang 1: ".$lang1check."<br>";
					echo "Lang 2: ".$lang2check."<br>";
					echo "Maths: ".$mathcheck."<br>";
					echo "Science: ".$sciencecheck."<br>";
					echo "SS: ".$sscheck."<br>";
					echo "Vocational: ".$vocationalcheck."<br>";

					if ($assescheck and $evs and $lang1check and $lang2check and $mathcheck and $sciencecheck and $sscheck and $vocationalcheck)
					{
						$dumbcounter = $dumbcounter + 1;
					}

					$whilec = $whilec - 1;
				}

				if($dumbcounter == 3)
				{
					$mysqli->query("COMMIT");
				    echo "<br> Commit!";

				    $_SESSION['message'] = "Record has been saved Successfully!";
					$_SESSION['msg_type'] = "success";

					$_SESSION['uname_par'] = $uname_par_1;
					$_SESSION['uname'] = $uname;
					$_SESSION['pass'] = $pass;
				}
				else
				{        
				    $mysqli->query("ROLLBACK");
				    echo "<br> Rollback!";

				    $_SESSION['message'] = "Record has not been saved!";
					$_SESSION['msg_type'] = "danger";
				}

				
			}
			else
			{        
			    $mysqli->query("ROLLBACK");
			    echo "<br> Rollback!";

			    $_SESSION['message'] = "Record has not been saved!";
				$_SESSION['msg_type'] = "danger";
			}

		}
		else
		{
			$_SESSION['message'] = "Record not saved! Try Again... changed changed changed";
			$_SESSION['msg_type'] = "danger";

		}

		header("location: index.php");
	}


	// if(isset($_GET['delete']))
	// {
	// 	$id = $_GET['delete'];
	// 	$mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error);

	// 	$_SESSION['message'] = "Record has been deleted!";
	// 	$_SESSION['msg_type'] = "danger";

	// 	header("location: index.php");
	// }


	// if(isset($_GET['edit']))
	// {
	// 	$id = $_GET['edit'];
	// 	$update = true;
	// 	$result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());

	// 	if(count($result)==1)
	// 	{
	// 		$row = $result->fetch_array();
	// 		$name = $row['name'];
	// 		$location = $row['location'];
	// 	}
	// }

	// if(isset($_POST['update']))
	// {
	// 	$id = $_POST['id'];
	// 	$name = $_POST['name'];
	// 	$location = $_POST['location'];

	// 	$mysqli->query("UPDATE data SET name='$name', location='$location' WHERE id=$id") or die($mysqli->error());

	// 	$_SESSION['message'] = "Record has been updated!";
	// 	$_SESSION['msg_type'] = "warning";

		// header("location: index.php");
	// }


?>