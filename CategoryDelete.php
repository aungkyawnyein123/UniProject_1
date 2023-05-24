<?php 
	include("connect.php");
	include("prevent.php");
	$CategoryID=$_GET['CategoryID'];
	$delete="DELETE FROM category
			WHERE CategoryID='$CategoryID'";
	$result=mysqli_query($connect,$delete);
	if ($result) {
		echo "<script>window.location='Category.php'</script>";
	}




 ?>