<?php
require('piLogin.php');
$db = "f146";
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
}

$mat_num = $_POST['mat_num'];
if (strlen((string)$mat_num) != 6) {
    echo "Not enough digits in the mat number.";
    exit();
}
$description = $_POST['description'];

$sql = "INSERT INTO material 
        (mat_num, description)
       VALUES
        (?,?)";
$statement = $conn->prepare($sql);
$statement->bind_param("is", $mat_num, $description);
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



