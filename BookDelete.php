<?php 
	include("connect.php");
	include("prevent.php");
	$BookID=$_GET['BookID'];
	$delete="DELETE FROM book
			WHERE BookID='$BookID'";
	$result=mysqli_query($connect,$delete);
	if ($result) {
		echo "<script>window.location='LibrarianHome.php'</script>";
	}




 ?>