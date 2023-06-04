<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 适配移动端 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bookStoreMS</title>
    <!-- 网页图标 -->
    <link rel="icon" href="../images/favicon.ico">
    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="../bootstrap-3.4.1-dist/css/bootstrap-theme.min.css" 
			integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->
    <!-- 公共样式 -->
    <link rel="stylesheet" href="../css/public.css" />
    <!-- mobile样式 --> 
    <link rel="stylesheet" href="../css/mobile.css?v=1.0" media="screen and (max-width:768px)" />
    <!-- ipad样式 -->
    <link rel="stylesheet" href="../css/ipad.css?v=1.0"  media="screen and (max-width:992px) and (min-width:768px)"/>
    <!-- pc样式 --> 
    <link rel="stylesheet" href="../css/pc.css?v=1.0"  media="screen and (min-width:992px)"/>
</head>
<body>
    <!-- top顶部 -->
    <div id="top">Author：李牧&nbsp;&nbsp;|&nbsp;&nbsp;sno:224720054</div>
    <!-- logo -->
    <div id="logo">
        <div class="logo_img"></div>
        <div class="logo_txt">bookStoreMS</div>
    </div>
    <div id="login">
        <form method="post" action="">
            <table>
                <tr>
                    <th class="t_head">Login</th>
                </tr>
                <tr>
                    <td><input type="text" name="username" placeholder="User"></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" placeholder="Password"></td>
                </tr>
                <tr>
                    <td><input type="submit" class="t_bt" name="t_bt" value="提交"></td>
                </tr>
                <!-- <tr>
                    <td>
                        <span>记住密码</span>
                        <span>忘记密码</span>
                    </td>
                </tr> -->
            </table>
        </form>
    </div>
    <div id="foot">Author：李牧&nbsp;&nbsp;|&nbsp;&nbsp;sno:224720054</div>

    <?php
        session_start();
		//include("mysql_connect.php");//1.连接数据库
		
        if(!empty($_POST['t_bt'])) {
            // 进行登录验证
            $username = $_POST['username'];
            $password = $_POST['password'];
            
			//$sql = "select * from tb_user where username='{$username}'";
			//$result_data = mysqli_query($conn, $sql);

			//while($s = mysqli_fetch_array($result_data)){
				if($username == 'admin' && $password == 'admin'){
					$_SESSION['username']=$username;
					header('Location: /bookStoreMS');
				}else{
                    echo "<script>alert('用户名或密码错误！！！')</script>";
                }	
			//}
			
			
            // if($username == 'admin' && $password == 'admin') {
            //     // 登录成功，保存会话状态
            //     $_SESSION['login'] = true;
            //     header('Location: /bookStoreMS');
            //     exit;
            // } else {
            //     // 登录失败，显示错误提示信息
            //     $error = '用户名或密码错误';
            //     echo "<script>alert('用户名或密码错误！！！')</script>";
            // }
        }
        
?>
    
</body>
</html>