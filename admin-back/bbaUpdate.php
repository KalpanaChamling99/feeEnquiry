<?php
	$amount = intval($_REQUEST['fee']);
	$roll = intval($_REQUEST['roll']);
	$con = mysqli_connect("localhost","root","","kcmitedu_fee_db") or die("Database Connection Error");
	$update = "update bbastudent set fee_amount = '$amount' where roll = '$roll'";
	mysqli_query($con,$update) or die("Update Error");
	echo "Updated Successfully";
?>