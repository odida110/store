<?php

include "../../config.php";

//$authors = mysqli_query($conn, "select * from author");
$categories = mysqli_query($conn, "select * from category");
//$publishingHouses = mysqli_query($conn, "select * from publishing_house");
$records = mysqli_query($conn, "select * from store");

if (isset($_POST['save'])) {
    $namestore = $_POST['name'];
    //$author = $_POST['author'];
   // $publishingHouse = $_POST['publishingHouse'];
    $category = $_POST['category'];
    $versionNumber = (int)$_POST['versionNumber'];
    $versionYear = $_POST['versionYear'];

    // ---------------------

    $ImageName = $_FILES['image']['name'];
    $temp = explode(".", $_FILES["image"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $location =  '../../images/' . $newfilename;
    move_uploaded_file($_FILES['image']['tmp_name'], $location);

    // --------------------


    // check if name store is taken 

    $sqlCheckName = $conn->query("select count(*) from store where name = '$namestore'")->fetch_assoc();

    if($sqlCheckName > 0) {
        $sqlCheckV = $conn->query("select adress from store where name = '$namestore'")->fetch_assoc();
        if( $sqlCheckV['adress'] == $versionYear) {
           return  header('Location: ' . $_SERVER['HTTP_REFERER']. "?msg=The store is already exist");
        }
    }

    $sql = "INSERT INTO `store` (`name`, `adress`,`mobile_number`, `image`, `category_id`) VALUES  
    ('$namestore', '$versionYear', $versionNumber, '$newfilename', $category);";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully !";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error: " . $sql . " " . mysqli_error($conn);
    }
}

if (isset($_POST['delete'])) {
    $id = $_POST["id"];
    $sql = "DELETE FROM store WHERE id='" . $id . "'";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
