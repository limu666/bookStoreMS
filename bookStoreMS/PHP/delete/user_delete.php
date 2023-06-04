<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>删除用户</title>
</head>
<body>
    <?php
        include("../mysql_connect.php");//1.连接数据库
        $uid = $_GET['uid'];
        $delete_sql="delete from tb_user where uid='{$uid}'";  
        if($uid == 1){
            echo "<script>alert('管理员账户无法删除！！！');location.href='../infos/user.php?bm1=1'</script>";
        }else if(mysqli_query($conn,$delete_sql)){ 
			//echo "ssss".$delete_sql;
            echo "<script>alert('删除成功!即将返回！！！');location.href='../infos/user.php?bm1=1'</script>";
        }else{
			echo "<script>alert('删除失败，可能存在外键约束！！！');location.href='../infos/user.php?bm1=1'</script>";
		}
    ?>

</body>
</html>