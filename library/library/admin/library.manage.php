<?php
	require_once('../connect.php');
	//$sql = "select * from article order by dateline desc";
	$sql = "select * from books where status='借出' order by time_borrow desc";
	$query  = mysqli_query($con,$sql);
	if($query&&mysqli_num_rows($query)){
		while($row =mysqli_fetch_assoc($query)){
			$data[] = $row;
		}
	}else{
		$data = array();
	}
	//print_r($data);
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
    <td height="89" colspan="2" bgcolor="#FFFF99"><h1 align="center"><strong>悠贝亲子图书管理系统</strong></h1></td>
  </tr>
  <tr>
    <td width="300" height="287" align="left" valign="top" bgcolor="#FFFF99">
	<p><a href="library.borrow.fill_user.php">借书</a></p>
	<p><a href="library.return.fill_book.php">还书</a></p>
	<p><a href="library.find_book.php">查找图书</a></p>
	<p><a href="library.find_user.php">查找读者</a></p>
	<p><a href="library.addfile.php">添加图书</a></p></td>
	
	
    <td width="1700" valign="top" bgcolor="#FFFFFF"><table width="1000" border="0" cellpadding="8" cellspacing="1" bgcolor="#000000">
      <tr>
        <td colspan="6" align="center" bgcolor="#FFFFFF">图书列表</td>
        </tr>
      <tr>
        <td width="170" bgcolor="#FFFFFF">图书编号</td>
        <td width="450" bgcolor="#FFFFFF">书名</td>
		<td width="50" bgcolor="#FFFFFF">状态</td>
		<td width="100" bgcolor="#FFFFFF">读者</td>
        <td width="50" bgcolor="#FFFFFF">操作</td>
		<td width="100" bgcolor="#FFFFFF">借出时间</td>
      </tr>
    <?php 
		if(!empty($data)){
			foreach($data as $value){
	?>
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;<?php echo $value['num_book']?></td>
        <td bgcolor="#FFFFFF">&nbsp;<?php echo $value['name']?></td>
		<td bgcolor="#FFFFFF">&nbsp;<?php echo $value['status'];?></td>
		<td bgcolor="#FFFFFF">&nbsp;<?php if($value['status']=='借出')echo $value['id_user'];?></td>
		<td bgcolor="#FFFFFF">
		<a href="library.return.handle.php?num_book=<?php echo $value['num_book']?>">还书</a></td>
		<td bgcolor="#FFFFFF">&nbsp;<?php if($value['status']=='借出')echo date("Y-m-d", $value['time_borrow']);else echo "";?></td>
      </tr>
        <?php
        		}
		}
        ?>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFF99"><strong>版权所有copyright@ding</strong></td>
  </tr>
</table>
</body>
</html>
