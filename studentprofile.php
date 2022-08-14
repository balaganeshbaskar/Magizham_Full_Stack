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

	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

	<script src="js/adminpanel.js"></script>

</head>

<?php
  //login confirmation
  confirm_logged_in();
  
?>
<style>
.changepic{
  position: absolute;
  width: 240px;
  height: 280px;
  color: #fff;
  left:0px;
  top: 0px;
  padding-top: 130px;
  text-align: center;
  opacity: 0;
  transition: opacity .35s ease;
}

.changepic a{
  width: 200px;
  padding: 12px 48px;
  text-align: center;
  color: white !important;
  border: solid 2px white;
  z-index: 1;
}

.pic:hover .changepic {
  opacity: 1;
}


.pic:hover .overlay {
  display: block;
  background: rgba(0, 0, 0, .3);
}

.overlay {
  position: absolute;
  top: 20px;
  left: 0;
  width: 240px;
  height: 280px;
  border-radius: 10px;
  background: rgba(0, 0, 0, 0);
  transition: background 0.5s ease;
}

#output{
  width: 100%; 
  height: 250px;
  box-shadow: 0 15px 30px rgba(0,0,0,0.2);
  border-radius: 10px;
  margin-top: 20px;
}
.align-items-center{
  margin-top: 50px; margin-bottom: 50px;
}

.formclass .form-group
{
	margin-top: 10px;
	margin-bottom: 10px;
	text-align: center;
}

.formclass input
{
	text-align: center;
}

.formclass label
{
	color: brown;
}



</style>

<script>

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

	var loadFile = function(event) 
	{
		var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
		output.onload = function()
		{
			URL.revokeObjectURL(output.src) // free memory
		}
	};


	function StudentControl()
	{ 
	    $("div .parcontrol").each(function(){
	        var re = $(this).prop('readonly'); 
	        $(this).prop('readonly', true);
	    });

	    $("div .teacontrol").each(function(){
	        var re = $(this).prop('readonly'); 
	        $(this).prop('readonly', true);
	    });

		$("div .stucontrol").each(function(){
	        var re = $(this).prop('readonly'); 
	        $(this).prop('readonly', true);
	    });
		
		// document.getElementById("addyear").style.display = "none";
		document.getElementById("backbutton").style.display = "none";	 
		document.getElementById("updatestu").style.display = "none";
		// document.getElementById("creds_div").style.display = "none";
		// document.getElementById("creds_div").remove();
		// document.getElementById("show_creds_button").style.display = "none";
		// document.getElementById("show_creds_button").remove();
		   
	}

	function ParentControl()
	{
	    $("div .stucontrol").each(function(){
	        var re = $(this).prop('readonly'); 
	        $(this).prop('readonly', true);
	    });

	    $("div .teacontrol").each(function(){
	        var re = $(this).prop('readonly'); 
	        $(this).prop('readonly', true);
	    });

		$("div .parcontrol").each(function(){
	        var re = $(this).prop('readonly'); 
	        $(this).prop('readonly', true);
	    });

	    // document.getElementById("addyear").style.display = "none";
	    document.getElementById("backbutton").style.display = "none";
	    document.getElementById("updatestu").style.display = "none";
		// document.getElementById("creds_div").style.display = "none";
		// document.getElementById("creds_div").remove();
		// document.getElementById("show_creds_button").style.display = "none";
		// document.getElementById("show_creds_button").remove();
		
	    
	}

	function ClassTeacherControl()
	{
		$("div .flag").each(function(){
	        var re = $(this).prop('readonly');
	        $(this).prop('readonly', true);
	    });

	}

	function TeacherControl()
	{
	    $("div .parcontrol").each(function(){
	        var re = $(this).prop('readonly'); 
	        $(this).prop('readonly', true);
	    });

	    $("div .stucontrol").each(function(){
	        var re = $(this).prop('readonly'); 
	        $(this).prop('readonly', true);
	    });

		$("div .teacontrol").each(function(){
	        var re = $(this).prop('readonly'); 
	        $(this).prop('readonly', true);
	    });

		$("div #student_details_modal .teacontrol").each(function(){
	        var re = $(this).prop('readonly'); 
	        $(this).prop('readonly', false);
	    });

		// $("div .teacontrol").each(function(){
	    //     var re = $(this).prop('readonly'); 
	    //     $(this).prop('readonly', !re);
	    // });
	    
	}

	function Prev_year_data_lock()
	{
	    $("div .parcontrol").each(function(){
	        var re = $(this).prop('readonly'); 
	        $(this).prop('readonly', true);
	    });

	    $("div .stucontrol").each(function(){
	        var re = $(this).prop('readonly'); 
	        $(this).prop('readonly', true);
	    });

		$("div .teacontrol").each(function(){
	        var re = $(this).prop('readonly'); 
	        $(this).prop('readonly', true);
	    });

		document.getElementById("updateall").style.display = "none";
		document.getElementsByClassName("btn btn-info edit_data")[0].disabled = true;

		document.getElementById("backbutton").style.display = "none";	 
		document.getElementById("updatestu").style.display = "none";
		
		// $("div .flag").each(function(){
	    //     var re = $(this).prop('readonly'); 
	    //     $(this).prop('readonly', true);
	    // });
	    
	}

	function popup()
	{
		var yearaddition = "nothing";
         $('#academic_year_modal').modal('show');
	}

	function show_creds()
	{
		// document.getElementById("creds_div").style.display = "block";
		// document.getElementById("show_creds_button").style.display = "none";
	}

	function stumodal(input)
	{
         // $('#student_details_modal').modal('show');
         var s_id = input.id;
         // alert(s_id);

         $(document).ready(function(){ 
			
			// var s_id = 1;
		       $.ajax({
		            url:"admin_fetch.php",  
		            method:"POST",  
		            data:{edit_data_modal:s_id},  
		            dataType:"json",  
		            success:function(data)
		            {  	
						$('#student_id').val(data.student_id);
		            	$('#name').val(data.name);
						$('#dob').val(data.dob);
						$('#age').val(data.age);
						
						if(data.gender == 'male')
						{
							$('#male').attr('checked',true);
							// $('#female').attr('hidden',true);
							// $('#femalel').attr('hidden',true);
						}
						else
						{
							$('#female').attr('checked',true);
							// $('#male').attr('hidden',true);
							// $('#malel').attr('hidden',true);
						}
						$('#aadhar').val(data.aadhar);
						$('#grade').val(data.grade);
						$('#roll_number').val(data.roll_number);
						$('#prevschool').val(data.lastschool);
						$('#mtongue').val(data.mtongue);
						$('#address').val(data.address);
						$('#religion').val(data.religion);
						$('#country').val(data.country);
						$('#bloodtype').val(data.bloodtype);
						$('#siblings').val(data.siblings);
						

						if(data.specialneeds == 'no')
						{
							$('#no').attr('checked',true);
							$('#snlabel').attr('hidden',true);
						}
						else
						{
							$('#yes').attr('checked',true);
							$('#specialneedsfull').attr('hidden',false);
							$('#snlabel').attr('hidden',false);
							$('#specialneedsfull').val(data.specialneeds);
						}

						$('#fname').val(data.fname);
						$('#fqual').val(data.fqual);
						$('#focc').val(data.focc);
						$('#fcomp').val(data.fcomp);
						$('#fsal').val(data.fsal);
						$('#fnum').val(data.fnum);
						$('#fmail').val(data.fmail);

						$('#mname').val(data.mname);
						$('#mqual').val(data.mqual);
						$('#mocc').val(data.mocc);
						$('#mcomp').val(data.mcomp);
						$('#msal').val(data.msal);
						$('#mnum').val(data.mnum);
						$('#mmail').val(data.mmail);
						
						$('#doa').val(data.doa);

						if(data.gname == 'no')
						{
							$('#gno').attr('checked',true);
						}
						else
						{
							$('#gyes').attr('checked',true);
							$('#gaurdiandetails').css("display", "block");
							
							$('#gname').val(data.gname);
							$('#gnum').val(data.gnum);
							$('#gaddr').val(data.gaddr);

						}

						// alert(data.name);
						// alert("asdasdsad");
						$('#photo_id').val(data.photo_id);
						$('#output').attr("src", "forms/enrollment/profilepictures/"+data.photo_id);

						$('#stu_uname').val(data.stu_uname);
						$('#stu_pass').val(data.stu_pass);

						$('#par_uname').val(data.par_uname);
						$('#par_pass').val(data.par_pass);


						$('#student_details_modal').modal('show');  
		            }  
		       });  
			});
	}

	function addnewyear()
	{
		var newyear = $('#entered_year').val();
		// alert(newyear);

		$(document).ready(function(){ 
			$.ajax({
					url:"admin_update.php",  
					method:"POST", 
					data:{nyear:newyear},  
					dataType:"json",  
					success:function(data)
					{  
						// $('#roll_no').val(data.aadhar);
						// $('#name').val(data.name);
						// $('#dob').val(data.dob);
						// $('#number').val(data.number);
						// $('#address').val(data.address);
						// $('#country').val(data.country);
						// $('#school').val(data.prevschool);
						// $('#grade').val(data.mothertongue);

						// $('#stu_modal').modal('show');
						alert(data.res); 
						location.reload();
					}  
				});  
			});
	}


	function valuechanged(input) // color change for value change
	{	
		input.style.backgroundColor = "#ffe0cc";
		document.getElementById("updateall").disabled = false;
	}

		// let stateObj = { id: "000" };
		// window.history.replaceState(stateObj,"studentprofile.php", "studentprofile.php");

</script>

<script>
	const queryString = window.location.search;
	// console.log("Hello!");			
	const urlParams = new URLSearchParams(queryString);
	const url_type = urlParams.get('aca_year');

	var aca_year = url_type;
	// document.getElementById("aca_year_select").value = url_type;
	// console.log(url_type);
</script>

