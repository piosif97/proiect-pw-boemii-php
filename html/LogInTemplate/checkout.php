<?php

	session_start();
	$link=mysqli_connect("localhost", "root", "");
	mysqli_select_db($link, "proiectpw");
	
	if(empty($_SESSION["cart"])){
	
		echo '<script>window.location="Pagina-principala-CARTI.php"</script>';
		exit();
	}
	else{
		
		if(!isset($_SESSION["idUser"])){
			echo '<script>window.location="LogIn.php"</script>';
			exit();
		}
		else{
			$idu = $_SESSION["idUser"];
			mysqli_query($link, "insert into comanda values('','$idu')");
			$result = mysqli_query($link, "select * from comanda where idUser='$idu'");
			while($row = mysqli_fetch_assoc($result)){
				
				$comandaid = $row['idComanda'];	
			}
			
			foreach($_SESSION["cart"] as $keys => $value){
		
				$my_value = $value["id"];
				$my_q = $value["cantitate"];
				mysqli_query($link, "insert into produs_comandat values('','$comandaid','$my_value', '$my_q')");
				
			}

			foreach($_SESSION["cart"] as $keys => $value){
				$my_id = $value["id"];
				$result2 = mysqli_query($link, "SELECT * FROM carte WHERE id='$my_id'");
				$row2 = mysqli_fetch_array($result2);
				$noua_cantitate = $row2["cantitate"] - $value["cantitate"];

				mysqli_query($link, "UPDATE carte SET cantitate='$noua_cantitate' WHERE id='$my_id'");
			}
			
			unset($_SESSION["cart"]);
			echo '<script>alert("Multumim ca ati cumparat de la noi!")</script>';
			echo '<script>window.location="index.php"</script>';
			
		
		}
	}
?>