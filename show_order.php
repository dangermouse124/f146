<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
         <style>
            h2 {
            text-align: center;
            background-color: Lightgrey;
            }

            .btn {
                background-color: black;
                border: none;
                color: white;
                padding: 12px 16px;
                font-size: 16px;
                cursor: pointer;
                    border-radius: 12px;
            }

            /* Darker background on mouse-over */
            .btn:hover {
                background-color: orange !important;
            }

          </style>
        <meta charset="UTF-8">
        <title>Show Order</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="include.css">
        <script type="text/javascript">
        </script>
    </head>
    <body>
    <div class="w3-container"><br>
	<div class="w3-card-4 w3-light-grey w3-padding w3-third">
            <h2><font color="black">Order Details</font></h2>                    
            <table id="forms_table" class="w3-table" style="width:100%">
            <tr>
              <th>Material number</th>
              <th>On hand previous month</th>
              <th>Received</th>
              <th>Consumed</th>
              <th>Date</th>              
            </tr>

            <?php
            require('piLogin.php');
            $db = "f146";
            $conn = mysqli_connect($host, $user, $pass, $db);
            if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
            }

            $form_id = $_GET['form_id'];

            $sql = "SELECT * FROM order_lines WHERE form_id='" . $form_id ."'";
            //echo $sql;

            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row['mat_num'] . "</td>";
                    echo "<td width='20%'>" . $row['previous'] . "</td>";
                    echo "<td>" . $row['rx'] . "</td>";
                    echo "<td>" . $row['used'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "</tr>";
            } 
            echo "</table>";

            mysqli_free_result($result);
            mysqli_close($conn);
            ?>
        </div>
    </div>
    </body>
</html>