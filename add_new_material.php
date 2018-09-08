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
    <title>New material</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="include.css">
    <script type="text/javascript">
    </script>
</head>
<body>
<!--Topbar-->
<div class="navbar">
	<a href="index.html" title="Home" class="w3-blue">
	<i class="fa fa-home"> Home</i></a>
        <a href="add_form.php" title="add_form">
	<i class="fa fa-plus"> Add a Form</i></a>
        <a href="show_form.php" title="show_form">
	<i class="fa fa-search"> View a Form</i></a>
  <div class="dropdown">
    <button class="dropbtn">Items 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
        <a href="add_new_material.php" title="Add a material">
	<i class="fa fa-plus"> Add new material</i></a>
        <a href="edit_site_items.php" title="Edit_site_items">
	<i class="fa fa-magic"> Edit items for site</i></a>
    </div>
  </div>
	<a href="instructions.html" title="Instructions">
	<i class="fa fa-question-circle"> Instructions</i></a>
</div><br>
    
     <div class="w3-container"><br> 
        <div class="w3-card-4 w3-dark-grey w3-padding">
        <h2><font color="black">Enter a new material</font></h2>

        <form id="new_mat" action="add_mat.php" method="POST" target="new_mat_frame">
            <br>
            Material Number:
            <input type="number" id="mat_num" name="mat_num" style='width: 6em' required>
            
            Description:
            <input type="text" id="description" name="description" maxlength="50" required>
            <br><br>
                        
            <div class="w3-container w3-margin w3-text-orange">
            <button class="btn" type="submit"><i class="fa fa-plus"></i> Add Material</button>
            </div>
        </form>	
        </div><br>
    </div>

<iframe name="new_mat_frame" id="new_mat_frame" height="1000px" width="100%"></iframe>
</body>
</html>
