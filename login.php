<?php 
 include 'db.php';
  if(isset($_POST['submit']))
{
$name = $_POST['name']; 
$rollno = $_POST['rollno']; 
$interest = $_POST['interest'];
$rank = $_POST['rank']; 
    
    $query="INSERT INTO details values ('$name','$rollno','$interest','$rank')";
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
 
  background: #2f2f2f;
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
  
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  
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
     <center><h2>STUDENT INSERTION</h2></center>
<hr>

    	<div class="login-page">

  <div class="form">
  <form name="myform" method="post" action="">  
     <input  class="inputs" type="text" placeholder="name" name="name"  required/>
      <input class="inputs" type="text" placeholder="rollno" name="rollno"  required/>
       <input  class="inputs" type="text" placeholder="interest" name="interest"   required/>
       <input  class="inputs" type="text" placeholder="rank" name="rank"  required/>
       <input class="newbutton" type="submit" value="SUBMIT" name="submit" />
      
      </form>
  </div>
</div>
</div>



    </div>
</body>
</html>