<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>删除指定图书信息</title>
</head>
<body>
    
    <?php
        include("../mysql_connect.php");//1.连接数据库
        $bid = $_GET['bid'];
        $delete_sql="delete from tb_book where bid = '{$bid}'";  
        
        if(mysqli_query($conn,$delete_sql)){ 
            echo "<script>alert('删除成功!即将返回！！！');location.href='../infos/all_books.php?bm1=1'</script>";
        }else{echo "<script>alert('删除成功!即将返回！！！')</script>";}
    ?>


</body>
</html>