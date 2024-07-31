<?php
    session_start();

    include("../includes/connection.php");

    if (!empty($_POST)) {
        $_SESSION['error'] = array();

        extract($_POST);

        if (empty($bnm)) {
            $_SESSION['error']['bnm'] = "Enter Book Name";
        }

        if (empty($desc)) {
            $_SESSION['error']['desc'] = "Enter Book Description";
        }

        if (empty($price)) {
            $_SESSION['error']['price'] = "Enter Book Price";
        } else if (!is_numeric($price)) {
            $_SESSION['error']['price'] = "Enter Book Price in Numbers";
        }

        if (empty($_FILES['b_img']['name'])) {
            $_SESSION['error']['b_img'] = "Please provide a file";
        } else if ($_FILES['b_img']['error'] > 0) {
            $_SESSION['error']['b_img'] = "Error uploading file";
        } else if (!(strtoupper(substr($_FILES['b_img']['name'], -4)) == ".JPG" || strtoupper(substr($_FILES['b_img']['name'], -5)) == ".JPEG" || strtoupper(substr($_FILES['b_img']['name'], -4)) == ".GIF")) {
            $_SESSION['error']['b_img'] = "Wrong file type";
        }

        if (!empty($_SESSION['error'])) {
            header("location:book_add.php");
            exit();
        } else {
            $t = time();

            $b_img = "book_img/" . uniqid() . "_" . $_FILES['b_img']['name'];

            move_uploaded_file($_FILES['b_img']['tmp_name'], "../" . $b_img);

            $stmt = $link->prepare("INSERT INTO book (b_nm, b_desc, b_price, b_img, b_time) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssdss", $bnm, $desc, $price, $b_img, $t);
            $stmt->execute();

            header("location:book_add.php");
            exit();
        }
    } else {
        header("location:book_add.php");
        exit();
    }
?>
