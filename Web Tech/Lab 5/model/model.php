<?php 

require_once 'db_connect.php';


function showAllproducts(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `product_info` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showProduct($id){
	$conn = db_conn();
	//$selectQuery = "SELECT * FROM `product_info` where ID = ?";
    $selectQuery = "SELECT * FROM `product_info` WHERE ID = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function searchProduct($product_name){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `product_info` WHERE productName LIKE '%$product_name%'";

    try{
        $stmt = $conn->query($selectQuery);
    } catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function addProduct($data){
	$conn = db_conn();
    //here i need to fix the query query fixed 27 july 2023 
    $selectQuery = "INSERT into `product_info` (productName, buyingPrice, sellingPrice, productExpiredate, image)
VALUES (:productName, :buyingPrice, :sellingPrice, :productExpiredate, :image)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            //':ID' => $data['ID'],
        	':productName' => $data['productName'],
        	':buyingPrice' => $data['buyingPrice'],
        	':sellingPrice' => $data['sellingPrice'],
        	':productExpiredate' => $data['productExpiredate'],
        	':image' => $data['image'],

        	//':password' => $data['password'],
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}



function updateProduct($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE product_info SET productName = ?, buyingPrice = ?, sellingPrice = ?, productExpiredate = ?, image = ? WHERE ID = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['productName'],
            $data['buyingPrice'],
            $data['sellingPrice'],
            $data['productExpiredate'],
            $data['image'],
            $id
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function deleteproduct($id){
	$conn = db_conn();
    $selectQuery = "DELETE FROM `product_info` WHERE `ID` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}