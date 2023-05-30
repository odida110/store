<?php
include "../config.php";
include "../templates/header.php";
include "../templates/nav.php";
$title = "Catetgory";
$categories =  mysqli_query($conn, "select * from category");
?>

            <form class="d-flex" method="GET" action="search.php">
                <input class="form-control me-2" type="search" name="q" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
                <section class="pt-5 pb-5" style="min-height: 82vh;">
                <div class="container">
                <div class="row">
            <div class="col-6">
                <h3 class="mb-3">All Catetgoty</h3>
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
                                foreach ($categories as $category) {
                                    echo '
                                            <div class="col-md-4 mb-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                    <a href=category.php?id=' . $category['id'] . '><h4 class="card-title">' . $category['name'] . '</h4> </a>
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
include "../templates/footer.php";
?>