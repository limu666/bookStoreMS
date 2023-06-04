<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加图书</title>
    <!-- /* Author：李牧 sno:224720054*/ -->
    <link rel="stylesheet" href="../../css/bd_public.css?v=1.2"/>
    <link rel="stylesheet" href="../../css/insert/insert.css?v=1.1"/>
    <script src="../../js/update.js?v=1.1"></script>
    <script src="../../js/jquery-1.12.4.js"></script>
</head>
<body>

    <h1>添加图书</h1>
    <form name="frm2" method="post" action="" style="height:450px" enctype="multipart/form-data">
        <table>
            <tr>
                <td><span>书名：</span></td>
                <td><input name="bname" type="text" placeholder="请输入书名..."/></td>
            </tr>
            <tr>
                <td><span>价格：</span></td>
                <td><input name="price" type="text" placeholder="请输入价格..."/></td>
            </tr>
            <tr>
                <td><span>作者：</span></td>
                <td><input name="author" type="text" placeholder="请输入作者姓名..."/></td>
            </tr>
            <tr>
                <td><span>图片：</span></td>
                <td>
                    <input type="file" name="img" id="pic_selector"/>
                </td>
            </tr>
            <tr>
                <td><span>图书类别：</span></td>
                
                <td>
                    <select name="slet">
                        <?php
                        include("../mysql_connect.php");//1.连接数据库
                        $select_sql="select * from tb_category";    
                        $result=  mysqli_query($conn,$select_sql);
                        while($s = mysqli_fetch_array($result)){
                            echo "<option value='$s[0]'>$s[0]:$s[1]</option>";
                        }
                        ?>
                        
                    </select>   
                </td>
            </tr>
            <tr>
                <td><span>图书数量：</span></td>
                <td><input name="count" type="text" placeholder="请输入图书数量..."/></td>
            </tr>
                <td colspan="2">
                    <input name="b" type="submit" class="ft" value="添加">&nbsp;
                </td>
            </tr>
        </table>
    </form>
    <?php

        include("../confirm.php");//确认是否登录

	    if (!empty($_POST))
			{
			    $bname = $_POST['bname'];
			    $myImgName = null;
			    $error = null;
			    //图片的上传与下载
			    if(isset($_FILES['img'])){
			        $img = $_FILES['img'];
			        $error = $img['error'];
			        $myImgName = $img['name'];
			        switch($error){
			            case 0:
			                $myImgTemp = $img['tmp_name'];
			                //$dst = "D:/Download/Wampserver_2.4/wamp/www/stuMS/images/book_img/".$myImgName;
			                $dst = $_SERVER['DOCUMENT_ROOT'].'/bookStoreMS/images/book_img/'.$myImgName;
							move_uploaded_file($myImgTemp, $dst);
			                break;
			            case 1:
			                echo "<script>alert('上传文件超过了php.ini中选项限制的值')</script>";
			                break;
			            case 2:
			                echo "<script>alert('上传文件大小超过了form表单最大值')</script>";
			                break;
			            case 3:
			                echo "<script>alert('文件未上传成功')</script>";
			                break;
			        }                
			    }
			    
			    $price=$_POST['price'];
			    $author = $_POST['author'];
			    if(!empty($myImgName)){
			        $image = "book_img/".$myImgName;
			    }else $image = "book_img/test.png";
			
			    $cid = $_POST['slet'];
			    $count = $_POST['count'];
			
			    
			    if (mysqli_affected_rows($conn) != 0 && $error == 0){
			            $insert_sql="insert into tb_book values(null,'$bname','$price','$author','$image','$cid','$count')";    
			            $sql="select count(bid) from tb_book";
			            $insert_result = mysqli_query($conn,$insert_sql);
			            $result = mysqli_query($conn,$sql);
			            $result_data = mysqli_fetch_row($result);
			            $num_ret = ceil($result_data[0]/2); 
			            echo "<script>alert('添加成功!即将返回！！！');location.href='../infos/all_books.php?bm1=1'</script>";
			        }  else {
			            echo "<script>alert('添加失败！！！');location.href='../insert/all_books_insert.php?bm1=1&page={$num_ret}'</script>";
			        }
			 }	
 
    ?>

</body>
</html>

