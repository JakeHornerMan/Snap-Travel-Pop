<?php

	$connect= new mysqli('localhost', 'root','' ,'login');
	
	if($connect->connect_error){
		die('connection failed');
	} else
	
	$username= $_POST['username'];
	$password= $_POST['password'];
	
	$sql="SELECT name FROM users WHERE username='$username' AND password='$password'";
	
	$result= $connect->query($sql);
	
	if($result-> num_rows>0){
		
		while($row=$result->fetch_assoc()){
			
			header('Location: SnapTravelPop.html');
			
		}
		
	}else
		echo "wrong email or password";
?>