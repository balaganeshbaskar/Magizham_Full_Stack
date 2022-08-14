<?php

// $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'

function random_str(
    $length,
    $keyspace = '0123456789'
)
{
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    if ($max < 1) {
        throw new Exception('$keyspace must be at least two characters long');
    }
    for ($i = 0; $i < $length; ++$i) {
        $str .= $keyspace[random_int(0, $max)];
    }
    return $str;
}


// echo random_str(3);

$name = "Bala Ganesh";

echo $name."<br>";

$rand_num_generated = random_str(3);
// $uname = trim($_POST['uname']);
$uname_1 = str_replace(' ', '', $name);

$uname = $uname_1.$rand_num_generated;

echo $rand_num_generated."<br>";

echo $uname."<br>";

$current_month = (int)date('m');
$current_year = date('Y');

echo $current_month."<br>";
echo $current_year."<br>";

if($current_month > 5)
{
    $yr = $current_year;
    $yr_next = $yr+1;
}
else
{
    $yr = $current_year-1;
    $yr_next = $yr+1;
}

$final_aca_year = (string)$yr."-".(string)$yr_next;

echo $final_aca_year;






?>