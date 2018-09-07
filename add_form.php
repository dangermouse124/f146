<html>
  <head>
 <style>
h2 {
text-align: center;
background-color: Lightgrey;
}

body {
    color:white;
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
<title>Select</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="include.css">
<script type="text/javascript">
</script>
</head>
<body>
 <!-- topbar -->

 <div class="w3-container"><br> 
    <div class="w3-card-4 w3-dark-grey w3-padding">
        <h2><font color="black">Select site and month</font></h2>

        <form id="f146_entry" action="add.php" method="POST" target="add_frame">
            <br>
            Period ending:
            <select name="month" id="month">
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
            </select>


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
            mysqli_close($conn);
            ?>
                        
            <div class="w3-container w3-margin w3-text-orange">
            <button class="btn" type="submit"><i class="fa fa-cogs"></i> Generate</button>
            </div>
        </form>	
    </div><br>
</div>

<iframe name="add_frame" id="forms_frame" height="1000px" width="100%"></iframe>
	
  </body>
</html>






