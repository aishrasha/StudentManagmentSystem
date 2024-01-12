<?php
include "db.php";

if(isset($_POST['delete_btn_set']))
	{
		$del_id = $_POST['delete_id'];
    	echo $del_id;
		$sql= "DELETE FROM users WHERE id=$del_id ";
		$result=mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result);
		$name = $row['name'];
		$role = $row['role'];
		$sql1 = "DELETE FROM student_marks WHERE name='$name' && role='$role'";
		$res = mysqli_query($con,$sql1);
	}

?>
