<?php
require('piLogin.php');
$db = "f146";
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
}

$mat_num = $_POST['mat_num'];
$site_num = $_POST['site_num'];

$sql = "INSERT INTO site_items 
        (site_num, mat_num)
       VALUES
        (?,?)";
$statement = $conn->prepare($sql);
$statement->bind_param("ii", $site_num, $mat_num);
$success = $statement->execute();
if (!$success) {
    $error_message = $conn->error;
    echo $error_message . "<br>";
    include_once('error_page.html');
    exit();
}
$statement->close();

include('success_page.html');

mysqli_close($conn);