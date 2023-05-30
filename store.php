<?php
//session_start();
include "config.php";
include "templates/header.php";
include "templates/nav.php";


$id =  $_GET['id'];
$sql =  "SELECT store.*, category.name as c_name FROM (store 

INNER JOIN category ON store.category_id = category.id)
where store.id = " . $id;

$result = $conn->query($sql);
$store = $result->fetch_assoc();

?>

<section class="pt-5 pb-5" style="min-height: 82vh;">
    <div class="container">
        <h2 class="mb-4">
            <?php echo $store['name']; ?>
        </h2>
        <div class="row">
            <div class="col-6">
                <img src="./images/<?php echo $store['image']?>" class="img-fluid" alt="store">
            </div>
            <div class="col-6">
                <p><b>Name :</b> <span><?php echo $store['name']; ?></span></p>
                <p><b>Mobile Number :</b> <span><?php echo $store['mobile_number']; ?></span></p>
                <p><b>Adress :</b> <span><?php echo $store['adress']; ?></span></p>
                
                <p><b>Category :</b> <span><?php echo $store['c_name']; ?></span></p>

            </div>
        </div>
    </div>
</section>



<?php


global $store_name;
$store_name= $store['name']; 

include_once"user_rate.php";

?>

<?php
include "templates/footer.php";
?>