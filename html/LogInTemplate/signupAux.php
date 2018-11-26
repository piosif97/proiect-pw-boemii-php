<?php
	if(isset($_POST['submit2'])){
		
		$link=mysqli_connect("localhost", "root", "");
	    mysqli_select_db($link, "proiectpw");
		
		$firstName = mysqli_real_escape_string($link, $_POST['prenume']);
		$lastName = mysqli_real_escape_string($link, $_POST['nume']);
		$adr = mysqli_real_escape_string($link, $_POST['adresa']);
		$email = mysqli_real_escape_string($link, $_POST['email']);
		$username = mysqli_real_escape_string($link, $_POST['username']);
		$pwd = mysqli_real_escape_string($link, $_POST['password']);
		
		if(empty($firstName) || empty($lastName) || empty($adr) || empty($email) || empty($username) || empty($pwd)){
			
			header("Location: ./Register.php?signup=empty");
			exit();
		}
		else{
			
			if(!preg_match("/^[a-zA-Z]*$/", $firstName) || !preg_match("/^[a-zA-Z]*$/", $lastName) || !preg_match("/^[a-zA-Z0-9 ]*$/", $adr)){
				
				header("Location: ./Register.php?signup=invalid");
				exit();
			}
			else{
				
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					
					header("Location: ./Register.php?signup=invalidEmail");
					exit();
				}
				else{
					
					$sql = "SELECT * FROM user WHERE username='$username'";
					$result = mysqli_query($link, $sql);
					$resultCheck = mysqli_num_rows($result);
					
					if($resultCheck > 0){
						
						header("Location: ./Register.php?signup=usernameTaken");
					    exit();
					}
					else{
						
						//Hashing password
						
						$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
						
						//Insert the user into the database
						
						$sql = "INSERT INTO user (nume, prenume, adresa, email, username, password) VALUES('$firstName', '$lastName', '$adr', '$email', '$username', '$hashedPwd');";
						mysqli_query($link, $sql);
						header("Location: ./LogIn.php?signup=succes");
					    exit();
					}
				}
			}
		}
	}
	else{
		
		header("Loaction: ./Register.php");
		exit();
	}

?>