<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once('piLogin.php');
$db = "f146";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected!<br>";


if (!isset($_POST['rowcount'])) {
        echo "No rows!";
        include('error_page.html');
        exit();
}

$year = date("Y");
$site_num = $_POST['site_num'];
$month = $_POST['month'];
$form_id = $site_num . $month . $year;

$sql = "INSERT INTO forms 
            (form_id, site_num, month, year)
           VALUES
            (?,?,?,?)";
$statement = $conn->prepare($sql);
//if (!$statement) {echo "error";exit();}
$statement->bind_param("sisi", $form_id, $site_num, $month, $year);
$success = $statement->execute();
if (!$success) {
    $error_message = $conn->error;
    echo $error_message;
    include('error_page.html');
    exit();
}
$statement->close();        

for ($cnt = 1; $cnt <= $_POST['rowcount']; $cnt++) {

    $mat_num = $_POST['mat_num' . $cnt];
    $previous = $_POST['previous' . $cnt];
    $rx = $_POST['rx' . $cnt];
    $used = $_POST['used' . $cnt];
    $bad = $_POST['bad' . $cnt];
    $comment = $_POST['comment' . $cnt]; 

    $sql = "INSERT INTO order_lines 
            (form_id, mat_num, previous, rx, used, bad, comment)
           VALUES
            (?,?,?,?,?,?,?)";
    $statement = $conn->prepare($sql);
    $statement->bind_param("siiiiis", $form_id, $mat_num, $previous, $rx, $used, $bad, $comment);
    $success = $statement->execute();
    if (!$success) {
        $error_message = $conn->error;
        echo $error_message;
        exit();
    }
    $statement->close();
}
include('success_page.html');

mysqli_close($conn);
?>

