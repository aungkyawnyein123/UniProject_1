<?php
    include("connect.php");
    include("prevent.php");
    $Today=date('y:m:d');
    $IssueID=$_GET['IssueID'];
    $select="SELECT issue.IssueID, book.BookID, book.BookTitle FROM issue
    INNER JOIN book ON book.BookID=issue.BookID
            WHERE IssueID='$IssueID'";

    $result=mysqli_query($connect,$select);
    $callvalue=mysqli_fetch_assoc($result);
    if (isset($_POST['update'])) 
    {
        $update="UPDATE issue SET status=3 WHERE IssueID='$IssueID'";
        $recordupdate=mysqli_query($connect,$update);
        if ($recordupdate) 
        {
            echo "<script>window.alert('Returned Book.')</script>";
            echo "<script>window.location='ReturnBook.php'</script>";
            $bookid=$_POST['bookid'];
            $update1=mysqli_query($connect,"UPDATE issue i,book b
	SET b.Quantity = b.Quantity+1
	WHERE b.BookID='$bookid'");
            $update1=mysqli_query($connect,"UPDATE issuelog
SET status =1
WHERE IssueID='$IssueID'");
            
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
        <title>Return Book</title>
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
                        <form action="" method="POST" enctype="multipart/form-data">
                        <h1 class="mt-4">Return Book</h1><br>
                        <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="issueid" type="text" placeholder="Enter your isbn" value="<?= $callvalue['IssueID'] ?>" required hidden/>
                                                        <label for="Category"></label><br>
                                                        <input type="number" name="bookid" value="<?= $callvalue['BookID']?>" hidden>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="bookid" type="text" placeholder="Enter your Category" value="<?= $callvalue['BookTitle'] ?>" disabled/>
                                                        <label for="Category">Book Title</label><br>
                                                    </div>
                                                    
                                                    <div class="mt-4 mb-0">
                                                <div class="d-grid">
<input type="submit" class="btn btn-primary btn-block" name="update" value="Accept"><br>
<input type="button" class="btn btn-secondary btn-block" onclick="history.back();" value="Back">
                                            </div>
                                            </div></form>
                        </div>
                        <div class="container">
                        
                        <br>
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
var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
};
</script>
    </body>
</html>
