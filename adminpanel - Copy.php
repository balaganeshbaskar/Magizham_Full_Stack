<?php require('session.php');?>
<?php require('connect.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Magizham</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- External stylesheet reference -->
    <link rel="stylesheet" type="text/css" href="css/styles_adminpanel.css">
    <!-- Google font CDN Integration -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
	
	<script src="js/adminpanel.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<?php
  //login confirmation
  confirm_logged_in_teacher();
?>

<body>

	<div class="container">

		<!-- <div class="title">
			<h3>STAFF DASHBOARD</h3>
		</div> -->

		<div class="logo_centered">
			<img src="images/brand-molc.jpg" alt="">
		</div>

		<hr style="width: 100%; margin-top: 20px; margin-bottom: 20px; border-top: 2px solid black;">

		<div class="header">
			<div class="row">
				<div class="rightside col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h3>Welcome, <?php echo  $_SESSION['USER_NAME'];?></h3>
					<?php if($_SESSION['USER_TYPE'] == 'teacher'):

						$uname_intro = $_SESSION['USER_NAME'];

						$intro_grade = $_SESSION['T_GRADE']; 
						$intro_subject = $_SESSION['T_SUBJECT'];
						// $t_fname = $_SESSION['USER_NAME'];

						?>
						<h5><?php echo  $intro_subject;?></h5>
						<h5>Class <?php echo  $intro_grade;?></h5>
					
					<?php endif; ?>	
					<div class="">
						<button style="margin-right: 10px;" onclick="stusetting();return false;" class="btn btn-warning">Settings</button>
						<a href="logout.php"><button class="btn btn-danger">Log Out</button></a>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="settings_modal" tabindex="-1" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h3 class="modal-title" id="">User Settings</h3>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
			  	<form action="student_details_update.php" method="post" enctype="multipart/form-data">
					<div class="row mb-3">
						<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
							<div class="">
								<!-- <button class="btn btn-success" onclick="addnewyear();return false;">ADD</button> -->
							</div>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
							<div class="">
								<input type="password" name="user_current_password" id="user_current_password" class="form-control" placeholder="Enter Current Password">
							</div>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
							<div class="">
								<!-- <button class="btn btn-success" onclick="addnewyear();return false;">ADD</button> -->
							</div>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
							<div class="">
								<!-- <button class="btn btn-success" onclick="addnewyear();return false;">ADD</button> -->
							</div>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
							<div class="">
								<input onchange="check_new_pass_again_teacher(this);" type="password" name="user_new_password" id="user_new_password" class="form-control" placeholder="Enter New Password">
							</div>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
							<div class="">
								<!-- <button class="btn btn-success" onclick="addnewyear();return false;">ADD</button> -->
							</div>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
							<div class="">
								<!-- <button class="btn btn-success" onclick="addnewyear();return false;">ADD</button> -->
							</div>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
							<div class="">
								<input onchange="check_new_pass_again_teacher(this);" type="password" name="user_new_password_again" id="user_new_password_again" class="form-control" placeholder="Enter New Password again">
							</div>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
							<div class="">
								<!-- <button class="btn btn-success" onclick="addnewyear();return false;">ADD</button> -->
							</div>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
							<div class="">
								<!-- <button class="btn btn-success" onclick="addnewyear();return false;">ADD</button> -->
							</div>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="text-align: center;">
							<div class="">
								<button type="submit" id="update_teacher_password" name="update_teacher_password" class="btn btn-success" disabled="true">UPDATE</button>
							</div>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
							<div class="">
								<!-- <button class="btn btn-success" onclick="addnewyear();return false;">ADD</button> -->
							</div>
						</div>
					</div>
					<input type="text" name="stu_pass_id" id="stu_pass_id" value="<?php echo $_SESSION['MEMBER_ID']; ?>" class="form-control" hidden>
				</form>			
		      </div>
		      <!-- <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		      </div> -->
		    </div>
		  </div>
		</div>


		<hr style="width: 100%; margin-top: 20px; margin-bottom: 20px; border-top: 2px solid black;">
		
		<?php if(isset($_SESSION['message'])): ?>
				<div style="margin-top: 20px" class="alert alert-<?=$_SESSION['msg_type']?>">

					<?php 
						echo $_SESSION['message'];
						unset($_SESSION['message']);	
					?>
					
				</div>
			<?php endif; ?>	

		<!-- Filter Feature -->
		<div class="row" style="height: 60px; border: 2px solid #E8E8E8; border-radius: 5px; padding-top: 10px;">
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="row">
					<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
						<!-- <input type="checkbox" id="selectall" style="margin-top: 8px; height: 18px; width: 18px;" value="" onchange="selectall(this)"> -->
					</div>	 
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<button id="deadline_btn" type="button" onclick="set_deadline_open_modal('<?php echo $_SESSION['MEMBER_ID']; ?>')" class="btn btn-warning">Deadline</button>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<button id="promote_btn" type="button" onclick="" class="btn btn-info">Promote</button>
					</div>
					<!-- <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
						<button id="annualapp" type="button" class="btn btn-warning annualapp" disabled>Annual Appraisal</button>
					</div> -->
					<!-- <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<button id="promote" type="button" class="btn btn-warning promote" disabled>Promote</button>
					</div> -->
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<!-- <p style="text-align: center; margin-top: 8px;"><b>SEARCH:</b></p> -->
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="row"> 
					<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
						<!-- <input class="form-control" type="text" id="namesearch" onkeyup="searchfun()" placeholder="Name" title="Type in a name"> -->
					</div>	
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<p style="text-align: center; margin-top: 8px;"><b>SEARCH:</b></p>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<input class="form-control" type="text" id="namesearch" onkeyup="searchfun()" placeholder="Name" title="Type in a name">
					</div>	
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="row"> 	
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<input class="form-control" type="number" id="rollnosearch" onkeyup="searchfun()" placeholder="Roll Number" title="Type in a roll number">
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<input class="form-control" type="number" id="attsearch" onkeyup="searchfun()" placeholder="Attendance" title="Type in an attendance value">
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<button type="button" class="btn btn-danger" onclick="clearfilter()">Clear Filter</button>
					</div>
				</div>
			</div>
		</div>	


		<!-- Modal -->
		<div class="modal fade" id="deadline_modal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">

					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Deadline settings</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>

					<div class="modal-body">

						<ul class="nav nav-tabs">
							<li class="nav-item" style="width: 50%; text-align:center;">
								<a style="color: black; background-color:white;" id="new_tab_dl" class="nav-link active" onclick="deadline_select_content('new')"><b>New</b></a>
							</li>
							<li class="nav-item" style="width: 50%; text-align:center;">
								<a style="color: white; background-color:black;" id="history_tab_dl" class="nav-link" onclick="deadline_select_content('history')"><b>History</b></a>
							</li>
						</ul>

						<div id="deadline_new_content">
							<form action="deadline_set.php" method="POST" enctype="multipart/form-data">
								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<label class="label">Staff</label>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										<!-- <p id="dl_staff_name" name="dl_staff_name" class="dl_staff_name"></p> -->
										<input type="text" name="dl_staff_name" id="dl_staff_name" class="form-control dl_staff_name" readonly>
									</div>
								</div>

								<input type="text" name="dl_actual_grade" id="dl_actual_grade" class="form-control" hidden>
								<input type="text" name="dl_actual_subject" id="dl_actual_subject" class="form-control" hidden>
								<input type="text" name="dl_staff_sid" id="dl_staff_sid" class="form-control" hidden>

								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<label class="label">Grade</label>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										<div class="form-group">
											<input type="text" name="dl_grade_input" id="dl_grade_input" class="form-control dl_grade" hidden="true" readonly>
											<select class="form-select" onchange="dl_list(this.value, 'grade')" aria-label="Default select" name="dl_grade_select" id="dl_grade_select" required="true" hidden="true">
												<option selected>Select Grade</option>
												<option disabled>-----------------------------------------</option>
												<option value="PREKG">K1 (Pre-KG)</option>
												<option value="LKG">K2 (LKG)</option>
												<option value="UKG">K3 (UKG)</option>
												<option value="I">K4 (I)</option>
												<option value="II">K5 (II)</option>
												<option value="III">III</option>
												<option value="IV">IV</option>
												<option value="V">V</option>
												<option value="VI">VI</option>
												<option value="VII">VII</option>
												<option value="VIII">VIII</option>
												<option value="IX">IX</option>
												<option value="X">X</option>
												<option value="XI">XI</option>
												<option value="XII">XII</option>
											</select>
										</div>
									</div>
								</div>

								<div class="row selected_grade" id="selected_grade" hidden>
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					
									</div>
									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										<label><b>Grades Selected:</b></label>
										<p name="dl_selected_grade" id="dl_selected_grade"></p>
										<input type="text" name="dl_selected_grade_value" id="dl_selected_grade_value" class="form-control" hidden>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<label class="label">Subject</label>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										<div class="form-group">
											<input type="text" name="dl_subject_input" id="dl_subject_input" class="form-control dl_grade" readonly>
											<select onchange="dl_list(this.value, 'subject')" class="form-select teacontrol" aria-label="Default select" name="dl_subject_select" id="dl_subject" required="true" readonly>
												<option selected>Select Subject</option>
												<option disabled>-----------------------------------------</option>
												<option value="Language I">Language I</option>
												<option value="Language II">Language II</option>
												<option value="Mathematics">Mathematics</option>
												<option value="EVS">EVS</option>
												<option value="Science">Science</option>
												<option value="Social Studies">Social Studies</option>
												<option value="Arts, Crafts & Vocational">Arts, Crafts & Vocational</option>
												<option disabled>-----------------------------------------</option>
												<option value="Physical Quotient">Physical Quotient</option>
												<option value="Thinking Quotient">Thinking Quotient</option>
												<option value="Social Quotient">Social Quotient</option>
												<option value="Emotional Quotient">Emotional Quotient</option>
												<!-- <option value="Intellectual Quotient">Intellectual Quotient</option> -->
											</select>
											<select onchange="dl_list(this.value, 'subject')" class="form-select teacontrol" aria-label="Default select" name="dl_subject_select_skills" id="dl_subject_skills" required="true" readonly>
												<option selected>Select Subject</option>
												<option disabled>-----------------------------------------</option>
												<option value="Physical Quotient">Physical Quotient</option>
												<option value="Thinking Quotient">Thinking Quotient</option>
												<option value="Social Quotient">Social Quotient</option>
												<option value="Emotional Quotient">Emotional Quotient</option>
												<!-- <option value="Intellectual Quotient">Intellectual Quotient</option> -->
											</select>
										</div>
									</div>
								</div>

								<div class="row selected_subjects" id="selected_subjects" hidden>
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					
									</div>
									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										<label><b>Subjects Selected:</b></label>
										<p name="dl_selected_subjects" id="dl_selected_subjects"></p>
										<input type="text" name="dl_selected_subjects_value" id="dl_selected_subjects_value" class="form-control" hidden>
									</div>
								</div>
								<hr style="width: 100%; margin-top: 20px; margin-bottom: 20px; border-top: 2px solid black;">
								<div class="row">
									<div style="text-align: center;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<label class="label">Deadline</label>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<label class="label">Start</label>
									</div>
									<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
										<div class="form-group">
											<input type="date" onchange="past_date_checker()" name="dl_start_date" id="dl_start_date" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<div class="form-group">
											<input type="time" onchange="past_date_checker()" name="dl_start_time" id="dl_start_time" value="00:00" class="form-control">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<label class="label">End</label>
									</div>
									<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
										<div class="form-group">
											<input onchange="past_date_check()" type="date" name="dl_end_date" id="dl_end_date" class="form-control">
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<div class="form-group">
											<input type="time" onchange="past_date_check()" name="dl_end_time" id="dl_end_time" value="00:00" class="form-control">
										</div>
									</div>
								</div>

								<div class="row selected_date" id="selected_date" hidden>
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					
									</div>
									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										<p name="dl_selected_date" id="dl_selected_date"></p>
									</div>
								</div>

								<div class="row" style="margin-top:50px;">
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> 
									<!-- onclick="set_deadline()" -->
										<button style="width: 200px;" type="submit"  id="set_dl_button" name="set_dl_button" class="btn btn-warning" disabled>Set Deadline</button>
									</div>
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					
									</div>
								</div>
							</form>
						</div>
						
						<?php 
							$staff_sid = $_SESSION['MEMBER_ID'];
							$deadline_data = $mysqli->query("SELECT * FROM deadlines where dl_staff_sid='$staff_sid' ORDER BY today DESC;") or die($mysqli->error); 
						?>

						<div id="deadline_history_content" hidden>
							
						
							<?php while ($dl_row = $deadline_data->fetch_assoc()): ?>
								<br>
								<div class="card">
									<div class="card-body">
										<!-- <h5 class="card-title">Special title treatment</h5> -->
										<p class="card-text"><B>CREATED ON: </B><?php echo $dl_row['today']; ?></p>
										<p class="card-text"><B>SUBJECTS: </B><br><?php echo $dl_row['dl_selected_subjects']; ?></p>
										<p class="card-text"><B>START: </B><?php echo $dl_row['dl_start_date']." - ".$dl_row['dl_start_time']." Hrs"; ?></p>
										<p class="card-text"><B>END: </B><?php echo $dl_row['dl_end_date']." - ".$dl_row['dl_end_time']." Hrs"; ?></p>
										<!-- <div>
											<a style="float:right;" href="#" class="btn btn-primary">Go somewhere</a>
										</div> -->
									</div>
								</div>
							<?php endwhile; ?>

						</div>

					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
					</div>

				</div>
			</div>
		</div>


		<?php $student = $mysqli->query("SELECT * FROM student  ORDER BY roll_no ASC;") or die($mysqli->error); 
		?>
		<div class="content">
			<table id="studentdata" class="studata table table-hover">
				<thead>
					<tr style="background-color: #E8E8E8; height: 50px;">
							<th style="vertical-align: middle; text-align: center; width: 5%;"><input type="checkbox" name="rows" value="" style="height: 18px; width: 18px;"></th>
							<th style="vertical-align: middle; text-align: center; width: 20%; border-left: 1px solid black;">Name</th>
							<th style="vertical-align: middle; text-align: center; border-left: 1px solid lightgrey; width: 15%;">Roll Number</th>
							<th style="vertical-align: middle; text-align: center; border-left: 1px solid lightgrey; width: 10%;">Grade</th>
							<th style="vertical-align: middle; text-align: center; border-left: 1px solid lightgrey; width: 10%;">City</th>
							<th style="vertical-align: middle; text-align: center; border-left: 1px solid lightgrey; width: 10%;">Attendance</th>
							<th style="vertical-align: middle; text-align: center; border-left: 1px solid black;">Action</th>
					</tr>
				</thead>

				<?php while ($row = $student->fetch_assoc()): ?>
					<?php 
						$s_id = $row['s_id'];

						$personal = $mysqli->query("SELECT * FROM personal WHERE s_id = '$s_id'") or die($mysqli->error);
						$s_row = $personal->fetch_assoc();

						$parent = $mysqli->query("SELECT * FROM parents where s_id = '$s_id'") or die($mysqli->error);
						$p_row = $parent->fetch_assoc();

						$attu = $mysqli->query("SELECT * FROM attendance where s_id = '$s_id' ORDER BY year DESC") or die($mysqli->error);
						$attu_row = $attu->fetch_assoc();
					?>
				<tbody>
				<?php if($_SESSION['T_GRADE'] == "All"):?>

				<tr style="text-align: center; border-bottom: 1px solid lightgrey;">
					<td style="vertical-align: middle; border-left: 1px solid lightgrey;">
																			<!-- onchange="rowsel()" -->
						<input type="checkbox" name="rows" value="" style="height: 18px; width: 18px;">
					</td>
					<td style="vertical-align: middle; border-left: 1px solid black;"><b><?php echo $s_row['name']; ?></b></td>
					<td style="vertical-align: middle;"><b><?php echo $row['roll_no']; ?></b></td>
					<td style="vertical-align: middle;"><?php echo $row['grade']; ?></td>
					<td style="vertical-align: middle;"><?php echo $s_row['country']; ?></td>
					<td style="vertical-align: middle;"><?php echo $attu_row['total']; ?></td>
					<td style="vertical-align: middle; border-left: 1px solid black;"><button class="btn btn-success" onclick="location.href='processlogin.php?from=teacher&stu_id=<?php echo $s_id; ?>';">Full Details</button></td>
				</tr>
					
				<?php elseif($row['grade'] == $_SESSION['T_GRADE']):?>

				<tr style="text-align: center; border-bottom: 1px solid lightgrey;">
					<td style="vertical-align: middle; border-left: 1px solid lightgrey;"> 
																		<!-- onchange="rowsel()" -->
						<input type="checkbox" name="rows" value="" style="height: 18px; width: 18px;">
					</td>
					<td style="vertical-align: middle; border-left: 1px solid black;"><b><?php echo $s_row['name']; ?></b></td>
					<td style="vertical-align: middle;"><b><?php echo $row['roll_no']; ?></b></td>
					<td style="vertical-align: middle;"><?php echo $row['grade']; ?></td>
					<td style="vertical-align: middle;"><?php echo $s_row['country']; ?></td>
					<td style="vertical-align: middle;"><?php echo $attu_row['total']; ?></td>
					<td style="vertical-align: middle; border-left: 1px solid black;"><button class="btn btn-success" onclick="location.href='processlogin.php?from=teacher&stu_id=<?php echo $s_id; ?>';">Full Details</button></td>
				</tr>

				<?php endif; ?>

				</tbody>
				<?php endwhile; ?>
			</table>
		</div>

		<hr style="width: 100%; margin-top: 20px; margin-bottom: 200px; border-top: 2px solid black;">

			<div id="stu_modal" class="modal fade">
			  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
			    <div class="modal-content">
		      
		      <div class="modal-header">
		        <h3 class="modal-title"><b>Student Details</b></h3>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>

		      <div class="modal-body">
		        <form action="#" method="post" enctype="multipart/form-data">

		        	<!-- Basic Student Info -->
		        	<div class="row" style="text-align: right;">
		        		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		        			<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="required" style="padding-top: 5px;"><b>Name:</b></label>
									</div>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
									<div class="form-group">
										<input type="text" name="name" id="name" required="true" class="form-control" >
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		        			<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="required" style="padding-top: 5px;"><b>Roll No:</b></label>
									</div>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
									<div class="form-group">
										<input type="text" name="roll_no" id="roll_no" required="true" class="form-control" >
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		        			<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="required" style="padding-top: 5px;"><b>Grade:</b></label>
									</div>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
									<div class="form-group">
										<input type="text" name="grade" id="grade" required="true" class="form-control" >
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		        			<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="required" style="padding-top: 5px;"><b>Mobile:</b></label>
									</div>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
									<div class="form-group">
										<input type="text" name="number" id="number" required="true" class="form-control" >
									</div>
								</div>
							</div>
						</div>
		        	</div>

					<div id="accordion" class="accordion">
					  <div class="card">
					    <div class="card-header btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="headingOne">
					      <h3 class="mb-0"> 1. Attendance</h3>
					    </div>
					    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordions">
					      <div class="card-body">
					        <table id="studentdata" class="table table-hover" style="font-size: 17px;">
								<thead>
									<tr style="background-color: #E8E8E8; height: 50px;">
										<th style="vertical-align: middle; text-align: center; border-right: 1px solid darkgrey;">Year</th>
										<th style="vertical-align: middle; text-align: center;">June</th>
										<th style="vertical-align: middle; text-align: center;">July</th>
										<th style="vertical-align: middle; text-align: center;">Aug</th>
										<th style="vertical-align: middle; text-align: center;">Sept</th>
										<th style="vertical-align: middle; text-align: center;">Oct</th>
										<th style="vertical-align: middle; text-align: center;">Nov</th>
										<th style="vertical-align: middle; text-align: center;">Dec</th>
										<th style="vertical-align: middle; text-align: center;">Jan</th>
										<th style="vertical-align: middle; text-align: center;">Feb</th>
										<th style="vertical-align: middle; text-align: center;">Mar</th>
										<th style="vertical-align: middle; text-align: center;">Apr</th>
										<th style="vertical-align: middle; text-align: center;">May</th>
										<th style="vertical-align: middle; text-align: center; border-left: 1px solid darkgrey;">Attendance</th>
										<th style="display: none;">Year</th>
									</tr>
								</thead>
								<tbody>
									<tr style="height: 50px;">
										<td style="vertical-align: middle; width: 5%; border-right: 1px solid darkgrey;"><input type="text" class="form-control flag" name="year" onkeyup="attupdate(this)" placeholder="<?php echo $a_row['year']; ?>" value="<?php echo $a_row['year']; ?>" style="padding: 3px; text-align: center;"></td>
										<td style="vertical-align: middle; width: 5%;"><input type="text" class="form-control flag" name="june" onkeyup="attupdate(this)" placeholder="<?php echo $a_row['june']; ?>" value="<?php echo $a_row['june']; ?>" style="padding: 3px; text-align: center;"></td>
										<td style="vertical-align: middle; width: 5%;"><input type="text" class="form-control flag" name="july" onkeyup="attupdate(this)" placeholder="<?php echo $a_row['july']; ?>" value="<?php echo $a_row['july']; ?>" style="padding: 3px; text-align: center;"></td>
										<td style="vertical-align: middle; width: 5%;"><input type="text" class="form-control flag" name="aug"  onkeyup="attupdate(this)" placeholder="<?php echo $a_row['aug']; ?>" value="<?php echo $a_row['aug']; ?>" style="padding: 3px; text-align: center;"></td>
										<td style="vertical-align: middle; width: 5%;"><input type="text" class="form-control flag" name="sept" onkeyup="attupdate(this)" placeholder="<?php echo $a_row['sept']; ?>" value="<?php echo $a_row['sept']; ?>" style="padding: 3px; text-align: center;"></td>
										<td style="vertical-align: middle; width: 5%;"><input type="text" class="form-control flag" name="oct"  onkeyup="attupdate(this)" placeholder="<?php echo $a_row['oct']; ?>" value="<?php echo $a_row['oct']; ?>" style="padding: 3px; text-align: center;"></td>
										<td style="vertical-align: middle; width: 5%;"><input type="text" class="form-control flag" name="nov"  onkeyup="attupdate(this)" placeholder="<?php echo $a_row['nov']; ?>" value="<?php echo $a_row['nov']; ?>" style="padding: 3px; text-align: center;"></td>
										<td style="vertical-align: middle; width: 5%;"><input type="text" class="form-control flag" name="december"  onkeyup="attupdate(this)" placeholder="<?php echo $a_row['december']; ?>" value="<?php echo $a_row['december']; ?>" style="padding: 3px; text-align: center;"></td>
										<td style="vertical-align: middle; width: 5%;"><input type="text" class="form-control flag" name="jan"  onkeyup="attupdate(this)" placeholder="<?php echo $a_row['jan']; ?>" value="<?php echo $a_row['jan']; ?>" style="padding: 3px; text-align: center;"></td>
										<td style="vertical-align: middle; width: 5%;"><input type="text" class="form-control flag" name="feb"  onkeyup="attupdate(this)" placeholder="<?php echo $a_row['feb']; ?>" value="<?php echo $a_row['feb']; ?>" style="padding: 3px; text-align: center;"></td>
										<td style="vertical-align: middle; width: 5%;"><input type="text" class="form-control flag" name="mar"  onkeyup="attupdate(this)" placeholder="<?php echo $a_row['mar']; ?>" value="<?php echo $a_row['mar']; ?>" style="padding: 3px; text-align: center;"></td>
										<td style="vertical-align: middle; width: 5%;"><input type="text" class="form-control flag" name="apr"  onkeyup="attupdate(this)" placeholder="<?php echo $a_row['apr']; ?>" value="<?php echo $a_row['apr']; ?>" style="padding: 3px; text-align: center;"></td>
										<td style="vertical-align: middle; width: 5%;"><input type="text" class="form-control flag" name="may"  onkeyup="attupdate(this)" placeholder="<?php echo $a_row['may']; ?>" value="<?php echo $a_row['may']; ?>" style="padding: 3px; text-align: center;"></td>
										<td style="vertical-align: middle; width: 5%; border-left: 1px solid darkgrey;"><input type="text" class="form-control flag" name="total"  onkeyup="attupdate(this)" placeholder="<?php echo $a_row['total']; ?>" value="<?php echo $a_row['total']; ?>" style="padding: 3px; text-align: center;"></td>
									</tr>
								</tbody>
							</table>
					      </div>
					    </div>
					  </div>
					  
					  <div class="card">
					    <div class="card-header btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">
					      <h3 class="mb-0">2. Physical Quotient</h3>
					    </div>
					    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">
					      <div class="card-body">
					        <table id="" class="table table-hover" style="font-size: 17px;">
								<thead>
									<tr style="background-color: #E8E8E8; height: 50px; border-top: 1px solid black;">
										<th style="vertical-align: middle; text-align: center; width: 25%;border-left: 1px solid black;"></th>
										<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black;">Self Assessment</th>
										<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black;">Parents' Assessment</th>
										<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black; border-right: 1px solid black;">Teacher's Assessment</th>
									</tr>
								</thead>
								<tbody>
									<tr style="height: 50px; border-bottom: 1px solid black;">
										<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Height</b></td>	
										<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"></td>
										<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"></td>
										<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"></td>
									</tr>
									<tr style="height: 50px;border-bottom: 1px solid black;">
										<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Weight</b></td>
										<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"></td>
										<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"></td>
										<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;border-right: 1px solid black;"></td>
									</tr>
									<tr style="height: 50px;border-bottom: 1px solid black;">
										<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Appetite & eating habits</b></td>
										<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"></td>
										<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"></td>
										<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;border-right: 1px solid black;"></td>
									</tr>
									<tr style="height: 50px;border-bottom: 1px solid black;">
										<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Toilet Habits</b></td>
										<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"></td>
										<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"></td>
										<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;border-right: 1px solid black;"></td>
									</tr>
									<tr style="height: 50px;border-bottom: 1px solid black;">
										<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Fine Motor Skills</b></td>
										<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"></td>
										<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"></td>
										<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;border-right: 1px solid black;"></td>
									</tr>
									<tr style="height: 50px;border-bottom: 1px solid black;">
										<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Gross Motor Skills</b></td>
										<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"></td>
										<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"></td>
										<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;border-right: 1px solid black;"></td>
									</tr>
								</tbody>
							</table>


					      </div>
					    </div>
					  </div>

					  <div class="card">
					    <div class="card-header btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree" id="headingThree">
					      <h3 class="mb-0">3. Thinking Quotient</h3>
					    </div>
					    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordion">
					      <div class="card-body">
					        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					      </div>
					    </div>
					  </div>
					  
					  <div class="card">
					    <div class="card-header btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour" id="headingFour">
					      <h3 class="mb-0">4. Social Quotient</h3>
					    </div>
					    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-bs-parent="#accordion">
					      <div class="card-body">
					        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					      </div>
					    </div>
					  </div>

					  <div class="card">
					    <div class="card-header btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive" id="headingFive">
					      <h3 class="mb-0">5. Emotional Quotient</h3>
					    </div>
					    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-bs-parent="#accordion">
					      <div class="card-body">
					        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					      </div>
					    </div>
					  </div>

					  <div class="card">
					    <div class="card-header btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix" id="headingSix">
					      <h3 class="mb-0">6. Intellectual Quotient</h3>
					    </div>
					    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-bs-parent="#accordion">
					      <div class="card-body">
					        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					      </div>
					    </div>
					  </div>

					</div>
				</form>
		      </div>
		      <div class="modal-footer">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center; margin-top: 20px;">
					<input style="height: 35px;" type="submit" name="update" id="update" value="Update Information" class="btn btn-success" />				
				</div>
		        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
		      </div>

		    </div>
		  </div>
		</div>

	</div>
	

 <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>