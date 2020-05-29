<?php
session_start();
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $qty = $_POST['qty'];
    // echo $id;
    // echo $qty;
    // print_r($_SESSION["userorder"]);
    $_SESSION['userorder'][$id]['qty'] = $qty;
}
if (isset($_POST['updatecard'])) {
    $id = $_POST['id'];
    $qty = $_POST['qty'];
    // echo $id;
    // echo $qty;
    // print_r($_SESSION["userorder"]);
    $_SESSION['cardorder'][$id]['qty'] = $qty;
}
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    unlink("images/" . $_SESSION['userorder'][$id]['img']);
    unset($_SESSION['userorder'][$id]);
}
if (isset($_GET['removecard'])) {
    $id = $_GET['removecard'];
    unlink("images/" . $_SESSION['cardorder'][$id]['img']);
    unset($_SESSION['cardorder'][$id]);
}
echo "<script>
window.location.assign('cart.php');
</script>";
