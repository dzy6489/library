<?php
	require_once('../connect.php');

	$num_book = $_POST['num_book'];
    $time = time();

	$datas = explode("chzy",$num_book);
	print_r($datas);
	echo "<br>";
	foreach($datas as $eachdata)
	{
		if($eachdata!="")
		{
			$newstr = substr($eachdata,0,-2); 
			$tempnum='chzy'.$newstr;
			echo $tempnum;
			$sel="select * from books where num_book='$tempnum'";
			
			$temp = mysqli_query($con,$sel);
			$result = mysqli_fetch_assoc($temp);
			echo $result['status'];
		
			if($result['status']=='在馆')
			{
				echo "<script>alert('在馆，不需要还书！');window.location.href='library.return.fill_book.php';</script>";
			}
			else
			{
				$returnsql = "update books set id_user='',status='在馆',time_return=$time where num_book='$tempnum'";
				if(!mysqli_query($con,$returnsql))
					echo "<script>alert('还书失败');window.location.href='library.return.fill_book.php';</script>";
			}
					
		}
		
	}
	echo "<script>alert('还书成功');window.location.href='library.return.fill_book.php';</script>";
	           
	
	
	
	
	
?>