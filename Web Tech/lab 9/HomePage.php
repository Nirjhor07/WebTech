<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: userlogin.php"); // Redirect to login page
    exit;
} 
?>
<?php
include_once "controller/product_info.php"; // Include the file to fetch products
$products = fetchAllproducts(); // Fetch all products

// Pagination
$itemsPerPage = 5;
$totalItems = count($products);
$totalPages = ceil($totalItems / $itemsPerPage);
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$startItem = ($currentPage - 1) * $itemsPerPage;
$visibleProducts = array_slice($products, $startItem, $itemsPerPage);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Virtual Dokanbd.com/ Home Page</title>
    <style>

            body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f0f2f5;
        }

        .content-container {
            max-width: 1000px; /* Adjust the max-width as needed */
            width: 100%;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px; /* Add margin to center-align the content */
        }

        /* Style for product feed items */
        .product-item {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
        }
        
        .product-image {
            max-width: 100px;
            margin-right: 10px;
        }

        /* Pagination styles */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            display: inline-block;
            padding: 6px 12px;
            margin: 0 4px;
            text-align: center;
            background-color: #f2f2f2;
            color: #333;
            border-radius: 4px;
            text-decoration: none;
        }

        .pagination a.active {
            background-color: #3498db;
            color: white;
        }
         .search-bar {
            margin-top: 20px;
            margin-left: 20px;
        }
      #addProductButton {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            transition: box-shadow 0.3s;
            align-self: flex-end; /* Align button to the right */
            margin-top: auto; /* Push the button to the bottom */
        }

        #addProductButton:hover {
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.3);
        }

    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
        <div style="display: flex; align-items: flex-start;">
        
    </div>
    <div class="content-container">
        <div class="search-bar">
            <?php include "search_product.php"; ?>        
        </div>

        <div>
        <button id="addProductButton">Click here to Add Product</button><div/>
        <div id="addProductContainer"></div>
        <!-- JavaScript for AJAX -->
<script>
    $(document).ready(function() {
        // Attach a click event handler to the button
        $('#addProductButton').click(function() {
            // Load the Addproduct.php content using AJAX
            $.ajax({
                url: 'Addproduct.php', 
                type: 'GET',
                success: function(response) {
                    // Replace the content of the container with the loaded content
                    $('#addProductContainer').html(response);
                }
            });
        });
    });
</script>

      
        <h2>Welcome to Homepage</h2>
        
        <?php
        foreach ($visibleProducts as $product) {
            echo '<div class="product-item">';
            echo '<h3><a href="show_product.php?id=' . $product['ID'] . '">' . $product['productName'] . '</a></h3>';
            echo '<p><strong>Selling Price:</strong> ' . $product['sellingPrice'] . '</p>';
            echo '<p><strong>Product Expire Date:</strong> ' . $product['productExpiredate'] . '</p>';
            echo '<div class="product-image"><img width="100%" src="uploads/' . $product['image'] . '" alt="' . $product['productName'] . '"></div>';
            echo '</div>';
        }
        ?>

        <!-- Pagination links -->
        <div class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++) {
                echo '<a href="?page=' . $i . '" class="' . ($i == $currentPage ? 'active' : '') . '">' . $i . '</a>';
            } ?>
        </div>
    </div>
      </div>
    
    <a href="HomePageLogOut.php">Logout</a> <!-- Logout link added here -->
</div>
    
</body>
</html>

