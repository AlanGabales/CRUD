<?php
session_start();
require 'dbcon.php';

//delete section start
if(isset($_POST['delete_student']))
{
	$student_id = mysqli_real_escape_string($con, $_POST['delete_student']);
	$query = "DELETE FROM students WHERE id='$student_id' ";
	$query_run = mysqli_query($con, $query);
	if($query_run)
	{
		$_SESSION['message'] ="Student deleted Successfully";
 		header("Location: index.php");
		exit(0);
	}else{
		$_SESSION['message'] ="Student not deleted";
 		header("Location: index.php");
		exit(0);
	}
}
//delete section end
//update section start
if(isset($_POST['update_student']))
{
	$student_id = mysqli_real_escape_string($con, $_POST['student_id']);
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$phone = mysqli_real_escape_string($con, $_POST['phone']);
	$course = mysqli_real_escape_string($con, $_POST['course']);
	$query = "UPDATE students SET   name='$name', email='$email', phone='$phone', course='$course' WHERE id='$student_id' ";
	$query_run = mysqli_query($con, $query);

	if($query_run)
	{
		$_SESSION['message'] ="Student update Successfully";
 		header("Location: index.php");
		exit(0);
	}else{
		$_SESSION['message'] ="Student not updated";
 		header("Location: index.php");
		exit(0);
	
	}


}
//update section end

if(isset($_POST['save_student']))
{
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$phone = mysqli_real_escape_string($con, $_POST['phone']);
	$course = mysqli_real_escape_string($con, $_POST['course']);

	$query = "INSERT INTO students (name,email,phone,course) VALUES ('$name','$email','$phone','$course')" ;

	$query_run = mysqli_query($con, $query);
	if($query_run)
	{
		$_SESSION['message'] ="Student created Successfully";
 		header("Location: create-student.php");
		exit(0);
	}else{
		$_SESSION['message'] ="Student not created";
 		header("Location: create-student.php");
		exit(0);
	
	}
}
?>