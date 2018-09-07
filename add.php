<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
<title>Add</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="include.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    
    function calc(row_num) {
        document.getElementById("left" + row_num).value = Number(document.getElementById("previous" + row_num).value) + Number(document.getElementById("rx" + row_num).value) - Number(document.getElementById("used" + row_num).value) - Number(document.getElementById("bad" + row_num).value);
    }
    
</script>
</head>
<body>
    <div class="w3-container"><br> 
    <div class="w3-card-4 w3-dark-grey w3-padding">
    <h2><font color="black">Add form</font></h2>
    <?php echo "<h3><font color='orange'>" . $_POST['month'] . " Site:" . $_POST['site_num'] . "</font></h3>";?>
    <form id="f146_entry" action="submit_month.php" method="POST">
     
        <table id="f146_table" class="w3-table">
        <tr>
          <th>Material</th>
          <th>Description</th>
          <th width="10%">Available previous month</th>
          <th>Received</th>
          <th>Consumed</th>
          <th>U/S</th>
          <th>Available</th>
          <th>Comment</th>
        </tr>

        <?php
        require('piLogin.php');
        $db = "f146";
        $conn = mysqli_connect($host, $user, $pass, $db);
        if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
        }

        $site_num = $_POST['site_num'];
        $month = $_POST['month'];

        $sql = "SELECT material.mat_num, material.description FROM site_items INNER JOIN material ON material.mat_num=site_items.mat_num WHERE site_num=" . $site_num;
        $result = mysqli_query($conn, $sql);
        $cnt = 0;
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                $cnt += 1;
                echo "<tr>";
                echo "<td><input type='number' name='mat_num" . $cnt . "' id='mat_num". $cnt ."' value='" . $row['mat_num'] . "' style='width: 6em'></td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td><input type='number' name='previous" . $cnt . "' id='previous". $cnt ."' value=0 style='width: 4em' onchange='calc(" . $cnt . ")'></td>";
                echo "<td><input type='number' name='rx" . $cnt . "' id='rx". $cnt ."' value=0 style='width: 4em' onchange='calc(" . $cnt . ")'></td>";
                echo "<td><input type='number' name='used" . $cnt . "' id='used". $cnt ."' value=0 style='width: 4em' onchange='calc(" . $cnt . ")'></td>";
                echo "<td><input type='number' name='bad" . $cnt . "' id='bad". $cnt ."' value=0 style='width: 4em' onchange='calc(" . $cnt . ")'></td>";
                echo "<td><input type='number' name='left" . $cnt . "' id='left". $cnt ."' value=0 style='width: 4em' disabled></td>";
                echo "<td><input type='text' name='comment" . $cnt . "' id='comment'></td>";
                echo "</tr>";
        }
        echo "<input type='hidden' name='rowcount' id='rowcount' value=" . $cnt . ">";
        echo "<input type='hidden' name='month' id='month' value=" . $month . ">";
        echo "<input type='hidden' name='site_num' id='site_num' value=" . $site_num . ">";

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
