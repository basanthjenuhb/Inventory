<?php
	include 'session.inc.php';
	include 'connect.inc.php';
	$username = sha1(mysqli_real_escape_string($conn,$_POST['username']));
	$password = sha1(mysqli_real_escape_string($conn,$_POST['password']));
	$query1 = mysqli_query($conn,"SELECT * FROM ADMIN WHERE sha1(Username) = '$username' and password = '$password'") or die("Cannot execute query1.");
	echo "SELECT * FROM ADMIN WHERE sha1(Username) = '$username' and password = '$password'";
	if(mysqli_num_rows($query1) == 1)
	{
		$_SESSION['admin'] = $username;
		header("location:admin/");
	}
	else
	{
		$_SESSION['error'] = "<span style=\"color:black\">Invalid username or password.</span>";
		header("location:index.php");
	}
?>
