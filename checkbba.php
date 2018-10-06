
	
<?php
		include 'header.php';
?>
	<div class="kcmit-fee-enquiry kcmit-min-height">
		<div id="form" class='container'>
			<div class="kcmit-title">
                <h1> <span class="kcmit-dots"></span>Fee Enquiry System (BBA Program)</h1>
			</div>
			
			<form>
				<label>Enter Your Exam Roll No. to Get Fee Amount to be Paid</label>
				<input type="text" placeholder="Exam Roll No" onchange="viewBBA(this)"/>
			</form>

			<div id="reply">
			</div>
		</div>
	</div>
<?php
	include 'footer.php';
?>
	