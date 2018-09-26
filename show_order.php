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
<title>Show Order</title>
<link rel="stylesheet" href="/upperair/font-awesome470/css/font-awesome.min.css">
<link rel="stylesheet" href="/upperair/w3.css">
<link rel="stylesheet" href="include.css">
<script type="text/javascript">
</script>
</head>
<body>
   <div class="w3-container w3-margin">
        <div class="w3-card-4 w3-light-grey w3-padding">
            <h2><font color="black">Form Details</font></h2>  
            
            <?php
            require_once('piLogin.php');
            $db = "f146";
            $conn = mysqli_connect($host, $user, $pass, $db);
            if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
            }
            
            $site_num = $_GET['site_num'];
            $form_id = $_GET['form_id'];
            $month = $_GET['month'];
            
            $sql = "SELECT site_name FROM sites WHERE site_num=" . $site_num;
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
             
            echo "<h3><font color='orange'>" . $row['site_name'] . " for " . $month . "</font></h3>"; 
            mysqli_free_result($result);
            ?>
            
            <table id="forms_table" class="w3-table">
            <tr>
              <th>Material number</th>
              <th>Description</th>
              <th>Last<br>Month</th>
              <th>Rx</th>
              <th>Used</th>
              <th>U/S</th>
              <th>Available</th>
              <th>Comment</th>              
            </tr>
            
            <?php
            $sql = "SELECT order_lines.mat_num, material.description, order_lines.previous, order_lines.used, order_lines.rx, order_lines.bad, order_lines.comment FROM order_lines INNER JOIN material ON material.mat_num=order_lines.mat_num WHERE form_id='" . $form_id ."'";
            //echo $sql;

            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                    $left = $row['previous'] + $row['rx'] - $row['used'] - $row['bad'];
                    echo "<tr>";
                    echo "<td>" . $row['mat_num'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['previous'] . "</td>";
                    echo "<td>" . $row['rx'] . "</td>";
                    echo "<td>" . $row['used'] . "</td>";
                    echo "<td>" . $row['bad'] . "</td>";
                    echo "<td>" . $left . "</td>";
                    echo "<td>" . $row['comment'] . "</td>";
                    echo "</tr>";
            } 
            echo "</table>";

            mysqli_free_result($result);
            mysqli_close($conn);
            ?>
            <br><br>
        </div>

    </div>
</body>
</html>
