<?php  
require_once '../model/model.php';

if (isset($_POST['updateProduct'])) {
    $data['productName'] = $_POST['productName'];
    $data['buyingPrice'] = $_POST['buyingPrice'];
    $data['sellingPrice'] = $_POST['sellingPrice'];
    $data['productExpiredate'] = $_POST['productExpiredate'];
    $data['image'] = basename($_FILES["image"]["name"]);

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (updateProduct($_POST['id'], $data)) {
        echo 'Successfully updated!!';
        // Redirect to show_product.php
        header('Location: ../show_product.php?id=' . $_POST["id"]);
    }
} else {
    echo 'You are not allowed to access this page.';
}
?>
<?php  
require_once '../model/model.php';

if (isset($_POST['updateProduct'])) {
    $data['productName'] = $_POST['productName'];
    $data['buyingPrice'] = $_POST['buyingPrice'];
    $data['sellingPrice'] = $_POST['sellingPrice'];
    $data['productExpiredate'] = $_POST['productExpiredate'];
    $data['image'] = basename($_FILES["image"]["name"]);

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (updateProduct($_POST['id'], $data)) {
        echo 'Successfully updated!!';
        // Redirect to show_product.php
        header('Location: ../show_product.php?id=' . $_POST["id"]);
    }
} else {
    echo 'You are not allowed to access this page.';
}
?>
