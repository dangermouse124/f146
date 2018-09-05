<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require('piLogin.php');
        $db = "f146";
        $conn = mysqli_connect($host, $user, $pass, $db);
        if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
        }
        
        //echo $_POST['site_num'] . "<br>";
       // echo $_POST['month'] . "<br>";
        //echo $_POST['year'] . "<br>";
        
        $form_id = $_POST['site_num'] . $_POST['month'] . $_POST['year'];

        $sql = "SELECT * FROM order_lines WHERE form_id='" . $form_id ."'";
        //echo $sql;
        $result = mysqli_query($conn, $sql);

        echo "<br>Form:<br>";
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                foreach ($row as $key => $value) {
                    echo $key . ":" . $value . " | ";
                }
                echo "<br>";
        }
        
        ?>
    </body>
</html>
