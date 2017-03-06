<?php
	require_once '../connect.php';
	$num_book = $_GET['num_book'];
	if(strlen($num_book)-4>0)
	{
		$time = time();
		
		
		$sel="select * from books where num_book='$num_book'";
			
		$temp = mysqli_query($con,$sel);
		$result = mysqli_fetch_assoc($temp);
		echo $result['status'];
		
		if($result['status']=='在馆')
		{
			echo "<script>alert('在馆，不需要还书！');window.location.href='library.return.fill_book.php';</script>";
		}
		else
		{
			$returnsql = "update books set id_user='',status='在馆',time_return=$time where num_book='$num_book' ";
		if(mysqli_query($con,$returnsql)){
			echo "<script>alert('还书成功');window.location.href='library.manage.php';</script>";
		}else{
			echo "<script>alert('还书失败');window.location.href='library.manage.php';</script>";

			 }
		}
	}
	else
	{
		echo "<script>alert('图书编号不能为空');window.location.href='library.manage.php';</script>";
	}
		
	
	
	