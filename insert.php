<?php
include 'config.php';

if(isset($_POST['upload'])){
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $IMAGE = $_FILES['image'];
    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $img_des = "uploadImage/".$img_name;

    // Check if the uploadImage directory exists, if not create it
    if (!is_dir('uploadImage')) {
        mkdir('uploadImage');
    }

    // Move uploaded file to the uploadImage directory
    if (move_uploaded_file($img_loc, $img_des)) {
        // Insert data into database excluding the 'Id' column assuming it's auto-increment
        mysqli_query($con,"INSERT INTO `tblcard` (`Name`, `Price`, `Image`) VALUES ('$NAME','$PRICE','$img_des')");
        header("location:index.php");
    } else {
        echo "File upload failed";
    }
}
?>
