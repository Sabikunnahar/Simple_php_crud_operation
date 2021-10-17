<?php
	/*session_start();
	if(!isset($_SESSION['email'])){
		header('location:login.php');
	}*/
	include_once 'Crud.php';
	
	$crud = new Crud();
	
	$id = $_POST['id'];
	//echo $id ;
	$query = "select * from student_info where id=$id";
	
	$result = $crud->getData($query);
	
	foreach($result as $res){
		$id = $res['id'];
		$name = $res['name'];
		$student_id = $res['student_id'];
		$email = $res['email'];
	}
?>

	<input type="text" id="uid" name="id" hidden value="<?php echo $id;?>"/>
	<input type="text" id="uname" name="name" value="<?php echo $name;?>"/>
	<input type="text" id="ustudent_id" name="student_id" value="<?php echo $student_id;?>"/>
	<input type="email" id="uemail" name="email" value="<?php echo $email;?>"/>
	<input type="button" id="update" name="update" value="Update"/>
	<input type="button" onclick="$('#edit-form').hide();" name="cancel" value="Cancel"/>
<script type="text/javascript">
	$(document).ready(function(){
		
		$('#update').click(function(){
			var id = $('#uid').val();
			var name = $('#uname').val();
			var student_id = $('#ustudent_id').val();
			var email = $('#uemail').val();
		
			$.ajax({
				url:"editaction.php",
				type:"POST",
				data: {id:id,name:name,student_id:student_id,email:email},
				success: function(data){
					
					if(data == 'success'){
						$('#id').val('');
						$('#name').val('');
						$('#student_id').val('');
						$('#email').val('');
						$('#edit-form').hide();
						$.get('view.php',function(data){
							$('#data-show').html(data);
						})
					
					}
				}
			})
		})
		
		
		
	})
</script>