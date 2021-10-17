<?php

	include_once 'crud.php';
	
	$crud = new crud();
	
	$id = $_POST['id'];
	
	if($crud->delete($id,"student_info")){
		echo 'success';
	}


?>