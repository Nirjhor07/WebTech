<!DOCTYPE html>
<html>
<head>
	<title>Insert Product</title>
</head>
<body>
    <?php 
        include "nav.php";

     ?>
   

 <form action="controller/createProduct.php" method="POST" enctype="multipart/form-data">
 <div>
  <label for="productName">Product Name</label><br>
  <input type="text" id="productName" name="productName"><br>
  <div/>

  <div>
  <label for="buyingPrice">Buying Price</label><br>
  <input type="text" id="buyingPrice" name="buyingPrice"><br>
   <div/>

   <div>
  <label for="sellingPrice">Selling Price</label><br>
  <input type="text" id="sellingPrice" name="sellingPrice"><br>
  <div/>

  <div>
   <label for="productExpiredate">Expirity Date</label><br>
  <input type="date" id="productExpiredate" name="productExpiredate"><br>
  <div/>

  <div>
  <input type="file" name="image"><br><br>
  <div/>

  <div>
  <input type="submit" name = "addProduct" value="addProduct">
  <input type="reset"> 
  <label for="display" >Display </label>
  <input type="checkbox"  value=Display >
  
  <div/>

</form> 

</body>
</html>

