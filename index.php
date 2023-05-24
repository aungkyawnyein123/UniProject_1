<?php
    include("connect.php");
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $username=$_POST["username"];
        $password=$_POST["password"];

        $select="SELECT * FROM user
                WHERE Username='$username' 
                AND Password='$password'";
        $result=mysqli_query($connect,$select);
        $record=mysqli_num_rows($result);
        $row=mysqli_fetch_array($result);
        

        if($record > 0)
        {
        if($row["RoleID"]=="1")
            {   
                $_SESSION["UserID"]=$row['UserID'];
                $_SESSION["Username"]=$username;
                header("location:LibrarianHome.php");
            }
            elseif($row["RoleID"]=="2")
            {
                $UserReg=$row["RegDate"];
                $Expire=date("Y-m-d",strtotime(date("Y-m-d",strtotime($UserReg))."+ 30 day"));
                if (date("Y-m-d")<$Expire) 
                {
                    $_SESSION["UserID"]=$row['UserID'];
                    $_SESSION["Username"]=$username;
                    header("location:MemberHome.php");
                }
                else
                {
                    $_SESSION["UserID"]=$row['UserID'];
                    $_SESSION["Username"]=$username;
                    header("location:MemberExpire.php");
                }
            }
        }
        else
        {
            $error="Username or password <br>is incorrect!";
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
        <title>Login</title>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body" align="center">
                                        <form action="" method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="text" placeholder="Username" name="username" required/>
                                                <label for="inputEmail">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="password" required/>
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div>
                                                <input type="submit" class="btn btn-primary" name="login" value="Login">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><h6><a href="MemberRegister.php">Register Account</a></h6></div>
                                        <?php 
                        if (isset($_POST['login'])) {
                     ?>
                    <h3 class="text-danger"><?= $error; ?></h3>
                    <?php } ?>
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
