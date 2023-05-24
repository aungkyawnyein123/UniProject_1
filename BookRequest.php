<?php
    include("connect.php");
    include("prevent.php");

    $BookID=$_GET['BookID'];
    $select="SELECT * FROM book
            WHERE BookID='$BookID'";
    $result=mysqli_query($connect,$select);
    $callvalue=mysqli_fetch_assoc($result);
    if (isset($_POST['add'])) 
    {
        $bookid=$_POST['bookid'];
        $userid=$_POST['userid'];
        

        $add="INSERT INTO issue (BookID, UserID)
                VALUES ('$bookid','$userid')";
        $recordadd=mysqli_query($connect,$add);
        if ($recordadd) 
        {

            echo "<script>window.alert('Book Requested.')</script>";
            echo "<script>window.location='MemberHome.php'</script>";
        }
        else
        {
            echo (mysqli_error($connect));
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
        <title>Request Book</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/all.min.css">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    </head>
    <body class="sb-nav-fixed">
        <?php include("MemberHeader.php");?>
        <?php include("MemberSidebar.php") ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">

                        <div class="container">
                        <form action="" method="POST">
                        <h1 class="mt-4">Request Book</h1><br>
                        <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="bookid" type="text" placeholder="Enter your Category" value="<?= $callvalue['BookID'] ?>" hidden/>
                                                        <label for="Category"></label><br>
                                                    </div>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="bookid" type="text" placeholder="Enter your Category" value="<?= $callvalue['BookTitle'] ?>" disabled/>
                                                        <label for="Category">Book Title</label><br>
                                                    </div>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="userid" type="text" placeholder="Enter your Category"value="<?php echo $_SESSION["UserID"] ?>" hidden/>
                                                        <label for="Category"></label>
                                                    </div>
                                                    <div class="mt-4 mb-0">
                                                <div class="d-grid">
<input type="submit" class="btn btn-primary btn-block" name="add" value="Request Book"><br>
<input type="button" class="btn btn-secondary btn-block" onclick="history.back();" value="Back">
                                            </div>
                                            </div></form>
                        
                        </div>
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
        <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

    </body>
</html>
