<?php
include 'db.php';
$rollno=$_GET['rollno'];
$query = "SELECT * FROM details where rollno = $rollno";
$result = mysqli_query($con,$query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
        $name=$row["name"];
        $rollno1 =  $row["rollno"];
        $interest = $row["interest"];
        $rank = $row["rank"];
       
} else {
    echo "0 results";
}

if(isset($_POST['submit']))
{
$name = $_POST['name']; 
$rollno = $_POST['rollno']; 
$interest = $_POST['interest'];
$rank = $_POST['rank']; 
    
    $query="UPDATE details SET name='$name',rollno='$rollno',interest='$interest',rank='$rank' WHERE rollno='$rollno1'" ;
    $result=mysqli_query($con,$query);
    if($result)
    {
    header('Location:viewdetails.php');
    }

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>login page</title>
	<style type="text/css">
.login-page {
        width: 360px;
        padding: 10% 0 0 10%;
        margin: auto;
     }
.form,.outform{
  position: relative;
 
  background: #FFFFFF;
  max-width: 360px;
  margin: 0px auto 100px;
  padding: 35px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.outform
 {
 	max-height:800px; 
 	 max-width: 1000px;
 	 margin: 0px auto 20px;
 }
.inputs {
  font-family: "Roboto", sans-serif;
  
  background: #ffffff;
  width: 100%;
  border: 01;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.newbutton{
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: rgba(30, 169, 174, 1);
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  margin-top: 10px;
  margin-bottom: -10px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.newbutton:hover,.newbutton:active,.newbutton:focus {
  background: white;
}
.newbutton:after{
  background: rgba(30, 169, 174, 1);
}
	</style>
</head>
<body>
    <div class="outform">
     <p style="font-family: arial;font-size:30px;color: rgba(30, 169, 174, 1);">Updation form</p>
<hr>

    	<div class="login-page">

  <div class="form">
  <form name="myform" method="post" action="">  
     <input  class="inputs" type="text" id="iname" placeholder="name" name="name"  required/>
      
       <input  class="inputs" type="text" id="iinterest"  placeholder="interest" name="interest"   required/>
       <input  class="inputs" type="text" id="irank"  placeholder="rank" name="rank"  required/>
      

      <input class="newbutton" type="submit" value="UPDATE" name="submit" />
      
      </form>
  </div>
</div>
</div>

  </div>
     <script>
      var name = "<?php echo $name ?>";
      var rollno = "<?php echo $rollno ?>";
      var interest = "<?php echo $interest ?>";
      var rank = "<?php echo $rank ?>";
      document.getElementById("iname").value = name;
      
      document.getElementById("iinterest").value = interest;
      document.getElementById("irank").value = rank;
  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>