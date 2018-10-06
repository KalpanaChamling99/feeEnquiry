<?php
	$program = $_REQUEST['p'];
	$roll = intval($_REQUEST['roll']);
	$con = mysqli_connect("localhost","root","","kcmitedu_fee_db") or die("Database Connection Error");
	if($program == 'bim')
	{
		$select = "select roll,name,fee_amount from bimstudent where roll = '$roll'";		
	}
	if($program == 'bba')
	{
		$select = "select roll,name,fee_amount from bbastudent where roll = '$roll'";		
	}
	$result = mysqli_query($con,$select) or die("Retrieval Error");
	if(mysqli_num_rows($result)==0)
	{
		
		echo "No Record Found! Symbol No does not exists...";
		die();
	}
	$arr = mysqli_fetch_assoc($result);
	$fee = $arr['fee_amount'] + 2500;
	echo "<div class='kcmit-fee-enquiry-detail'>";
	echo "<p><span>Student Name  :</span>$arr[name]</p>";
	echo "<p><span>Symbol No.  :</span>$arr[roll]</p>";
	echo "<p><span>Fee to be Paid  :</span> $fee <small>(Exam Form Fee is Included in the Displayed Amount)</small><p>";
	echo "<p class='kcmit-text-yellow'>Displayed Fee + 2500 need to be deposited in A/C: 05601050001398 (KCMIT College Pvt Ltd) maintained at Nepal Investment Bank</p>";
	echo "<p class='kcmit-text-green'><span>यदी कसैलाई यहाँ प्रकाशित तिर्नुपर्ने रकम चित्त नबुझे लेखा शाखामा सम्पर्क गर्नु होला। </span>-लेखा शाखा</p>";
	echo "</div>";
?>