<?php 
	include("connect.php");
	include("prevent.php");
	$UserID=$_GET['UserID'];
	$delete="DELETE FROM user
			WHERE UserID='$UserID'";
	$result=mysqli_query($connect,$delete);
	if ($result) {
		echo "<script>window.location='MemberList.php'</script>";
	}




 ?>