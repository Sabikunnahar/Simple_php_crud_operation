<?php
session_start();
?>
<form action="registration.php" method="POST">
	<input type="text" name="name" placeholder="Name"/> </br>
	<input type="email" name="email" placeholder="Your Email"/> </br>
	<input type="password" name="password" placeholder="Your Password"/> </br>
	
	<input type="submit" name="submit" value="Submit"/>
</form>


<?php
	
	include_once 'Crud.php';
	
	$crud = new Crud();
	
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$password = md5($_POST['password']);
		$email = $_POST['email'];
		
		$result = $crud->execute("INSERT into user(name,email,password) VALUES('$name','$email','$password')");
		
		if($result){
			$_SESSION['email'] = $email;
			$_SESSION['name'] = $name;
			header("Location:index.php");
		}else{
			echo "Insertion Problem!";
		}
		
	}
	
	
?>