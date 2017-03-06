<?php
	require_once('../connect.php');
	//把传递过来的信息入库,在入库之前对所有的信息进行校验。
	$id_user = $_POST['id_user'];
	$sql = "select * from books where id_user=$id_user";
	$query  = mysqli_query($con,$sql);
	if($query&&mysqli_num_rows($query)){
		while($row =mysqli_fetch_assoc($query) ){
			//if($row['id_user']!=0)
				$data[] = $row;
		}
	}else{
		$data = array();
		echo "<script>alert('读者不存在');window.location.href='article.find_user.php';</script>";
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>悠贝亲子图书管理系统</title>
<style type="text/css">

</style>
</head>

<body>
<table width="100%" height="520" border="0" cellpadding="8" cellspacing="1" bgcolor="#000000">
  <tr>
    <td height="89" colspan="2" bgcolor="#FFFF99"><strong>悠贝亲子图书管理系统</strong></td>
  </tr>
  <tr>
    <td width="156" height="287" align="left" valign="top" bgcolor="#FFFF99">
	<p><a href="library.manage.php">返回</a></p>
	
    <td width="1200" valign="top" bgcolor="#FFFFFF"><table width="743" border="0" cellpadding="8" cellspacing="1" bgcolor="#000000">
      <tr>
        <td colspan="4" align="center" bgcolor="#FFFFFF">查找结果</td>
        </tr>
      <tr>
        <td width="200" bgcolor="#FFFFFF">图书编号</td>
        <td width="572" bgcolor="#FFFFFF">书名</td>
		<td width="200" bgcolor="#FFFFFF">读者</td>
        <td width="160" bgcolor="#FFFFFF">操作</td>
      </tr>
    <?php 
		if(!empty($data)){
			foreach($data as $value){
	?>
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;<?php echo $value['num_book']?></td>
        <td bgcolor="#FFFFFF">&nbsp;<?php echo $value['name']?></td>
		<td bgcolor="#FFFFFF">&nbsp;<?php echo $value['id_user']?></td>
        <td bgcolor="#FFFFFF"><a href="library.return.handle.php?num_book=<?php echo $value['num_book']?>">还书</a> 
      </tr>
        <?php
        		}
		}
        ?>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFF99"><strong>版权所有</strong></td>
  </tr>
</table>
</body>
</html>
