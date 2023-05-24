<?php
    include("connect.php");
    include("prevent.php");
    $UserLoginID=$_SESSION['UserID'];
    $selectUser="SELECT * FROM user WHERE UserID='$UserLoginID'";
    $recordUser=mysqli_query($connect,$selectUser);
    $resultUser=mysqli_fetch_assoc($recordUser);
    if (!isset($_SESSION["Username"])) {
        header("location:../index.php");
    }

    if (isset($_POST['update'])) {
        $fullname=$_POST['fullname'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        
        $update="UPDATE user
                SET FullName='$fullname',
                Password='$password',
                Email='$email',
                Phone='$phone'
                WHERE UserID='$UserLoginID'";
        $recordupdate=mysqli_query($connect,$update);
        if ($recordupdate) {
            echo "<script>window.alert('User Account updated.')</script>";
            echo "<script>window.location.assign('Logout.php')</script>";
        }
        else
        {
            echo "<script>window.alert('Failed to update user information!')</script>";
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
        <title>My Account</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Account Details</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="fullname" value="<?= $resultUser['FullName'] ?>" placeholder="fullname" required>
                                                <label for="inputEmail">Full Name</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="Email" class="form-control" name="email" value="<?= $resultUser['Email'] ?>" placeholder="name@example.com"required>
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" name="phone" value="<?= $resultUser['Phone'] ?>"placeholder="09xxxxx"required>
                                                <label for="inputEmail">Phone</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" name="password" placeholder="password" required>
                                                <label for="inputEmail">Password</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
<input type="submit" class="btn btn-primary btn-block" name="update" value="Update Account"><br>
<input type="button" class="btn btn-secondary btn-block" onclick="history.back();" value="Back">
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
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
