<?php

session_start();
error_reporting(E_ERROR | E_PARSE);

require('connect.php');

// $mysqli = new mysqli('localhost', 'root', '', 'psk') or die(mysqli_error($mysqli));

$t_fname = '';
$t_sname = '';
// $t_num = '';
$t_grade = '';
$t_subject = '';
$t_id = '';
// $t_pass = '';
$t_repass = 'password';


if (isset($_POST['btnsignup'])) 
{

  // echo "iffed up! <br>";

  $t_fname = trim($_POST['t_fname']);
  $t_sname = trim($_POST['t_sname']);
  // $t_num = trim($_POST['t_num']);

  $t_grade = $_POST['t_grade'];
  $t_subject = $_POST['t_subject'];
  $t_id = trim($_POST['t_id']);
  // $t_pass = trim($_POST['t_pass']);
  // $t_repass = trim($_POST['t_repass']);

  $class_teacher = trim($_POST['class_teacher']);

  // echo $class_teacher;

  $mysqli->query("SET AUTOCOMMIT=0");
  $mysqli->query("START TRANSACTION");

  $t_id_checker = $mysqli->query("SELECT COUNT(*) as tid_count FROM teachers where t_id = '$t_id'");
  $t_id_temp = $t_id_checker->fetch_array();

  // echo "START*************<br>";
  // echo "t_id=".$t_id."<br>";
  // echo "t_id_check: ";
  // echo $t_id_temp['tid_count']."<br>";
  // // echo $t_id_check;

  // echo "END*************<br>";

  if($t_id_temp['tid_count'] != 0)
  {

    echo "Teacher ID is already in database. Please log in! <br>";

    // Teacher ID already present in database
    $_SESSION['message'] = "Teacher ID is already in database. Please log in.";
    $_SESSION['msg_type'] = "danger";

  }
  else
  { 

    $teachercheck = $mysqli->query("INSERT INTO teachers (t_fname, t_sname, t_grade, t_subject, t_id, classteacher) VALUES ('$t_fname', '$t_sname', '$t_grade', '$t_subject', '$t_id', '$class_teacher')");
    
    if($teachercheck)
    {

      $tquery = $mysqli->query("SELECT * FROM teachers where t_id = '$t_id'");
      $temp = $tquery->fetch_array();
      $s_id = $temp['s_id'];

      $new_s_id = "978" + substr($s_id, -1);

      $teachercheckagain = $mysqli->query("UPDATE teachers SET s_id = '$new_s_id' where t_id='$t_id'") or die($mysqli->error());

      if($teachercheckagain)
      {
        $hash = password_hash($t_repass, PASSWORD_DEFAULT);

        $credcheck = $mysqli->query("INSERT INTO credentials (uname, pass, type, s_id, attempts) VALUES ('$t_id', '$hash', 'teacher', '$new_s_id', 3)");
      }
    }

    if($teachercheck and $teachercheckagain and $credcheck)
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

  }

  header("location: adminaccess.php"); 

} 

else if (isset($_POST['new_update']))
{
  // echo "this elsed up! <br>";
  $t_fname = trim($_POST['t_fname']);
  $t_sname = trim($_POST['t_sname']);
  // $t_num = trim($_POST['t_num']);

  $t_grade = $_POST['t_grade'];
  $t_subject = $_POST['t_subject'];
  $t_id = trim($_POST['t_id']);

  $class_teacher = trim($_POST['class_teacher']);

  $s_id = $_POST['s_s_id'];

  $mysqli->query("SET AUTOCOMMIT=0");
  $mysqli->query("START TRANSACTION");

  $teacherscheck = $mysqli->query("UPDATE teachers SET t_fname='$t_fname',t_sname='$t_sname',t_grade='$t_grade',t_subject='$t_subject',classteacher='$class_teacher' where s_id='$s_id'") or die($mysqli->error());

  // $t_pass = trim($_POST['t_pass']);
  // $t_repass = trim($_POST['t_repass']);

  if($teacherscheck)
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

  header("location: adminaccess.php"); 
  
}

else
{
  echo "elsed up! <br>";
}
 
?>