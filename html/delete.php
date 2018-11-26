<?php

	$link=mysqli_connect("localhost", "root", "");
	mysqli_select_db($link, "proiectpw");
	
	$id=$_GET["id"]; //numele variabilei din fisierul asta poate sa fie oricare
	
	$res=mysqli_query($link,"select * from carte where id=$id");
	while($row=mysqli_fetch_array($res)){
		
		$img=$row["imagine"];
	}
	
	unlink($img);
	
	mysqli_query($link,"delete from carte where id=$id");
	

	
?>

<script type="text/javascript">

	window.location="demo.php";

</script>