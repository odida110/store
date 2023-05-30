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
                                <h2>stors</h2>
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
                                <p class="text-center"><b>Add new store</b></p>
                                <form method="post" action="process.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="">Name :</label>
                                        <input type="text" class="form-control my-2" name="name" placeholder="Enter name" require>
                                    </div>
                                    <div class="form-group">
                                        <label for="">mobile Number:</label>
                                        <input type="number" step="1" class="form-control my-2" name="versionNumber" placeholder="Enter version number" require>
                                    </div>
                                    <div class="form-group">
                                        <label for="">aderss:</label>
                                        <input class="form-control my-2 w-100" name="versionYear" style="width: 300px;" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Image:</label>
                                        <input type="file" class="form-control my-2" name="image" placeholder="Enter image" require>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="">Category:</label>
                                        <select class="form-select my-2" name="category">
                                            <option selected disabled>select</option>
                                            <?php
                                            if ($categories) {
                                                foreach ($categories as $value) :
                                                    echo '<option value="' . $value["id"] . '">' . $value["name"] . '</option>';
                                                endforeach;
                                            }
                                            ?>
                                        </select>
                                    </div>


                                    <button type="submit" name="save" class="btn btn-primary my-2">Save</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card p-4">
                                <p class="text-center"><b>All stores</b></p>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">name</th>
                                            <th scope="col">delete</th>
                                            <th scope="col">edit</th>
                                            <th scope="col">rate</th>
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
                                                    <td>
                                                    <a href="/store/dashboard/store/edit.php?id='. $value['id'].'" class="btn btn-success" >Edit</a>
                                                    </td>

                                                    
                                                ';
                                                 ?>
                                                <td>
                                                    <form action="../../view_rate.php?store_name=<?php echo $value['name']; ?>" method="POST">
                                                    <button type="submit" class="btn btn-success" id="rate-btn<?php echo $value['name']; ?>">view rate</button> 
                                                     </form></td>
                                               

                                                <?php
                                                echo "</tr>";
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