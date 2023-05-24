<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="LibrarianHome.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></i></div>
                                Library
                            </a>
                            <a class="nav-link" href="Category.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-tag"></i></div>
                                Category
                            </a>
                            <a class="nav-link" href="AddBook.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-plus"></i></i></div>
                                Add Book
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                                Users
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="Register.php">Register</a>
                                   
                                    <a class="nav-link" href="LibrarianList.php">Librarian List</a>
                                    <a class="nav-link" href="MemberList.php">Member List</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-book-bookmark"></i></i></div>
                                Issue Book
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    
                                    <a class="nav-link" href="RequestBooks.php">Request Books</a>
                                   
                                    <a class="nav-link" href="IssuedBooks.php">Issued Books </a>
                                    <a class="nav-link" href="ReturnBook.php">Returned Books </a>
                                    <a class="nav-link" href="OverdueBooks.php">Overdue Books</a>
                                    <a class="nav-link" href="BookRecord.php">Book Record</a>

                                    
                                </nav>
                            </div>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Librarian
                    </div>
                </nav>
            </div>