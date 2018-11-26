<?php
	
	session_start();
	
	if(isset($_POST['submit1'])){
		
		$link=mysqli_connect("localhost", "root", "");
	    mysqli_select_db($link, "proiectpw");
		

		
		$uid = mysqli_real_escape_string($link, $_POST['username']);
		$pwd = mysqli_real_escape_string($link, $_POST['password']);
		
		if(empty($uid) || empty($pwd)){
			
		    header("Location: ./LogIn.php?login=empty");
			exit();
		}
		else{
			
			$sql = "SELECT * FROM user WHERE username='$uid'";
			$result = mysqli_query($link, $sql);
			$resultCheck = mysqli_num_rows($result);
			if($resultCheck < 1){
				
				header("Location: ./index.php?login=error");
				exit();
			}
			else{
				
				if($row = mysqli_fetch_assoc($result)){
					
					$hashedPwdCheck = password_verify($pwd, $row['password']);
					if($hashedPwdCheck == false){
						
						header("Location: ./index.php?login=error");
						exit();
					}
					elseif($hashedPwdCheck == true){
						
						$_SESSION['idUser'] = $row['idUser'];
						$_SESSION['prenume'] = $row['prenume'];
						$_SESSION['nume'] = $row['nume'];
						$_SESSION['adresa'] = $row['adresa'];
						$_SESSION['email'] = $row['email'];
						$_SESSION['username'] = $row['username'];
						$_SESSION['type'] = $row['type'];
						if($row['type'] == 'Admin'){
							
							header("Location: ../demo.php");
							exit();
						}
						else{
							header("Location: ./index.php?login=success");
							exit();
						}
					}
				}
			}
		}
	}
	else{
		
		header("Location: ./index.php?login=error");
		exit();
	}

?>