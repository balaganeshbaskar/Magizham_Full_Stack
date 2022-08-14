<?php
	
	require('connect.php');


	if(isset($_POST["edit_data_modal"]))  
	{  	
		$s_id = $_POST["edit_data_modal"];

		$personal = $mysqli->query("SELECT * FROM personal WHERE s_id = '$s_id'") or die($mysqli->error);
		$per = $personal->fetch_assoc();

		$student = $mysqli->query("SELECT * FROM student WHERE s_id = '$s_id'") or die($mysqli->error);
		$stu = $student->fetch_assoc();

		$parent = $mysqli->query("SELECT * FROM parents where s_id = '$s_id'") or die($mysqli->error);
		$par = $parent->fetch_assoc();

		$credentials = $mysqli->query("SELECT * FROM credentials where s_id = '$s_id'") or die($mysqli->error);
		

		$data = [];

		// CONTINUE FROM HERE! GET DATA FROM ALL TABLES AND PUT THEM INTO DATA VARIABLE!
		$data += array('student_id' => $s_id);
		$data += array('name' => $per['name']);
		$data += array('gender' => $per['gender']);
		$data += array('dob' => $per['dob']);
		$data += array('age' => $per['age']);
		$data += array('aadhar' => $per['aadhar']);
		$data += array('grade' => $stu['grade']);
		$data += array('roll_number' => $stu['roll_no']);
		$data += array('country' => $per['country']);
		$data += array('religion' => $per['religion']);
		$data += array('address' => $per['address']);
		$data += array('lastschool' => $per['prevschool']);
		$data += array('mtongue' => $per['mothertongue']);
		$data += array('specialneeds' => $per['specialneeds']);
		// if specialneeds == 'no' else
		// $data += array('specialneedsfull' => $per['specialneedsfull']);
		$data += array('bloodtype' => $per['bloodgroup']);
		$data += array('siblings' => $per['siblings']);
		$data += array('photo_id' => $per['photo_id']);

		$data += array('doa' => $stu['doa']);

		if($par['gname'] != 'no')
		{
			$data += array('gaurdian' => 'yes');
		}
		else
		{
			$data += array('gaurdian' => 'no');
		}
		$data += array('gname' => $par['gname']);
		$data += array('gnum' => $par['gnum']);
		$data += array('gaddr' => $par['gaddr']);

		$data += array('fname' => $par['fname']);
		$data += array('fqual' => $par['fqual']);
		$data += array('focc' => $par['focc']);
		$data += array('fcomp' => $par['fcomp']);
		$data += array('fsal' => $par['fsal']);
		$data += array('fnum' => $par['fnum']);
		$data += array('fmail' => $par['fmail']);

		$data += array('mname' => $par['mname']);
		$data += array('mqual' => $par['mqual']);
		$data += array('mocc' => $par['mocc']);
		$data += array('mcomp' => $par['mcomp']);
		$data += array('msal' => $par['msal']);
		$data += array('mnum' => $par['mnum']);
		$data += array('mmail' => $par['mmail']);

		
		while($creds = $credentials->fetch_assoc())
		{
			if($creds['type'] == 'student')
			{
				$data += array('stu_uname' => $creds['uname']);
				$data += array('stu_pass' => $creds['pass']);
			}
			else if($creds['type'] == 'parent')
			{
				$data += array('par_uname' => $creds['uname']);
				$data += array('par_pass' => $creds['pass']);
			}
		}
		

		echo json_encode($data);  
	}

	else if(isset($_POST["selectedrolls"]))  
	{  	
		$data = [];
		$arr = $_POST["selectedrolls"];

		$promoted_stu=[];
		$not_promoted_stu=[];
		
		$mysqli->query("SET AUTOCOMMIT=0");

		for($x=0; $x<count($arr);$x++)
		{
			$mysqli->query("START TRANSACTION");

			$temp = (string)$arr[$x];
			$temp = str_replace(' ', '', $temp); // Removes all spaces

			$student = $mysqli->query("SELECT * FROM student where s_id='$temp'") or die($mysqli->error);
			// INSERT INTO attendance_prev SELECT * FROM attendance WHERE s_id=1;

			// $student = 1;
			if($student)
			{
				$r = $student->fetch_assoc();

				// GRADE UPING
				$stu_grade = $r['grade'];
				switch ($stu_grade) 
				{
					case "LKG":
						$stu_grade = "UKG";
						break;
					case "UKG":
						$stu_grade = "I";
						break;
					case "I":
						$stu_grade = "II";
						break;
					case "II":
						$stu_grade = "III";
						break;
					case "III":
						$stu_grade = "IV";
						break;
					case "IV":
						$stu_grade = "V";
						break;
					case "V":
						$stu_grade = "VI";
						break;
					case "VI":
						$stu_grade = "VII";
						break;
					case "VII":
						$stu_grade = "VIII";
						break;
					case "VIII":
						$stu_grade = "IX";
						break;
					case "IX":
						$stu_grade = "X";
						break;
					case "X":
						$stu_grade = "XI";
						break;
					case "XI":
						$stu_grade = "XII";
						break;
					case "XII":
						$stu_grade = "XII";
						break;
					default:
						$stu_grade = $r['grade'];
				}

				// Getting current aca_year
				$aca_year_data = $mysqli->query("SELECT * FROM attendance where s_id='$temp'") or die($mysqli->error);
				$aca_year_temp = $aca_year_data->fetch_assoc();
				$aca_year = $aca_year_temp['year'];

				// SAVING CURRENT ACADEMIC YEAR DATA INTO BACKUP TABLES
			   	$att_check = $mysqli->query("INSERT INTO attendance_prev (`s_id`, `year`, `jan`, `feb`, `mar`, `apr`, `may`, `june`, `july`, `aug`, `sept`, `oct`, `nov`, `december`, `total`) SELECT `s_id`, `year`, `jan`, `feb`, `mar`, `apr`, `may`, `june`, `july`, `aug`, `sept`, `oct`, `nov`, `december`, `total` FROM attendance WHERE s_id='$temp'") or die($mysqli->error());

			   	$asse_check = $mysqli->query("INSERT INTO assessment_prev (`s_id`, `who`, `height`, `weight`, `appetite`, `toilet`, `finemotor`, `grossmotor`, `selfawareness`, `creativethinking`, `criticalthinking`, `problemsolving`, `decisionmaking`, `empathy`, `communication`, `interpersonal`, `copingwithstress`, `managingemotion`, `aca_year`) SELECT `s_id`, `who`, `height`, `weight`, `appetite`, `toilet`, `finemotor`, `grossmotor`, `selfawareness`, `creativethinking`, `criticalthinking`, `problemsolving`, `decisionmaking`, `empathy`, `communication`, `interpersonal`, `copingwithstress`, `managingemotion`, '$aca_year' FROM assessment WHERE s_id='$temp'") or die($mysqli->error());

				$lang1_check = $mysqli->query("INSERT INTO lang1_prev (`s_id`, `who`, `listening`, `speaking`, `writingmistake`, `writinglesson`, `writinggeneral`, `writingcreative`, `reading`, `understand`, `comprehension`, `spelling`, `grammar`, `conversation`,`aca_year`) SELECT `s_id`, `who`, `listening`, `speaking`, `writingmistake`, `writinglesson`, `writinggeneral`, `writingcreative`, `reading`, `understand`, `comprehension`, `spelling`, `grammar`, `conversation`, '$aca_year' FROM lang1 WHERE s_id='$temp'") or die($mysqli->error());

				$lang2_check = $mysqli->query("INSERT INTO lang2_prev (`s_id`, `who`, `listening`, `speaking`, `writingmistake`, `writinglesson`, `writinggeneral`, `writingcreative`, `reading`, `understand`, `comprehension`, `spelling`, `grammar`, `conversation`, `aca_year`) SELECT `s_id`, `who`, `listening`, `speaking`, `writingmistake`, `writinglesson`, `writinggeneral`, `writingcreative`, `reading`, `understand`, `comprehension`, `spelling`, `grammar`, `conversation`, '$aca_year' FROM lang2 WHERE s_id='$temp'") or die($mysqli->error());

				$math_check = $mysqli->query("INSERT INTO mathematics_prev (`s_id`, `who`, `concept`, `procedures`, `mentalability`, `tables`, `activity`, `aca_year`) SELECT `s_id`, `who`, `concept`, `procedures`, `mentalability`, `tables`, `activity`, '$aca_year' FROM mathematics WHERE s_id='$temp'") or die($mysqli->error());

				$evs_check = $mysqli->query("INSERT INTO evs_prev (`s_id`, `who`, `observation`, `interaction`, `prev_knowledge`, `analyse`, `cooperation`, `presentation`, `aca_year`) SELECT `s_id`, `who`, `observation`, `interaction`, `prev_knowledge`, `analyse`, `cooperation`, `presentation`, '$aca_year' FROM evs WHERE s_id='$temp'") or die($mysqli->error());

				$science_check = $mysqli->query("INSERT INTO science_prev (`s_id`, `who`, `oralinteraction`, `writteninteraction`, `observation`, `curiosity`, `criticalthinking`, `writingquality`, `oraltests`, `writtentests`, `diagrams`, `experience`, `openendedquestions`, `scientificterms`, `aca_year`) SELECT `s_id`, `who`, `oralinteraction`, `writteninteraction`, `observation`, `curiosity`, `criticalthinking`, `writingquality`, `oraltests`, `writtentests`, `diagrams`, `experience`, `openendedquestions`, `scientificterms`, '$aca_year' FROM science WHERE s_id='$temp'") or die($mysqli->error());

				$socialstudies_check = $mysqli->query("INSERT INTO socialstudies_prev (`s_id`, `who`, `observation`, `interaction`, `prev_knowledge`, `analyse`, `cooperation`, `presentation`, `aca_year`) SELECT `s_id`, `who`, `observation`, `interaction`, `prev_knowledge`, `analyse`, `cooperation`, `presentation`, '$aca_year' FROM socialstudies WHERE s_id='$temp'") or die($mysqli->error());

				$vocational_check = $mysqli->query("INSERT INTO vocational_prev (`s_id`, `who`, `interest`, `creativity`, `enthusiasm`, `taste`, `aroma`, `appearance`, `aca_year`) SELECT `s_id`, `who`, `interest`, `creativity`, `enthusiasm`, `taste`, `aroma`, `appearance`, '$aca_year' FROM vocational WHERE s_id='$temp'") or die($mysqli->error());

				
				// PREV VERSION COPY
				// $att_check = $mysqli->query("INSERT INTO attendance_prev SELECT * FROM attendance WHERE s_id='$temp'") or die($mysqli->error());
			   	// $asse_check = $mysqli->query("INSERT INTO assessment_prev SELECT * FROM assessment WHERE s_id='$temp'") or die($mysqli->error());
				// $lang1_check = $mysqli->query("INSERT INTO lang1_prev SELECT * FROM lang1 WHERE s_id='$temp'") or die($mysqli->error());
				// $lang2_check = $mysqli->query("INSERT INTO lang2_prev SELECT * FROM lang2 WHERE s_id='$temp'") or die($mysqli->error());
				// $math_check = $mysqli->query("INSERT INTO mathematics_prev SELECT * FROM mathematics WHERE s_id='$temp'") or die($mysqli->error());
				// $evs_check = $mysqli->query("INSERT INTO evs_prev SELECT * FROM evs WHERE s_id='$temp'") or die($mysqli->error());
				// $science_check = $mysqli->query("INSERT INTO science_prev SELECT * FROM science WHERE s_id='$temp'") or die($mysqli->error());
				// $socialstudies_check = $mysqli->query("INSERT INTO socialstudies_prev SELECT * FROM socialstudies WHERE s_id='$temp'") or die($mysqli->error());
				// $vocational_check = $mysqli->query("INSERT INTO vocational_prev SELECT * FROM vocational WHERE s_id='$temp'") or die($mysqli->error());

				// UPDATING GRADE AND REMOVING ROLL NUMBER
				$reply = $mysqli->query("UPDATE student SET grade='$stu_grade', roll_no='' where s_id='$temp'") or die($mysqli->error());

				// UPDATION AND COPYING VALIDATION
				if($reply and $att_check  and $asse_check  and $lang1_check  and $lang2_check  and $math_check  and $evs_check  and $science_check  and $socialstudies_check and $vocational_check)
				{
					// delete table code here
					// $att_delete_check = $mysqli->query("DELETE FROM attendance WHERE s_id='$temp'") or die($mysqli->error());
					$sstu = $mysqli->query("SELECT * FROM attendance where s_id='$temp'") or die($mysqli->error);
					$ss = $sstu->fetch_assoc();
					$current_year = $ss['year'];
					$current_year = explode("-",$current_year);
					$from_year = (int)$current_year[0] + 1;
					$to_year = (int)$current_year[1] + 1;
					$next_year = $from_year."-".$to_year;

					$att_delete_check = $mysqli->query("UPDATE attendance SET year='$next_year',jan=0,feb=0,mar=0,apr=0,may=0,june=0,july=0,aug=0,sept=0,oct=0,nov=0,december=0,total=0 where s_id='$temp'") or die($mysqli->error());

					$asse_delete_check = $mysqli->query("UPDATE assessment SET height='', weight='', appetite='', toilet='', finemotor='', grossmotor='', selfawareness='', creativethinking='', criticalthinking='',problemsolving='', decisionmaking='', empathy='', communication='', interpersonal='', copingwithstress='', managingemotion='' where s_id='$temp'") or die($mysqli->error());

					$lang1_delete_check = $mysqli->query("UPDATE lang1 SET listening='',speaking='',writingmistake='',writinglesson='',writinggeneral='',writingcreative='',reading='',understand='',comprehension='',spelling='',grammar='',conversation='' where s_id='$temp'") or die($mysqli->error());


					$lang2_delete_check = $mysqli->query("UPDATE lang2 SET listening='',speaking='',writingmistake='',writinglesson='',writinggeneral='',writingcreative='',reading='',understand='',comprehension='',spelling='',grammar='',conversation='' where s_id='$temp'") or die($mysqli->error());
				 
				 
					$math_delete_check = $mysqli->query("UPDATE mathematics SET concept='',procedures='',mentalability='',tables='',activity='' where s_id='$temp'") or die($mysqli->error());
				 
				 
					$evs_delete_check = $mysqli->query("UPDATE evs SET observation='',interaction='',prev_knowledge='',analyse='',cooperation='',presentation='' where s_id='$temp'") or die($mysqli->error());
				 
				 
					$science_delete_check = $mysqli->query("UPDATE science SET oralinteraction='',writteninteraction='',observation='',curiosity='',criticalthinking='',writingquality='',oraltests='',writtentests='',diagrams='',experience='',openendedquestions='',scientificterms='' where s_id='$temp'") or die($mysqli->error());
				 
				 
					$socialstudies_delete_check = $mysqli->query("UPDATE socialstudies SET observation='',interaction='',prev_knowledge='',analyse='',cooperation='',presentation='' where s_id='$temp'") or die($mysqli->error());
					 
				 
					$vocational_delete_check = $mysqli->query("UPDATE vocational SET interest='',creativity='',enthusiasm='', taste='', aroma='', appearance='' where s_id='$temp'") or die($mysqli->error());

					// $asse_delete_check = $mysqli->query("DELETE FROM assessment WHERE s_id='$temp'") or die($mysqli->error());
					// $lang1_delete_check = $mysqli->query("DELETE FROM lang1 WHERE s_id='$temp'") or die($mysqli->error());
					// $lang2_delete_check = $mysqli->query("DELETE FROM lang2 WHERE s_id='$temp'") or die($mysqli->error());
					// $math_delete_check = $mysqli->query("DELETE FROM mathematics WHERE s_id='$temp'") or die($mysqli->error());
					// $evs_delete_check = $mysqli->query("DELETE FROM evs WHERE s_id='$temp'") or die($mysqli->error());
					// $science_delete_check = $mysqli->query("DELETE FROM science WHERE s_id='$temp'") or die($mysqli->error());
					// $socialstudies_delete_check = $mysqli->query("DELETE FROM socialstudies WHERE s_id='$temp'") or die($mysqli->error());
					// $vocational_delete_check = $mysqli->query("DELETE FROM vocational WHERE s_id='$temp'") or die($mysqli->error());

					if($att_delete_check and $asse_delete_check  and $lang1_delete_check  and $lang2_delete_check  and $math_delete_check  and $evs_delete_check  and $science_delete_check  and $socialstudies_delete_check and $vocational_delete_check)
					{
						// delete table code here
						$mysqli->query("COMMIT");
						// echo "<br> Commit!";
						array_push($promoted_stu,$temp);

						// $_SESSION['message'] = "Deadline has been set!";
						// $_SESSION['msg_type'] = "success";
						
					}
					else
					{
						$mysqli->query("ROLLBACK");
						// echo "<br> Rollback!";
						array_push($not_promoted_stu,$temp);	
					}
					
				}
				else
				{
					$mysqli->query("ROLLBACK");
					array_push($not_promoted_stu,$temp);	
				}

			}
			else
			{
				array_push($not_promoted_stu,$temp);			
			}
		}
	
		$data += array('msg' => 'OK');
		$data += array('success' => $promoted_stu);
		$data += array('failure' => $not_promoted_stu);

		echo json_encode($data);
	} 

?>

