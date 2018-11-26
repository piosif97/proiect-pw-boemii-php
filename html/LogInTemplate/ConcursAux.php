<?php

	session_start();
	if(isset($_POST['submit6'])){
		
		$link=mysqli_connect("localhost", "root", "");
	    mysqli_select_db($link, "proiectpw");
		
		if(!isset($_SESSION['idUser'])){
			echo '<script>window.location="LogIn.php"</script>';
			exit();	
		}
		else{
			
			$fnm=$_FILES["cimage"]["name"];
		}
	
	}

?>