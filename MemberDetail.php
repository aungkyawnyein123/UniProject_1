<?php
    include("connect.php");
    include("prevent.php");

    $UserID=$_GET['UserID'];
    $select="SELECT * FROM user
            WHERE UserID='$UserID'";
    $result=mysqli_query($connect,$select);
    $callvalue=mysqli_fetch_assoc($result);
    
    if (isset($_POST['back'])) {
        header("location:MemberList.php");
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
        <title>Member Details</title>
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
                        <h1 class="mt-4">User Details</h1><br>
                        <div class="form-floating mb-3 mb-md-0">
                        	<input type="text" class="form-control" name="fullname" placeholder="fullname" value="<?= $callvalue['FullName'] ?>" disabled>
                                                        <label for="Category">Full Name</label>
                                                    </div><br>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    	<input type="text" class="form-control" name="username" placeholder="username" value="<?= $callvalue['Username'] ?>" disabled>
                                                        
                                                        <label for="Category">Username</label>
                                                    </div><br>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    	<input type="text" class="form-control" name="password" placeholder="password" value="<?= $callvalue['Password'] ?>" disabled>
                                                        <label for="Category">Password</label>
                                                    </div><br>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    	<input type="Email" class="form-control" name="email" placeholder="email" value="<?= $callvalue['Email'] ?>" disabled>
                                                        <label for="Category">Email</label>
                                                    </div><br>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    	<input type="number" class="form-control" name="phone" placeholder="phone" value="<?= $callvalue['Phone'] ?>" disabled>
                                                        <label for="Category">Phone</label>
                                                    </div><br>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    	<input type="date" class="form-control" name="dob" placeholder="dob" value="<?= $callvalue['DateOfBirth'] ?>" disabled>
                                                        <label for="Category">Date of Birth</label>
                                                    </div>
                                                    <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <input type="button" class="btn btn-secondary btn-block" onclick="history.back();" value="Back">
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
