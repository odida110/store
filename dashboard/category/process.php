<?php

include "../../config.php";

$records = mysqli_query($conn, "select * from category");

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $sql = "INSERT INTO category (name) VALUES ('$name')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully !";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error: " . $sql . " " . mysqli_error($conn);
    }
}

if (isset($_POST['delete'])) {
    $id = $_POST["id"];
    $sql = "DELETE FROM category WHERE id='" . $id . "'";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
        header('Location: ' . $_SERVER['HTTP_REFERER']."?msg=The item cannot be deleted");
    }
}
mysqli_close($conn);
