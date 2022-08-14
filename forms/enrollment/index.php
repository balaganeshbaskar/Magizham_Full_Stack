<?php require('../../connect.php');?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- External stylesheet reference -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <!-- Google font CDN Integration -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">

	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <title>MOLC</title>
  </head>
  <script type="text/javascript">

  	var loadFile = function(event) 
	{
		var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
		output.onload = function()
		{
			URL.revokeObjectURL(output.src) // free memory
		}
	};

  	function SetDate()
	{
		var date = new Date();

		var day = date.getDate();
		var month = date.getMonth() + 1;
		var year = date.getFullYear();

		// console.log(day);
		// console.log(month);
		// console.log(year);

		if (month < 10) month = "0" + month;
		if (day < 10) day = "0" + day;

		var today = year + "-" + month + "-" + day;
		document.getElementById('doa').value = today;
		// console.log(today);
	}

	function switchfunction()
	{	
		var isChecked = document.getElementById("flexSwitchCheckDefault").checked;
		if(isChecked)
		{
			alert("Input is checked");
		}
		else
		{
			alert("Input is NOT checked");
		}

	}

	function specialneedsfunc(input) // color change for value change
	{	
		var value = input.value;
		// alert(value);
		if(value == 'yes')
		{
			document.getElementById("specialneedsfull").hidden = false;
		}
		else
		{
			document.getElementById("specialneedsfull").hidden = true;
		}
		
	}

	function gaurdianfunc(input) // color change for value change
	{	
		var value = input.value;
		// alert(value);
		if(value == 'yes')
		{
			document.getElementById("gaurdiandetails").style.display = "block";
		}
		else
		{
			document.getElementById("gaurdiandetails").style.display = "none";
		}
		
	}

	
  </script>
  <body onload="SetDate();">
  	<?php require_once 'enroll_process.php'; ?>
    <!-- MOLC Brand Image starts here -->
    <!-- <div class="container">
    	<div class="brand-molc">
    		<img class="brand-molc-image" src="images/brand-molc.jpg">
    	</div>
    </div> -->
    <!-- MOLC Brand Image ends here -->

    <!-- Navigation bar starts here -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-fixed-top center" style="background-color: white">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#"><img src="images/brand-molc.jpg" class="brand-molc-image"></a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarNavDropdown">
	      <ul class="nav navbar-nav navbar-center">
	        <li class="nav-item">
	          <a class="nav-link active nav-link-external-style" aria-current="page" href="../../" style="color: #b200e3;">HOME</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link active nav-link-external-style" href="../../curriculum/" style="color: #b200e3;">CURRICULUM</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link active nav-link-external-style" href="../../login.php" style="color: #b200e3;">LOGIN</a>
	        </li>
	        <!-- <li class="nav-item">
	          <a class="nav-link active nav-link-external-style" href="" style="color: #b200e3;">ENROLL</a>
	        </li> -->
	      </ul>
	    </div>
	  </div>
	</nav>

	<?php if(isset($_SESSION['message'])): ?>
		<div style="margin-top: 80px" class="alert alert-<?=$_SESSION['msg_type']?>">

			<?php 
				echo $_SESSION['message'];
				unset($_SESSION['message']);	
			?>
			
		</div>
		<?php if(isset($_SESSION['uname'])): ?>
			<div style="margin-top: 30px" class="alert alert-warning">
				<?php
				echo "Please Make a note of your Username and Password before refreshing page! <br>";
					echo "Student Username: ".$_SESSION['uname']." & Password: ".$_SESSION['pass']."<br>";
					echo "Parent Username: ".$_SESSION['uname_par']." & Password: ".$_SESSION['pass'];

					unset($_SESSION['uname_par']);	
					unset($_SESSION['uname']);	
					unset($_SESSION['pass']);
				?>
				
			</div>
		<?php endif; ?>	
	<?php endif; ?>	

	<!-- Navigation bar ends here -->
	<div style="text-align: center; margin-top:50px;">
		<h3>ENROLLMENT FORM</h3>

		<!-- <h5 style="color: red;">Note: Check if enroll works! hashing has been added!</h5> -->
	</div>
	<!-- enrollment form starts here -->
