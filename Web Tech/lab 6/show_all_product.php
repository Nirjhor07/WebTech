<?php  
require_once 'controller/product_info.php';

$products = fetchAllproducts();
include "nav.php";
include "search_product.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
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
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Buying Price</th>
                <th>Selling Price</th>
                <th>Product Expire Date</th>
                <th>Product Image</th>
                <th>Action <th/>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['ID'] ?></td>
                <td><a href="show_product.php?id=<?php echo $product['ID'] ?>"><?php echo $product['productName'] ?></a></td>
                <td><?php echo $product['buyingPrice'] ?></td>
                <td><?php echo $product['sellingPrice'] ?></td>
                <td><?php echo $product['productExpiredate'] ?></td>
                <td><img width="100px" src="uploads/<?php echo $product['image'] ?>" alt="<?php echo $product['productName'] ?>"></td>
                <td><a href="edit_product.php?id=<?php echo $product['ID'] ?>">Edit</a>&nbsp<a href="controller/delete_product.php?id=<?php echo $product['ID'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
