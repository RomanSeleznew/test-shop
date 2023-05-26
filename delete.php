<?php  
/// удаление товаров
	$connect = mysqli_connect("localhost", "root", "", "shop");
	$sql = "DELETE FROM tbl_shop WHERE id = '".$_POST["id"]."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Товар удален';  
	}  
 ?>