<?php

    session_start();
    error_reporting(E_ERROR | E_PARSE);

    require('connect.php');

    $id = $_GET['id'];

    // echo "ID: ".$id;
    
    $reset_table = $mysqli->query("SELECT * FROM reset_table ORDER BY id ASC;") or die($mysqli->error);
    $row = $reset_table->fetch_assoc();

    $get_hash = $row['hash'];

    if (!password_verify($id, $get_hash)) 
    {
        echo 'Invalid Reset Link!';
        // exit;
    }
    else
    {
        $deleted_reset = $mysqli->query("DELETE FROM reset_table WHERE 1;") or die($mysqli->error);

        $repass = 'password';

		$hasher = password_hash($repass, PASSWORD_DEFAULT);

        $named = "AdminAccess";
        $s_id = "90909";

        $pass_reset = $mysqli->query("UPDATE credentials SET pass='$hasher', attempts=3 where uname='$named' and s_id='$s_id'") or die($mysqli->error);

        echo "<br>Password Reset Successfully to 'password'. Please login from here: <br> http://localhost/magizham/login.php";

    }   

?>