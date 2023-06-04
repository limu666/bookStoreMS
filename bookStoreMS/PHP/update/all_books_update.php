<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改图书信息</title>
	<link rel="stylesheet" href="../../css/bd_public.css?v=1.2"/>
	<link rel="stylesheet" href="../../css/insert/insert.css?v=1.1"/>
    <script src="../../js/update.js?v=1.1"></script>
    <script src="../../js/jquery-1.12.4.js"></script>
</head>
<body>

    <?php
        include("../mysql_connect.php");//1.连接数据库
        //session_start();
        if(isset($_GET['bid'])){
            $number = $_GET['bid'];
        }
        //$_SESSION['number'] = $number;
        $sql = "select * from tb_book where bid='$number'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
    ?>

    <form name="frm2" method="post" action="" style="height:450px" enctype="multipart/form-data">
        <table border="1" align="center">
            <tr>
                <td><span>图书编号：</span></td>
                <td>
                    <input type="text" disabled value="<?php echo $row['bid']; ?>">
                    <input name="bid" type="text" style="display: none;" value="<?php echo $row['bid']; ?>">
                </td>
            </tr>
            <tr>
                <td><span>书名：</span></td>
                <td><input name="bname" type="text" value="<?php echo $row['bname']; ?>"></td>
            </tr>
            <tr>
                <td><span>价格：</span></td>
                <td><input name="price" type="text" value="<?php echo $row['price']; ?>"></td>
            </tr>
            <tr>
                <td><span>作者：</span></td>
                <td><input name="author" type="text" value="<?php echo $row['author']; ?>"></td>
            </tr>
            <tr>
                <td><span>图片：</span></td>
                <td>
                    <img width="130px" height="197px" src="../../images/<?php echo $row['image']; ?>" alt="无图片信息" id="show_img">
                    <input type="text" name="image" style="display: none;" value="<?php echo $row['image']; ?>" />
                    <input type="file" name="img" id="pic_selector"/>
                </td>
            </tr>
            <tr>
                <td><span>类别：</span></td>
                <td><input name="cid" type="text" disabled value="<?php echo $row['cid']; ?>"></td>
            </tr>
            <tr>
                <td><span>图书数量：</span></td>
                <td><input name="count" type="text" value="<?php echo $row['count']; ?>"></td>
            </tr>
                <td align="center" colspan="2">
                    <input name="b" type="submit" value="修改">&nbsp;
                </td>
            </tr>
        </table>
    </form>
    <?php
        
        
        if (!empty($_POST)) 
        {
            $bid = $_POST['bid'];
            $bname = $_POST['bname'];
            $myImgName = null;
			$num = 1;
			
            //图片的上传与下载
            if(isset($_FILES['img'])){
                $img = $_FILES['img'];
                $error = $img['error'];
                $myImgName = $img['name'];
                switch($error){
                    case 0:
                        $myImgTemp = $img['tmp_name'];
                        $dst = $_SERVER['DOCUMENT_ROOT'].'/bookStoreMS/images/book_img/'.$myImgName;
                        move_uploaded_file($myImgTemp, $dst);
						$num++;
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
            }else if(isset($_POST['image'])){
                $image = $_POST['image'];
                if($image == 'book_img/'){
                    $image = "book_img/test.png";
                }
            }
            $count = $_POST['count'];
            $update_sql="update tb_book set bname='$bname',price='$price',author='$author',image='$image',count ='$count' where bid='$bid'";    
            $update_result=  mysqli_query($conn,$update_sql);
            if (mysqli_affected_rows($conn) != 0){
                    echo "<script>alert('修改成功!即将返回！！！');location.href='../infos/all_books.php?bm1=1'</script>";
                }  else {
                    echo "<script>alert('修改!即将返回！！！');location.href='../infos/all_books.php?bm1=1'</script>";
                }
        }
    ?>


</body>
</html>