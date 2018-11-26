<?php
	session_start();
	if(isset($_SESSION['idUser'])){
		include "header-login.php";
	}
	else{
		include "header-no-login.php";
	}
?>