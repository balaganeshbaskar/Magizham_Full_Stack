<?php require('session.php'); ?>
<?php require('connect.php');?>


<!DOCTYPE html>
<html>
    <head>

        <title>Admin Access</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- External stylesheet reference -->
        <link rel="stylesheet" type="text/css" href="css/styles_adminaccess.css">
        <link rel="stylesheet" href="fa/css/font-awesome.min.css">

        <!-- Google font CDN Integration -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
        
        <script src="js/admin_access.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>


    <?php
    //login confirmation
    confirm_logged_in();
    
    ?>

    <body>
        
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


        <div class="modal fade" id="new_staff_modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="new_Staff_modal_title">Adding New Staff</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="processsignup.php" method="POST">

                        <div class="row mb-3">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="">
                                    <label class="label" for="">First Name</label>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="text-align: center;">
                                <div class="">
                                    <input type="text" id="t_fname" name="t_fname" required="true" placeholder="First Name*" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="">
                                    <label class="label" for="">Last Name</label>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="text-align: center;">
                                <div class="">
                                    <input type="text" id="t_sname" name="t_sname" required="true" placeholder="Second Name*" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="">
                                    <label class="label" for="">Grade</label>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="text-align: center;">
                                <div class="">
                                    <select class="form-control" id="t_grade" name="t_grade" required="true" style="margin-left: auto; margin-right: auto;">
                                        <option selected>Select Grade</option>
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
                                        <option disabled>-----------------------------------------</option>
                                        <option value="All">All</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="">
                                    <label class="label" for="">Class Teacher</label>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="text-align: center;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="class_teacher" id="yes" value="yes">
                                    <label class="form-check-label" for="yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="class_teacher" id="no" value="no" checked="true">
                                    <label class="form-check-label" for="no">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="">
                                    <label class="label" for="">Subject</label>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="text-align: center;">
                                <div class="">
                                    <select class="form-control" id="t_subject" name="t_subject" required="true" style="margin-left: auto; margin-right: auto;">
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
                                        <option value="Life Skills">Life Skills</option>
                                        <!-- <option value="Physical Quotient">Physical Quotient</option>
                                        <option value="Thinking Quotient">Thinking Quotient</option>
                                        <option value="Social Quotient">Social Quotient</option>
                                        <option value="Emotional Quotient">Emotional Quotient</option> -->
                                        <!-- <option value="Intellectual Quotient">Intellectual Quotient</option> -->
                                        <option disabled>-----------------------------------------</option>
                                        <option value="All">All</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="">
                                    <label class="label" for="">Teacher ID</label>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="text-align: center;">
                                <div class="">
                                    <input type="text" required="true" id="t_id" name="t_id" placeholder="Teacher ID*" class="form-control">
                                    <sup class="superscript">*Teacher ID will be your username to login</sup>
                                </div>
                            </div>
                        </div>

                       
                        <!-- <input type="number" name="t_num" required="true" placeholder="Contact Number*" class="form-control" style="margin-bottom: 15px;"> -->
                        <!-- <input type="text" name="t_id" placeholder="Teacher ID" class="field" style="margin-bottom: 12px;"> -->

                        <!-- <input type="password" required="true" id="t_pass" name="t_pass" onchange="check_teacher_pass();" placeholder="Enter Password*" class="form-control" style="margin-bottom: 15px;">

                        <input type="password" required="true" id="t_repass" name="t_repass" onchange="check_teacher_pass();" placeholder="Re-Enter password*" class="form-control" style="margin-bottom: 15px;"> -->

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div id="new_staff_remove" class="text_left">
                                    <button type="button" id="staff_remove_btn" name="staff_remove_btn" onclick="delete_staff_account();return false;" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                                <div id="new_staff_update" class="text_center">
                                    <input type="text" id="s_s_id" name="s_s_id" hidden>
                                    <button type="submit" id="new_update" name="new_update" class="btn btn-success">Update</button>
                                </div>

                                <div id="new_staff_signup" class="text_center">
                                    <button type="submit" id="btnsignup" name="btnsignup" class="btn btn-success">Create Account</button>
                                </div>

                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                            </div>
                        </div>
                        
                    </form>	
                </div>
                <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div> -->
            </div>
            </div>
        </div>


        <div class="modal fade" id="reset_pass_modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h3 class="modal-title" id="">Reset User Password</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="student_details_update.php" method="post" enctype="multipart/form-data" style="text-align:center;">
                    <div class="row mb-3">
                        <span><b>Are you sure you want to reset password?</b></span>
                    </div>
                    <br>
                    <!-- <div class="row mb-3">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align: right;">
                            <div class="">
                                <label for=""><b>Name</b></label>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="text-align: center;">
                            <div class="">
                                <input onchange="check_new_pass_again_teacher(this);" type="password" name="user_new_password_again" id="user_new_password_again" class="form-control" placeholder="Enter New Password again">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align: right;">
                            <div class="">
                                <label for=""><b>User Type</b></label>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="text-align: center;">
                            <div class="">
                                <input type="text" name="user_new_password_again" id="user_new_password_again" class="form-control" placeholder="Enter New Password again">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align: right;">
                            <div class="">
                                <label for=""><b>Grade</b></label>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="text-align: center;">
                            <div class="">
                                <input type="text" name="user_new_password_again" id="user_new_password_again" class="form-control" placeholder="Enter New Password again">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align: right;">
                            <div class="">
                                <label for=""><b>Subject</b></label>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="text-align: center;">
                            <div class="">
                                <input type="text" name="user_new_password_again" id="user_new_password_again" class="form-control" placeholder="Enter New Password again">
                            </div>
                        </div>
                    </div> -->
                    <input hidden type="text" name="hidden_info" id="hidden_info">
                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="text-align: center;">
                            <div class="">
                                <button type="button" id="reset_pass_yes" name="reset_pass_yes" onclick="reset_pass_confirm();return false;" class="btn btn-success">Yes</button>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="text-align: center;">
                            <div class="">
                                <button type="button" id="reset_pass_no" name="reset_pass_no" class="btn btn-danger">No</button>
                            </div>
                        </div>
                    </div>
                </form>			
                </div>
                <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div> -->
            </div>
            </div>
        </div>




        <!-- ***************************** MAIN CONTENT STARTS HERE ***************************** -->

        <div class="container">
            
            <div class="logo_centered">
                <img src="images/brand-molc.jpg" alt="">
            </div>

            <hr style="width: 100%; margin-top: 20px; margin-bottom: 0px; border-top: 2px solid black;">

            <div class="header">
                <div class="row">
                    <div class="rightside col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h3>Welcome, <?php echo  $_SESSION['USER_NAME'];?></h3>
                        <div class="">
                            <button style="margin-right: 10px;" onclick="stusetting();return false;" class="btn btn-warning">Settings</button>
                            <a href="logout.php"><button class="btn btn-danger">Log Out</button></a>
                        </div>
                    </div>
                </div>
		    </div>

            <hr style="width: 100%; margin-top: 0px; margin-bottom: 20px; border-top: 2px solid black;">

            <?php if(isset($_SESSION['message'])): ?>
			<div style="margin-top: 20px" class="alert alert-<?=$_SESSION['msg_type']?>">

				<?php 
					echo $_SESSION['message'];
					unset($_SESSION['message']);	
				?>
				
			</div>
		    <?php endif; ?>	


            <div class="teacher_table">
                
                <div class="table_heading">
                    <div class="text_center">
                        <h3>Staff Data</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <button class="btn btn-success" onclick="add_new_staff();return false;">Add Staff</button>
                        </div>
                        <div class="text_center col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <!-- <h3>Staff Data</h3> -->
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <!-- empty -->
                        </div>
                    </div>
                </div>

                <?php $teacher = $mysqli->query("SELECT * FROM teachers ORDER BY s_id ASC;") or die($mysqli->error); ?>
                
                <div class="content">
                    <table id="teacherdata" class="teadata table table-hover">
                        <thead>
                            <tr style="background-color: #E8E8E8; height: 50px;">
                                <!-- <th style="vertical-align: middle; text-align: center; width: 5%;"><input type="checkbox" name="rows" value="" style="height: 18px; width: 18px;"></th> -->
                                <th style="vertical-align: middle; text-align: center; width: 20%;">First Name</th>
                                <th style="vertical-align: middle; text-align: center; border-left: 1px solid lightgrey; width: 15%;">Second Name</th>
                                <th style="vertical-align: middle; text-align: center; border-left: 1px solid lightgrey; width: 10%;">ID</th>
                                <th style="vertical-align: middle; text-align: center; border-left: 1px solid lightgrey; width: 10%;">Grade</th>
                                <th style="vertical-align: middle; text-align: center; border-left: 1px solid lightgrey; width: 10%;">Class Teacher</th>
                                <th style="vertical-align: middle; text-align: center; border-left: 1px solid lightgrey; width: 10%;">Subject</th>
                                <th style="vertical-align: middle; text-align: center; border-left: 1px solid lightgrey; width: 10%;">Action</th>
                            </tr>
                        </thead>

                        <?php while ($row = $teacher->fetch_assoc()): ?>
                        <?php 
                            $s_id = $row['s_id'];
                        ?>

                        <tbody>

                            <tr style="text-align: center; border-bottom: 1px solid lightgrey;">
                                <!-- <td style="vertical-align: middle; border-left: 1px solid lightgrey;">
                                    <input type="checkbox" name="rows" value="" style="height: 18px; width: 18px;">
                                </td> -->
                                <td style="vertical-align: middle;"><b><?php echo $row['t_fname']; ?></b></td>
                                <td style="vertical-align: middle;"><?php echo $row['t_sname']; ?></td>
                                <td style="vertical-align: middle;"><b><?php echo $row['t_id']; ?></b></td>
                                <td style="vertical-align: middle;"><?php echo $row['t_grade']; ?></td>
                                <td style="vertical-align: middle;"><?php echo $row['classteacher']; ?></td>
                                <td style="vertical-align: middle;"><?php echo $row['t_subject']; ?></td>
                                <!-- onclick="location.href='processlogin.php?from=teacher&stu_id=<?php echo $s_id; ?>';" -->
                                <td style="vertical-align: middle; "><button class="btn btn-info" onclick="edit_Staff(<?php echo $s_id; ?>);return false;">Full Details</button></td>
                            </tr>

                        </tbody>
                        <?php endwhile; ?>
                    </table>
                </div>
            </div>















            <div class="account_table">
                
                <div class="table_heading">
                    <div class="text_center">
                        <h3>Account Data</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <!-- <button class="btn btn-success" onclick="add_new_staff();return false;">Add Staff</button> -->
                        </div>
                        <div class="text_center col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <!-- <h3>Staff Data</h3> -->
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <!-- empty -->
                        </div>
                    </div>
                </div>
                <!-- WHERE s_id = '$s_id' -->
                <?php 
                    $acc = $mysqli->query("SELECT * FROM credentials WHERE attempts = 0;") or die($mysqli->error);
                ?>
                <div class="content">
                    <table id="teacherdata" class="teadata table table-hover">
                        <thead>
                            <tr style="background-color: #E8E8E8; height: 50px;">
                                <!-- <th style="vertical-align: middle; text-align: center; width: 5%;"><input type="checkbox" name="rows" value="" style="height: 18px; width: 18px;"></th> -->
                                <th style="vertical-align: middle; text-align: center; width: 20%;">Name</th>
                                <th style="vertical-align: middle; text-align: center; border-left: 1px solid lightgrey; width: 15%;">Type</th>
                                <th style="vertical-align: middle; text-align: center; border-left: 1px solid lightgrey; width: 10%;">Grade</th>
                                <th style="vertical-align: middle; text-align: center; border-left: 1px solid lightgrey; width: 15%;">Subject</th>
                                <th style="vertical-align: middle; text-align: center; border-left: 1px solid lightgrey; width: 10%;">Action</th>
                            </tr>
                        </thead>

                        <?php while ($row = $acc->fetch_assoc()): ?>
                        <?php 
                            $s_id = $row['s_id'];
                            $type = $row['type'];

                            $per = $mysqli->query("SELECT * FROM personal WHERE s_id = $s_id;") or die($mysqli->error);
                            $p = $mysqli->query("SELECT * FROM student WHERE s_id = $s_id;") or die($mysqli->error);
                            $tar = $mysqli->query("SELECT * FROM teachers WHERE s_id = $s_id;") or die($mysqli->error);
                            $par = $mysqli->query("SELECT * FROM parents WHERE s_id = $s_id;") or die($mysqli->error);

                            $s_row = $per->fetch_assoc();
                            $ss_row = $p->fetch_assoc();
                            $t_row = $tar->fetch_assoc();
                            $p_row = $par->fetch_assoc();
                            
                            if($type == 'student')
                            {
                                $name = $s_row['name'];
                                $grade= $ss_row['grade'];
                                $subject= '-';
                            }
                            else if($type == 'teacher')
                            {
                                $name = $t_row['t_fname']." ".$t_row['t_sname'];
                                $grade= $t_row['t_grade'];
                                $subject= $t_row['t_subject'];
                            }
                            else if($type == 'parent')
                            {

                                $typ = $type." (".$s_row['name'].")";
                                $type = $typ;
                                $name = $p_row['fname'];
                                $grade= $ss_row['grade'];
                                $subject= '-';
                            }

                            $s_id_type ="'".$s_id."_%_".$type."'";
                        ?>

                        <tbody>

                            <tr style="text-align: center; border-bottom: 1px solid lightgrey;">
                                <!-- <td style="vertical-align: middle; border-left: 1px solid lightgrey;">
                                    <input type="checkbox" name="rows" value="" style="height: 18px; width: 18px;">
                                </td> -->
                                <td style="vertical-align: middle;"><b><?php echo $name; ?></b></td>
                                <td style="vertical-align: middle;"><?php echo $type; ?></td>
                                <td style="vertical-align: middle;"><?php echo $grade; ?></td>
                                <td style="vertical-align: middle;"><?php echo $subject; ?></td>
                                <!-- onclick="location.href='processlogin.php?from=teacher&stu_id=<?php echo $s_id; ?>';" -->
                                <td style="vertical-align: middle; "><button class="btn btn-warning" onclick="reset_pass_modal(<?php echo $s_id_type; ?>);return false;">Reset Password</button></td>
                            </tr>

                        </tbody>
                        <?php endwhile; ?>
                    </table>
                </div>
            </div>













        </div>





<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html>