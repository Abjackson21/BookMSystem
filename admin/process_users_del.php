<?php
    session_start();
    
    include("../includes/connection.php");

    $id = $_GET['id'];

    $query = "DELETE FROM register WHERE r_id = $id";

    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Error: " . mysqli_error($link));
    }

    mysqli_close($link);

    header("location: users_view.php");
?>
