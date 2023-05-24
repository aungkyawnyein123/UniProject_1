<?php
    include("connect.php");
    include("prevent.php");

    if (isset($_POST['add'])) 
    {        
        $isbn=$_POST['isbn'];
        $filename = $_FILES['myfile']['name'];
        $destination = 'uploads/' . $filename;
        $file = $_FILES['myfile']['tmp_name'];
        $booktitle=$_POST['booktitle'];
        $author=$_POST['author'];
        $category=$_POST['category'];
        $description = mysqli_real_escape_string($connect,$_POST['description']);
        $quantity=$_POST['quantity'];
        if (move_uploaded_file($file, $destination)) {
            $add = "INSERT INTO book (ISBN, BookImage, BookTitle, Author, CategoryID, Description, Quantity) VALUES ('$isbn', '$filename', '$booktitle', '$author', '$category', '$description', '$quantity')";
            if (mysqli_query($connect,$add)) {
                echo "<script>window.alert('Book Added.')</script>";
                echo "<script>window.location='LibrarianHome.php'</script>";
            }
        } else {
            echo (mysqli_error($connect));
        }
        
    }
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
        <title>Add Book</title>
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
                        <h1 class="mt-4">Add Book</h1><br>
                        <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="isbn" type="text" placeholder="Enter your isbn" required/>
                                                        <label for="Category">ISBN</label><br>
                                                    </div>
                                                    <div>
                                                        <input type="file" accept="image/*" name="myfile" id="file"  onchange="loadFile(event)" style="display: none;">
                <label for="file" class="btn btn-primary" style="cursor: pointer;">Upload Image </label><br>
<br><img src="local/no-image.jpg" id="output" width="150" height="200" /><br>
                                                    </div><br>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="booktitle" type="text" placeholder="Enter your booktitle" required/>
                                                        <label for="Category">Book Title</label><br>
                                                    </div>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="author" type="text" placeholder="Enter your author" required/>
                                                        <label for="Category">Author</label><br>
                                                    </div>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-control" name="category" required>
                                                            <?php while ($row = mysqli_fetch_array($resultcategory)):;?>
                <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                <?php endwhile; ?>
                                                        </select>
                                                        <label for="Category">Category</label><br>
                                                    </div>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <textarea class="form-control" name="description" placeholder="description" required></textarea>
                                                        <label for="Category">Description</label><br>
                                                    </div>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="quantity" type="text" placeholder="Enter your quantity" required/>
                                                        <label for="Category">Quantity</label><br>
                                                    </div>
                                                    <div class="mt-4 mb-0">
                                                <div class="d-grid">
<input type="submit" class="btn btn-primary btn-block" name="add" value="Add Book"><br>
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
