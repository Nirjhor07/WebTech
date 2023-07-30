<?php
require_once '../model/model.php';

if (isset($_POST['findProduct'])) {
    $product_name = $_POST['product_name'];

    try {
        $allSearchedProducts = searchProduct($product_name);
         //You can use $allSearchedProducts to display the search results on the page or include another file for displaying the results.
         require_once '../showSearchedProduct.php';

    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
