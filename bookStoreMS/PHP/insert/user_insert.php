<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加用户</title>
    <link rel="stylesheet" href="../../css/bd_public.css?v=1.2"/>
    <link rel="stylesheet" href="../../css/insert/insert.css?v=1.1"/>
    <script src="../../js/update.js?v=1.1"></script>
    <script src="../../js/jquery-1.12.4.js"></script>
</head>
<body>
    <h1>添加用户</h1>
    <form name="frm2" method="post" action="" style="height:450px" enctype="multipart/form-data">
        <table>
            <tr>
                <td><span>用户名：</span></td>
                <td><input name="username" type="text" placeholder="请输入用户名..."/></td>
            </tr>
            <tr>
                <td><span>密码：</span></td>
                <td><input name="password" type="text" placeholder="请输入密码..."/></td>
            </tr>
            <tr>
                <td><span>邮件：</span></td>
                <td><input name="email" type="text" placeholder="请输入邮件..."/></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input name="b" type="submit" class="ft" value="添加">&nbsp;
                </td>
            </tr>
        </table>
    </form>
    <?php

        include("../confirm.php");//确认是否登录
        include("../mysql_connect.php");//1.连接数据库
        if (!empty($_POST)) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            $insert_sql="insert into tb_user values(null,'$username','$password','$email')";    
            $sql="select count(uid) from tb_user";//查询有多少用户
            //select username from tb_user where username='xiaoli'
            $sqls = "select username from tb_user where username='$username'" ;
            $conf_user = mysqli_query($conn,$sqls);
            $row = mysqli_fetch_array($conf_user);
            //echo $row['username'];
            if(empty($row['username'])){
                $insert_result = mysqli_query($conn, $insert_sql);
            }else{
                echo "<script>alert('添加失败，用户名重复！！！');location.href='../insert/user_insert.php?bm1=1&page={$num_ret}'</script>";
            }
            $result = mysqli_query($conn,$sql);
            $result_data = mysqli_fetch_row($result);
            $num_ret = ceil($result_data[0]/2); 

            if($result){
                echo "<script>alert('添加成功!即将返回！！！');location.href='../infos/user.php?bm1=1'</script>";
            }else{
                echo "<script>alert('添加失败，用户名重复！！！');location.href='../insert/user_insert.php?bm1=1&page={$num_ret}'</script>";
            }

            //echo "<script>alert('添加成功!即将返回！！！');location.href='../infos/user.php?bm1=1&page={$num_ret}'</script>";
            //echo "<script>alert('添加失败！！！');location.href='../insert/user_insert.php?bm1=1&page={$num_ret}'</script>";

        }
    ?>
</body>
</html>