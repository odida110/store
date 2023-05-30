<?php
include "./update.php";
include "../templates/header.php";
include "../../router.php";

$id =  $_GET['id'];
$sql =  "SELECT store.*, category.name as c_name FROM (store 
# INNER JOIN author ON store.author_id = author.id)
# INNER JOIN publishing_house ON store.publishing_house_id = publishing_house.id)
INNER JOIN category ON store.category_id = category.id)
where store.id = " . $id;

$result = $conn->query($sql);
$store = $result->fetch_assoc();

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
                    <div class="row mt-4">
                        <div class="col-6">
                            <div class="card p-4">
                                <p class="text-center"><b>Edit store</b></p>
                                <form method="post" action="update.php" enctype="multipart/form-data">
                                    <input type="hidden" name="id_store" value="<?php echo $store['id'];?>">
                                    <div class="form-group">
                                        <label for="">Name :</label>
                                        <input type="text" class="form-control my-2" name="name" placeholder="Enter name" require value="<?php echo $store['name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">mobile Number:</label>
                                        <input type="number" step="1" class="form-control my-2" name="versionNumber" placeholder="Enter version number" require value="<?php echo $store['mobile_number']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">adress:</label>
                                        <input class="form-control my-2 w-100" name="versionYear" style="width: 300px;" type="text" value="<?php echo $store['adress']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Image:</label>
                                        <input type="file" class="form-control my-2" name="image" placeholder="Enter image" require value="<?php echo $store['image'];?>">
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="">Category:</label>
                                        <select class="form-select my-2" name="category">
                                            <option selected disabled>select</option>
                                            <?php
                                            if ($categories) {
                                                foreach ($categories as $value) :
                                                    echo '<option value="' . $value["id"] . '" ';
                                                    if ($value["name"] === $store['c_name']) {
                                                        echo "selected";
                                                    }
                                                    echo '>' . $value["name"] . '</option>';
                                                endforeach;
                                            }
                                            ?>
                                        </select>
                                    </div>


                                    <button type="submit" name="edit" class="btn btn-primary my-2">Edit</button>
                                </form>
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