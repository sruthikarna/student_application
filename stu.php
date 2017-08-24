<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
.button {
    position: absolute;
}
</style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

// Create connection
$conn =  mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM details";
$result = $conn->query($sql);
$num=mysqli_num_rows($result);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 ?>
<table align="center" cellpadding="10" border="1" id="user_table">
<tr>
<th>NAME</th>
<th>ROLLNO</th>
<th>INTEREST</th>
<th>RANK</th>
<th></th>
</tr>
<?php
if ($result->num_rows > 0) {
  
    // output data of each row
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
       ?>
 <tr> <td ><?php echo $row['name'];?></td>
  <td><?php echo $row['rollno'];?></td>
  <td><?php echo $row['interest'];?></td>
  <td><?php echo $row['rank'];?></td>
  <td>
   <input type='button' class="edit_button" id="edit_button<?php echo $row['id'];?>" value="edit" onclick="edit_row('<?php echo $row['rollno'];?>');">
<form action="">
<input type='button' class="delete_button" id="delete_button<?php echo $row['id'];?>" value="delete" onclick="delete_row('<?php echo $row['rollno'];?>');">
</form>
  </td>
 </tr>
 <?php
}

}
  
$conn->close();
?> 
</table>
<form action="">

    <button class="button">ADD STUDENT</button>

</form>
</body>
</html>