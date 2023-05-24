<?php
	include("connect.php");
	include("prevent.php");
	$UserLoginID=$_SESSION['UserID'];
    $selectUser="SELECT * FROM user WHERE UserID='$UserLoginID'";
    $recordUser=mysqli_query($connect,$selectUser);
    $resultUser=mysqli_fetch_assoc($recordUser);

	if (isset($_POST['renew'])) {
		$time=$_POST['time'];
		
		$update="UPDATE user
				SET RegDate='$time'
				WHERE UserID='$UserLoginID'";
		$recordupdate=mysqli_query($connect,$update);
		if ($recordupdate) {
			echo "<script>window.alert('Renewed Subscription.')</script>";
			echo "<script>window.location.assign('index.php')</script>";
		}
		else
		{
			echo "<script>window.alert('Failed to renew!')</script>";
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Renew Account</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container"><br><br><br>
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Renew</h3></div>
                                    <div class="card-body" align="center">
                                    	<form action="" method="POST">
		<div class="form-group">
			<label>Subscribe 30 days</label>
			<div><input type="date" class="form-control" value="<?php echo strftime('%Y-%m-%d',
  strtotime("now")); ?>" name="time" hidden/><br>
</div>
		</div>
		<div class="form-group">
			<label>Payment</label>
			<div><select class="form-control" required>
				<option>Paypal</option>
				<option>Visa</option>
				<option>Master Card</option>
			</select></div>

		<div class="form-group">
			<br>
			<input type="submit" class="btn btn-primary" name="renew" value="Renew">
			<input type="button" class="btn btn-secondary" onclick="history.back();" value="Back">
			
		</div>
	</form>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
