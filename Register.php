<?php
	include("connect.php");
    include("prevent.php");

	if (isset($_POST['register'])) 
	{
		$fullname=$_POST['fullname'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$userrole=$_POST['userrole'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$dob=$_POST['dob'];

		$add="INSERT INTO user (Fullname, Username, Password, RoleID, Email, Phone, DateOfBirth)
				VALUES ('$fullname', '$username', '$password', '$userrole', '$email', '$phone', '$dob')";
		$recordadd=mysqli_query($connect,$add);
		if ($recordadd) {

			echo "<script>window.alert('Successfully Register.')</script>";
			echo "<script>window.location='Register.php'</script>";
		}
		else
		{
			echo "<script>window.alert('Failed to register acount.')</script>";
		}
	}
	$select="SELECT * FROM role";
	$result=mysqli_query($connect,$select);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registration</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/all.min.css">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    </head>
    <body class="sb-nav-fixed">
        <?php include("LibrarianHeader.php");?>
        <?php include("LibrarianSidebar.php") ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">

                    	<div class="container">
                    	<form action="" method="POST">
                        <h1 class="mt-4">Registration</h1><br>
                        <div class="form-floating mb-3 mb-md-0">
                        	<input type="text" class="form-control" name="fullname" placeholder="fullname" required>
                                                        <label for="Category">Full Name</label>
                                                    </div><br>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    	<input type="text" class="form-control" name="username" placeholder="username" required>
                                                        
                                                        <label for="Category">Username</label>
                                                    </div><br>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    	<input type="password" class="form-control" name="password" placeholder="password" required>
                                                        <label for="Category">Password</label>
                                                    </div><br>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <div><select name="userrole" class="form-control" required>
				<?php while ($row = mysqli_fetch_array($result)):;?>
				<option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
				<?php endwhile; ?>
			</select></div>
                                                    </div><br>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    	<input type="Email" class="form-control" name="email" placeholder="email" required>
                                                        <label for="Category">Email</label>
                                                    </div><br>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    	<input type="number" class="form-control" name="phone" placeholder="phone" required>
                                                        <label for="Category">Phone</label>
                                                    </div><br>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    	<input type="date" class="form-control" name="dob" placeholder="dob" required>
                                                        <label for="Category">Date of Birth</label>
                                                    </div>
                                                    <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                	<input type="submit" class="btn btn-primary btn-block" name="register" value="Register">
                                            </div>
                                            </div></form>
                        </div>
                </main>
                <?php include("Footer.php"); ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
