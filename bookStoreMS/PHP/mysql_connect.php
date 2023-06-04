<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>数据库连接</title>
</head>
<body>
    <?php
        $conn = mysqli_connect("localhost", "root", "","bookstore") or die("连接服务器失败！程序中断执行");
        mysqli_set_charset($conn,"utf8");
    ?>
</body>
</html>