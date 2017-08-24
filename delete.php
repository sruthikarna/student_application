<?php
include 'db.php';
$bool1=0;
?>





<!doctype html>
<html>
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
<style type="text/css">
.overlay {
  position: fixed;
  width: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0,0,0,.85);
  z-index: 10000;
}
.popup {
  width: 98%;
  padding: 15px;
  left: 0;
  margin-left: 1%;
  border: 1px solid #ccc;
  border-radius: 10px;
  background: white;
  position: absolute;
  top: -100%;
  box-shadow: 5px 5px 5px #000;
  z-index: 10001;
}
@media (min-width: 768px) {
  .popup {
    width: 66.66666666%;
    margin-left: 16.666666%;
  }
}
@media (min-width: 992px) {
  .popup {
    width: 50%;
    margin-left: 25%;
  }
}
@media (min-width: 1200px) {
  .popup {
    width: 33.33333%;
    margin-left: 33.33333%;
  }
}

</style>
</head>
<body>
<p><a href="#" class="open-dialog">Open Dialog</a></p>
<script src="http://code.jquery.com/jquery.js"></script>
<script>
function showPrompt(msg)
{
  // CREATE A Promise TO RETURN
  var p = new Promise(function(resolve, reject) {;
  
    var dialog = $('<div/>', {class: 'popup'})
      .append(
        $('<p/>').html(msg)
      )
      .append(
        $('<div/>', {class: 'text-right'})
          .append($('<button/>', {class: 'btn btn-cancel'}).html('Cancel').on('click', function() {
            $('.overlay').remove();
            // RESOLVE Promise TO false
            resolve(false);
          }))
          .append($('<button/>', {class: 'btn btn-primary'}).html('Ok').on('click', function() {
            $('.overlay').remove();
            // RESOLVE Promise TO true
            resolve(true);
          }))
      );
      
    var overlay = $('<div/>', {class: 'overlay'})
      .append(dialog);
    
    $('body').append(overlay);
    $(dialog).animate({top: '15%'}, 1000);
  });
  
  // RETURN THE Promise
  return p;
}

$(function() {
  // HANDLE open-dialog CLICK
  $('.open-dialog').on('click',function(e) {
    // PREVENT DEFAULT BEHAVIOUR FOR <a/>
    e.preventDefault();

    // SAVE PROMISE RETURN
    var res = showPrompt('Do you like our confirmation?');
    res.then(function(ret) {
      ret ? alert('Ok clicked') : alert('Cancel clicked');
	  $bool1=1;
    })
  });
});
<?php
if($bool1==1){
	$rollno=$_GET['rollno'];
	    $query = "DELETE from details where rollno='$rollno'";
        $result = mysqli_query($con,$query);
        if($result)
        {
            header('Location:viewdetails.php');
        }}
else{
	header('Location:viewdetails.php');
}?>
</script>
</body>
</html>