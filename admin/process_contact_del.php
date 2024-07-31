<?php
    session_start();
    include("../includes/connection.php");

    $id = $_GET['id'];

    
    $query = "DELETE FROM contact WHERE c_id = ?";
    $stmt = mysqli_prepare($link, $query);

    if ($stmt) {
     
        mysqli_stmt_bind_param($stmt, "i", $id);

       
        mysqli_stmt_execute($stmt);

       
        $affectedRows = mysqli_stmt_affected_rows($stmt);
        mysqli_stmt_close($stmt);

        if ($affectedRows > 0) {
            
            header("location: contact_view.php");
            exit;
        } else {
           
            echo "Failed to delete contact.";
        }
    } else {
   
        echo "Failed to prepare statement.";
    }
?>
