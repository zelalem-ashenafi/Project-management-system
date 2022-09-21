<style>
.card{
	width: 70%;
	border: none;
	border-radius: 15px;
    
}
.adiv{
	background: #11FF8F;
	border-radius: 15px;
	border-bottom-right-radius: 0;
	border-bottom-left-radius: 0;
	font-size: 24px;
	height: 46px;
}
img{
	margin-right: 10px;
	width: 35px;
	height: 35px;
	
}
.fas{
	
}
.fa-chevron-left{
	color: #fff;
}
h6{
	font-size: 24px;
	font-weight: bold;
}
small{
	font-size: 15px;
	color: #898989;
}
.form-control{
	border: none;
	background: #F6F7FB;
	font-size: 24px;
}
.form-control:focus{
	box-shadow: none;
	background: #DFDFDF;
}
.form-control::placeholder{
	font-size: 24px;
	color: #B8B9BD;
}
[type=submit]{
	background: #0063FF;
	width:50%;
    
    
	border: none;
}
.btn-primary:focus{
	box-shadow: none;
}
.btn-primary span{
	font-size: 24px;
	color: #A6DCFF;
}
p.mt-3{
	font-size: 22px;
 	color: #B8B9BD; 
 	
}
span.px-3{
	font-size: 22px;
 	text-decoration:bold;
}
[type=radio]{
    display:none;
}
[type=radio] + img {
  cursor: pointer;
  
}
[type=radio]:checked + img {
    border: 1px solid red;
}
[type=radio]:not(:checked) + img {
    border: 0px solid red;
}


</style>
<br/><br/><br/>
<div class="container d-flex justify-content-center">
  <div class="card mt-5 pb-5">
    <div class="d-flex flex-row justify-content-between p-3 adiv text-white">
      
      <span class="px-3" >feedback</span>
     
    </div>
    <form onSubmit="return validateform()"  method="POST" action="">
    <div class="mt-2 p-4 text-center">
      <h6 class="mb-0">Your feedback help us to improve.</h6>
      <small class="px-3">Please let us know about your experience.</small>
      
      <div class="form-group mt-4">
        <textarea name="message" class="form-control" rows="4" placeholder="Message"></textarea>
      </div>
      <div class="mt-2">
        <input type="submit" name="submit" class="btn btn-primary btn-block" style="background color: lightblue">
</form>
      </div>
      
    </div>
  </div>
</div>
<?php
if(isset($_POST["submit"]))
{
    
    $message=$_POST['message'];
    $sender=$_SESSION['login_stud_name'];
    $ev="admin";
    $now=date('Y-m-d H:i:00');
    $conn->query("INSERT INTO annoncements (sender,receiver,st_date,announce_text) VALUES ('$sender','$ev','$now',' $message')"); 
	echo "<script type=\"text/javascript\">
            alert(\"feedback sent Succesfully\"); 
            window.location = \"index.php\";
  </script>";
}

?>