<?php require('session.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <link rel="stylesheet" href="css/styles_signup.css?v=<?php echo time(); ?>">
  <title>Teacher Signup</title>

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <script src="js/adminpanel.js"></script>

</head>
<?php
 if (logged_in()) {
?>
   <script type="text/javascript">
            window.location = "logout.php";
    </script>
    <?php
}
?>
<body>
   <!-- <h3 style="text-align: center; color: red;">Note: If required, add deadline history, upcoming modal for students.</h3>
   <h3 style="text-align: center; color: red;">Note: Create signup page for teachers using unique teacher id.</h3> -->
   <?php if(isset($_SESSION['message'])): ?>
    <div style="margin-top: 20px; margin-left: 5px; width:50%;" class="alert alert-<?=$_SESSION['msg_type']?>">

      <?php 
        echo "INFORMATION: ".$_SESSION['message'];
        unset($_SESSION['message']);	
      ?>
      
    </div>
  <?php endif; ?>
  
  <div class="bg-image" style="background-image: url('images/bg.jpg');"></div>

  <div class="container_form">
    <h1 style="color: white;">Sign up</h1>
    
    <form action="processsignup.php" method="POST">
      <input type="text" name="t_fname" required="true" placeholder="First Name*" class="field" style="margin-bottom: 15px; margin-top: 15px;">
      <input type="text" name="t_sname" required="true" placeholder="Second Name*" class="field" style="margin-bottom: 15px;">
      <input type="number" name="t_num" required="true" placeholder="Contact Number*" class="field" style="margin-bottom: 15px;">
      <!-- <input type="text" name="t_id" placeholder="Teacher ID" class="field" style="margin-bottom: 12px;"> -->
      
      <select class="form-control" name="t_grade" required="true" style="margin-bottom:15px; text-align:center; width: 90%; margin-left: auto; margin-right: auto;">
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

      <select class="form-control" name="t_subject" required="true" required="true" style="margin-bottom:15px; text-align:center; width: 90%; margin-left: auto; margin-right: auto;">
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

      <input type="text" required="true" name="t_id" placeholder="Teacher ID*" class="field">
      <sup class="superscript">*Teacher ID will be your username to login</sup>

      <input type="password" required="true" id="t_pass" name="t_pass" onchange="check_teacher_pass();" placeholder="Enter Password*" class="field" style="margin-bottom: 15px;">
      <input type="password" required="true" id="t_repass" name="t_repass" onchange="check_teacher_pass();" placeholder="Re-Enter password*" class="field" style="margin-bottom: 15px;">

      <input type="submit" value="Sign Up" id="btnsignup" name="btnsignup" class="btn_signup" style="margin-top: 10px; margin-bottom: 0px; font-size: 25px;" disabled="true">
    </form>
    
    <!-- <div class="pass-link">
      <a href="" >Lost your password?</a>
    </div>  --> 
  </div>
  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script type="text/javascript">
    AOS.init();
  </script>
</body>
</html>
