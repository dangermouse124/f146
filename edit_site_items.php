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
        <h2><font color="black">Add item to site</font></h2>

        <form id="site" action="edit_site.php" method="POST" target="add_frame">
            <br>

            <?php
            require('piLogin.php');
            $db = "f146";
            $conn = mysqli_connect($host, $user, $pass, $db);
            if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "SELECT * FROM sites";
            $result = mysqli_query($conn, $sql);
                        
            echo "Site:";
            echo "<select id='site_num' name='site_num'>";
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                echo "<option value='" . $row['site_num'] . "'>" . $row['site_name'] . "</option>";
            }
            echo "</select><br><br> ";
            
            mysqli_free_result($result);                        
            
            ?>
                        
            <div class="w3-container w3-margin w3-text-orange">
            <button class="btn" type="submit"><i class="fa fa-cogs"></i> Get Site</button>
            </div>
        </form>
        
    </div><br>
</div>

<iframe name="add_frame" id="add_frame" height="1000px" width="100%"></iframe>
</body>
</html>
