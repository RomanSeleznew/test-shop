<html>  
    <head>  
        <title>Продажа выпечки</title>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/templete.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    </head>  
    <body>  
        <div class="container">  
			<div class="table-responsive">  
                <header>
                    <div class="container-discription">
                        <h3 text-align="center">Панель администратора</h3>
                        <p>Представление товаров интернет магазина по продаже чебуреков</p>
                    </div>
                    <div class="container-logo">
                        <img src="images/logo.png" alt="Продажа чебуреков">
                    </div>
                </header>
				<span id="result"></span>
				<div id="Shop_price"></div>                 
			</div>  
		</div>
    </body>  
</html>  
<script>  
$(document).ready(function(){  
    function fetch_data()  
    {  
        $.ajax({  
            url:"select.php",  
            method:"POST",  
            success:function(data){  
				$('#Shop_price').html(data);  
            }  
        });  
    }  
    fetch_data();  
    $(document).on('click', '#btn_add', function(){  
        var title = $('#title').text();  
        var price = $('#price').text();  
        if(title == '')  
        {  
            alert("Введите наименование товара");  
            return false;  
        }  
        if(price == '')  
        {  
            alert("Введите цену на товар");  
            return false;  
        }  
        $.ajax({  
            url:"insert.php",  
            method:"POST",  
            data:{title:title, price:price},  
            dataType:"text",  
            success:function(data)  
            {  
                alert(data);  
                fetch_data();  
            }  
        })  
    });  
    
	function edit_data(id, text, column_name)  
    {  
        $.ajax({  
            url:"edit.php",  
            method:"POST",  
            data:{id:id, text:text, column_name:column_name},  
            dataType:"text",  
            success:function(data){  
				$('#result').html("<div class='alert alert-success'>"+data+"</div>");
            }  
        });  
    }  
    $(document).on('blur', '.title', function(){  
        var id = $(this).data("id1");  
        var title = $(this).text();  
        edit_data(id, title, "title");  
    });  
    $(document).on('blur', '.price', function(){  
        var id = $(this).data("id2");  
        var price = $(this).text();  
        edit_data(id,price, "price");  
    });  
    $(document).on('click', '.btn_delete', function(){  
        var id=$(this).data("id3");  
        if(confirm("Вы действительно хотите удалить товар?"))  
        {  
            $.ajax({  
                url:"delete.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    fetch_data();  
                }  
            });  
        }  
    });  
});  
</script>