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
 border: 1px solid #ccc;
 padding: 14px 18px; 
 display: inline-block;
 box-sizing: border-box;
}

input[type=submit] {
 width: 100%;
 border: none;
 color: white;
 padding: 14px 20px;
 background-color: #01c9fb;
 margin: 8px 0;
 cursor: pointer;
 border-radius: 4px;
 
}

</style>

</head>
<body>
<table bgcolor="#f2f2f2" style="padding:50px" align="center">
<form onSubmit="return validateform()"  action="" method="post">
<tr>
    
<?php 
     $getid=$_GET["id"];
     $role=$_GET['role'];
     $column="";
     $table_name="";
     if($role=='com')
     {
     $table_name="committee";
     $column="committee_ID";
    }
    else if($role=='adv')
     {
     $table_name="advisors";
     $column="adv_id";
     }
    else if($role=='ev')
     {
     $table_name="evaluators";
     $column="ev_id";
     }
    else if($role=='stud')
     {
     $table_name="students";
     $column="stud_id";
     }
    else if($role=='dept')
     {
     $table_name="department";
     $column="department_ID";
     }
     
    include 'db_connect.php';
    //$ev_id=$_SESSION['login_ev_id'];
    $sql = "select * from $table_name where {$column}='{$getid}' ";
     echo$sql;
    $result=$conn->query($sql);
    if($result->num_rows>0)
    {
    while($row=$result->fetch_assoc())
     {
          if($role=='com')
     {
          $id=$row["committee_ID"];
          $name=$row["committee_rep"];
          $dept=$row["Department"];
     }
     else if($role=='dept')
     {
          $id=$row["department_ID"];
          $name=$row["department_head"];
          $dept=$row["Department"];
     }
     else{
          $id=$row[$role."_id"];
          $name=$row[$role."_name"];
          $dept=$row["dept"];
     }
     }
}
?>

<td> Your ID : </td><td><input type="text" required  name="id" value="<?php echo $id?>"></td>
</tr>
<tr>
<td> Your Name : </td><td><input type="text" required  name="name" value="<?php echo $name?>"></td>
</tr>
<tr>
     <td>Department:</td>
     <td>
<select name="dept">
            <option><?php echo $dept;?>	</option>
<option>Agricultural Econamics	</option>
<option>Amharic	</option>
<option>Anesthesia	</option>
<option>Animal Science	</option>
<option>Biology	</option>
<option>Biotechnology	</option>
<option>chemical engineering	</option>
<option>Chemistry	</option>
<option>Civics and Ethical Studies	</option>
<option>Civil engineering	</option>
<option>computer science	</option>
<option>Construction Technology and mgt	</option>
<option>Economics 	</option>
<option>Electrical engineering	</option>
<option>English	</option>
<option>Food engineering	</option>
<option>Geography and Environmental Studies	</option>
<option>Geology	</option>
<option>Health Officer (HO)	</option>
<option>History and Heritage Management	</option>
<option>Horticulture	</option>
<option>Hydraulic and water resource eng	</option>
<option>industrial engineering	</option>
<option>information system	</option>
<option>information technology	</option>
<option>Journalism and Comnication	</option>
<option>Law	</option>
<option>Logistics and supply chain 	</option>
<option>Management	</option>
<option>Marketing	</option>
<option>Mathematics	</option>
<option>Mechanical Engineering	</option>
<option>Medical laboratory	</option>
<option>Medicine (MD)	</option>
<option>Midwifery	</option>
<option>Natural Resource Min	</option>
<option>Neonatal Nursing 	</option>
<option>Nursing 	</option>
<option>pediatric Nursing 	</option>
<option>Pharmacy 	</option>
<option>Physics	</option>
<option>Plant Science	</option>
<option>Psychology	</option>
<option>Sociology	</option>
<option>software engineering	</option>
<option>Sport Science	</option>
<option>statistics 	</option>
<option>Surgical Nursing	</option>
<option>Survey engineering	</option>
<option>Tourism and Hotel Management	</option>
            </select><br>
</td>


<tr>
<td><input type="submit" name="submit" value="Update account"></td></tr>

</form>
</table>

<?php

if(isset($_POST["submit"]))
{
$id=$_POST["id"];
$name=$_POST["name"];
$dept=$_POST["dept"];
if($role=="com")
{
    $sql="UPDATE $table_name SET {$column} = '$id', {$table_name}_rep = '$name', Department = '$dept'  WHERE {$column} = '$getid';";

}
else if($role=="dept")
{
     $sql="UPDATE $table_name SET {$column} = '$id', department_head = '$name', Department = '$dept'  WHERE {$column} = '$getid';";
     
}
else {
     $sql="UPDATE $table_name SET {$column} = '$id', {$role}_name = '$name', dept = '$dept'  WHERE {$column} = '$getid';";
     
     
}

//echo $sql; 
$conn->query($sql); 
  echo "<script>window.location = \"index.php?page=manage_{$role}\";</script>";
  echo "<script type=\"text/javascript\">
              alert(\"Updated succesfully\"); 
              window.location = \"index.php\";
    </script>";
}

 ?>