<div class="container" style="background-color: white;" data-aos="zoom-in">
		<div class="align-items-center" style="">
			<div class="enrollment-card">
			<form action="enroll_process.php" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
						<div class="form-group" style="text-align: center;">
							<label><b>Student's Details</b></label>	
						</div>
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="form-group">
									<!-- <label class="required">Name of Disciple</label> -->
									<input required type="text" maxlength="20" name="name"  class="form-control" placeholder="Enter your Name*">
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="form-group">
									<!-- <label class="required">Date of Birth</label> -->
									<input placeholder="Select Date of Birth*" class="form-control" name="dob" required="true" type="text" onfocus="(this.type='date')" id="dob">
								</div>					
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="form-group">
									<!-- <label class="required">Address</label> -->
									<input type="text" name="age" maxlength="80" required="true" class="form-control" placeholder="Age (as of 1st of June)">
								</div>						
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="form-group" style="border: 1px solid lightgrey; border-radius: 5px; padding: 5px; margin-right: 10px; margin-left: 10px; margin-top: 8px; margin-bottom: 5px;">
									<label class="form-check-label" for="male">Gender: </label>
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="gender" id="male" value="male">
									  <label class="form-check-label" for="male">Male</label>
									</div>
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="gender" id="female" value="female">
									  <label class="form-check-label" for="female">Female</label>
									</div>
								</div>				
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="form-group">
									<!-- <label class="required">Name</label> -->
									<input type="text" name="lastschool" class="form-control" placeholder="Name of the school last studied" required="true">
								</div>		
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="form-group">
									<!-- <label class="required">Name</label> -->
									<input type="text" name="mtongue" class="form-control" placeholder="Mother tongue" required="true">
								</div>							
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="form-group">
									<!-- <label class="required">Name</label> -->
									<select class="form-select" aria-label="Default select" name="grade" id="grade" required="true">
										<option selected>Select Grade</option>
										<option value="LKG">LKG</option>
										<option value="UKG">UKG</option>
										<option value="I">I</option>
										<option value="II">II</option>
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
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="row">
									<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
										<div class="form-group" style="text-align: center;  padding-right: 0px; padding-top: 15px;">
											<label class="required">Date Of Application:</label>
										</div>
									</div>
									<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
										<div class="form-group">
											<!-- <label class="required">Date of Birth</label> -->
											<input placeholder="Date Of Application" class="form-control" name="doa" required="true" type="text" onfocus="(this.type='date')" id="doa" disabled="true">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<!-- <label class="required">Address</label> -->
							<input type="text" name="address" maxlength="200" required="true" class="form-control" placeholder="Enter your Address*">
						</div>
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="form-group">
									<!-- <label>Name of School</label> -->
									<input type="text" name="aadhar" maxlength="12" required="true" class="form-control" placeholder="Aadhar Number of the student">
								</div>				
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="form-group">
									<!-- <label class="required">Address</label> -->
									<input type="text" name="religion" required="true" class="form-control" placeholder="Religion">
								</div>						
							</div>	
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="form-group">
									<!-- <label class="required">Name of Disciple</label> -->
									<input required="true" type="text" name="country"  class="form-control" placeholder="Nationality">
								</div>						
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
									<!-- <label class="required">Name</label> -->
									<select class="form-select" aria-label="Default select" name="bloodtype" id="bloodtype" required="true">
										<option selected>Select Blood Type of Student</option>
										<option value="A+">A+</option>
										<option value="A-">A-</option>
										<option value="B+">B+</option>
										<option value="B-">B-</option>
										<option value="O+">O+</option>
										<option value="O-">O-</option>
										<option value="AB+">AB+</option>
										<option value="AB-">AB-</option>
									</select>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
									<!-- <label class="required">Name</label> -->
									<input type="text" name="siblings" class="form-control" placeholder="Number of Siblings" required="true">
								</div>
							</div>
						</div>
						<div class="form-group"  style="border: 1px solid lightgrey; border-radius: 5px; padding: 5px; margin-right: 10px; margin-left: 10px; margin-top: 8px; margin-bottom: 5px;">
							<label class="form-check-label" for="specialneeds">Child with special needs? </label>
							<div class="form-check form-check-inline" style="margin-left: 30px;">
								<input onclick="specialneedsfunc(this)" class="form-check-input" type="radio" name="specialneeds" id="yes" value="yes">
								<label class="form-check-label" for="yes">Yes</label>
							</div>
							<div class="form-check form-check-inline">
								<input onclick="specialneedsfunc(this)" class="form-check-input" type="radio" name="specialneeds" id="no" value="no" checked="true">
								<label class="form-check-label" for="no">No</label>
							</div>
						</div>	
						<div class="form-group">
							<input type="text" name="specialneedsfull" id="specialneedsfull" class="form-control" placeholder="Mention Special Needs Here" hidden="true">
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="form-group" class="image-justify" style="text-align: center; margin-top: 50px;">
							<img id="output" class="output" style="border: 1px solid black; width: 80%;	" />
							<input type="file" style="display: none;" name="fileToUpload" onchange="loadFile(event)" id="fileToUpload" style="margin-top: 10px;">
							<p style="font-size: 12px; color: red;">(Size < 2MB, Formats: JPG, JPEG, and PNG)</p>
							<input type="button" value="Browse" style="margin-top: 20px; " onclick="document.getElementById('fileToUpload').click();" />
							<label class="required">Student's Photo</label>					
						</div>						
					</div>	
				</div>
				<!-- <div class="row">
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<div class="form-group">
							<select name="country" required="true" class="countries form-control" id="countryId">
							    <option value="">Select Country</option>
							</select>
						</div>						
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<div class="form-group">
							<select name="state" required="true" class="states form-control" id="stateId">
							    <option value="">Select State</option>
							</select>
						</div>						
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<div class="form-group">
							<select name="city" required="true" class="cities form-control" id="cityId">
							    <option value="">Select City</option>
							</select>
						</div>						
					</div>
				</div> -->
				<hr style="width: 100%; margin-top: 20px; margin-bottom: 20px; border-top: 2px solid black;">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">	
						<div class="form-group" style="text-align: center;">
							<label><b>Father's Details</b></label>	
						</div>
						<div class="form-group">
							<!-- <label class="required">Name</label> -->
							<input type="text" name="fname" maxlength="20" class="form-control" placeholder="Enter your Father's Name*" required="true">	
						</div>
						<div class="form-group">
							<!-- <label class="required">Name</label> -->
							<input type="text" name="fqual" maxlength="20" class="form-control" placeholder="Enter your Father's Education Qualification*" required="true">	
						</div>
						<div class="form-group">
							<!-- <label>Occupation</label> -->
							<input type="text" name="focc" maxlength="20" class="form-control" placeholder="Enter your Father's Occupation*" required="true">	
						</div>
						<div class="form-group">
							<!-- <label class="required">Name</label> -->
							<input type="text" name="fcomp" maxlength="20" class="form-control" placeholder="Enter name of the organization*" required="true">	
						</div>
						<div class="form-group">
							<!-- <label class="required">Name</label> -->
							<input type="text" name="fsal" class="form-control" placeholder="Enter your Father's Income" required="true">	
						</div>						
						<div class="form-group">
							<!-- <label class="required">Contact Number</label> -->
							<input type="Number" pattern="[789][0-9]{9}" name="fnum" class="form-control" placeholder="Enter your Father's Mobile Number*" required="true">	
						</div>
						<div class="form-group">
							<!-- <label class="required">Contact Number</label> -->
							<input type="email" name="fmail" class="form-control" placeholder="Enter your Father's Email ID*" required="true">	
						</div>				
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="form-group" style="text-align: center;">
							<label><b>Mother's Details</b></label>	
						</div>
						<div class="form-group">
							<!-- <label class="required">Name</label> -->
							<input type="text" name="mname" maxlength="20" class="form-control" placeholder="Enter your Mother's Name*" required="true">
						</div>
						<div class="form-group">
							<!-- <label class="required">Name</label> -->
							<input type="text" name="mqual" maxlength="20" class="form-control" placeholder="Enter your Mothers's Education Qualification*" required="true">	
						</div>
						<div class="form-group">
							<!-- <label>Occupation</label> -->
							<input type="text" name="mocc" maxlength="20" class="form-control" placeholder="Enter your Mother's Occupation*" required="true">	
						</div>
						<div class="form-group">
							<!-- <label class="required">Name</label> -->
							<input type="text" name="mcomp" class="form-control" placeholder="Enter name of the organization*" required="true">
						</div>
						<div class="form-group">
							<!-- <label class="required">Name</label> -->
							<input type="text" name="msal" class="form-control" placeholder="Enter your Mother's Income" required="true">	
						</div>						
						<div class="form-group">
							<!-- <label class="required">Contact Number</label> -->
							<input type="Number" name="mnum" pattern="[789][0-9]{9}" class="form-control" placeholder="Enter your Mother's Mobile Number*" required="true">	
						</div>	
						<div class="form-group">
							<!-- <label class="required">Contact Number</label> -->
							<input type="email" name="mmail" class="form-control" placeholder="Enter your Mother's Email ID*" required="true">	
						</div>					
					</div>
				</div>
				<hr style="width: 100%; margin-top: 20px; margin-bottom: 20px; border-top: 2px solid black;">
