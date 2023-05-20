<?php
    $con = mysqli_connect("localhost", "root", "", "pharmacy");
    session_start();
error_reporting(0);
    if(isset($_POST['addrow'])){
        $item = $_POST['item'];
        $desc = 'Null';
        $cost = $_POST['cost'];
        $qty = $_POST['qty'];
        $price = $_POST['price'];
        $del = 0;
        mysqli_query($con, "INSERT INTO `inv` VALUES(NULL, '$item', '$desc', '$cost', '$qty', '$price', '$del')");

    }
    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        mysqli_query($con, "DELETE FROM `inv` WHERE inv_id = '$id'");
    }

    if(isset($_POST['print'])){
        $name = $_POST['name'];
        $disc = $_POST['disc'];
        $date = date('Y-M-d');
        if(mysqli_query($con, "INSERT INTO `final` VALUES(NULL, '$name', '$disc', '$date')")){
            $query = mysqli_query($con, "SELECT * FROM `final` ORDER BY final_id DESC");
            $row = mysqli_fetch_array($query);
            $id = $row['final_id'];
            mysqli_query($con, "UPDATE `inv` SET inv_del = '$id' WHERE inv_del = 0");
            $_SESSION['id'] = $id;
        } else {
            echo "<script>alert('Something went wrong!');</script>";
        }
    }

    if(isset($_POST['view'])){
        $_SESSION['id'] = $_POST['id'];
        header("LOCATION: invoice.php");
    }

?>