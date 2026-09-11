<?php 
    include './config.php';
    $caption = $_POST['caption'];
    $mediaName = $_FILES['media']['name'];
    $mediaTmpName = $_FILES['media']['tmp_name'];


    move_uploaded_file($mediaTmpName,'./postImages/' . $mediaName);





    $add = "INSERT INTO post (caption,media) VALUES ('$caption','$mediaName')";
    mysqli_query($connection,$add);
    header("Location: http://localhost:3000/index.php");



?>