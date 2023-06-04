<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>实验二：数据的提交与采集</title>
</head>
<body>
    <form method="get" action="" name="put" enctype="multipart/form-data">
        <table>
            <tr>
                <td>用户名:</td>
                <td><input type="text" name="g_user"></td>
            </tr>
            <tr>
                <td>密码:</td>
                <td><input type="password" name="g_password"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">GET提交</button></td>
            </tr>
        </table>

    </form>

    <form method="post" action="" name="put" enctype="multipart/form-data">
        <table>
            <tr>
                <td>用户名:</td>
                <td><input type="text" name="p_user"></td>
            </tr>
            <tr>
                <td>密码:</td>
                <td><input type="password" name="p_password"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">POST提交</button></td>
            </tr>
        </table>

    </form>
    <?php
        if(!empty($_GET)){
            echo "GET获取数据：<br />";
            $g_user = $_GET['g_user'];+4
            $g_password = $_GET['g_password'];
            var_dump($_GET);
    
        }
        if(!empty($_POST)){
            echo "POST获取数据：<br />";
            $p_user = $_POST['p_user'];
            $p_password = $_POST['p_password'];
            var_dump($_POST);
        }

        if(!empty($_REQUEST)){
            echo "REQUEST获取数据：<br />";
            var_dump($_REQUEST);
        }

    ?>
</body>
</html>

