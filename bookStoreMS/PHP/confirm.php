<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录验证</title>
</head>
<body>
    
    <?php
        session_start();
        
        if($_SESSION['username'] == 'admin'){
            return true;
        }else{
            echo "<script>
                if (window != top) {
                    top.location.href = window.location.href;
                }
                alert('您还未登录，请登录');
                window.top.location.href = '/bookStoreMS/php/login.php';</script>";
        }
    ?>

</body>
</html>