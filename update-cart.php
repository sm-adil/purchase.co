<?php
    session_start();
    include("config/db.php");

    $product_id = $_GET['id'];
    $action = $_GET['action'];

    if($action === 'empty')
        unset($_SESSION['cart']);

    $result = $conn->query("SELECT quantity FROM products WHERE id = '$product_id'");

    if($result){
        if($obj = $result->fetch_object()) {
            switch($action) {
                case "add":
                        if($_SESSION['cart'][$product_id] + 1 <= $obj->quantity)
                            $_SESSION['cart'][$product_id]++;
                break;
                case "remove":
                        $_SESSION['cart'][$product_id]--;
                        if($_SESSION['cart'][$product_id] == 0)
                            unset($_SESSION['cart']);
                break;
            }
        }
    }
    header("location:cart.php");
?>
