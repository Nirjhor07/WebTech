<?php 

require_once ('model/model.php');

function fetchAllproducts(){
	return showAllproducts();

}
function fetchproduct($id){
	return showProduct($id);

}

?>