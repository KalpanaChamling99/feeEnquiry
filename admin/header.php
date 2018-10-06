<?php
?>
<!DOCTYPE html>
<html>
	<head><title>Enter Fee Amount</title>
	<link rel="stylesheet" href="assets/build/css/main.css">
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
			<div class='kcmit-content-wrapper clearfix'>
				<div class='kcmit-sidebar'>
					<ul class='kcmit-sidebar-menu'>
						<li><a href="bim.php">BIM</a></li>
						<li><a href="bba.php">BBA</a></li>
					</ul>
				</div>

				<div class='kcmit-content'>
					<div class='kcmit-content-header'>
						<h1>Kantipur College of Management and Information Technology</h1>
					</div>
        	