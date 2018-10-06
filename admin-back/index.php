<!DOCTYPE html>
<html>
	<head><title>Enter Fee Amount</title>
	<style>
		body{
			margin:2% 5%;
			background-color:#a19477;
		}
		caption{
			font-family:verdana;
			color:white;
			font-size:18pt;
			font-weight:bold;
			text-decoration:underline;
			padding:10px;
		}
		#header{
			text-align:center;
			background-color:#6592c2;
			color:white;
			padding:5px 2px;
			box-shadow:#1d1d1d 5px 5px 5px;
		}
		#form{
			background-color: #65a2c2;
			padding-left:5%;
			padding-top:3%;
			text-align:center;
			padding-bottom:2%;
			box-shadow:#1d1d1d 5px 5px 5px;
		}
		
		p{
			font-style:italic;
			font-size:16pt;
			color:white;
		}
		select,#submit{
			height:40px;
			width:200px;
			font-size:18pt;
			font-family:verdana;
			background-color:#cdcdcd;
			text-align:center;
		}
		
	</style>
	<script>
		function findStudents(select)
		{
			var amount = select.value;
			var roll = select.name;
			var msg=parseInt(select.name);
			if(amount == "")
			{
				document.getElementById(msg).innerHTML="Enter the Value";
				return;
			}
			else{
				var ob = new XMLHttpRequest();
				ob.onreadystatechange = function(){
					if(this.readyState == 4 && this.status == 200)
						document.getElementById(msg).innerHTML = this.responseText;
				};
				if(roll.charAt(0)=='0')
				{
					ob.open("GET","bbaUpdate.php?fee="+amount+"&roll="+roll,true);
				}
				else{
					ob.open("GET","bimUpdate.php?fee="+amount+"&roll="+roll,true);
				}
				ob.send();
			}
		}
	</script>
	</head>
	<body>
		<div id="header"><h1>Kantipur College of Management and Information Technology</h1>
		<h2>Fee Amount Entry Form (BIM/BBA Program)</h2>
		<p>Select the Program and Batch from the following drop down list</p></div>
		<div id="form">
		<form action="" method="post">
			<select name="selprogram">
				<option value="bim">BIM</option>
				<option value="bba">BBA</option>
			</select>
			<select name="selbatch">
				<option value="14">2014</option>
				<option value="15">2015</option>
				<option value="16">2016</option>
				<option value="17">2017</option>
			</select>
			<input type="submit" id= "submit" name="submit" value="View List"/>
		</form>	
<?php
if(isset($_POST['submit']))
{
	$batch = intval($_REQUEST['selbatch']);
	$program = $_REQUEST['selprogram'];
	$con = mysqli_connect("localhost","root","","kcmitedu_fee_db") or die("Database Connection Error");
	if($program == 'bim')
	{
		switch($batch)
		{
			case 14:$start=5591;$end=5649;break;
			case 15:$start=6330;$end=6391;break;
			case 16: $start=7137;$end=7198;break;
			case 17:$start=7900;$end=7946;break;			
		}
		$select = "select roll, name, fee_amount from bimstudent where roll between '$start' and '$end'";
		$result = mysqli_query($con,$select) or die("Selection Error");	
		if(mysqli_num_rows($result)===0)
		{
			echo "No Records Found";
			die();
		}
		echo "<hr/><hr/><table><caption>BIM 20$batch Batch</caption><tr><th>Roll No</th><th>Name</th><th>Remaining Due</th></tr><tr>";
		while($arr = mysqli_fetch_assoc($result))
		{
			echo "<form>";
			echo "<td><input type='text' value='".$arr['roll']."' size='5' style='text-align:center;' readonly='readonly'/></td>";
			echo "<td><input type='text' value='".$arr['name']."' size='25' readonly='readonly'/></td>";
			echo "<td><input type='text' name='".$arr['roll']."' value='".$arr['fee_amount']."' style='text-align:right;' onchange='findStudents(this)' /></td><td id='".$arr['roll']."' style='text-align:center;font-style:italic;color:green'></td>";
			echo "</form>";
			echo "</tr><tr>";
		}
		echo "</table>";
	}
	if($program == 'bba')
	{
		switch($batch)
		{
			case 14:$start=13642;$end=13701;break;
			case 15:$start=15422;$end=15483;break;
			case 16: $start=18058;$end=18117;break;
			case 17:$start=0;$end=0;break;			
		}
		$select = "select roll, name, fee_amount from bbastudent where roll between '$start' and '$end'";
		$result = mysqli_query($con,$select) or die("Selection Error");		
		if(mysqli_num_rows($result)===0)
		{
			echo "No Records Found";
			die();
		}
		echo "<hr/><hr/><table><caption>BBA 20$batch Batch</caption><tr><th>Roll No</th><th>Name</th><th>Remaining Due</th></tr><tr>";
		while($arr = mysqli_fetch_assoc($result))
		{
			echo "<form>";
			echo "<td><input type='text' value='".$arr['roll']."' size='5' style='text-align:center;' readonly='readonly'/></td>";
			echo "<td><input type='text' value='".$arr['name']."' size='25' readonly='readonly'/></td>";
			echo "<td><input type='text' name='0".$arr['roll']."' value='".$arr['fee_amount']."' style='text-align:right;' onchange='findStudents(this)' /></td><td id='".$arr['roll']."' style='text-align:center;font-style:italic;color:green'></td>";
			echo "</form>";
			echo "</tr><tr>";
		}
		echo "</table>";
	}
}	
?>
</div>
</body>
</html>