<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>订单列表</title>
    <!-- /* Author：李牧 sno:224720054*/ -->
    <link rel="stylesheet" href="../../css/bd_public.css"/>
</head>
<body>

    <table>
        <!-- <h1>订单列表</h1>   -->
        <tr class="static col_set">
            <td><p>订单列表ID</p></td>
            <td><p>数量</p></td>
            <td><p>总价格</p></td>
            <td><p>订单ID</p></td>
            <td><p>图书ID</p></td>
        <tr>
    <!-- /* Author：李牧 sno:224720054*/ -->
    <?php
		include("../confirm.php");//确认是否登录
        include("../mysql_connect.php");//连接数据库
        if(isset($_GET['bm1'])){
			$bk = $_GET['bm1'];
		}
		
		//分页的实现
		//2.查询数据总量
		$sql_c = "select count(*) as count from tb_orderitem";
		
		$result_count = mysqli_query($conn, $sql_c);
		$row_count = mysqli_fetch_assoc($result_count);
		$total_count = $row_count['count'];
		
		//3.计算总页数和当前野马的数据起始位置
		$page_size = 5; // 每页显示的数据数量
		$total_page = ceil($total_count / $page_size); // 计算总页数
		$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // 获取当前页码，默认为第一页
		//获取输入值进行页面跳转
		if(isset($_GET['tz'])){
			$num = $_GET['nump'];
			if($num > $total_page or  $num < 1){
				echo "<script>alert('输入页码不存在,请规范输入！！！');</script>";
				$page = $_GET['page'];
			}
			else{
				$page = $num;
			}
		}
		$start = ($page - 1) * $page_size; // 计算当前页的数据起始位置
		$sql = null;
		$sql ="select * from tb_orderitem limit $start,$page_size";
		
        //$result= mysqli_query($conn, $sql);
        

        $result_data = mysqli_query($conn, $sql);
        while($s = mysqli_fetch_array($result_data)){
            echo "<tr class='col'>";
            echo "<td class='col_set_id'>$s[0]</td>";
            echo "<td>$s[1]</td>";
            echo "<td>$s[2]¥</td>";
            echo "<td>$s[3]</td>";
            //李牧  sno:224720054
            echo "<td>$s[4]</td>";
            echo "</tr>";
        }
                 //显示分页链接
		echo "<tr class='col_set'>";
		echo "<td style='font-size: 1rem;'>";
		if($page > 1){
			echo "<a href='?bm1={$bk}&page=", $page - 1, "'>上一页</a>";
		}
		//Author：李牧 sno:224720054
		echo "</td>";
		echo "<td style='font-size: 1rem;' colspan='2'>
				<div style=''><form method='get' action=''>
					<input type='text' name='nump' placeholder='请输入跳转页号'  />
					<input type='text' style='display:none' name='bm1' value='$bk' />
					<input type='text' style='display:none' name='page' value='$page' />
					<button type='submit' name = 'tz' >跳转</button>
				</form></div>
			</td>";
		echo "<td><div>总页数：{$total_page};总数量：{$total_count}</div></td>";
		
        echo "<td style='font-size: 1rem;' colspan='2'>";
		if ($page < $total_page) {
			echo "<a href='?bm1={$bk}&page=", $page + 1, "'>下一页</a>";
		}
		//Author：李牧 sno:224720054
		echo "</td>";
		echo "</tr>";
    ?>
    <!-- /* Author：李牧 sno:224720054*/ -->
</table>
    <!-- /* Author：李牧 sno:224720054*/ -->
</body>
</html>