<?php
    include("connect.php");
    include("prevent.php");

    if (isset($_POST['searchbook'])) 
            {
                $searchbtn = $_POST['searchbook'];
                $UserID=$_SESSION["UserID"];
    $select="SELECT issuelog.LogID, user.UserID,issuelog.StartDate, issuelog.DueDate, issue.IssueID, user.FullName, book.BookTitle, book.ISBN, book.BookImage,DATE_FORMAT(issuelog.DueDate, '%Y-%m-%d') FROM issuelog
LEFT JOIN issue On issue.IssueID=issuelog.IssueID
    INNER JOIN book ON book.BookID=issue.BookID
    INNER JOIN user ON issue.UserID=user.UserID 
    WHERE FullName LIKE '%$searchbtn%' ORDER BY LogID;";

            }
            else
            {
                $UserID=$_SESSION["UserID"];
    $select="SELECT issuelog.LogID, user.UserID,issuelog.StartDate, issuelog.DueDate, issue.IssueID, user.FullName, book.BookTitle, book.ISBN, book.BookImage,DATE_FORMAT(issuelog.DueDate, '%Y-%m-%d') FROM issuelog
LEFT JOIN issue On issue.IssueID=issuelog.IssueID
    INNER JOIN book ON book.BookID=issue.BookID
    INNER JOIN user ON issue.UserID=user.UserID ORDER BY LogID;";
                $searchbtn="";
            }
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
        <title> Book Records</title>
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
                <td class="float-left"><h4> Book Record</h4></td>
                <td width="21.2%"><input class="form-control" type="text" name="searchbook" placeholder="Search by Borrower" value="<?php echo $searchbtn?>"></td>
                <td width="10%"><input type="submit"  class="btn btn-primary" name="" value="Search"></td>    
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
                <th scope="col" class="text-center">Issue Date</th>
                <th scope="col" class="text-center">Due Date</th>  
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_object($result)) {  ?>
            <tr>
                    <td class="text-center"><?php echo $row->LogID;?></td>
                    <td class="text-center"><?php echo $row->ISBN;?></td>
                    <td class="text-center"><?php echo "<img src='uploads/".$row->BookImage."' width='40' height='50'>";?></td>
                    <td class="text-center"><?php echo $row->BookTitle;?></td>
                    <td class="text-center"><?php echo $row->FullName;?></td>
                    <td width="15%" class="text-center"><?php echo $row->StartDate;?></td>
                    <td width="15%" class="text-center"><?php echo $row->DueDate;?></td>
                    
                        
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
