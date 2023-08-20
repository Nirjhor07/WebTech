<?php 
require_once 'controller/product_info.php';

$product = fetchProduct($_GET['id']);

include "nav.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Product</title>
</head>
<body>
	<form action="controller/updateProduct.php" method="POST" enctype="multipart/form-data">
	  <label for="productName">Product Name:</label><br>
	  <input value="<?php echo $product['productName'] ?>" type="text" id="productName" name="productName"><br>
	  <label for="buyingPrice">Buying Price:</label><br>
	  <input value="<?php echo $product['buyingPrice'] ?>" type="text" id="buyingPrice" name="buyingPrice"><br>
	  <label for="sellingPrice">Selling Price:</label><br>
	  <input value="<?php echo $product['sellingPrice'] ?>" type="text" id="sellingPrice" name="sellingPrice"><br>
	  <label for="productExpiredate">Product Expire Date:</label><br>
	  <input value="<?php echo $product['productExpiredate'] ?>" type="date" id="productExpiredate" name="productExpiredate"><br>
	  <label for="image">Image:</label><br>
	  <input type="file" name="image"><br><br>
	  <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
	  <input type="submit" name="updateProduct" value="Update">
	  <input type="reset"> 
	</form> 
</body>
</html>
