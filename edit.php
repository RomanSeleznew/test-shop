<?php  
/// обновление товаров
	$connect = mysqli_connect("localhost", "root", "", "shop");
	$id = $_POST["id"];  
	$text = $_POST["text"];  
	$column_name = $_POST["column_name"];  
	$sql = "UPDATE tbl_shop SET ".$column_name."='".$text."' WHERE id='".$id."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Товар обновлен';  
	}  
 ?>