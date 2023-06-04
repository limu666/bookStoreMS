<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>练习register</title>
</head>
<body>
    <form action="#" method="post" enctype="multipart/form-data">
        用户名：<input type="text" name="userName" size="20" maxlength="15" value="必须填写用户名">
        @
        <select name="domain">
            <option value="@163.com">163.com</option>
            <option value="@126.com">126.com</option>
        </select><br>
        登录密码：<input type="password" name="password" size="20" maxlength="15">
        <br>
        确认密码：<input type="password" name="confirmPassword" size="20" maxlength="15"><br>
        选择性别：<input name="sex" type="radio" value="male" checked>男
                 <input name="sex" type="radio" value="female" >女 <br>
            

    </form>
</body>
</html>