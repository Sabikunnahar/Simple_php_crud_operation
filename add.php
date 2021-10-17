<?php
session_start();
if(!isset($_SESSION['email'])){
	header('location:login.php');
}
?>
<form action="add.php" method="POST">
	<input type="text" name="name" placeholder="Name"/> </br>
	<input type="text" name="student_id" placeholder="Your ID"/> </br>
	<input type="email" name="email" placeholder="Your Email"/> </br>
	<input type="submit" name="submit" value="Submit"/>
</form>

<?php
	
	include_once 'Crud.php';
	
	$crud = new Crud();
	
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$student_id = $_POST['student_id'];
		$email = $_POST['email'];
		
		$result = $crud->execute("INSERT into student_info(name,student_id,email) VALUES('$name','$student_id','$email')");
		
		if($result){
			header("Location:index.php");
		}else{
			echo "Insertion Problem!";
		}
		
	}
	
	
?>