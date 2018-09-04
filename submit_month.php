<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Submit Month php</title>
    </head>
    <body>
        <?php
 
        require_once('f146Login.php');

        // Create connection
        $conn = mysqli_connect($host, $user, $pass, $db);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        //echo "Connected!<br>";


        if (!isset($_POST['site_name'])) {
                echo "Invalid site number";
                include('error_page.html');
                exit();
        }

        $rowcount = $_POST['rowcount'];
        //echo $rowcount . "<br>";
        $names = 'INSERT INTO stock (site_name, mat_num, previous, rx, used, month, comment) ';
        $month = mysqli_real_escape_string($conn, $_POST['month']);
        $site_name = mysqli_real_escape_string($conn, $_POST['site_name']);
        
        while ($rowcount > 0) {
            $mat_num = mysqli_real_escape_string($conn, $_POST['mat_num' . $rowcount]); 
            $previous = mysqli_real_escape_string($conn, $_POST['previous' . $rowcount]);
            $rx = mysqli_real_escape_string($conn, $_POST['rx' . $rowcount]);
            $used = mysqli_real_escape_string($conn, $_POST['used' . $rowcount]);
            $comment = mysqli_real_escape_string($conn, $_POST['comment' . $rowcount]);
            $values = "VALUES ('" . $site_name . "', '" . $mat_num . "', '" . $previous . "', '" . $rx . "', '" . $used . "', '" . $month . "', '" . $comment . "')";
            $sql = $names . $values;
            $rowcount -= 1;
            //echo $sql . "<br>";
            
        if (mysqli_query($conn, $sql)) {
               //echo "Successful DB entry!";
                //include('success_page.html');
                //exit();
            } else {
            $returnMsg["message"] = "Error: " . $sql . "<br>" . mysqli_error($conn);
            $jsonMsg = json_encode($returnMsg);
            echo $jsonMsg;
            include('error_page.html');
            exit();
            }
        }
        include('success_page.html');


        mysqli_close($conn);
        ?>
  
    </body>
</html>