<body>
	<div class="container">

		<!-- <div class="title">
			<h3>ADMIN PANEL</h3>
		</div> -->	
		<div class="modal fade bd-example-modal-xl" id="student_details_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-xl">
		    <div class="modal-content">
		    	<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Student's Details</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="align-items-center" style="">
					<div class="formclass">
				    	<form action="student_details_update.php" method="POST" enctype="multipart/form-data">
							<div class="row">
								<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12"  style="border-right: 2px solid lightgrey;">
									<!-- <div class="form-group" style="text-align: center;">
										<label><b>Student's Details</b></label>	
									</div> -->
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
											<div class="form-group" style="text-align: center;">
												<label class="required">Name</label>
												<input required type="text" maxlength="20" name="name" id="name" class="form-control teacontrol" placeholder="Enter your Name*">
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
											<div class="form-group">
												<label class="required">Date of Birth</label>
												<input placeholder="Select Date of Birth*" class="form-control teacontrol" name="dob" required="true" type="text" onfocus="(this.type='date')" id="dob">
											</div>					
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
											<div class="form-group">
												<label class="required">Age</label>
												<input type="text" name="age" id="age" maxlength="80" required="true" class="form-control teacontrol" placeholder="Age (as of 1st of June)">
											</div>						
										</div>
									</div>
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
											<div class="form-group">
												<label class="required"> </label><br>
												<div style="border: 1px solid lightgrey; border-radius: 5px; padding-bottom: 5px;">
													<label class="form-check-label" for="male" style="margin-right: 10px;">Gender: </label>
													<div class="form-check form-check-inline">
													  <input class="form-check-input teacontrol" type="radio" name="gender" id="male" value="male">
													  <label class="form-check-label" id="malel" for="male">Male</label>
													</div>
													<div class="form-check form-check-inline">
													  <input class="form-check-input teacontrol" type="radio" name="gender" id="female" value="female">
													  <label class="form-check-label" id="femalel" for="female">Female</label>
													</div>
												</div>
											</div>				
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
											<div class="form-group">
												<label class="required">Previous School</label>
												<input type="text" name="lastschool" id="prevschool" class="form-control teacontrol" placeholder="Name of the school last studied" required="true">
											</div>		
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
											<div class="form-group">
												<label class="required">Mother Tongue</label>
												<input type="text" name="mtongue" id="mtongue" class="form-control teacontrol" placeholder="Mother tongue" required="true">
											</div>							
										</div>
									</div>
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
											<div class="form-group">
												<label class="required">Grade</label>
												<select class="form-select teacontrol" aria-label="Default select" name="grade" id="grade" required="true">
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
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
											<div class="form-group">
												<label>Aadhar Number</label>
												<input type="text" name="aadhar" id="aadhar" maxlength="12" required="true" class="form-control teacontrol" placeholder="Aadhar Number of the student">
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
											<div class="form-group">
												<label class="required">Date Of Application:</label>
												<input placeholder="Date Of Application" class="form-control teacontrol" name="doa" required="true" type="text" onfocus="(this.type='date')" id="doa" disabled="true">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
											<div class="form-group">
												<label class="required">Address</label>
												<input type="text" name="address" id="address" maxlength="200" required="true" class="form-control teacontrol" placeholder="Enter your Address*">
											</div>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
											<div class="form-group">
												<label class="required">Siblings</label>
												<input type="text" name="siblings" id="siblings" class="form-control teacontrol" placeholder="Number of Siblings" required="true">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
											<div class="form-group">
												<label class="required">Blood Group</label>
												<select class="form-select teacontrol" name="bloodtype" id="bloodtype" required="true">
													<option>Select Blood Group</option>
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
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
											<div class="form-group">
												<label class="required">Religion</label>
												<input type="text" name="religion" id="religion" required="true" class="form-control teacontrol" placeholder="Religion">
											</div>						
										</div>	
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
											<div class="form-group">
												<label class="required">Nationality</label>
												<input required="true" type="text" name="country"  id="country" class="form-control teacontrol" placeholder="Nationality">
											</div>						
										</div>
									</div>
									
									<div class="form-group"  style="border: 1px solid lightgrey; border-radius: 5px; padding: 5px; margin-right: 10px; margin-left: 10px; margin-top: 8px; margin-bottom: 5px;">
										<label class="form-check-label" for="specialneeds">Child with special needs? </label>
										<div class="form-check form-check-inline" style="margin-left: 30px;">
											<input onclick="specialneedsfunc(this)" class="form-check-input teacontrol" type="radio" name="specialneeds" id="yes" value="yes">
											<label class="form-check-label" for="yes">Yes</label>
										</div>
										<div class="form-check form-check-inline">
											<input onclick="specialneedsfunc(this)" class="form-check-input teacontrol" type="radio" name="specialneeds" id="no" value="no" checked="true">
											<label class="form-check-label" for="no">No</label>
										</div>
									</div>	
									<div class="form-group">
										<label class="required" id="snlabel">Special Needs</label>
										<input type="text" name="specialneedsfull" id="specialneedsfull" class="form-control teacontrol" placeholder="Mention Special Needs Here" hidden="true">
									</div>
									<!-- <div id="show_creds_button" class="form-group">
										<button style="background-color: #dddddd;" type="button" class="btn" onclick="show_creds();">Show Credentials</button>
									</div>
									<div id="creds_div" style="display:none;">
										<div class="row">
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
												<div class="form-group">
													<label>Student login</label>
													<input type="text" name="stu_uname" id="stu_uname" maxlength="200" class="form-control teacontrol mb-1">
													<input type="text" name="stu_pass" id="stu_pass" maxlength="200" class="form-control teacontrol">
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
												<div class="form-group">
													<label>Parent login</label>
													<input type="text" name="par_uname" id="par_uname" maxlength="200" class="form-control teacontrol mb-1">
													<input type="text" name="par_pass" id="par_pass" maxlength="200" class="form-control teacontrol">
												</div>
											</div>
										</div>
									</div> -->
									
								</div>
								<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

									<div class="pic form-group" style="position: relative;">
										<img id="output" class="output" style="border: 1px solid #D3D3D3; border-radius: 10px; height: 280px; width: 240px;" />
										<div class="overlay"></div>
										<!-- <input type="file" style="display: none;" name="fileToUpload" onchange="loadFile(event)" id="fileToUpload" style="margin-top: 10px;"> -->
										<input type="text" name="photo_id" id="photo_id" hidden>
										<!-- <div class="button changepic"><button type="button" class="btn btn-default">Change Photo</button></div> -->
											<!-- <div class="button changepic">
												<input type="button" class="btn btn-default teacontrol" value="Change Photo" onclick="document.getElementById('fileToUpload').click();" />
											</div> -->
									</div>

									<div style="margin-top: 20px; border-top: 2px solid lightgrey;">
										<div class="form-group">
											<label class="required">Roll Number</label>
											<input type="text" name="roll_number" id="roll_number" class="form-control teacontrol" placeholder="Roll number" required="true">
										</div>
										<div class="form-group"  style="border: 1px solid lightgrey; border-radius: 5px; padding: 5px; margin-right: 10px; margin-left: 10px; margin-top: 8px; margin-bottom: 5px;">
											<label class="form-check-label" for="gaurdian">Child Under Gaurdian care? </label>
											<div class="form-check form-check-inline" style="margin-left: 30px;">
												<input onclick="gaurdianfunc(this)" class="form-check-input teacontrol" type="radio" name="gaurdian" id="gyes" value="yes">
												<label class="form-check-label" for="yes">Yes</label>
											</div>
											<div class="form-check form-check-inline">
												<input onclick="gaurdianfunc(this)" class="form-check-input teacontrol" type="radio" name="gaurdian" id="gno" value="no">
												<label class="form-check-label" for="no">No</label>
											</div>
										</div>	
										<div class="row" id="gaurdiandetails" style="display: none;">	
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<div class="form-group" style="text-align: center;">
														<label><b>Gaurdian Details</b></label>	
													</div>
													<div class="form-group">
														<input type="text" name="gname" id="gname" class="form-control teacontrol" placeholder="Enter your Gaurdian's Name*">
													</div>
													<div class="form-group">
														<input type="Number" name="gnum" id="gnum" pattern="[789][0-9]{9}" class="form-control teacontrol" placeholder="Enter your Gaurdian's Mobile Number*">	
													</div>	
													<div class="form-group">
														<input type="text" name="gaddr" id="gaddr" class="form-control teacontrol" placeholder="Enter your Gaurdian's Home Address*">	
													</div>					
											</div>						
										</div>
									</div>					
								</div>
							</div>
							<hr style="width: 100%; margin-top: 20px; margin-bottom: 20px; border-top: 2px solid black;">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="border-right: 1px solid darkgrey;">	
									<div class="form-group" style="text-align: center;">
										<label><b>Father's Details</b></label>	
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">	
												<label class="required">Name</label>
											</div>
											<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">	
												<input type="text" name="fname" id="fname" maxlength="20" class="form-control teacontrol" placeholder="Enter your Father's Name*" required="true">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">	
												<label class="required">Qualification</label>
											</div>
											<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">	
												<input type="text" name="fqual"  id="fqual" maxlength="20" class="form-control teacontrol" placeholder="Enter your Father's Education Qualification*" required="true">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">	
												<label class="required">Occupation</label>
											</div>
											<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">	
												<input type="text" name="focc" id="focc" maxlength="20" class="form-control teacontrol" placeholder="Enter your Father's Occupation*" required="true">	
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">	
												<label class="required">Organization Name</label>
											</div>
											<div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">	
												<input type="text" name="fcomp" id="fcomp" maxlength="20" class="form-control teacontrol" placeholder="Enter name of the organization*" required="true">	
											</div>
										</div>	
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">	
												<label class="required">Income</label>
											</div>
											<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">	
												<input type="text" name="fsal" id="fsal" class="form-control teacontrol" placeholder="Enter your Father's Income" required="true">	
											</div>
										</div>
									</div>						
									<div class="form-group">
										<div class="row">
											<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">	
												<label class="required">Mobile Number</label>
											</div>
											<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">	
												<input type="Number" pattern="[789][0-9]{9}" name="fnum" id="fnum" class="form-control teacontrol" placeholder="Enter your Father's Mobile Number*" required="true">
											</div>
										</div>		
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">	
												<label class="required">E-Mail ID</label>
											</div>
											<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">	
												<input type="email" name="fmail" id="fmail" class="form-control teacontrol" placeholder="Enter your Father's Email ID*" required="true">	
											</div>
										</div>
									</div>				
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<div class="form-group" style="text-align: center;">
										<label><b>Mother's Details</b></label>	
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">	
												<label class="required">Name</label>
											</div>
											<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">	
												<input type="text" name="mname" id="mname" maxlength="20" class="form-control teacontrol" placeholder="Enter your Mother's Name*" required="true">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">	
												<label class="required">Qualifications</label>
											</div>
											<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">	
												<input type="text" name="mqual" id="mqual" maxlength="20" class="form-control teacontrol" placeholder="Enter your Mothers's Education Qualification*" required="true">	
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">	
												<label class="required">Occupation</label>
											</div>
											<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">	
												<input type="text" name="mocc" id="mocc" maxlength="20" class="form-control teacontrol" placeholder="Enter your Mother's Occupation*" required="true">	
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">	
												<label class="required">Organization Name</label>
											</div>
											<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">	
												<input type="text" name="mcomp" id="mcomp" class="form-control teacontrol" placeholder="Enter name of the organization*" required="true">
											</div>
										</div>		
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">	
												<label class="required">Income</label>
											</div>
											<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">	
												<input type="text" name="msal" id="msal" class="form-control teacontrol" placeholder="Enter your Mather's Income" required="true">	
											</div>
										</div>		
									</div>						
									<div class="form-group">
										<div class="row">
											<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">	
												<label class="required">Mobile Number</label>
											</div>
											<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">	
												<input type="Number" name="mnum" id="mnum" pattern="[789][0-9]{9}" class="form-control teacontrol" placeholder="Enter your Mother's Mobile Number*" required="true">	
											</div>
										</div>
									</div>	
									<div class="form-group">
										<div class="row">
											<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">	
												<label class="required">E-Mail ID</label>
											</div>
											<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">	
												<input type="email" name="mmail" id="mmail" class="form-control teacontrol" placeholder="Enter your Mother's Email ID*" required="true">	
											</div>
										</div>
									</div>					
								</div>
							</div>
							<input type="text" name="student_id" id="student_id" hidden>	
							<hr style="width: 100%; margin-top: 20px; margin-bottom: 20px; border-top: 2px solid black;">
							<div class="form-group" style="text-align: center;">
								<button type="submit" class="btn btn-primary" id="updatestu" name="updatestu" >Update</button>
							</div>	
						</form>
					</div>
					</div>
			    </div>
		      	<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
		    </div>
		  </div>
		</div>

		<div class="modal fade" id="academic_year_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Add / Remove Academic Year</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		      	<!-- input field with add button -->
		      	<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="">
							<input type="text" name="entered_year" id="entered_year" class="form-control" placeholder="Format: '2020-2021'">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="">
							<button class="btn btn-success" onclick="addnewyear();return false;">ADD</button>
						</div>
					</div>
				</div>
				<!-- list of already present years -->
				<br><br>
				<div class="row">
					<h5>Existing Academic years:</h5>
					<?php 
						$attyear = $mysqli->query("SELECT DISTINCT year FROM attendance ORDER BY year DESC") or die($mysqli->error);
						while ($rr = $attyear->fetch_assoc())
						{
							// echo "<option>".$rr['year']."</option>";
							echo "<br>";
							echo "<p>".$rr['year']."</p>";
						}
					?>
				</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>

		<div class="logo_centered">
			<img src="images/brand-molc.jpg" alt="">
		</div>

		<hr style="width: 100%; margin-top: 20px; margin-bottom: 20px; border-top: 2px solid black;">

		<div class="header">
			<div class="row">
				<?php 
					$s_ss_id = $_SESSION['TEACHER_ID'];
				?>
				<div class="leftside col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<h3 style="color: white">__</h3>
					<div class="">
						<button id="backbutton" name="backbutton" class="btn btn-warning" onclick="location.href='processlogin.php?from=student&stu_id=<?php echo $s_ss_id; ?>';">Back</button>
					</div>
				</div>
				<div class="rightside col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<h3>Welcome, <?php echo  $_SESSION['USER_NAME'];?></h3>
					<?php if($_SESSION['USER_TYPE'] == 'teacher'):

						$uname_intro = $_SESSION['USER_NAME'];

						$intro_grade = $_SESSION['T_GRADE']; 
						$intro_subject = $_SESSION['T_SUBJECT'];
						$intro_classteacher = $_SESSION['T_CLASSTEACHER'];
						// $t_fname = $_SESSION['USER_NAME'];

						?>
						<?php if($intro_classteacher == 'yes'):?>
						<h5>Class <?php echo  $intro_grade;?> (Class teacher)</h5>
						<?php endif; ?>	
						
						<?php if($intro_classteacher == 'no'):?>
						<h5>Class <?php echo  $intro_grade;?></h5>
						<?php endif; ?>	

						<h5><?php echo  $intro_subject;?></h5>

					<?php endif; ?>	
					<div class="">
						<?php if($_SESSION['USER_TYPE'] != 'teacher'):?>
							
						<button style="margin-right: 10px;" onclick="stusetting();return false;" class="btn btn-warning">Settings</button>
						<a href="logout.php"><button class="btn btn-danger">Log Out</button></a>
						<?php endif; ?>
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
								<input onchange="check_new_pass_again(this);" type="password" name="user_new_password" id="user_new_password" class="form-control" placeholder="Enter New Password">
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
								<input onchange="check_new_pass_again(this);" type="password" name="user_new_password_again" id="user_new_password_again" class="form-control" placeholder="Enter New Password again">
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
								<button type="submit" id="update_user_password" name="update_user_password" class="btn btn-success" disabled="true">UPDATE</button>
							</div>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
							<div class="">
								<!-- <button class="btn btn-success" onclick="addnewyear();return false;">ADD</button> -->
							</div>
						</div>
					</div>
					<input type="text" name="stu_pass_id" id="stu_pass_id" value="<?php echo $_SESSION['MEMBER_ID'].'_%_'.$_SESSION['USER_NAME']; ?>" class="form-control" hidden>
				</form>			
		      </div>
		      <!-- <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		      </div> -->
		    </div>
		  </div>
		</div>


		<hr style="width: 100%; margin-top: 20px; margin-bottom: 20px; border-top: 2px solid black;">

		<?php 
			// $id = $_GET['id'];
			$s_id = $_SESSION['MEMBER_ID'];

			$personal = $mysqli->query("SELECT * FROM personal where s_id = '$s_id'") or die($mysqli->error); 
			$per = $personal->fetch_assoc();

			$student = $mysqli->query("SELECT * FROM student WHERE s_id = '$s_id'") or die($mysqli->error);
			$stu = $student->fetch_assoc();

			$parent = $mysqli->query("SELECT * FROM parents where s_id = '$s_id'") or die($mysqli->error);
			$par = $parent->fetch_assoc();
		?>

		<div class="content">

			<div class="row" style="text-align: center; margin-bottom: 30px;">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<h3><b>Student Details</b></h3>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="text-align: right;">
					<label class="required" style="padding-top: 5px;"><b>Academic Year:</b></label>
				</div>

				<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
					<div class="form-group">
						<select class="form-select teacontrol" aria-label="Default select" onchange="get_prev_year_data(this);" name="aca_year_select" id="aca_year_select" required="true">
						<option value='nan' disabled>Academic Year</option>;
						<?php 
							$attyear = $mysqli->query("SELECT DISTINCT year FROM attendance where s_id = '$s_id' ORDER BY year DESC") or die($mysqli->error);
							$rr = $attyear->fetch_assoc();
							echo "<option value='current' selected>".$rr['year']."</option>";
						?>
						<?php
							$atteyear = $mysqli->query("SELECT DISTINCT year FROM attendance_prev where s_id = '$s_id' ORDER BY year DESC") or die($mysqli->error);
							while ($rrr = $atteyear->fetch_assoc())
							{
								echo "<option value=".$rrr['year'].">".$rrr['year']."</option>";
							}
						?>
						</select>
					</div>
				</div>

			</div>

			<?php 
				$aca_year = $_GET['aca_year'];
				if($aca_year != 'current'): ?>
				<div class="row mb-3" style="text-align:center;">
					<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">

					</div>
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<h5 style="color:orange;">(Currently viewing previous academic year data, editing is restricted)</h5>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">

					</div>
				</div>
			<?php endif; ?>

			<?php if(isset($_SESSION['message'])): ?>
				<div style="margin-top: 20px" class="alert alert-<?=$_SESSION['msg_type']?>">

					<?php 
						echo $_SESSION['message'];
						unset($_SESSION['message']);	
					?>
					
				</div>
			<?php endif; ?>	
			
			<div id="deadline_display">

				<div id="deadline_notstarted" class="alert alert-warning" hidden>
					<h5 id="deadline_heading">Deadline(s) yet to start:</h5>

					<!-- <div id="notstarted1">
						<span id="nssno1"><b>1) </b></span>
						<span><b>SUBJECT: </b></span>
						<span id="nssubject1"></span>
						<span><b>START: </b></span>
						<span id="nsstart1"></span>
						<span><b>END: </b></span>
						<span id="nsend1"></span>
					</div> -->

				</div>

				<div id="deadline_started" class="alert alert-danger" hidden>
					<h5 id="deadline_heading">Deadline(s) started:</h5>

					<!-- <div id="started1">
						<span id="ssno1"><b>1) </b></span>
						<span><b>SUBJECT: </b></span>
						<span id="ssubject1"></span>
						<span><b>END: </b></span>
						<span id="send1"></span>
						<span><b>REMAINING: </b></span>
						<span id="sremaining1"></span>
					</div> -->

				</div>

			</div>

			<h5><span id="error_deadline"></span></h5>
			

	        <form action="admin_update.php" method="post" enctype="multipart/form-data" style="margin-bottom: 200px;">
	        	<!-- Basic Student Info -->
	        	<div class="row card_new_try" style="text-align: right; border: 1px solid lightgrey; border-radius: 5px; padding-top: 10px; padding-bottom: 10px;">
	        		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="border-right: 1px solid lightgrey;">
	        			<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<div class="form-group">
									<label class="required" style="padding-top: 5px;"><b>Name:</b></label>
								</div>
							</div>
							<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
								<div class="form-group">
									<input type="text" name="name" value="<?php echo $per['name']; ?>" id="name"  class="form-control" readonly>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="border-right: 1px solid lightgrey;">
	        			<div class="row">
							<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
								<div class="form-group">
									<label class="required" style="padding-top: 5px;"><b>Roll No:</b></label>
								</div>
							</div>
							<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
								<div class="form-group">
									<input type="text" name="roll_no" value="<?php echo $stu['roll_no']; ?>" id="roll_no"  class="form-control" readonly>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="border-right: 1px solid lightgrey;">
	        			<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="form-group">
									<label class="required" style="padding-top: 5px;"><b>Grade:</b></label>
								</div>
							</div>
							<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
								<div class="form-group">
									<input type="text" name="grade" id="grade" value="<?php echo $stu['grade']; ?>"  class="form-control" readonly>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="border-right: 1px solid lightgrey;">
	        			<div class="row">
							<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
								<div class="form-group">
									<label class="required" style="padding-top: 5px;"><b>Father Mobile:</b></label>
								</div>
							</div>
							<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
								<div class="form-group">
									<input type="text" name="number" id="number" value="<?php echo $par['fnum']; ?>"  class="form-control" readonly>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="text-align: center;">
						<div class="">
							<button id="<?php echo $s_id; ?>" onclick="stumodal(this);return false;" class='btn btn-info edit_data'>Personal Details</button>
						</div>
					</div>
	        	</div>

				<div id="accordion" class="accordion">
				  
				  <div class="card attendance_styling">
				    <div class="card-header btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="headingOne">
				      <h3 class="mb-0"><span>1. Attendance</span> <span id="attendance_deadline_counter"></span></span> </h3>
				    </div>
				    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordions">
				      <div class="card-body">
				      	<!-- <div class="row" style="margin-bottom: 10px;">
							<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
								<button id="addyear" name="addyear" onclick="popup();return false;" class="btn btn-success">Add Academic Year</button>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								
							</div>
						</div> -->

				        <table id="studentdata" class="table table-hover" style="font-size: 17px;">
							<thead>
								<tr style="height: 50px;">
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

								<?php 
									$aca_year = $_GET['aca_year'];
									if($aca_year == 'current')
									{
										$attendancedata = $mysqli->query("SELECT * FROM attendance where s_id = '$s_id' ORDER BY year DESC") or die($mysqli->error);
									}
									else
									{
										$attendancedata = $mysqli->query("SELECT * FROM attendance_prev where s_id = '$s_id' and year = '$aca_year'") or die($mysqli->error);
									}

									$icounter = 1;
									while ($a_row = $attendancedata->fetch_assoc())
									{ ?>

								<tr style="height: 50px;">
									<td style="vertical-align: middle; width: 10%; border-right: 1px solid darkgrey;"><input type="text" class="form-control" name="year<?php echo $icounter; ?>" onkeyup="valuechanged(this)" placeholder="<?php echo $a_row['year']; ?>" value="<?php echo $a_row['year']; ?>" style="padding: 3px; text-align: center;" readonly></td>
									<td style="vertical-align: middle; width: 5%;"><input type="text" class="form-control teacontrol flag" name="june<?php echo $icounter; ?>" onkeyup="valuechanged(this)" placeholder="<?php echo $a_row['june']; ?>" value="<?php echo $a_row['june']; ?>" style="padding: 3px; text-align: center;"></td>
									<td style="vertical-align: middle; width: 5%;"><input type="text" class="form-control teacontrol flag" name="july<?php echo $icounter; ?>" onkeyup="valuechanged(this)" placeholder="<?php echo $a_row['july']; ?>" value="<?php echo $a_row['july']; ?>" style="padding: 3px; text-align: center;"></td>
									<td style="vertical-align: middle; width: 5%;"><input type="text" class="form-control teacontrol flag" name="aug<?php echo $icounter; ?>"  onkeyup="valuechanged(this)" placeholder="<?php echo $a_row['aug']; ?>" value="<?php echo $a_row['aug']; ?>" style="padding: 3px; text-align: center;"></td>
									<td style="vertical-align: middle; width: 5%;"><input type="text" class="form-control teacontrol flag" name="sept<?php echo $icounter; ?>" onkeyup="valuechanged(this)" placeholder="<?php echo $a_row['sept']; ?>" value="<?php echo $a_row['sept']; ?>" style="padding: 3px; text-align: center;"></td>
									<td style="vertical-align: middle; width: 5%;"><input type="text" class="form-control teacontrol flag" name="oct<?php echo $icounter; ?>"  onkeyup="valuechanged(this)" placeholder="<?php echo $a_row['oct']; ?>" value="<?php echo $a_row['oct']; ?>" style="padding: 3px; text-align: center;"></td>
									<td style="vertical-align: middle; width: 5%;"><input type="text" class="form-control teacontrol flag" name="nov<?php echo $icounter; ?>"  onkeyup="valuechanged(this)" placeholder="<?php echo $a_row['nov']; ?>" value="<?php echo $a_row['nov']; ?>" style="padding: 3px; text-align: center;"></td>
									<td style="vertical-align: middle; width: 5%;"><input type="text" class="form-control teacontrol flag" name="december<?php echo $icounter; ?>"  onkeyup="valuechanged(this)" placeholder="<?php echo $a_row['december']; ?>" value="<?php echo $a_row['december']; ?>" style="padding: 3px; text-align: center;"></td>
									<td style="vertical-align: middle; width: 5%;"><input type="text" class="form-control teacontrol flag" name="jan<?php echo $icounter; ?>" onkeyup="valuechanged(this)" placeholder="<?php echo $a_row['jan']; ?>" value="<?php echo $a_row['jan']; ?>" style="padding: 3px; text-align: center;"></td>
									<td style="vertical-align: middle; width: 5%;"><input type="text" class="form-control teacontrol flag" name="feb<?php echo $icounter; ?>"  onkeyup="valuechanged(this)" placeholder="<?php echo $a_row['feb']; ?>" value="<?php echo $a_row['feb']; ?>" style="padding: 3px; text-align: center;"></td>
									<td style="vertical-align: middle; width: 5%;"><input type="text" class="form-control teacontrol flag" name="mar<?php echo $icounter; ?>"  onkeyup="valuechanged(this)" placeholder="<?php echo $a_row['mar']; ?>" value="<?php echo $a_row['mar']; ?>" style="padding: 3px; text-align: center;"></td>
									<td style="vertical-align: middle; width: 5%;"><input type="text" class="form-control teacontrol flag" name="apr<?php echo $icounter; ?>"  onkeyup="valuechanged(this)" placeholder="<?php echo $a_row['apr']; ?>" value="<?php echo $a_row['apr']; ?>" style="padding: 3px; text-align: center;"></td>
									<td style="vertical-align: middle; width: 5%;"><input type="text" class="form-control teacontrol flag" name="may<?php echo $icounter; ?>"  onkeyup="valuechanged(this)" placeholder="<?php echo $a_row['may']; ?>" value="<?php echo $a_row['may']; ?>" style="padding: 3px; text-align: center;"></td>
									<td style="vertical-align: middle; width: 5%; border-left: 1px solid darkgrey;"><input type="text" class="form-control" name="total<?php echo $icounter; ?>"  onkeyup="attupdate(this)" placeholder="<?php echo $a_row['total']; ?>" value="<?php echo $a_row['total']; ?>" style="padding: 3px; text-align: center;" readonly></td>
								</tr>

									<?php   $icounter = $icounter + 1; }
								?>
								<input style="visibility: hidden;" type="text" name="attcounter" value="<?php echo $icounter; ?>" readonly>
							</tbody>
						</table>
						<!-- <div style="text-align: center;">
							<button id="updateatt" type="button" class="btn btn-success updateatt" disabled>Update All</button>
						</div> -->
				      </div>
				    </div>
				  </div>


				  <?php 

						$aca_year = $_GET['aca_year'];
						if($aca_year == 'current')
						{
							$assessment = $mysqli->query("SELECT * FROM assessment WHERE s_id = '$s_id' and who = 'self'") or die($mysqli->error);
							$ass1 = $assessment->fetch_assoc();

							$assessment = $mysqli->query("SELECT * FROM assessment WHERE s_id = '$s_id' and who = 'parent'") or die($mysqli->error);
							$ass2 = $assessment->fetch_assoc();

							$assessment = $mysqli->query("SELECT * FROM assessment WHERE s_id = '$s_id' and who = 'teacher'") or die($mysqli->error);
							$ass3 = $assessment->fetch_assoc();
						}
						else
						{
							$assessment = $mysqli->query("SELECT * FROM assessment_prev WHERE s_id = '$s_id' and who = 'self' and aca_year = '$aca_year'") or die($mysqli->error);
							$ass1 = $assessment->fetch_assoc();

							$assessment = $mysqli->query("SELECT * FROM assessment_prev WHERE s_id = '$s_id' and who = 'parent' and aca_year = '$aca_year'") or die($mysqli->error);
							$ass2 = $assessment->fetch_assoc();

							$assessment = $mysqli->query("SELECT * FROM assessment_prev WHERE s_id = '$s_id' and who = 'teacher' and aca_year = '$aca_year'") or die($mysqli->error);
							$ass3 = $assessment->fetch_assoc();
						}

					?>
				
				<!-- <div class="card_new_try">
					
				</div> -->

				  <div class="card">
				    <div class="card-header btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">
				      <!-- <h3 class="mb-0">2. Physical Quotient</h3> -->
					  <h3 class="mb-0"><span>2. Physical Quotient</span> <span id="pq_deadline_counter"></span></span> </h3>
				    </div>
				    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">
				      <div class="card-body">
				        <table id="pq_deadline_counter_table" class="table table-hover" style="font-size: 17px;">
							<thead>
								<tr style="background-color: #E8E8E8; height: 50px; border-top: 1px solid black;">
									<th style="vertical-align: middle; text-align: center; width: 5%;border-left: 1px solid black;">#</th>
									<th style="vertical-align: middle; text-align: center; width: 15%;border-left: 1px solid black;"></th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black;">Self Assessment</th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black;">Parents' Assessment</th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black; border-right: 1px solid black;">Teacher's Assessment</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><b>1</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Height</b></td>	
									<td style="border-left: 1px solid black;"><input style="text-align: center;" type="text" name="height1pq" value="<?php echo $ass1['height'];?>" id="height1pq"  class="form-control stucontrol" onkeyup="valuechanged(this)"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="height2pq" value="<?php echo $ass2['height'];?>" id="height2pq"  class="form-control parcontrol" ></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="height3pq" value="<?php echo $ass3['height'];?>" id="height3pq"  class="form-control teacontrol" ></td>
								</tr>
								<tr style="height: 50px;border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><b>2</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Weight</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="weight1pq" value="<?php echo $ass1['weight'];?>" id="weight1pq"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="weight2pq" value="<?php echo $ass2['weight'];?>" id="weight2pq"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="weight3pq" value="<?php echo $ass3['weight'];?>" id="weight3pq"  class="form-control teacontrol"></td>
								</tr>
								<tr style="height: 50px;border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><b>3</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Appetite & eating habits</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="eating1pq" value="<?php echo $ass1['appetite'];?>" id="eating1pq"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="eating2pq" value="<?php echo $ass2['appetite'];?>" id="eating2pq"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="eating3pq" value="<?php echo $ass3['appetite'];?>" id="eating3pq"  class="form-control teacontrol"></td>
								</tr>
								<tr style="height: 50px;border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><b>4</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Toilet Habits</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="toilet1pq" value="<?php echo $ass1['toilet'];?>" id="toilet1pq"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="toilet2pq" value="<?php echo $ass2['toilet'];?>" id="toilet2pq"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="toilet3pq" value="<?php echo $ass3['toilet'];?>" id="toilet3pq"  class="form-control teacontrol"></td>
								</tr>
								<tr style="height: 50px;border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><b>5</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Fine Motor Skills</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="finemotor1pq" value="<?php echo $ass1['finemotor'];?>" id="finemotor1pq"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="finemotor2pq" value="<?php echo $ass2['finemotor'];?>" id="finemotor2pq"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="finemotor3pq" value="<?php echo $ass3['finemotor'];?>" id="finemotor3pq"  class="form-control teacontrol"></td>
								</tr>
								<tr style="height: 50px;border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><b>6</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Gross Motor Skills</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="grossmotor1pq" value="<?php echo $ass1['grossmotor'];?>" id="grossmotor1pq"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="grossmotor2pq" value="<?php echo $ass2['grossmotor'];?>" id="grossmotor2pq"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="grossmotor3pq" value="<?php echo $ass3['grossmotor'];?>" id="grossmotor3pq"  class="form-control teacontrol"></td>
								</tr>
							</tbody>
						</table>
				      </div>
				    </div>
				  </div>

				  <div class="card">
				    <div class="card-header btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree" id="headingThree">
				      <!-- <h3 class="mb-0">3. Thinking Quotient</h3> -->
					  <h3 class="mb-0"><span>3. Thinking Quotient</span> <span id="tq_deadline_counter"></span></span> </h3>
				    </div>
				    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordion">
				      <div class="card-body">
				        <table id="tq_deadline_counter_table" class="table table-hover" style="font-size: 17px;">
							<thead>
								<tr style="background-color: #E8E8E8; height: 50px; border-top: 1px solid black;">
									<th style="vertical-align: middle; text-align: center; width: 5%;border-left: 1px solid black;">#</th>
									<th style="vertical-align: middle; text-align: center; width: 15%;border-left: 1px solid black;"></th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black;">Self Assessment</th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black;">Parents' Assessment</th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black; border-right: 1px solid black;">Teacher's Assessment</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><b>7</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Self-Awareness</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="selfawareness1" value="<?php echo $ass1['selfawareness'];?>" id="selfawareness1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="selfawareness2" value="<?php echo $ass2['selfawareness'];?>" id="selfawareness2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="selfawareness3" value="<?php echo $ass3['selfawareness'];?>" id="selfawareness3"  class="form-control teacontrol"></td>
								</tr>
								<tr style="height: 50px;border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><b>8</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Creative Thinking</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="creativethinking1" value="<?php echo $ass1['creativethinking'];?>" id="creativethinking1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="creativethinking2" value="<?php echo $ass2['creativethinking'];?>" id="creativethinking2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="creativethinking3" value="<?php echo $ass3['creativethinking'];?>" id="creativethinking3"  class="form-control teacontrol"></td>
								</tr>
								<tr style="height: 50px;border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><b>9</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Critical Thinking</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="criticalthinking1" value="<?php echo $ass1['criticalthinking'];?>" id="criticalthinking1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="criticalthinking2" value="<?php echo $ass2['criticalthinking'];?>" id="criticalthinking2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="criticalthinking3" value="<?php echo $ass3['criticalthinking'];?>" id="criticalthinking3"  class="form-control teacontrol"></td>
								</tr>
								<tr style="height: 50px;border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><b>10</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Problem Solving</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="problemsolving1" value="<?php echo $ass1['problemsolving'];?>" id="problemsolving1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="problemsolving2" value="<?php echo $ass2['problemsolving'];?>" id="problemsolving2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="problemsolving3" value="<?php echo $ass3['problemsolving'];?>" id="problemsolving3"  class="form-control teacontrol"></td>
								</tr>
								<tr style="height: 50px;border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><b>11</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Decision Making</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="decisionmaking1" value="<?php echo $ass1['decisionmaking'];?>" id="decisionmaking1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="decisionmaking2" value="<?php echo $ass2['decisionmaking'];?>" id="decisionmaking2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="decisionmaking3" value="<?php echo $ass3['decisionmaking'];?>" id="decisionmaking3"  class="form-control teacontrol"></td>
								</tr>
							</tbody>
						</table>	
				      </div>
				    </div>
				  </div>
				  
				  <div class="card">
				    <div class="card-header btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour" id="headingFour">
				      <!-- <h3 class="mb-0">4. Social Quotient</h3> -->
					  <h3 class="mb-0"><span>4. Social Quotient</span> <span id="sq_deadline_counter"></span></span> </h3>
				    </div>
				    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-bs-parent="#accordion">
				      <div class="card-body">
				         <table id="sq_deadline_counter_table" class="table table-hover" style="font-size: 17px;">
							<thead>
								<tr style="background-color: #E8E8E8; height: 50px; border-top: 1px solid black;">
									<th style="vertical-align: middle; text-align: center; width: 5%;border-left: 1px solid black;">#</th>
									<th style="vertical-align: middle; text-align: center; width: 15%;border-left: 1px solid black;"></th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black;">Self Assessment</th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black;">Parents' Assessment</th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black; border-right: 1px solid black;">Teacher's Assessment</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><b>12</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Empathy</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="empathy1" value="<?php echo $ass1['empathy'];?>" id="empathy1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="empathy2" value="<?php echo $ass2['empathy'];?>" id="empathy2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="empathy3" value="<?php echo $ass3['empathy'];?>" id="empathy3"  class="form-control teacontrol"></td>
								</tr>
								<tr style="height: 50px;border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><b>13</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Communication Skills</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="communicationskills1" value="<?php echo $ass1['communication'];?>" id="communicationskills1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="communicationskills2" value="<?php echo $ass2['communication'];?>" id="communicationskills2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="communicationskills3" value="<?php echo $ass3['communication'];?>" id="communicationskills3"  class="form-control teacontrol"></td>
								</tr>
								<tr style="height: 50px;border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><b>14</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Interpersonal Skills</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="interpersonal1" value="<?php echo $ass1['interpersonal'];?>" id="interpersonal1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><input onkeyup="valuechanged(this)"style="text-align: center;" type="text" name="interpersonal2" value="<?php echo $ass2['interpersonal'];?>" id="interpersonal2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="interpersonal3" value="<?php echo $ass3['interpersonal'];?>" id="interpersonal3"  class="form-control teacontrol"></td>
								</tr>
							</tbody>
						</table>
				      </div>
				    </div>
				  </div>

				  <div class="card">
				    <div class="card-header btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive" id="headingFive">
				      <!-- <h3 class="mb-0">5. Emotional Quotient</h3> -->
					  <h3 class="mb-0"><span>5. Emotional Quotient</span> <span id="eq_deadline_counter"></span></span> </h3>
				    </div>
				    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-bs-parent="#accordion">
				      <div class="card-body">
				        <table id="eq_deadline_counter_table" class="table table-hover" style="font-size: 17px;">
							<thead>
								<tr style="background-color: #E8E8E8; height: 50px; border-top: 1px solid black;">
									<th style="vertical-align: middle; text-align: center; width: 5%;border-left: 1px solid black;">#</th>
									<th style="vertical-align: middle; text-align: center; width: 15%;border-left: 1px solid black;"></th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black;">Self Assessment</th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black;">Parents' Assessment</th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black; border-right: 1px solid black;">Teacher's Assessment</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><b>15</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Coping with stress</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="stress1" value="<?php echo $ass1['copingwithstress'];?>" id="stress1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="stress2" value="<?php echo $ass2['copingwithstress'];?>" id="stress2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="stress3" value="<?php echo $ass3['copingwithstress'];?>" id="stress3"  class="form-control teacontrol"></td>
								</tr>
								<tr style="height: 50px;border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><b>16</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Managing Emotions</b></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="emotions1" value="<?php echo $ass1['managingemotion'];?>" id="emotions1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="emotions2" value="<?php echo $ass2['managingemotion'];?>" id="emotions2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="emotions3" value="<?php echo $ass3['managingemotion'];?>" id="emotions3"  class="form-control teacontrol"></td>
								</tr>
							</tbody>
						</table>
				      </div>
				    </div>
				  </div>

				  <div class="card">
				    <div class="card-header btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix" id="headingSix">
				      <!-- <h3 class="mb-0">6. Intellectual Quotient</h3> -->
					  <h3 class="mb-0"><span>6. Intellectual Quotient</span> <span id="iq_deadline_counter"></span></h3>
				    </div>
				    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-bs-parent="#accordion">
				      <div class="card-body">		            
			            
			            <!-- LANG1 CONTENT START -->
						<br>
			            <div style="text-align:center; margin-bottom:50px;">
				      		<!-- <h4 class="mb-0" style="padding: 20px;">Language I</h4> -->
							<h4><span>Language I</span></h4>
							<h5><span id="lang1_deadline_counter"></span></h5>
				      	</div>

				      	<?php

							$aca_year = $_GET['aca_year'];
							if($aca_year == 'current')
							{
								$table = 'lang1';

								$quer = "SELECT * FROM `$table` WHERE s_id = '$s_id'";

								$sub = $mysqli->query($quer) or die($mysqli->error);
								
							}
							else
							{
								$table = 'lang1_prev';

								$quer = "SELECT * FROM `$table` WHERE s_id = '$s_id' and aca_year = '$aca_year'";

								$sub = $mysqli->query($quer) or die($mysqli->error);
							}

							while ($subtemp = $sub->fetch_assoc())
							{
								if($subtemp['who'] == "self")
								{
									$temp1 = $subtemp;
								}
								else if($subtemp['who'] == "parent")
								{
									$temp2 = $subtemp;
								}
								else if($subtemp['who'] == "teacher")
								{
									$temp3 = $subtemp;
								}

							}

					    ?>
				        <table id="lang1_deadline_counter_table" class="table table-hover" style="font-size: 17px;">
							<thead>
								<tr style="background-color: #E8E8E8; height: 50px; border-top: 1px solid black;">
									<th style="vertical-align: middle; text-align: center; width: 15%;border-left: 1px solid black;"></th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black;">Self Assessment</th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black;">Parents' Assessment</th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black; border-right: 1px solid black;">Teacher's Assessment</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>கேட்டல்</b></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>list1" value="<?php echo $temp1['listening'];?>"  id="<?php echo $table;?>list1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>list2" value="<?php echo $temp2['listening'];?>"  id="<?php echo $table;?>list2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>list3" value="<?php echo $temp3['listening'];?>" id="<?php echo $table;?>list3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>பேசுதல்</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>speak1" value="<?php echo $temp1['speaking'];?>"  id="<?php echo $table;?>speak1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>speak2" value="<?php echo $temp2['speaking'];?>"  id="<?php echo $table;?>speak2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>speak3" value="<?php echo $temp3['speaking'];?>" id="<?php echo $table;?>speak3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>எழுதுதல்</b><br>
									a) பிழையின்றி எழுதுதல்</td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>mistake1" value="<?php echo $temp1['writingmistake'];?>"  id="<?php echo $table;?>mistake1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>mistake2" value="<?php echo $temp2['writingmistake'];?>"  id="<?php echo $table;?>mistake2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>mistake3" value="<?php echo $temp3['writingmistake'];?>" id="<?php echo $table;?>mistake3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;">b) தமிழ் பாட சம்பந்தமாக</td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>lesson1" value="<?php echo $temp1['writinglesson'];?>"  id="<?php echo $table;?>lesson1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>lesson2" value="<?php echo $temp2['writinglesson'];?>"  id="<?php echo $table;?>lesson2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>lesson3" value="<?php echo $temp3['writinglesson'];?>" id="<?php echo $table;?>lesson3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;">
									c) பொது தலைப்பு</td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>general1" value="<?php echo $temp1['writinggeneral'];?>"  id="<?php echo $table;?>general1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>general2" value="<?php echo $temp2['writinggeneral'];?>"  id="<?php echo $table;?>general2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>general3" value="<?php echo $temp3['writinggeneral'];?>" id="<?php echo $table;?>general3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;">d)கற்பனை திறன்</td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>creative1" value="<?php echo $temp1['writingcreative'];?>"  id="<?php echo $table;?>creative1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>creative2" value="<?php echo $temp2['writingcreative'];?>"  id="<?php echo $table;?>creative2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>creative3" value="<?php echo $temp3['writingcreative'];?>" id="<?php echo $table;?>creative3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>படித்தல்</b><br>
									a) சரியான ஏற்ற இறக்கம் & உச்சரிப்பு</td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>reading1" value="<?php echo $temp1['reading'];?>"  id="<?php echo $table;?>reading1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>reading2" value="<?php echo $temp2['reading'];?>"  id="<?php echo $table;?>reading2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>reading3" value="<?php echo $temp3['reading'];?>" id="<?php echo $table;?>reading3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;">b) சரளமாக படித்தல்</td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)"  style="text-align: center;" type="text" name="<?php echo $table;?>spelling1" value="<?php echo $temp1['spelling'];?>"  id="<?php echo $table;?>spelling1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>spelling2" value="<?php echo $temp2['spelling'];?>"  id="<?php echo $table;?>spelling2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>spelling3" value="<?php echo $temp3['spelling'];?>" id="<?php echo $table;?>spelling3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;">c) படித்ததை புரிந்து கொள்ளுதல்</td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)"  style="text-align: center;" type="text" name="<?php echo $table;?>understand1" value="<?php echo $temp1['understand'];?>"  id="<?php echo $table;?>understand1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>understand2" value="<?php echo $temp2['understand'];?>"  id="<?php echo $table;?>understand2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>understand3" value="<?php echo $temp3['understand'];?>" id="<?php echo $table;?>understand3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;">d) மையக் கருத்தை அறிதல்</td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>comprehension1" value="<?php echo $temp1['comprehension'];?>"  id="<?php echo $table;?>comprehension1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>comprehension2" value="<?php echo $temp2['comprehension'];?>"  id="<?php echo $table;?>comprehension2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>comprehension3" value="<?php echo $temp3['comprehension'];?>" id="<?php echo $table;?>comprehension3"  class="form-control teacontrol"></td>
								</tr>

								
								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>இலக்கணம்</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>grammar1" value="<?php echo $temp1['grammar'];?>"  id="<?php echo $table;?>grammar1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>grammar2" value="<?php echo $temp2['grammar'];?>"  id="<?php echo $table;?>grammar2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>grammar3" value="<?php echo $temp3['grammar'];?>" id="<?php echo $table;?>grammar3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>உரையாடுதல்</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>conversation1" value="<?php echo $temp1['conversation'];?>"  id="<?php echo $table;?>conversation1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>conversation2" value="<?php echo $temp2['conversation'];?>"  id="<?php echo $table;?>conversation2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>conversation3" value="<?php echo $temp3['conversation'];?>" id="<?php echo $table;?>conversation3"  class="form-control teacontrol"></td>
								</tr>
							</tbody>
						</table>
						<!-- LANG1 CONTENT END -->

						<!-- LANG2 CONTENT START -->
			            <!-- <div style="text-align: center;">
				      		<h4 class="mb-0" style="padding: 20px;">Language II</h4> -->
				      	<!-- </div> -->
						  <br>
						<div style="text-align:center; margin-bottom:50px;">
				      		<!-- <h4 class="mb-0" style="padding: 20px;">Language I</h4> -->
							<h4><span>Language II</span></h4>
							<h5><span id="lang2_deadline_counter"></span></h5>
				      	</div>

				      	<?php

							$aca_year = $_GET['aca_year'];
							if($aca_year == 'current')
							{
								$table = 'lang2';

								$quer = "SELECT * FROM `$table` WHERE s_id = '$s_id'";

								$sub = $mysqli->query($quer) or die($mysqli->error);
								
							}
							else
							{
								$table = 'lang2_prev';

								$quer = "SELECT * FROM `$table` WHERE s_id = '$s_id' and aca_year = '$aca_year'";

								$sub = $mysqli->query($quer) or die($mysqli->error);
							}
							
							while ($subtemp = $sub->fetch_assoc())
							{
								if($subtemp['who'] == "self")
								{
									$temp1 = $subtemp;
								}
								else if($subtemp['who'] == "parent")
								{
									$temp2 = $subtemp;
								}
								else if($subtemp['who'] == "teacher")
								{
									$temp3 = $subtemp;
								}

							}

					    ?>
				        <table id="lang2_deadline_counter_table" class="table table-hover" style="font-size: 17px;">
							<thead>
								<tr style="background-color: #E8E8E8; height: 50px; border-top: 1px solid black;">
									<th style="vertical-align: middle; text-align: center; width: 15%;border-left: 1px solid black;"></th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black;">Self Assessment</th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black;">Parents' Assessment</th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black; border-right: 1px solid black;">Teacher's Assessment</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Listening</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>list1" value="<?php echo $temp1['listening'];?>"  id="<?php echo $table;?>list1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>list2" value="<?php echo $temp2['listening'];?>"  id="<?php echo $table;?>list2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>list3" value="<?php echo $temp3['listening'];?>" id="<?php echo $table;?>list3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Speaking</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>speak1" value="<?php echo $temp1['speaking'];?>"  id="<?php echo $table;?>speak1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>speak2" value="<?php echo $temp2['speaking'];?>"  id="<?php echo $table;?>speak2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>speak3" value="<?php echo $temp3['speaking'];?>" id="<?php echo $table;?>speak3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Writing</b><br>a) Writing without spelling mistakes </td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>mistake1" value="<?php echo $temp1['writingmistake'];?>"  id="<?php echo $table;?>mistake1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>mistake2" value="<?php echo $temp2['writingmistake'];?>"  id="<?php echo $table;?>mistake2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>mistake3" value="<?php echo $temp3['writingmistake'];?>" id="<?php echo $table;?>mistake3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;">b)  Related to lessons</td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>lesson1" value="<?php echo $temp1['writinglesson'];?>"  id="<?php echo $table;?>lesson1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>lesson2" value="<?php echo $temp2['writinglesson'];?>"  id="<?php echo $table;?>lesson2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>lesson3" value="<?php echo $temp3['writinglesson'];?>" id="<?php echo $table;?>lesson3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;">c) General writing</td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>general1" value="<?php echo $temp1['writinggeneral'];?>"  id="<?php echo $table;?>general1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>general2" value="<?php echo $temp2['writinggeneral'];?>"  id="<?php echo $table;?>general2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>general3" value="<?php echo $temp3['writinggeneral'];?>" id="<?php echo $table;?>general3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;">d) Creative Writing</td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>creative1" value="<?php echo $temp1['writingcreative'];?>"  id="<?php echo $table;?>creative1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>creative2" value="<?php echo $temp2['writingcreative'];?>"  id="<?php echo $table;?>creative2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>creative3" value="<?php echo $temp3['writingcreative'];?>" id="<?php echo $table;?>creative3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Reading</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>reading1" value="<?php echo $temp1['reading'];?>"  id="<?php echo $table;?>reading1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>reading2" value="<?php echo $temp2['reading'];?>"  id="<?php echo $table;?>reading2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>reading3" value="<?php echo $temp3['reading'];?>" id="<?php echo $table;?>reading3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Comprehension</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>comprehension1" value="<?php echo $temp1['comprehension'];?>"  id="<?php echo $table;?>comprehension1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>comprehension2" value="<?php echo $temp2['comprehension'];?>"  id="<?php echo $table;?>comprehension2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>comprehension3" value="<?php echo $temp3['comprehension'];?>" id="<?php echo $table;?>comprehension3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Spelling</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)"  style="text-align: center;" type="text" name="<?php echo $table;?>spelling1" value="<?php echo $temp1['spelling'];?>"  id="<?php echo $table;?>spelling1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>spelling2" value="<?php echo $temp2['spelling'];?>"  id="<?php echo $table;?>spelling2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>spelling3" value="<?php echo $temp3['spelling'];?>" id="<?php echo $table;?>spelling3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Grammar</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>grammar1" value="<?php echo $temp1['grammar'];?>"  id="<?php echo $table;?>grammar1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>grammar2" value="<?php echo $temp2['grammar'];?>"  id="<?php echo $table;?>grammar2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>grammar3" value="<?php echo $temp3['grammar'];?>" id="<?php echo $table;?>grammar3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Conversation</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>conversation1" value="<?php echo $temp1['conversation'];?>"  id="<?php echo $table;?>conversation1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>conversation2" value="<?php echo $temp2['conversation'];?>"  id="<?php echo $table;?>conversation2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>conversation3" value="<?php echo $temp3['conversation'];?>" id="<?php echo $table;?>conversation3"  class="form-control teacontrol"></td>
								</tr>
							</tbody>
						</table>
						<!-- LANG2 CONTENT END -->

						<!-- MATHEMATICS CONTENT START -->
			            <!-- <div style="text-align: center;">
				      		<h4 class="mb-0" style="padding: 20px;">MATHEMATICS</h4>
				      	</div> -->
						  <br>
						<div style="text-align:center; margin-bottom:50px;">
				      		<!-- <h4 class="mb-0" style="padding: 20px;">Language I</h4> -->
							<h4><span>MATHEMATICS</span></h4>
							<h5><span id="math_deadline_counter"></span></h5>
				      	</div>

				      	<?php

							$aca_year = $_GET['aca_year'];
							if($aca_year == 'current')
							{
								$table = 'mathematics';

								$quer = "SELECT * FROM `$table` WHERE s_id = '$s_id'";
	
								$sub = $mysqli->query($quer) or die($mysqli->error);
								
							}
							else
							{
								$table = 'mathematics_prev';

								$quer = "SELECT * FROM `$table` WHERE s_id = '$s_id' and aca_year = '$aca_year'";

								$sub = $mysqli->query($quer) or die($mysqli->error);
							}
							
							while ($subtemp = $sub->fetch_assoc())
							{
								if($subtemp['who'] == "self")
								{
									$temp1 = $subtemp;
								}
								else if($subtemp['who'] == "parent")
								{
									$temp2 = $subtemp;
								}
								else if($subtemp['who'] == "teacher")
								{
									$temp3 = $subtemp;
								}

							}

					    ?>
				        <table id="math_deadline_counter_table" class="table table-hover" style="font-size: 17px;">
							<thead>
								<tr style="background-color: #E8E8E8; height: 50px; border-top: 1px solid black;">
									<th style="vertical-align: middle; text-align: center; width: 15%;border-left: 1px solid black;"></th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black;">Self Assessment</th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black;">Parents' Assessment</th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black; border-right: 1px solid black;">Teacher's Assessment</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Concept</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>concept1" value="<?php echo $temp1['concept'];?>"  id="<?php echo $table;?>concept1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>concept2" value="<?php echo $temp2['concept'];?>"  id="<?php echo $table;?>concept2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>concept3" value="<?php echo $temp3['concept'];?>" id="<?php echo $table;?>concept3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Procedure</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>procedure1" value="<?php echo $temp1['procedures'];?>"  id="<?php echo $table;?>procedure1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>procedure2" value="<?php echo $temp2['procedures'];?>"  id="<?php echo $table;?>procedure2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>procedure3" value="<?php echo $temp3['procedures'];?>" id="<?php echo $table;?>procedure3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Mental Ability</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>mentalability1" value="<?php echo $temp1['mentalability'];?>"  id="<?php echo $table;?>mentalability1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>mentalability2" value="<?php echo $temp2['mentalability'];?>"  id="<?php echo $table;?>mentalability2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>mentalability3" value="<?php echo $temp3['mentalability'];?>" id="<?php echo $table;?>mentalability3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Tables</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>tables1" value="<?php echo $temp1['tables'];?>"  id="<?php echo $table;?>tables1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>tables2" value="<?php echo $temp2['tables'];?>"  id="<?php echo $table;?>tables1"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>tables3" value="<?php echo $temp3['tables'];?>" id="<?php echo $table;?>tables3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Activity</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>activity1" value="<?php echo $temp1['activity'];?>"  id="<?php echo $table;?>activity1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>activity2" value="<?php echo $temp2['activity'];?>"  id="<?php echo $table;?>activity2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>activity3" value="<?php echo $temp3['activity'];?>" id="<?php echo $table;?>activity3"  class="form-control teacontrol"></td>
								</tr>
							</tbody>
						</table>
						<!-- MATHEMATICS CONTENT END -->

						<!-- EVS CONTENT START -->
			            <!-- <div style="text-align: center;">
				      		<h4 class="mb-0" style="padding: 20px;">EVS</h4>
				      	</div> -->

						<br>
						<div style="text-align:center; margin-bottom:50px;">
				      		<!-- <h4 class="mb-0" style="padding: 20px;">Language I</h4> -->
							<h4><span>EVS</span></h4>
							<h5><span id="evs_deadline_counter"></span></h5>
				      	</div>

				      	<?php

							$aca_year = $_GET['aca_year'];
							if($aca_year == 'current')
							{
								$table = 'evs';

								$quer = "SELECT * FROM `$table` WHERE s_id = '$s_id'";

								$sub = $mysqli->query($quer) or die($mysqli->error);
								
							}
							else
							{
								$table = 'evs_prev';

								$quer = "SELECT * FROM `$table` WHERE s_id = '$s_id' and aca_year = '$aca_year'";

								$sub = $mysqli->query($quer) or die($mysqli->error);

							}
							
							while ($subtemp = $sub->fetch_assoc())
							{
								if($subtemp['who'] == "self")
								{
									$temp1 = $subtemp;
								}
								else if($subtemp['who'] == "parent")
								{
									$temp2 = $subtemp;
								}
								else if($subtemp['who'] == "teacher")
								{
									$temp3 = $subtemp;
								}

							}

					    ?>
				        <table id="evs_deadline_counter_table" class="table table-hover" style="font-size: 17px;">
							<thead>
								<tr style="background-color: #E8E8E8; height: 50px; border-top: 1px solid black;">
									<th style="vertical-align: middle; text-align: center; width: 15%;border-left: 1px solid black;"></th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black;">Self Assessment</th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black;">Parents' Assessment</th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black; border-right: 1px solid black;">Teacher's Assessment</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Observation skill</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>observation1" value="<?php echo $temp1['observation'];?>"  id="<?php echo $table;?>observation1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>observation2" value="<?php echo $temp2['observation'];?>"  id="<?php echo $table;?>observation2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>observation3" value="<?php echo $temp3['observation'];?>" id="<?php echo $table;?>observation3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Interaction</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>interaction1" value="<?php echo $temp1['interaction'];?>"  id="<?php echo $table;?>interaction1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>interaction2" value="<?php echo $temp2['interaction'];?>"  id="<?php echo $table;?>interaction2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>interaction3" value="<?php echo $temp3['interaction'];?>" id="<?php echo $table;?>interaction3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Previous knowledge</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>prev_knowledge1" value="<?php echo $temp1['prev_knowledge'];?>"  id="<?php echo $table;?>prev_knowledge1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>prev_knowledge2" value="<?php echo $temp2['prev_knowledge'];?>"  id="<?php echo $table;?>prev_knowledge2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>prev_knowledge3" value="<?php echo $temp3['prev_knowledge'];?>" id="<?php echo $table;?>prev_knowledge3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Ability to analyse</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>analyse1" value="<?php echo $temp1['analyse'];?>"  id="<?php echo $table;?>analyse1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>analyse2" value="<?php echo $temp2['analyse'];?>"  id="<?php echo $table;?>analyse2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>analyse3" value="<?php echo $temp3['analyse'];?>" id="<?php echo $table;?>analyse3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Cooperation in group activity</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>cooperation1" value="<?php echo $temp1['cooperation'];?>"  id="<?php echo $table;?>cooperation1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>cooperation2" value="<?php echo $temp2['cooperation'];?>"  id="<?php echo $table;?>cooperation2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>cooperation3" value="<?php echo $temp3['cooperation'];?>" id="<?php echo $table;?>cooperation3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Presentation skill</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>presentation1" value="<?php echo $temp1['presentation'];?>"  id="<?php echo $table;?>presentation1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>presentation2" value="<?php echo $temp2['presentation'];?>"  id="<?php echo $table;?>presentation2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>presentation3" value="<?php echo $temp3['presentation'];?>" id="<?php echo $table;?>presentation3"  class="form-control teacontrol"></td>
								</tr>
							</tbody>
						</table>
						<!-- EVS CONTENT END -->

						<!-- SCIENCE CONTENT START -->
			            <!-- <div style="text-align: center;">
				      		<h4 class="mb-0" style="padding: 20px;">SCIENCE</h4>
				      	</div> -->

						<br>
						<div style="text-align:center; margin-bottom:50px;">
				      		<!-- <h4 class="mb-0" style="padding: 20px;">Language I</h4> -->
							<h4><span>SCIENCE</span></h4>
							<h5><span id="science_deadline_counter"></span></h5>
				      	</div>


				      	<?php

							$aca_year = $_GET['aca_year'];
							if($aca_year == 'current')
							{
								$table = 'science';

								$quer = "SELECT * FROM `$table` WHERE s_id = '$s_id'";

								$sub = $mysqli->query($quer) or die($mysqli->error);
								
							}
							else
							{
								$table = 'science_prev';

								$quer = "SELECT * FROM `$table` WHERE s_id = '$s_id' and aca_year = '$aca_year'";

								$sub = $mysqli->query($quer) or die($mysqli->error);


							}
							
							while ($subtemp = $sub->fetch_assoc())
							{
								if($subtemp['who'] == "self")
								{
									$temp1 = $subtemp;
								}
								else if($subtemp['who'] == "parent")
								{
									$temp2 = $subtemp;
								}
								else if($subtemp['who'] == "teacher")
								{
									$temp3 = $subtemp;
								}

							}

					    ?>
				        <table id="science_deadline_counter_table" class="table table-hover" style="font-size: 17px;">
							<thead>
								<tr style="background-color: #E8E8E8; height: 50px; border-top: 1px solid black;">
									<th style="vertical-align: middle; text-align: center; width: 15%;border-left: 1px solid black;"></th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black;">Self Assessment</th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black;">Parents' Assessment</th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black; border-right: 1px solid black;">Teacher's Assessment</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Class room interaction</b><br>(i) oral</td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>oralinteraction1" value="<?php echo $temp1['oralinteraction'];?>"  id="<?php echo $table;?>oralinteraction1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>oralinteraction2" value="<?php echo $temp2['oralinteraction'];?>"  id="<?php echo $table;?>oralinteraction2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>oralinteraction3" value="<?php echo $temp3['oralinteraction'];?>" id="<?php echo $table;?>oralinteraction3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;">(ii) written</td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>writteninteraction1" value="<?php echo $temp1['writteninteraction'];?>"  id="<?php echo $table;?>writteninteraction1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>writteninteraction2" value="<?php echo $temp2['writteninteraction'];?>"  id="<?php echo $table;?>writteninteraction2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>writteninteraction3" value="<?php echo $temp3['writteninteraction'];?>" id="<?php echo $table;?>writteninteraction3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Observation skills</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>observation1" value="<?php echo $temp1['observation'];?>"  id="<?php echo $table;?>observation1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>observation2" value="<?php echo $temp2['observation'];?>"  id="<?php echo $table;?>observation2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>observation3" value="<?php echo $temp3['observation'];?>" id="<?php echo $table;?>observation3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Curiosity to explore</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>curiosity1" value="<?php echo $temp1['curiosity'];?>"  id="<?php echo $table;?>curiosity1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>curiosity2" value="<?php echo $temp2['curiosity'];?>"  id="<?php echo $table;?>curiosity2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>curiosity3" value="<?php echo $temp3['curiosity'];?>" id="<?php echo $table;?>curiosity3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Critical & Creative thinking</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>criticalthinking1" value="<?php echo $temp1['criticalthinking'];?>"  id="<?php echo $table;?>criticalthinking1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>criticalthinking2" value="<?php echo $temp2['criticalthinking'];?>"  id="<?php echo $table;?>criticalthinking2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>criticalthinking3" value="<?php echo $temp3['criticalthinking'];?>" id="<?php echo $table;?>criticalthinking3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Class work note</b><br>quality of writing</td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>writingquality1" value="<?php echo $temp1['writingquality'];?>"  id="<?php echo $table;?>writingquality1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>writingquality2" value="<?php echo $temp2['writingquality'];?>"  id="<?php echo $table;?>writingquality2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>writingquality3" value="<?php echo $temp3['writingquality'];?>" id="<?php echo $table;?>writingquality3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Oral tests</b></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)"  style="text-align: center;" type="text" name="<?php echo $table;?>oraltests1" value="<?php echo $temp1['oraltests'];?>"  id="<?php echo $table;?>oraltests1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>oraltests2" value="<?php echo $temp2['oraltests'];?>"  id="<?php echo $table;?>oraltests2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>oraltests3" value="<?php echo $temp3['oraltests'];?>" id="<?php echo $table;?>oraltests3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Written tests</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>writtentests1" value="<?php echo $temp1['writtentests'];?>"  id="<?php echo $table;?>writtentests1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>writtentests2" value="<?php echo $temp2['writtentests'];?>"  id="<?php echo $table;?>writtentests2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>writtentests3" value="<?php echo $temp3['writtentests'];?>" id="<?php echo $table;?>writtentests3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Diagrams</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>diagrams1" value="<?php echo $temp1['diagrams'];?>"  id="<?php echo $table;?>diagrams1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>diagrams2" value="<?php echo $temp2['diagrams'];?>"  id="<?php echo $table;?>diagrams2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>diagrams3" value="<?php echo $temp3['diagrams'];?>" id="<?php echo $table;?>diagrams3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Ability to  connect new information to their experience</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>experience1" value="<?php echo $temp1['experience'];?>"  id="<?php echo $table;?>experience1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>experience2" value="<?php echo $temp2['experience'];?>"  id="<?php echo $table;?>experience2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>experience3" value="<?php echo $temp3['experience'];?>" id="<?php echo $table;?>experience3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Answering to open ended questions (both oral and written)</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>openendedquestions1" value="<?php echo $temp1['openendedquestions'];?>"  id="<?php echo $table;?>openendedquestions1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>openendedquestions2" value="<?php echo $temp2['openendedquestions'];?>"  id="<?php echo $table;?>openendedquestions2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>openendedquestions3" value="<?php echo $temp3['openendedquestions'];?>" id="<?php echo $table;?>openendedquestions3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Ability to use the scientific terms learnt in conversation or interaction times</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>scientificterms1" value="<?php echo $temp1['scientificterms'];?>"  id="<?php echo $table;?>scientificterms1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>scientificterms2" value="<?php echo $temp2['scientificterms'];?>"  id="<?php echo $table;?>scientificterms2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>scientificterms3" value="<?php echo $temp3['scientificterms'];?>" id="<?php echo $table;?>scientificterms3"  class="form-control teacontrol"></td>
								</tr>
							</tbody>
						</table>
						<!-- SCIENCE CONTENT END -->

						<!-- SS CONTENT START -->
			            <!-- <div style="text-align: center;">
				      		<h4 class="mb-0" style="padding: 20px;">Social Studies</h4>
				      	</div> -->
						<br>
						<div style="text-align:center; margin-bottom:50px;">
				      		<!-- <h4 class="mb-0" style="padding: 20px;">Language I</h4> -->
							<h4><span>Social Studies</span></h4>
							<h5><span id="ss_deadline_counter"></span></h5>
				      	</div>

				      	<?php


							$aca_year = $_GET['aca_year'];
							if($aca_year == 'current')
							{
								$table = 'socialstudies';

								$quer = "SELECT * FROM `$table` WHERE s_id = '$s_id'";

								$sub = $mysqli->query($quer) or die($mysqli->error);
								
							}
							else
							{
								$table = 'socialstudies_prev';

								$quer = "SELECT * FROM `$table` WHERE s_id = '$s_id' and aca_year = '$aca_year'";

								$sub = $mysqli->query($quer) or die($mysqli->error);

							}
							
							while ($subtemp = $sub->fetch_assoc())
							{
								if($subtemp['who'] == "self")
								{
									$temp1 = $subtemp;
								}
								else if($subtemp['who'] == "parent")
								{
									$temp2 = $subtemp;
								}
								else if($subtemp['who'] == "teacher")
								{
									$temp3 = $subtemp;
								}

							}

					    ?>
				        <table id="ss_deadline_counter_table" class="table table-hover" style="font-size: 17px;">
							<thead>
								<tr style="background-color: #E8E8E8; height: 50px; border-top: 1px solid black;">
									<th style="vertical-align: middle; text-align: center; width: 15%;border-left: 1px solid black;"></th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black;">Self Assessment</th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black;">Parents' Assessment</th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black; border-right: 1px solid black;">Teacher's Assessment</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Observation skill</b></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>observation1" value="<?php echo $temp1['observation'];?>"  id="<?php echo $table;?>observation1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>observation2" value="<?php echo $temp2['observation'];?>"  id="<?php echo $table;?>observation2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>observation3" value="<?php echo $temp3['observation'];?>" id="<?php echo $table;?>observation3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Interaction</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>interaction1" value="<?php echo $temp1['interaction'];?>"  id="<?php echo $table;?>interaction1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>interaction2" value="<?php echo $temp2['interaction'];?>"  id="<?php echo $table;?>interaction2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>interaction3" value="<?php echo $temp3['interaction'];?>" id="<?php echo $table;?>interaction3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Previous knowledge</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>prev_knowledge1" value="<?php echo $temp1['prev_knowledge'];?>"  id="<?php echo $table;?>prev_knowledge1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>prev_knowledge2" value="<?php echo $temp2['prev_knowledge'];?>"  id="<?php echo $table;?>prev_knowledge2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>prev_knowledge3" value="<?php echo $temp3['prev_knowledge'];?>" id="<?php echo $table;?>prev_knowledge3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Ability to analyse</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>analyse1" value="<?php echo $temp1['analyse'];?>"  id="<?php echo $table;?>analyse1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>analyse2" value="<?php echo $temp2['analyse'];?>"  id="<?php echo $table;?>analyse2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>analyse3" value="<?php echo $temp3['analyse'];?>" id="<?php echo $table;?>analyse3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Cooperation in group activity</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>cooperation1" value="<?php echo $temp1['cooperation'];?>"  id="<?php echo $table;?>cooperation1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>cooperation2" value="<?php echo $temp2['cooperation'];?>"  id="<?php echo $table;?>cooperation2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>cooperation3" value="<?php echo $temp3['cooperation'];?>" id="<?php echo $table;?>cooperation3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Presentation skill</b></td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>presentation1" value="<?php echo $temp1['presentation'];?>"  id="<?php echo $table;?>presentation1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>presentation2" value="<?php echo $temp2['presentation'];?>"  id="<?php echo $table;?>presentation2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>presentation3" value="<?php echo $temp3['presentation'];?>" id="<?php echo $table;?>presentation3"  class="form-control teacontrol"></td>
								</tr>
							</tbody>
						</table>
						<!-- SS CONTENT END -->

						<!-- EXTRA-CURR CONTENT START -->
			            <!-- <div style="text-align: center;">
				      		<h4 class="mb-0" style="padding: 20px;">Art, Craft & Vocational</h4>
				      	</div> -->

						<br>
						<div style="text-align:center; margin-bottom:50px;">
				      		<!-- <h4 class="mb-0" style="padding: 20px;">Language I</h4> -->
							<h4><span>Art, Craft & Vocational</span></h4>
							<h5><span id="art_deadline_counter"></span></h5>
				      	</div>

				      	<?php

							$aca_year = $_GET['aca_year'];
							if($aca_year == 'current')
							{
								$table = 'vocational';

								$quer = "SELECT * FROM `$table` WHERE s_id = '$s_id'";

								$sub = $mysqli->query($quer) or die($mysqli->error);
								
							}
							else
							{
								$table = 'vocational_prev';

								$quer = "SELECT * FROM `$table` WHERE s_id = '$s_id' and aca_year = '$aca_year'";

								$sub = $mysqli->query($quer) or die($mysqli->error);

							}
							
							while ($subtemp = $sub->fetch_assoc())
							{
								if($subtemp['who'] == "self")
								{
									$temp1 = $subtemp;
								}
								else if($subtemp['who'] == "parent")
								{
									$temp2 = $subtemp;
								}
								else if($subtemp['who'] == "teacher")
								{
									$temp3 = $subtemp;
								}

							}

					    ?>
				        <table id="art_deadline_counter_table" class="table table-hover" style="font-size: 17px;">
							<thead>
								<tr style="background-color: #E8E8E8; height: 50px; border-top: 1px solid black;">
									<th style="vertical-align: middle; text-align: center; width: 15%;border-left: 1px solid black;"></th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black;">Self Assessment</th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black;">Parents' Assessment</th>
									<th style="vertical-align: middle; text-align: center; width: 25%; border-left: 1px solid black; border-right: 1px solid black;">Teacher's Assessment</th>
								</tr>
							</thead>
							<tbody>
								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Art and Craft</b><br>1. Interest</td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>interest1" value="<?php echo $temp1['interest'];?>"  id="<?php echo $table;?>interest1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>interest2" value="<?php echo $temp2['interest'];?>"  id="<?php echo $table;?>interest2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>interest3" value="<?php echo $temp3['interest'];?>" id="<?php echo $table;?>interest3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;">2. Creativity</td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>creativity1" value="<?php echo $temp1['creativity'];?>"  id="<?php echo $table;?>creativity1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>creativity2" value="<?php echo $temp2['creativity'];?>"  id="<?php echo $table;?>creativity2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>creativity3" value="<?php echo $temp3['creativity'];?>" id="<?php echo $table;?>creativity3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;"><b>Vocational Culinary skills</b><br>1. Interest and enthusiasm</td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>enthusiasm1" value="<?php echo $temp1['enthusiasm'];?>"  id="<?php echo $table;?>enthusiasm1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>enthusiasm2" value="<?php echo $temp2['enthusiasm'];?>"  id="<?php echo $table;?>enthusiasm2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>enthusiasm3" value="<?php echo $temp3['enthusiasm'];?>" id="<?php echo $table;?>enthusiasm3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;">2. Taste </td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>taste1" value="<?php echo $temp1['taste'];?>"  id="<?php echo $table;?>taste1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>taste2" value="<?php echo $temp2['taste'];?>"  id="<?php echo $table;?>taste2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>taste3" value="<?php echo $temp3['taste'];?>" id="<?php echo $table;?>taste3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;">3. Aroma </td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>aroma1" value="<?php echo $temp1['aroma'];?>"  id="<?php echo $table;?>aroma1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>aroma2" value="<?php echo $temp2['aroma'];?>"  id="<?php echo $table;?>aroma2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>aroma3" value="<?php echo $temp3['aroma'];?>" id="<?php echo $table;?>aroma3"  class="form-control teacontrol"></td>
								</tr>

								<tr style="height: 50px; border-bottom: 1px solid black;">
									<td style="vertical-align: middle; text-align: center;border-left: 1px solid black;">4. Appearance of the food prepared</td>	
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>appearance1" value="<?php echo $temp1['appearance'];?>"  id="<?php echo $table;?>appearance1"  class="form-control stucontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>appearance2" value="<?php echo $temp2['appearance'];?>"  id="<?php echo $table;?>appearance2"  class="form-control parcontrol"></td>
									<td style="vertical-align: middle; text-align: center; border-left: 1px solid black;border-right: 1px solid black;"><input onkeyup="valuechanged(this)" style="text-align: center;" type="text" name="<?php echo $table;?>appearance3" value="<?php echo $temp3['appearance'];?>" id="<?php echo $table;?>appearance3"  class="form-control teacontrol"></td>
								</tr>

							</tbody>
						</table>
						<!-- EXTRA-CURR CONTENT END -->



				      </div>
				    </div>

				  </div>
				</div>

				<div class="row" style="text-align: center; margin-top:50px;">
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<input style="height: 50px;" type="submit" name="submit" id="updateall" value="Update Information" class="btn btn-success" disabled="true" />	
					</div>
					<!-- <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
						<button id="promote_btn" type="button" onclick="promote_student();return false;" class="btn btn-info" disabled>Promote</button>
					</div> -->
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

					</div>
				</div>

				<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center; margin-top: 20px;">
					<input style="height: 35px;" type="submit" name="submit" id="updateall" value="Update Information" class="btn btn-success" disabled="true" />				
				</div> -->
			</form>
		</div>
	</div>
	 <!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	<script>
		// console.log(url_type);
		// const queryString = window.location.search;
		// console.log("Hello!");			
		// const urlParams = new URLSearchParams(queryString);
		// const url_type = urlParams.get('aca_year');

		document.getElementById("aca_year_select").value = url_type;
	</script>

</body>

<?php 
	$aca_year_final = $_GET['aca_year'];
	if($aca_year_final == 'current')
	{

	  if(get_user_type() == 'teacher')
	  { 
?>
  		<script type="text/javascript">
  			TeacherControl();
			teacher_subject_select('<?php echo  $_SESSION['MEMBER_ID'];?>','<?php echo  $_SESSION['T_SUBJECT'];?>');
  		</script>
		
		<?php if($intro_classteacher == 'no'):?>
			<script type="text/javascript">
				ClassTeacherControl();
  			</script>
		<?php endif; ?>	
<?php
	  }

	  else if(get_user_type() == 'parent')
	  {
?>
  		<script type="text/javascript">
  			ParentControl();
			check_deadline('<?php echo  $_SESSION['MEMBER_ID'];?>', 'parent');
  		</script>
<?php
	  }

	   else if(get_user_type() == 'student')
	  {
?>
  		<script type="text/javascript">
  			StudentControl();
			check_deadline('<?php echo  $_SESSION['MEMBER_ID'];?>', 'student');
  		</script>
<?php
	  }

	}
	else
	{
?>
  		<script type="text/javascript">
  			Prev_year_data_lock();
  		</script>
<?php
	}
?>

</html>
