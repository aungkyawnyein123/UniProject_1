<?php
    include("connect.php");
    include("prevent.php");
    $UserID=$_SESSION["UserID"];
    $select="SELECT issue.IssueID, user.FullName, book.Quantity, book.BookTitle, book.ISBN, book.BookImage FROM issue INNER JOIN book ON issue.BookID=book.BookID
    INNER JOIN user ON issue.UserID=user.UserID WHERE status=0 ORDER BY IssueID";
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
        <title>Requested Book</title>
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
                        <h1 class="mt-4">Library</h1>
                        
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <form action="" method="POST">
        <table>
            <tr>
                <td class="float-left"><h4>Request Book List</h4></td>
                    
            </tr>
        </table>
        </form>
                            </div>

                            <div class="card-body">
                                <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col" class="text-center">ID</th>
                <th scope="col" class="text-center">ISBN</th>
                <th scope="col" class="text-center">Cover</th>
                <th scope="col" class="text-center">Book Name</th>
                <th scope="col" class="text-center">Borrower</th>
                <th scope="col" class="text-center">Quantity</th>
                <th scope="col" class="text-center">Action</th>    
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_object($result)) {  ?>
            <tr>
                    <td class="text-center"><?php echo $row->IssueID;?></td>
                    <td class="text-center"><?php echo $row->ISBN;?></td>
                    <td class="text-center"><?php echo "<img src='uploads/".$row->BookImage."' width='40' height='50'>";?></td>
                    <td class="text-center"><?php echo $row->BookTitle;?></td>
                    <td class="text-center"><?php echo $row->FullName;?></td>
                    <td class="text-center"><?php echo $row->Quantity;?></td>
                    <td width="25%" class="text-center">
                        <?php echo '<a class="btn btn-primary" href="IssueBook.php?IssueID='. $row->IssueID.'">Issue</a>';?>&nbsp
                        <?php echo '<a class="btn btn-danger" onclick="return confirm(\'Deny Book Request?\')" href="DenyBook.php?IssueID='. $row->IssueID.'">Deny</a>';?>&nbsp
                        
                    </tr>
            <?php } ?>
                            
        </tbody>
        </table>
                            </div>
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
