<?php
		if(isset($_POST['upload']))
		{
			$con = mysqli_connect("localhost","root","","kcmitedu_fee_db") or die("Database Connection Error");
			$filename = $_FILES['namelist']['tmp_name'];
			$fp = fopen($filename,"r") or die("File opening error");
			for($arr = fgetcsv($fp); !feof($fp); $arr = fgetcsv($fp))
				mysqli_query($con,"insert into bbastudent(roll,name) values ('".$arr[0]."','".$arr[1]."')") or die("Insertion Error");
			echo "Record Inserted Successfully";
		}
?>
<!DOCTYPE html>
<html>
	<head><title>Upload Student Name List</title></head>
	<body>
		<form action="" method="post" enctype="multipart/form-data">
			<input type="file" accept="text/csv" name="namelist"/>
			<input type="submit" name="upload" value="Upload"/>			
		</form>
	</body>
</html>