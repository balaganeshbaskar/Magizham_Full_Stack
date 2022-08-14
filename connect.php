<?php


// $server = 'localhost';
// $username = 'u973942554_root';
// $password = 'M@gi2020';
// $database = 'u973942554_magizham';


$server = 'localhost';
$username = 'root';
//u973942554_root
$password = '';
// M@gi2020
$database = 'magizham';
// u973942554_magizham


$mysqli = mysqli_connect($server, $username, $password) or die("Error in Connection!");
mysqli_select_db($mysqli, $database) or die("Could not connect to DB!");

?>
