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
        <title>Show forms</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="include.css">
        <script type="text/javascript">
        </script>
    </head>
    <body>
<div class="w3-container"> 
    <div class="w3-card-4 w3-dark-grey w3-padding">
    <h2><font color="black">Show forms</font></h2>
        <form id="show_forms" action="show.php" target="forms_frame" method="POST">
            <?php
            require('piLogin.php');
            $db = "f146";
            $conn = mysqli_connect($host, $user, $pass, $db);
            if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "SELECT sites.site_name, sites.site_num, forms.year FROM forms INNER JOIN sites ON sites.site_num=forms.site_num";
            $result = mysqli_query($conn, $sql);
            $list = array();
            
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                //if (!array_key_exists($row['site_name'], $list)) {
                    $list[$row['site_name']] = $row['site_num'];
                }
            echo "<br>Site:";
            echo "<select id='site_num' name='site_num'>";
            foreach($list as $key => $value) {
                echo "<option value='" . $value . "'>" . $key . "</option>";
                //echo "<option value='" . $row['site_num'] . "'>" . $row['site_name'] . "</option>";
            }
            echo "</select> ";
            
            mysqli_data_seek($result,0);
            $list = array();

            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                if (!in_array($row['year'], $list)) {
                    $list[] = $row['year'];
                }
            }
            
            echo "Year:";
            echo "<select id='year' name='year'>";
            for ($x = 0; $x < count($list); $x++) {
                    echo "<option value='" . $list[$x] . "'>" . $list[$x] . "</option>";
            }
            echo "</select><br><br>";
            
            
            mysqli_free_result($result);
            mysqli_close($conn);
            
            ?>
            <div class="w3-container w3-margin w3-text-orange">
                <button class="btn" type="submit"><i class="fa fa-cogs"></i> Show forms</button>
            </div>
        </form>
    <br>
    <iframe name="forms_frame" id="forms_frame" height="1000px" width="20%"></iframe>
    <iframe name="order_frame" id="order_frame" height="1000px" width="80%" style="float:right"></iframe>
    </body>
</html>
