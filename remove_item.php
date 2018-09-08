<?php
require('piLogin.php');
$db = "f146";
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
}

$mat_num = $_GET['mat_num'];
$site_num = $_GET['site_num'];

$sql = "DELETE FROM site_items WHERE mat_num=" . $mat_num . " AND site_num=" . $site_num;
echo $sql;

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
    exit();
}

include('success_page.html');

mysqli_close($conn);