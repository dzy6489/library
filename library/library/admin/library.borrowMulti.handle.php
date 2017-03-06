<?php
	require_once('../connect.php');
	//把传递过来的信息入库,在入库之前对所有的信息进行校验。
	if(!(isset($_POST['num_book'])&&(!empty($_POST['num_book'])))){
		echo "<script>alert('标题不能为空');window.location.href='article.add.php';</script>";
	}
	$id_user = $_POST['id_user'];
	$num_book = $_POST['num_book'];
    $time = time();
	
	$sel="select * from books where num_book='$num_book'";
	$temp = mysqli_query($con,$sel);
	$result = mysqli_fetch_assoc($temp);
	echo $result['status'];
	if($result['status']=='借出')
	{
		echo "<script>alert('该书已经借出');window.location.href='library.borrow.fill_user.php';</script>";
	}
	else
	{
		$datas = explode("chzy",$num_book);
	print_r($datas);
	echo "<br>";
	foreach($datas as $eachdata)
	{
		if($eachdata!="")
		{
			$newstr = substr($eachdata,0,-2); 
			$temp='chzy'.$newstr;
			$update = "update books set id_user=$id_user,time_borrow=$time,status='借出' where num_book='$temp'";
			if(!mysqli_query($con,$update))
				echo "<script>alert('借书失败');window.location.href='library.borrow.fill_user.php';</script>";	
		}
		
	}
	           echo "<script>alert('借书成功');window.location.href='library.borrow.fill_user.php';</script>";
	}
	
	
	
	
?>