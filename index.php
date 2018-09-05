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
<title>F146</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="include.css">
<script type="text/javascript">
</script>
</head>
<body>
 <!-- topbar -->

<div class="w3-container"> 
	<div class="w3-card-4 w3-dark-grey w3-padding">
	<h2><font color="black">F146</font></h2>
        <form id="f146_entry" action="submit_month.php" method="POST">
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
			require('f146Login.php');
			$conn = mysqli_connect($host, $user, $pass, $db);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			$sql = "SELECT site_name FROM sites";
			$result = mysqli_query($conn, $sql);
                        
                        echo "Site:";
			echo "<select id='site_name' name='site_name'>";
			while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
				echo "<option value='" . $row['site_name'] . "'>" . $row['site_name'] . "</option>";
			}
			echo "</select><br><br> ";
                        mysqli_free_result($result);    

			?>                        
                        
			<table id="f146_table" class="w3-table">
			<tr>
			  <th>Material</th>
			  <th>Previous month</th>
			  <th>Received</th>
			  <th>Consumed</th>
			  <th>Comment</th>
			</tr>
                        
                        <?php
                        $sql = "SELECT material.mat_num, material.description FROM site_items INNER JOIN material ON material.mat_num=site_items.mat_num WHERE site_num=12038";
			$result = mysqli_query($conn, $sql);
                        $cnt = 0;
                        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
				$cnt += 1;
                                echo "<tr>";
				echo "<td><input type='number' name='mat_num" . $cnt . "' id='mat_num' value='" . $row['mat_num'] . "'>" . $row['description'] . "</td>";
				echo "<td><input type='number' name='previous" . $cnt . "' id='previous' value=0></td>";
				echo "<td><input type='number' name='rx" . $cnt . "' id='rx' value=0></td>";
				echo "<td><input type='number' name='used" . $cnt . "' id='used' value=0></td>";
				echo "<td><input type='text' name='comment" . $cnt . "' id='comment'></td>";
				echo "</tr>";
			}
                        echo "<input type='hidden' name='rowcount' value=" . $cnt . ">";
			mysqli_free_result($result);                        
			mysqli_close($conn);
			?>
                        </table>

			<div class="w3-container w3-margin w3-text-orange">
			<button class="btn" type="submit"><i class="fa fa-cogs"></i> Submit form</button>
			</div>
		</form>	
	</div><br>
</div>
	
  </body>
</html>






