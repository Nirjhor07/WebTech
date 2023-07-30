<?php
require_once 'controller/product_info.php';

// Check if 'id' key exists in $_GET array
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $product = fetchproduct($_GET['id']);
    if (!$product) {
        // Product with the given ID not found, you can display an error message or redirect the user
        echo "Product not found.";
        exit; // Stop further execution of the page
    }
} else {
    // 'id' not set or empty, display an error message or redirect
    echo "Invalid product ID.";
    exit; // Stop further execution of the page
}

include "nav.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Show a particular product</title>
       <style>
       table {
            border-collapse: collapse;
            width: 100%;
            background-color: #f2f2f2;  
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <table>
        <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Buying Price</th>
                <th>Selling Price</th>
                <th>Product Expire Date</th>
                <th>Product Image</th>
                <th> Action <th/>
            </tr>
        <tr>
            <td><?php echo $product['ID'] ?></td>
            <td><?php echo $product['productName'] ?></td>
            <td><?php echo $product['buyingPrice'] ?></td>
            <td><?php echo $product['sellingPrice'] ?></td>
            <td><?php echo $product['productExpiredate'] ?></td>
            <td><img width="100px" src="uploads/<?php echo $product['image'] ?>" alt="<?php echo $product['productName'] ?>"></td>
            <td><a href="edit_product.php?id=<?php echo $product['ID'] ?>">Edit</a>&nbsp<a href="controller/delete_product.php?id=<?php echo $product['ID'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
        </tr>
    </table>
</body>
</html>
