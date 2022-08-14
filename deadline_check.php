<?php 

session_start();
error_reporting(E_ERROR | E_PARSE);

require('connect.php');
require('session.php');

 // $mysqli = new mysqli('localhost', 'root', '', 'psk') or die(mysqli_error($mysqli));
 
 // if(!empty($_POST))  
if(isset($_POST['check_dl']))
{  

    $data = [];

    $s_id = $_POST['check_dl'];
    // $data += array('check' => $_POST['check_dl']);

    $student = $mysqli->query("SELECT * FROM student WHERE s_id = '$s_id'") or die($mysqli->error);
    $stu = $student->fetch_assoc();

    $grade = $stu['grade'];

    $deadline = $mysqli->query("SELECT * FROM deadlines") or die($mysqli->error);
    // $dl = $deadline->fetch_assoc();

    $dl_selected_subjects = array();
    $dl_start_date = array();
    $dl_start_time = array();
    $dl_end_date = array();
    $dl_end_time = array();


    $checkpoint = 0;
    while($dl = $deadline->fetch_assoc())
    {
        // echo $dl['dl_selected_grade']."<br>";
        $grades = explode("<br>",$dl['dl_selected_grade']);
        
        for($i = 0; $i < count($grades); $i++)
        {
            if($grades[$i] == $grade)
            {
                $checkpoint = 1;
                $deadline_row = $dl; // WRONG!! WHAT IF THERE ARE MULTIPLE DEADLINES FOR THE SAME GRADE? THIS WILL SELECT ONLY LAST DEADLINE.

                array_push($dl_selected_subjects, $deadline_row['dl_selected_subjects']);
                array_push($dl_start_date, $deadline_row['dl_start_date']);
                array_push($dl_start_time, $deadline_row['dl_start_time']);
                array_push($dl_end_date, $deadline_row['dl_end_date']);
                array_push($dl_end_time, $deadline_row['dl_end_time']);
            }
        }
        
    }

    if($checkpoint == 1)
    {
        
        $data += array('dl_start_date' => $dl_start_date);
        $data += array('dl_start_time' => $dl_start_time);
        $data += array('dl_end_date' => $dl_end_date);
        $data += array('dl_end_time' => $dl_end_time);
        $data += array('dl_selected_subjects' => $dl_selected_subjects);

        $data += array('check' => "YES");
    }
    else
    {
        $data += array('check' => "NO");
    }


    
    echo json_encode($data);  

    // header("location: adminpanel.php");
}
