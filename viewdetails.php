<?php 
 include 'db.php';
   $bool=0;
   $retval="";
    $query = "select * from details";

    $result = mysqli_query($con,$query);

    if ($result->num_rows > 0) {
        $bool=1;}
         else {
        $bool=2;
    }
    if (isset($_GET['delete'])) {
		 $retval=  $_COOKIE['retVal'];
		if($retval){
        $rollno=$_GET['rollno'];
	    $query = "DELETE from details where rollno='$rollno'";
        $result = mysqli_query($con,$query);
        if($result)
        {
            header('Location:viewdetails.php');
        }}
		else
			header('Location:viewdetails.php');
        # code...
    }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <title>dispaly</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<style> a:visited{
		color:red
	}</style>
	
      <script type="text/javascript">
         
            function getcon(){
               var retVal = confirm("Do you want to delete ?");
			 document.cookie="retVal";
               }
			function getcon1()
            {
				//var retVal1=confirm("Are you sure to edit?");
				if(confirm('Are you sure to edit'))
				{
					window.Location.href='edit.php';
				}
				
			}			
         function getcon2()
		 {
			 //var retVal2=confirm("Are you sure to add a student?");
			 if(confirm("Are you sure to add a student?") == true){
				 window.Location.href='login.php';
			 }
			 else{
				 window.Location.href='viewdetails.php'
			 }
		 }
      </script>
 </head>
 <body>
 
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
 <?php   
        $number_of_records_per_page=05;
        $view_users_query="select * from details";//select query for viewing users. 
        if(isset($_GET["page"]))
		{
			$page=$_GET["page"];
		}
		else
			$page=1;
		$start_from=($page-1)*$number_of_records_per_page;
		$view_users_query="select * from details LIMIT $start_from,$number_of_records_per_page";
		
		$result=mysqli_query($con,$view_users_query);//here run the sql query.  
        		
        ?> 
      <?php
             // if($bool==1){
      echo '<div class="container">
       <div class="table-scrol">
       <div class="table-responsive">
              
    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
          <thead >
            <tr>
              <th> Name</th>  
            <th>Rollno</th>  
            <th>Interest </th> 
            <th> Rank</th>  
            <th>Update</th>
            <th>Delete</th>
            </tr>
          </thead>';
          echo '<tbody>';

                while($row = $result->fetch_assoc()) {
                   

                echo '<tr>
                  
                  <td>'.$row["name"].'</td>
                  <td>'.$row["rollno"].'</td>
                  <td>'.$row["interest"].'</td>
                  <td>'.$row["rank"].'</td>
                  <td><form method="get" action = "edit.php"> <input type="hidden" name="rollno" value="'.$row["rollno"].'"/>'?>
				          
 
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"></button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
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
		</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


</div>
                  <button name="delete" class="btn btn-primary" type="submit" onclick="getcon()" >Delete</button></form>
                  </td>
<?php

				 
                 echo'
                </tr>';
                    
              }


          echo '</tbody>
        </table>
        </div>
        </div>
      </div>';
       
    ?>

        
<form action="login.php"><center>
<button class="btn btn-primary"  style="margin-left: 00px;" onclick="getcon2()" >ADD STUDENT</button></center>
</form> <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"></button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
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
</html></h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


</div>
<?php
$sql="select * from details";
$rs_result=mysqli_query($con,$sql);
$total_records=mysqli_num_rows($rs_result);
$total_pages=ceil($total_records/$number_of_records_per_page);
echo "<a href='viewdetails.php?page=1'>".'<<'.'&nbsp'.'&nbsp'."</a>";
for($i=1;$i<=$total_pages;$i++){
	echo "<a href='viewdetails.php?page=".$i."'>".$i.'&nbsp'.'&nbsp'."</a>";
};
echo "<a href='viewdetails.php?page=$total_pages'>".'>>'."</a>";
?>
<script>
$('a').click(function(){
      $(this).addClass("visited");
});</script>
</body>
 </html>

