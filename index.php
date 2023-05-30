<?php
include "config.php";
include "templates/header.php";
include "templates/nav.php";
$stores =  mysqli_query($conn, "select * from store");
?>

<section class="pt-5 pb-5" style="min-height: 82vh;">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 class="mb-3">All stores</h3>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
            <div class="col-12">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">

                                <?php
                                foreach ($stores as $store) {
                                    echo '
                                            <div class="col-md-4 mb-3">
                                                <div class="card">
                                                    <img class="img-fluid" alt="100%x280" src="./images/' . $store['image'] . '">
                                                    <div class="card-body">
                                                    <a href=store.php?id=' . $store['id'] . '><h4 class="card-title">' . $store['name'] . ', ' . $store['mobile_number'] . ', ' . $store['adress'] . '</h4> </a>
                                                    </div>
                                                </div>
                                            </div>
                                    ';
                                }

                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php
include "templates/footer.php";
?>