<!-- 					<div class="<col>-lg-9 col-md-9 col-sm-12 col-xs-12">
						<div class="form-check form-switch">
						  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" onclick="switchfunction()">
						  <label class="form-check-label" for="flexSwitchCheckDefault">Gaurdian Available?</label>
						</div>
					</div> -->
				<div>
					<div class="form-group"  style="border: 1px solid lightgrey; border-radius: 5px; padding: 5px; margin-right: 10px; margin-left: 10px; margin-top: 8px; margin-bottom: 5px;">
						<label class="form-check-label" for="gaurdian">Child Under Gaurdian care? </label>
						<div class="form-check form-check-inline" style="margin-left: 30px;">
							<input onclick="gaurdianfunc(this)" class="form-check-input" type="radio" name="gaurdian" id="gaurdian" value="yes">
							<label class="form-check-label" for="yes">Yes</label>
						</div>
						<div class="form-check form-check-inline">
							<input onclick="gaurdianfunc(this)" class="form-check-input" type="radio" name="gaurdian" id="gaurdian" value="no" checked="true">
							<label class="form-check-label" for="no">No</label>
						</div>
					</div>	
					<div class="row" id="gaurdiandetails" style="display: none;">	
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group" style="text-align: center;">
									<label><b>Gaurdian Details</b></label>	
								</div>
								<div class="form-group">
									<input type="text" name="gname" id="gname" class="form-control" placeholder="Enter your Gaurdian's Name*">
								</div>
								<div class="form-group">
									<input type="Number" name="gnum" id="gnum" pattern="[789][0-9]{9}" class="form-control" placeholder="Enter your Gaurdian's Mobile Number*">	
								</div>	
								<div class="form-group">
									<input type="text" name="gaddr" id="gaddr" class="form-control" placeholder="Enter your Gaurdian's Home Address*">	
								</div>					
						</div>						
					</div>
					<div class="form-group" style="text-align: center;">
						<button type="submit" class="btn btn-primary" name="submit">Enroll</button>
					</div>	
				</div>
			</form>
			</div>
		</div>
	</div>

	<!-- enrollment form ends here -->
	

	<!-- Contact Us starts here -->

	<div class="container" style="margin-top: 150px;">
		<div class="contact-us">
			<div class="about-us-header">
				<p class="about-us-border">Contact Us</p>
			</div>
			<div class="row top-margin">
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">	
				<img src="images/temp-image.jpg" class="contact-us-image">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="contact-us-content">
						<div class="contact-us-content-heading">
							<p>Magizham Open Learning Community</p>
						</div>
						<div class="contact-us-content-info">
							<p class="address">No: 12, 13th cross, Lakshmi Nagar, Hosur - 635109</p>
							<p class="phone-number"><i class="bi bi-telephone"></i> (+91) 9944563085</p>
							<p class="phone-number"><i class="bi bi-telephone"></i> (+91) 9442469085</p>
							<p class="email"><i class="bi bi-envelope-open"></i> magizham2020@gmail.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Contact Us ends here -->
	<!-- footer starts herer -->
<footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <h6 data-aos="zoom-out">About</h6>
              <p class="text-justify" data-aos="zoom-out">Magizham Open Learning Community had a humble beginning in 2014 with 10 pre primary children in Hosur. We progressed to aMontessori school in 2017 and started MOLC (Alternative Education) in 2020. Since then MOLC family is growing steadily with a strong team of teachers and enthusiastic children.</p>
            </div>

            <div class="col-xs-6 col-md-3">
            </div>

            <div class="col-xs-6 col-md-3">
              <h6 data-aos="zoom-out">Quick Links</h6>
              <ul class="footer-links">
                <li><a href="../../" data-aos="zoom-out">Home</a></li>
                <li><a href="../../curriculum/" data-aos="zoom-out">Curriculum</a></li>
                <li><a href="../../login.php" data-aos="zoom-out">Login</a></li>
                <!-- <li><a href="" data-aos="zoom-out">Enroll</a></li> -->
              </ul>
            </div>
          </div>
          <hr style="border-bottom: 3px solid #b200e3;">
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
              <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by <a href="#">Magizham OLC</a>.
              </p>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <ul class="social-icons">
                <p class="copyright-text">Powered by Tybon</a>.
              </p>
              </ul>
            </div>
          </div>
        </div>
  </footer>

	<!-- footer ends here -->


     <!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>