<?php
include "../../config.php";

//$authors = mysqli_query($conn, "select * from author");
$categories = mysqli_query($conn, "select * from category");
//$publishingHouses = mysqli_query($conn, "select * from publishing_house");

if (isset($_POST['edit'])) {
    $id = $_POST['id_store'];
    $namestore = $_POST['name'];
//    $author = $_POST['author'];
  //  $publishingHouse = $_POST['publishingHouse'];
    $category = $_POST['category'];
    $versionNumber = (int)$_POST['versionNumber'];
    $versionYear = $_POST['versionYear'];

    // ---------------------

    if ($_FILES['image']) {
        $ImageName = $_FILES['image']['name'];
        $temp = explode(".", $_FILES["image"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $location =  '../../images/' . $newfilename;
        move_uploaded_file($_FILES['image']['tmp_name'], $location);
    }else {
        $newfilename = $store['image'];
    }

    // --------------------

    // // echo $name . '<br>' . $author . '<br>' . $publishingHouse  .'<br>'.$category  . '<br>'; 
    $connn = db_connect();
   // echo $id;
    $sqli = "UPDATE store SET 
    name = '$namestore',
    adress = '$versionYear',
    mobile_number =  $versionNumber,
    image = '$newfilename',
    category_id = $category
    WHERE id = $id ";

//$result = mysqli_query($connn, $sqli);
	//if(!$result){
    if (mysqli_query($connn, $sqli)) {
        echo "edit successfully !";
        header('Location:  /store/dashboard/store/');
    } else {
        echo "Error: " . $sqli . " " . mysqli_error($conn);
    }
}
?>