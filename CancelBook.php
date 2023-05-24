<?php 
	include("connect.php");
	include("prevent.php");
	$IssueID=$_GET['IssueID'];
	$delete="DELETE FROM issue
			WHERE IssueID='$IssueID'";
	$result=mysqli_query($connect,$delete);
	if ($result) {
		echo "<script>window.location='RequestList.php'</script>";
	}




 ?>