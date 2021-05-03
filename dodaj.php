<?php
include_once 'config.php';
if(isset($_POST['save']))
{	 
	 $registerska = $_POST['registerska'];

	 $sql = "INSERT INTO vozila (registerska)
	 VALUES ('$registerska')";

	 if (mysqli_query($conn, $sql)) {
		header("location:servis.php");
	 } else {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>