<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
.wrapper {
    text-align: center;
}

.button {
    position: absolute;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saiprasanna";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, name, year, subject FROM students";
$result = $conn->query($sql);
 ?>
<table align="center" cellpadding="10" border="1" id="user_table">
<tr>
<th>ID</th>
<th>NAME</th>
<th>YEAR</th>
<th>SUBJECT</th>
<th></th>
</tr>
<?php
if ($result->num_rows > 0) {
  
    // output data of each row
    while($row = $result->fetch_assoc()) {
       ?>
 <tr> <td id="row<?php echo $row['id'];?>"><?php echo $row['id'];?></td>
  <td id="name_val<?php echo $row['id'];?>"><?php echo $row['name'];?></td>
  <td id="year_val<?php echo $row['id'];?>"><?php echo $row['year'];?></td>
  <td id="subject_val<?php echo $row['id'];?>"><?php echo $row['subject'];?></td>
  <td>
   <input type='button' class="edit_button" id="edit_button<?php echo $row['id'];?>" value="edit" onclick="edit_row('<?php echo $row['id'];?>');">
<form action="del.php">
<input type='button' class="delete_button" id="delete_button<?php echo $row['id'];?>" value="delete" onclick="delete_row('<?php echo $row['id'];?>');">
</form>
  </td>
 </tr>
 <?php
}

}
  
$conn->close();
?> 
</table>
<form action="reg.php">
<div class="wrapper">
    <button class="button">ADD STUDENT</button>
</div>
</form>
</body>
</html>