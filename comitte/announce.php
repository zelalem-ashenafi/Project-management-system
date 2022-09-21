<style>
	.custom-menu {
        z-index: 1000;
	    position: absolute;
	    background-color: #ffffff;
	    border: 1px solid #0000001c;
	    border-radius: 5px;
	    padding: 8px;
	    min-width: 13vw;
}
a.custom-menu-list {
    width: 100%;
    display: flex;
    color: #4c4b4b;
    font-weight: 600;
    font-size: 1em;
    padding: 1px 11px;
}
	span.card-icon {
    position: absolute;
    font-size: 3em;
    bottom: .2em;
    color: #ffffff80;
}
.file-item{
	cursor: pointer;
}
a.custom-menu-list:hover,.file-item:hover,.file-item.active {
    background: #80808024;
}
table th,td{
	/*border-left:1px solid gray;*/
}
a.custom-menu-list span.icon{
		width:1em;
		margin-right: 5px
}


body{
 margin:0px;
 font-family:Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', serif;
 }

input[type=text], select {
 width: 100%;
 border-radius: 5px;
 margin: 7px 0;
 border: 1px solid #ccc;
 padding: 14px 18px; 
 display: inline-block;
 box-sizing: border-box;
}

input[type=submit]:hover {
 background-color: #00a7d1;
}

textarea, select {
 width: 100%;
 border-radius: 5px;
 margin: 7px 0;
 border: 1px solid black;
 padding: 14px 18px; 
 display: inline-block;
 box-sizing: border-box;
}

input[type=submit] {
 width: 100%;
 border: none;
 color: black;
 padding: 14px 30px;
 background-color: #01c9fb;
 text-align: center;  
 margin: 8px 100;
 cursor: pointer;
 border-radius: 4px;
 
}

</style>

</head>
<body>
<table border="2"  bgcolor="#f2f2f2" style="padding:50px" align="center">
<form onSubmit="return validateform()"  action="" method="post">

<tr>
<td><b> Start Date</b> : </td><td><input type="datetime-local" name="st_date"></td>
</tr>
<tr>
<td><b> End Date :</b> </td><td><input type="datetime-local" name="end_date"></td>
</tr>
<tr>
<td><b> Announcement :</b> </td><td><textarea name="announce" rows="6" cols="50"></textarea></td>
</tr>   
<tr>
<td><input type="submit" name="submit"></td></tr>

</form>
</table>

</body>
</html>
<?php
if(!isset($_SESSION['login_committee_ID']))
echo "<script>window.location = \"index.php\";</script>";
if(isset($_POST["submit"]))
{
 
 //Including dbconfig file.
include 'db_connect.php';
 
$name = $_SESSION['login_college'];
$st_date =  date("Y-m-d H:i:00", strtotime($_POST["st_date"]));
$end_date =  date("Y-m-d H:i:00", strtotime($_POST["end_date"]));

$announce = $_POST["announce"];
if($end_date<=$st_date)
{
    echo "<script type=\"text/javascript\">
    alert(\"Invalid date\"); 
    window.location = \"index.php\";
</script>"; 
}
else{
$conn->query("INSERT INTO annoncements (sender,dept_name,st_date,end_date,announce_text) VALUES ('committee','$name','$st_date','$end_date','$announce')") or die(mysqli_error($conn)); 
echo "<script type=\"text/javascript\">
            alert(\"Announcement posted Succesfully\"); 
            window.location = \"index.php\";
  </script>";
//echo '<center> Comment Successfully Submitted </center>';
}
}

 ?>
