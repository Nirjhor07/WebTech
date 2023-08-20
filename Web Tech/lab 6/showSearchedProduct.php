<!DOCTYPE html>
<html>
<head>
    <title>Search Results - Products</title>
    <style>
       Sure, let's enhance the style of the table to make it look super cool and stylish. We can use some CSS styles to achieve this. Here's the updated code with improved styling:

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #ddd;
        }

        img {
            max-width: 100px;
            max-height: 100px;
        }

        .action-links a {
            display: inline-block;
            margin-right: 5px;
            padding: 5px 10px;
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 3px;
            transition: background-color 0.3s;
        }

        .action-links a:hover {
            background-color: #45a049;
        }

    
    </style>
</head>
<body>
   

    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Buying Price</th>
                <th>Selling Price</th>
                <th>Product Expire Date</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allSearchedProducts as $i => $product): ?>
                <tr>
                    <td><a href="show_product.php?id=<?php echo $product['ID'] ?>"><?php echo $product['ID'] ?></a></td>
                    <td><?php echo $product['productName'] ?></td>
                    <td><?php echo $product['buyingPrice'] ?></td>
                    <td><?php echo $product['sellingPrice'] ?></td>
                    <td><?php echo $product['productExpiredate'] ?></td>
                    <td><img width="100px" src="../uploads/<?php echo $product['image'] ?>" alt="<?php echo $product['productName'] ?>"></td>
                    <td>
                        <a href="../edit_product.php?id=<?php echo $product['ID'] ?>">Edit</a>
                        <a href="delete_product.php?id=<?php echo $product['ID'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="../show_all_product.php"> Go back to the main page! <a/>
</body>
</html>
