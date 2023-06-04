<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 适配移动端 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bookStoreMS</title>
</head>
<body>

    <?php
        session_start();
		session_unset();
		if(isset($_COOKIE[session_name()])){
			setcookie(session_name(),session_id(),time()-10);
		}
		session_destroy();
        echo "<script>alert('成功退出！！！')</script>";
		header('Location: login.php');
        exit;
    ?>
    
</body>
</html>