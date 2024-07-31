<?php
session_start();

include("includes/connection.php");

if (!empty($_POST)) {
    extract($_POST);
    $_SESSION['error'] = array();

    if (empty($fnm)) {
        $_SESSION['error'][] = "Enter Full Name";
    }

    if (empty($add)) {
        $_SESSION['error'][] = "Enter Full Address";
    }

    if (empty($pc)) {
        $_SESSION['error'][] = "Enter City Postcode";
    }

    if (empty($city)) {
        $_SESSION['error'][] = "Enter City";
    }

    if (empty($state)) {
        $_SESSION['error']['state'] = "Enter State";
    }

    if (empty($mno)) {
        $_SESSION['error'][] = "Enter Mobile Number";
    } elseif (!is_numeric($mno)) {
        $_SESSION['error'][] = "Enter Mobile Number in Numbers";
    }

    if (!empty($_SESSION['error'])) {
        header("location:order.php");
    } else {
        if (isset($_SESSION['client']) && isset($_SESSION['client']['id'])) {
            $rid = $_SESSION['client']['id'];

            $q = "INSERT INTO `bms`.`order` (`o_id`, `o_name`, `o_address`, `o_pincode`, `o_city`, `o_state`, `o_mobile`, `o_rid`)
                  VALUES (NULL, '$fnm', '$add', '$pc', '$city', '$state', '$mno', '$rid')";

            $res = mysqli_query($link, $q);

            if ($res) {
                header("location:order.php?order");
            } else {
                echo "Error: " . mysqli_error($link);
            }
        } else {
           
            header("location:order.php");
        }
    }
} else {
    header("location:order.php");
}
?>
