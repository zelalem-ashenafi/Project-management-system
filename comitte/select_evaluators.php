<style>
  .list{
    width:100%;
    background-color: #CCCCCC;
    padding:20px;
    overflow:auto;
  }
  .list-btn{
    float:right;
  }
	.custom-menu {
        z-index: 1000;
	    position: absolute;
	    background-color: #ffffff;
	    border: 1px solid #0000001c;
	    border-radius: 5px;
	    padding: 8px;
	    min-width: 13vw;
}
.custom-menu-list {
    width: 100%;
    display: flex;
    color: #4c4b4b;
    font-weight: 600;
    font-size: 1em;
    padding: 1px 11px;
}
	.card-icon {
    position: absolute;
    font-size: 3em;
    bottom: .2em;
    color: #ffffff80;
}
.file-item{
	cursor: pointer;
}
.custom-menu-list:hover,.file-item:hover,.file-item.active {
    background: #80808024;
}
table th,td{
	/*border-left:1px solid gray;*/
}
.custom-menu-list span.icon{
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
<?php
if(!isset($_SESSION['login_committee_ID']))
echo "<script>window.location = \"index.php\";</script>";
?>
<table bgcolor="#f2f2f2" style="padding:50px" align="center">
<form onSubmit="return validateform()"  action="" method="post">
<table border=0>
        <tr><td>Group Name</td><td>evaluators</td></tr>
        <?php
        $group_list=array();
        $data=array();
        include 'db_connect.php';
    
        $sql = "SELECT submissions.group_name,stud_eva.stud_id FROM submissions left join stud_eva on submissions.Leader_ID=stud_eva.stud_id where stud_eva.stud_id IS NULL;";
        $result = $conn->query($sql);
        $sql2 = "SELECT ev_id, ev_name FROM evaluators";
        $result2 = $conn->query($sql2);
        if($result2->num_rows>0){
                while($row2=$result2->fetch_assoc()){
                    array_push($data,$row2);

                }
             }else {
                echo "No evaluators";}
        if ($result->num_rows > 0) {
            $numrows=$result->num_rows;
            
          while($row = $result->fetch_assoc()) {
            $group_name=(str_replace(" ","",trim(strval($row['group_name']))));
            echo  '<tr><td>'.$row['group_name'].'</td> <td><select name="0'.$group_name.'">';
            array_push($group_list,$row['group_name']);
             foreach($data as $row)
             {
                echo '<option value="'.$row['ev_id'].'">'.$row['ev_name'].'</option>';
             }
             
            

        
            echo'</select></td></tr>
            <tr><td></td><td><select name="1'.$group_name.'">';
             foreach($data as $row)
             {
                echo '<option value="'.$row['ev_id'].'">'.$row['ev_name'].'</option>';
             }
             echo'</select></td></tr>
             <tr><td></td><td><select name="2'.$group_name.'">';
             foreach($data as $row)
             {
                echo '<option value="'.$row['ev_id'].'">'.$row['ev_name'].'</option>';
             }
             echo'</select></td></tr>';
            }
        }else {
            echo "No submissions";}
             ?>
      
    
            </td></tr>
            
            


          
        </table>
        <input type="submit" value="Assign" name="submit"></input>
</form>

</body>
<?php

    
    if(isset($_POST["submit"]))
    
    {
        foreach($group_list as $gr)
        {
            //var_dump($group_list) ;
            foreach(range(0,2) as $i)
            {
                
                $result2=$conn->query("select * from submissions where Group_name ='$gr'"); 
                while($row2 = $result2->fetch_assoc())
                {
                  $leader_id=$row2['Leader_ID'];  
                }
                //$result=$conn->query("select * from stud_ev where stud_id ='$leader' ");
                $group_name2=(str_replace(" ","",trim(strval($gr))));
                $ev_sel=$_POST[$i.$group_name2];
                $conn->query("INSERT INTO stud_eva (stud_id,ev_id) VALUES ('$leader_id','$ev_sel')");
                //echo $gr." ".$leader_id." ".$adv_sel;
            }
        }
               

          
        
        
        echo "<script type=\"text/javascript\">
        alert(\"Selected succesfully\"); 
        window.location = \"index.php\";
</script>";
        
    }
?>