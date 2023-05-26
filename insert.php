<?php  
/// Создаем товар
    $connect = mysqli_connect("localhost", "root", "", "shop");
    $sql = "INSERT INTO tbl_shop(title, price) VALUES('".$_POST["title"]."', '".$_POST["price"]."')";  
    if(mysqli_query($connect, $sql))  
    {  
        echo 'Товар создан';  
    }  
 ?>