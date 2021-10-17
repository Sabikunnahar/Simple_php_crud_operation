<form action="login.php" method="POST">
	<input type="email" name="email" placeholder="Your Email"/> </br>
	<input type="password" name="password" placeholder="Your password"/> </br>
	
	<input type="submit" name="submit" value="Login"/><br/>
	<a href="registration.php">Are you a New User?</a>
</form>
<?php
	session_start();

	include_once 'Crud.php';
	
	$crud = new Crud();
  if(isset($_POST['submit'])){
	  
	  $email = $_POST['email'];
	  $password = md5($_POST['password']);
	  
	  
	  $query = "select * from user where email='$email' AND password='$password'";
	
	  $result = $crud->getData($query);
	if($result) {
		foreach($result as $res){
			$email = $res['email'];
			$name = $res['name'];
		}
		$_SESSION['email'] = $email;
		$_SESSION['name'] = $name;
		header("Location:index.php");
	}else{
		echo "Login Problem";
	}
	
	
	
  }
	
	
?>
