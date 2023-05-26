<?php  
 $connect = mysqli_connect("localhost", "root", "", "shop");  
 $output = '';  
 $sql = "SELECT * FROM tbl_shop ORDER BY id DESC";  
 $result = mysqli_query($connect, $sql);  
/// получаем таблицу
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered table-hover"> 
               <thead class="thead-dark"> 
                <tr>  
                     <th width="5%" style="text-align: center;">ID</th>  
                     <th width="60%" style="text-align: center;">Наименование</th>  
                     <th width="20%" style="text-align: center;">Цена</th>  
                     <th width="15%" style="text-align: center;">Удалить/Создать</th>  
                </tr>
               </thead>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
	  if($rows > 10)
	  {
		  $delete_records = $rows - 10;
		  $delete_sql = "DELETE FROM tbl_shop LIMIT $delete_records";
		  mysqli_query($connect, $delete_sql);
	  }
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td style="text-align: center; vertical-align: middle;">'.$row["id"].'</td>  
                     <td style="vertical-align: middle;" class="title" data-id1="'.$row["id"].'" contenteditable>'.$row["title"].'</td>  
                     <td style="vertical-align: middle;" class="price" data-id2="'.$row["id"].'" contenteditable>'.$row["price"].'</td>  
                     <td style="text-align: center;"><button type="button" name="delete_btn" data-id3="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">Удалить</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="title" contenteditable></td>  
                <td id="price" contenteditable></td>  
                <td style="text-align: center;"><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Создать</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '
				<tr>  
					<td></td>  
					<td id="title" contenteditable></td>  
					<td id="price" contenteditable></td>  
					<td style="text-align: center;"><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Создать</button></td>  
			   </tr>';  
 }  
 $output .= '</table>  
      </div>';  

/// выводим таблицу во фронтенд
 echo $output;

?>


 