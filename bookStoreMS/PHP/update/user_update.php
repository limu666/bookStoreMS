<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用户修改</title>
	<link rel="stylesheet" href="../../css/bd_public.css?v=1.2"/>
	<link rel="stylesheet" href="../../css/insert/insert.css?v=1.1"/>
    <script src="../../js/update.js?v=1.1"></script>
    <script src="../../js/jquery-1.12.4.js"></script>
</head>
<body>
    <?php
        $coon = include("../mysql_connect.php");//1.连接数据库
        //session_start();
        if(isset($_GET['uid'])){
            $uid = $_GET['uid'];
            //$_SESSION['number'] = $number;
            $sql = "select * from tb_user where uid = '$uid'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
        }else{
            echo "<script>alert('失败！！！');location.href='../infos/user.php?bm1=1'</script>";
        }
        
    ?>
    <form name="frm2" method="post" action="" style="height:450px" enctype="multipart/form-data">
        <table border="1" align="center">
            <tr>
                <td><span>用户ID：</span></td>
                <td>
                    <input type="text" disabled value="<?php echo $row['uid']; ?>">
                    <input name="uid" type="text" style="display: none;" value="<?php echo $row['uid']; ?>">
                </td>
            </tr>
            <tr>
                <td><span>用户名：</span></td>
                <td>
                    <input name="username" type="text" value="<?php echo $row['username']; ?>"/>
                    <input name="uname" type="text" style="display: none;" value="<?php echo $row['username']; ?>"/>
                </td>
            </tr>
            <tr>
                <td><span>密码：</span></td>
                <td><input name="password" type="text" value="<?php echo $row['password']; ?>"/></td>
            </tr>
            <tr>
                <td><span>邮件：</span></td>
                <td><input name="email" type="text" value="<?php echo $row['email']; ?>"/></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input name="b" type="submit" class="ft" value="修改">&nbsp;
                </td>
            </tr>
        </table>
    </form>
    <?php
        if (!empty($_POST)) {
            $uid = $_POST['uid'];
            $uname = $_POST['uname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            $update_sql = "update tb_user set username='$username', password='$password',
                            email='$email' where uid='$uid'";
            $sqls = "select username from tb_user where username='$username'" ;
            
            if($uname != $username){
                $conf_user = mysqli_query($conn,$sqls);
                $row = mysqli_fetch_array($conf_user);
                if(empty($row['username'])){
                    $update_result = mysqli_query($conn,$update_sql);
                }else{
                    echo "<script>alert('修改失败,用户名重复！！！');location.href='../update/user_update.php?uid={$uid}'</script>";
                }
            }else{
                $update_result = mysqli_query($conn,$update_sql);
            }

            if($update_result){
                echo "<script>alert('修改成功!即将返回！！！');location.href='../infos/user.php?bm1=1'</script>";
            }else{
                //echo $update_sql;
                echo "<script>alert('修改失败，用户名重复！！！');location.href='../infos/user.php?uid={$uid}'</script>";
            }
        }                
    ?>
</body>
</html>