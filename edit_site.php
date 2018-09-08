<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <style>
    </style>
    <title>F146</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="include.css">
    <script type="text/javascript">
    </script>
</head>
<body>
    <div class="w3-container"><br>
        <div class="w3-card-4 w3-dark-grey w3-padding">
            <h2><font color="black">Current site items</font></h2>
            <?php
            require_once('piLogin.php');
            $db = "f146";
            $conn = mysqli_connect($host, $user, $pass, $db);
            if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
            }

            $site_num = $_POST['site_num'];
            $sql = "SELECT site_name FROM sites WHERE site_num=" . $site_num;
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

            echo "<h3><font color='orange'>" . $row['site_name'] . "</font></h3>";
            mysqli_free_result($result);
            ?>


            <table id="current_items" class="w3-table">
            <tr>
              <th>Material</th>
              <th>Description</th>
            </tr>

            <?php


            $sql = "SELECT material.mat_num, material.description FROM site_items INNER JOIN material ON material.mat_num=site_items.mat_num WHERE site_num=" . $site_num;
            $result = mysqli_query($conn, $sql);
            $cnt = 0;
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                    $cnt += 1;
                    echo "<tr>";
                    echo "<td>" . $row['mat_num'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "</tr>";
            }
            //echo "<input type='hidden' name='rowcount' id='rowcount' value=" . $cnt . ">";
            //echo "<input type='hidden' name='month' id='month' value=" . $month . ">";
            //echo "<input type='hidden' name='site_num' id='site_num' value=" . $site_num . ">";

            mysqli_free_result($result);                        
            ?>
            
            </table><br>
            <form id="add_item" action="add_item_site.php" method="POST">
                <br>

                <?php

                $sql = "SELECT * FROM material";
                $result = mysqli_query($conn, $sql);

                echo "Materials:";
                echo "<select id='mat_num' name='mat_num'>";
                while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                    echo "<option value='" . $row['mat_num'] . "'>" . $row['description'] . "</option>";
                }
                echo "</select><br><br> ";
                
                echo "<input type='hidden' name='site_num' value='" . $site_num . "'>";
                mysqli_free_result($result);                        
                mysqli_close($conn);
                ?>
                
                <div class="w3-container w3-margin w3-text-orange">
                <button class="btn" type="submit"><i class="fa fa-plus"></i> Add to Site</button>
                </div>
            </form>
        </div><br>
    </div>
</body>
</html>
