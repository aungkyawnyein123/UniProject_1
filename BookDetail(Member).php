<?php
    include("connect.php");
    include("prevent.php");

    $BookID=$_GET['BookID'];
    $select="SELECT book.ISBN,book.BookImage,book.BookTitle,book.Author, category.CategoryType,book.Description,book.Quantity FROM book
    INNER JOIN category ON book.CategoryID=category.CategoryID
            WHERE BookID='$BookID'";
    $result=mysqli_query($connect,$select);
    $callvalue=mysqli_fetch_assoc($result);

    $selectcategory="SELECT * FROM category";
    $resultcategory=mysqli_query($connect,$selectcategory);


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Book Details</title>
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
                    	<form action="" method="POST" enctype="multipart/form-data">
                        <h1 class="mt-4">Book Details</h1><br>
                        <div class="form-floating mb-3 mb-md-0">
                        	<input type="number" class="form-control" name="isbn" placeholder="isbn"  value="<?= $callvalue['ISBN'] ?>" disabled>
                                                        <label for="Category">ISBN</label>
                                                    </div>
                                                    <div>
<br><img src="uploads/<?php echo $callvalue['BookImage']; ?>" id="output" width="150" height="200">
                                                        
                                                    </div><br>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="text" class="form-control" name="booktitle" placeholder="title"  value="<?= $callvalue['BookTitle'] ?>" disabled>
                                                        
                                                        <label for="Category">Title</label>
                                                    </div><br>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="text" class="form-control" name="author" placeholder="author"  value="<?= $callvalue['Author'] ?>" disabled>
                                                        <label for="Category">Author</label>
                                                    </div><br>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <div>
                                                            <select name="category" class="form-control" disabled>
                <?php while ($row = mysqli_fetch_array($resultcategory)):;?>
                <option value="<?php echo $row[0];?>"><?= $callvalue['CategoryType'] ?></option>
                <?php endwhile; ?>
            </select></div>
                                                    </div><br>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <textarea class="form-control" name="description" placeholder="description" disabled><?= $callvalue['Description'] ?></textarea>
                                                        <label for="Category">Description</label>
                                                    </div><br>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="number" class="form-control" name="quantity" placeholder="quantity"  value="<?= $callvalue['Quantity'] ?>" disabled>
                                                        <label for="Category">Quantity</label>
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
        <script>
var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
};
</script>
    </body>
</html>
