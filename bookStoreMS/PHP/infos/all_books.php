<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>全部图书信息</title>
    <!-- /* Author：李牧 sno:224720054*/ -->
    <link rel="stylesheet" href="../../css/bd_public.css?v=1.2"/>
	<script src="../../js/delete.js"></script>
	<script src="../../js/jquery-1.12.4.js"></script>
</head>
<body>
    <!-- /* Author：李牧 */ -->
    <table>
        <!-- <h1>全部图书</h1>   -->
		<tr class="col_set">
			<td>查询</td>
			<td colspan="6">
				<form action="" method="post">
					<input type="text" name="bid" placeholder="图书编号">
					<input type="text" name="bname" placeholder="书名">
					<input type="text" name="author" placeholder="作者">
					<input type="text" name="cid" placeholder="类别ID">
					<button type="submit" name="sub">查询</button>
				</form>
			</td>
			<?php
				$num = 1;
				if(isset($_GET['bm1'])){
					if($num == $_GET['bm1']){
						echo "<td rowspan='2'>
							<a href='../insert/all_books_insert.php' 
							style='font-size: 30px;width:70px;' 
							>添加图书</a></td>";
					}
					
				}
			?>
			
		</tr>
        <tr class="static col_set">
            <td><p>图书编号</p></td>
            <td><p>书名</p></td>
            <td><p>价格</p></td>
            <td><p>作者</p></td>
            <td><p>图片</p></td>
            <td><p>类别</p></td>
            <td><p>图书数量</p></td>
		</tr>
    <!-- /* Author：李牧 sno:224720054*/ -->
    <?php
		include("../confirm.php");//确认是否登录
        include("../mysql_connect.php");//1.连接数据库
		// 检查是否是管理点击
		if(isset($_GET['bm1'])){
			$bk = $_GET['bm1'];
		}
		
		//分页的实现
		//2.查询数据总量
		$sql_c = "select count(*) as count from tb_book";
		
		$result_count = mysqli_query($conn, $sql_c);
		$row_count = mysqli_fetch_assoc($result_count);
		$total_count = $row_count['count'];
		
		//3.计算总页数和当前野马的数据起始位置
		$page_size = 2; // 每页显示的数据数量
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
		$sql ="select * from tb_book";
		
		//模糊查询
		if(isset($_POST['sub'])){
			$bid = $_POST['bid'];
			$bname = $_POST['bname'];
			$author = $_POST['author'];
			$cid = $_POST['cid'];	
			$sql = "select * from tb_book where bid like '%$bid%' and bname like '%$bname%'
					and author like '%$author%' and cid like '%$cid%'";
		}else{
			//4.查询当前页的数据
			$sql = "select * from tb_book limit $start,$page_size";
		}
		
		$result_data = mysqli_query($conn, $sql);
		//显示所有数据
		while($s = mysqli_fetch_array($result_data)){
			// <form action='../update/all_books_update.php' method='post'>
			echo "<tr class='col'>";
			echo "<td class='col_set_id'>$s[0]</td>";
			echo "<td>$s[1]</td>";
			echo "<td>$s[2]</td>";  
			echo "<td>$s[3]</td>";
			//Author：李牧 sno:224720054
			echo "<td>
					<image src='../../images/$s[4]'></image>   
				 </td>";
			echo "<td>$s[5]</td>";
			echo "<td>$s[6]</td>";
			if($bk == 0){
				echo "<td style='display:none;'>";
			}else{
				echo "<td class='col_set'>
						<div style='height:150px;'>
							<a href='../update/all_books_update.php?bid=$s[0]' style='font-size: 30px;width:70px;margin-top:10px' name='bid'>修改</a>
						</div>
						<div style='height:70px; '>
							<a href='../delete/all_books_delete.php?bid=$s[0]' onClick='return conf($s[0])' style='font-size: 30px;width:70px;'>删除</a>
						</div>
					  </td>";
			}
			
					
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
		echo "<td colspan='4' style='font-size: 1rem;'>
				<form method='get' action=''>
					<input type='text' name='nump' placeholder='请输入跳转页号'  />
					<input type='text' style='display:none' name='bm1' value='$bk' />
					<input type='text' style='display:none' name='page' value='$page' />
					<button type='submit' name = 'tz' >跳转</button>
				</form>
			</td>";
		echo "<td style='font-size: 1rem'>总页数：{$total_page}<br />总数量：{$total_count}</td>";
		echo "<td style='font-size: 1rem;' colspan='2'>";
		if ($page < $total_page) {
			echo "<a href='?bm1={$bk}&page=", $page + 1, "'>下一页</a>";
		}
		//Author：李牧 sno:224720054
		echo "</td>";
		echo "</tr>";	
    ?>
    <!-- /* */ -->
</table>
    <!-- /* Author：李牧 sno:224720054*/ -->
</body>
</html>