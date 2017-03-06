<?php
require "../connect.php";

$sel = "select * from books1";
$temp=mysqli_query($con,$sel);
while($row=mysqli_fetch_assoc($temp))
{	
	$data[]=$row;
}	
foreach($data as $eachValue)
{
	
	$num_book=$eachValue['num_book'];
	$ISBN=$eachValue['ISBN'];
	$name=$eachValue['name'];
	$status=$eachValue['status'];
	$id_user=$eachValue['id_user'];
	$time_borrow=$eachValue['time_borrow'];
	$time_return=$eachValue['time_return'];
	mysqli_query($con,"insert into books(num_book,ISBN,name,status,id_user,time_borrow,time_return) values('$num_book','$ISBN','$name','$status','$id_user',$time_borrow,$time_return)");
	}

?>