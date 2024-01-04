<?php
include "db.php";

if(isset($_POST['student_btn_set']))
	{
		$del_id = $_POST['student_id'];
    	echo $del_id;
		$sql= "UPDATE users SET role = 'student' WHERE id=$del_id ";
		$result=mysqli_query($con,$sql);
	}

if(isset($_POST['teacher_btn_set']))
	{
		$del_id = $_POST['teacher_id'];
		echo $del_id;
		$sql= "UPDATE users SET role = 'teacher' WHERE id=$del_id ";
		$result=mysqli_query($con,$sql);
	}

if(isset($_POST['admission_btn_set']))
	{
		$del_id = $_POST['admission_id'];
		echo $del_id;
		$sql= "UPDATE users SET role = 'admission' WHERE id=$del_id ";
		$result=mysqli_query($con,$sql);
	}
?>
