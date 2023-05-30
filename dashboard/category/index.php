<?php
include "./process.php";
include "../templates/header.php";
include "../../router.php";

?>

<body class="home">
    <div class="container-fluid display-table">
        <div class="row display-table-row">
        <?php include "../templates/sidebar.php" ?>
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <div class="row">
                    <header>
                       
                        <div class="col-md-7">
                            <nav class="navbar-default pull-left">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </nav>
                            <div>
                                <h2>Categories</h2>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="header-rightside">
                            </div>
                        </div>
                    </header>
                </div>
                <div class="user-dashboard">
                <?php
                    if (isset($_GET['msg'])) {
                        echo '<div class="alert alert-danger mt-4" role="alert">' .
                            $_GET['msg']
                        . '</div>';
                    }
                    ?>
                    <div class="row mt-4">
                        <div class="col-6">
                            <div class="card p-4">
                                <p class="text-center"><b>Add new Categories</b></p>
                                <form method="post" action="process.php">
                                    <div class="form-group">
                                        <label for="nameAuthor">Name Category:</label>
                                        <input type="text" class="form-control my-2" id="nameAuthor" name="name" placeholder="Enter name" require>
                                    </div>
                                    <button type="submit" name="save" class="btn btn-primary my-2">Save</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card p-4">
                            <p class="text-center"><b>All Categories</b></p>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">name</th>
                                            <th scope="col">delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($records) {
                                            foreach ($records as $value) :
                                                echo '<tr>
                                                <th scope="row" class="py-3">' . $value['name'] . '</th>
                                                    <td>' .
                                                    '<form method="POST" action="process.php" class="mb-0">
                                                            <input type="hidden" name="id" value=' . $value['id'] . '>
                                                            <button type="submit" name="delete" value="delete2" class="btn btn-danger">Delete</button>
                                                        </form>' .
                                                    '</td>
                                                <tr>';
                                            endforeach;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</body>

<?php
include "../templates/footer.php";
?>