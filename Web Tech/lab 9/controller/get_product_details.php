<?php
// Include the file to fetch products
include_once "controller/product_info.php";

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    
    // Fetch the product details based on the provided ID
    $product = getProductById($productId);

    if ($product) {
        echo '<h3>' . $product['productName'] . '</h3>';
        echo '<p><strong>Selling Price:</strong> ' . $product['sellingPrice'] . '</p>';
        echo '<p><strong>Product Expire Date:</strong> ' . $product['productExpiredate'] . '</p>';
        echo '<div class="product-image"><img width="100%" src="uploads/' . $product['image'] . '" alt="' . $product['productName'] . '"></div>';
    } else {
        echo 'Product not found.';
    }
} else {
    echo 'Invalid request.';
}
?>
