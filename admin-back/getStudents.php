<?php
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
		$select = "select roll, name, fee_amount from student where roll between '$start' and '$end'";
		$result = mysqli_query($con,$select) or die("Selection Error");
		
		echo "<hr/><hr/><table><tr><th>Roll No</th><th>Name</th><th>Remaining Due</th></tr><tr>";
		while($arr = mysqli_fetch_assoc($result))
		{
			echo "<td><input type='text' value='".$arr['roll']."' size='5' style='text-align:center;' readonly='readonly'/></td>";
			echo "<td><input type='text' value='".$arr['name']."' size='25' readonly='readonly'/></td>";
			echo "<td><input type='text' name='".$arr['roll']."' value='".$arr['fee_amount']."' style='text-align:right;' onchange='display()' /></td>";
			echo "</tr><tr>";
		}
		echo "</table>";
		
?>