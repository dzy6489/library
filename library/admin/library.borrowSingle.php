<?php
	$num_book=$_GET['num_book'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
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

	<a href="article.add.php"></a></td>
    <td width="837" valign="top" bgcolor="#FFFFFF">
    <form id="form1" name="form1" method="post" action="library.borrowSingle.handle.php">
      <table width="779" border="0" cellpadding="8" cellspacing="1">
        <tr>
          <td colspan="2" align="center">添加信息</td>
          </tr>
		  <tr>
          <td width="119">读者编号</td>
          <td width="625"><label for="id_user"></label>
            <input type="text" name="id_user" /></td>
        </tr>
		<tr>
          <td width="119">图书编号</td>
          <td width="625"><label for="num_book"></label>
            <input type="text" name="num_book" value="<?php echo $num_book?>" /></td>
        </tr>
        <tr>
          <td colspan="2" align="right"><input type="submit" name="button" id="button" value="提交" /></td>
          </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFF99"><strong>版权所有</strong></td>
  </tr>
</table>
</body>
</html>
