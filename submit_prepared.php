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
        require_once('sqlLogin.php');
        $db = "f146";
        $conn = mysqli_connect($host, $user, $pass, $db);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        $sql = "INSERT INTO order_lines 
                (form_id, mat_num, previous, rx, used, comment)
               VAULES
                (?,?,?,?,?,?,?)";
        $statement = $conn -> prepare($sql);
        $statement -> bind_param("siiiis", $_POST['form_id'], $_POST['mat_num'], $_POST['previous'], $_POST['rx'], $_POST['used'], $_POST['comment']);
        $success = $statement -> execute();
        if ($success) {
            echo "success!<br>";
        } else {
            $error_message = $conn -> error;
            echo $error_message;
        }
        ?>
    </body>
</html>
