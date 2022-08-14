<?php 

session_start();
error_reporting(E_ERROR | E_PARSE);

require('connect.php');
require('session.php');

 // $mysqli = new mysqli('localhost', 'root', '', 'psk') or die(mysqli_error($mysqli));
 
 // if(!empty($_POST))  
if(isset($_POST['set_dl_button']))
{  

    // echo "works buddy!";

    // echo "Today is " . date("Y-m-d") . "<br>";
    // echo $_POST['dl_staff_name']."<br>";
    // echo $_POST['dl_selected_grade_value']."<br>";
    // echo $_POST['dl_selected_subjects_value']."<br>";
    // echo $_POST['dl_start_date']."--".$_POST['dl_start_time']."<br>";
    // echo $_POST['dl_end_date']."--".$_POST['dl_end_time']."<br>";

    $dl_actual_grade = $_POST['dl_actual_grade'];
    $dl_actual_subject = $_POST['dl_actual_subject'];

    $dl_staff_sid = $_POST['dl_staff_sid'];
    $dl_start_date = $_POST['dl_start_date'];
    $dl_start_time = $_POST['dl_start_time'];
    $dl_end_date = $_POST['dl_end_date'];
    $dl_end_time = $_POST['dl_end_time'];
    $today = date("Y-m-d");

    if($dl_actual_grade == "All")
    {
        $dl_selected_grade_value = $_POST['dl_selected_grade_value'];
        // $dl_selected_grade_value = $dl_selected_grade_value."<br>";
        // $dl_selected_subjects_value = $_POST['dl_selected_subjects_value'];
        // $dl_selected_subjects_value = $dl_selected_subjects_value."<br>";
    }
    else
    {
        $dl_selected_grade_value = $_POST['dl_grade_input'];
        $dl_selected_grade_value = $dl_selected_grade_value."<br>";
        // $dl_selected_subjects_value = $_POST['dl_subject_input'];
        // $dl_selected_subjects_value = $dl_selected_subjects_value."<br>";
    }
    

    if($dl_actual_subject == "All")
    {
        // $dl_selected_grade_value = $_POST['dl_selected_grade_value'];
        // $dl_selected_grade_value = $dl_selected_grade_value."<br>";
        $dl_selected_subjects_value = $_POST['dl_selected_subjects_value'];
        // $dl_selected_subjects_value = $dl_selected_subjects_value."<br>";
    }
    else
    {
        // $dl_selected_grade_value = $_POST['dl_grade_input'];
        // $dl_selected_grade_value = $dl_selected_grade_value."<br>";
        $dl_selected_subjects_value = $_POST['dl_subject_input'];
        $dl_selected_subjects_value = $dl_selected_subjects_value."<br>";
    }

    // echo "dl_grade_input: ".$_POST['dl_grade_input'];
    // echo "dl_subject_input: ".$_POST['dl_subject_input'];

    $mysqli->query("SET AUTOCOMMIT=0");
	$mysqli->query("START TRANSACTION");


    $deadline_check = $mysqli->query("INSERT INTO deadlines (dl_staff_sid, dl_selected_grade, dl_selected_subjects, dl_start_date, dl_start_time, dl_end_date, dl_end_time, today) VALUES ('$dl_staff_sid', '$dl_selected_grade_value', '$dl_selected_subjects_value', '$dl_start_date', '$dl_start_time', '$dl_end_date', '$dl_end_time', '$today')") or die($mysqli->error);
    

    if ($deadline_check)
    {
        $mysqli->query("COMMIT");
        echo "<br> Commit!";

        $_SESSION['message'] = "Deadline has been set!";
        $_SESSION['msg_type'] = "success";
    }
    else
    {        
        $mysqli->query("ROLLBACK");
        echo "<br> Rollback!";

        // $_SESSION['message'] = "Deadline could not be set! Try again...";
        $_SESSION['message'] = $deadline_check;
        $_SESSION['msg_type'] = "danger";
    }

    header("location: adminpanel.php");

}

else if(isset($_POST['deadline_teacher_details']))
{
    $data = [];

    $s_id = $_POST['deadline_teacher_details'];

    $teacher = $mysqli->query("SELECT * FROM teachers WHERE s_id = '$s_id'") or die($mysqli->error);
	$tea = $teacher->fetch_assoc();
    
    $data += array('t_fname' => $tea['t_fname']);
    $data += array('t_grade' => $tea['t_grade']);
    $data += array('t_subject' => $tea['t_subject']);
    $data += array('t_id' => $tea['t_id']);

    $data += array('dd' => $s_id);
    echo json_encode($data); 
}
