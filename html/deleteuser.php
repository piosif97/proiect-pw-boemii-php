<?php

	$link=mysqli_connect("localhost", "root", "");
	mysqli_select_db($link, "proiectpw");
	
	$idu=$_GET["idUser"]; //numele variabilei din fisierul asta poate sa fie oricare
	
	$res=mysqli_query($link,"select * from user where idUser=$idu");
	/*while($row=mysqli_fetch_array($res)){
		
		$img=$row["imagine"];
	}
	
	unlink($img);*/
	
	mysqli_query($link,"delete from user where idUser=$idu");
	

	
?>

<script type="text/javascript">

	window.location="utilizatori.php";

</script>