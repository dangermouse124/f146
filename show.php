<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
<style>
th, td {
	padding: 8px;
    border-bottom: 1px solid #ddd;
}

tr:hover {
    background-color:#A9CCE3;
} 

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
<title>Site form for the year</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="include.css">
<script type="text/javascript">
</script>
</head>
    <body>
    <div class="w3-container w3-margin">
        <div class="w3-card-4 w3-light-grey w3-padding">
            <h2><font color="black">Forms</font></h2>                    
            <table id="forms_table" class="w3-table" style="width:100%">
            <tr>
              <th>Month</th>
              <!--<th>Form id</th>-->
            </tr>

            <?php
            require('piLogin.php');
            $db = "f146";
            $conn = mysqli_connect($host, $user, $pass, $db);
            if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
            }

            $year = $_POST['year'];
            $site_num = $_POST['site_num'];

            $sql = "SELECT month, form_id, date FROM forms WHERE site_num='" . $site_num ."' AND year='" . $year . "' ORDER BY date";
            //echo $sql;

            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                    echo "<tr>";
                    echo "<td><a href='show_order.php?form_id=" . $row['form_id'] . "&site_num=" . $site_num . "&month=" . $row['month'] . "' target='order_frame'>" . $row['month'] . "</a></td>";
                    //echo "<td>" . $row['form_id'] . "</td>";
                    echo "</tr>";
            } 
            echo "</table>";
            /*

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
             * 
             */
            mysqli_free_result($result);
            mysqli_close($conn);
            ?>
        </div>
    </div>
    </body>
</html>
