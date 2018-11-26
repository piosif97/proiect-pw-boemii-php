<?php
	
	include "chooseHeader.php";
	$link=mysqli_connect("localhost", "root", "");
	mysqli_select_db($link, "proiectpw");

?>

			<!-- Main -->
				<div id="main-wrapper">
					<div id="main" class="container">
						<div id="content">

							<!-- Post -->
								<article class="box post">
									
									<header>
										<h2><a href="#"> Concursul
										<text style="color: #f49387;">DE ESEURI</text> "Boemii în literatura interbelică"</a></h2>
									</header>
									<a href="#" class="image left"><img src="images/old-typewriter.jpg" alt="" /></a>
										<p> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


										</p>
												<p>Echipa „De la vechii la noii boemi” organizează concursul de eseuri „Boemii în literatura interbelică” , 
												cu scopul de a promova interesul cititorilor pentru domeniul literaturii interbelice şi de a încuraja dezbaterile 
												legate de efectul epocii jazz-ului asupra operelor artistice, în speță cele literare.</p>
												
												<p>
													Tema concursului este deosebit de generoasă, oferind participanţilor o paletă largă de subiecte care 
													pot fi abordate şi valorificate cu ajutorul cunoştinţelor şi imaginaţiei acestora.

												<p>Prin intermediul eseului, persoanele interesate au posibilitatea să expună, să detalieze şi să argumenteze 
												viziunea proprie referitoare la procesul de creație artistică.</p>
												
												<p>Această competiţie va asigura un context favorabil pentru conturarea unor opinii originale privind 
												exprimarea artistică, în contextul unei perioade marcate atât de efervescență culturală, cât și de 
												greutăți sociale și politice. </p>

												</p>
													<h4><text style="color: #f49387;">Condiții de eligibilitate:</text></h4>
														<ul style="list-style-type:disc">
 														 <li>Concursul se adresează cititorilor interesați de istorie și literatură, dar și de modul în care aceste două domenii se întrepătrund;</li>
  														 <li>Se acceptă doar lucrări originale, care nu au mai participat la alte competiţii, concursuri, conferinţe;</li>
  														 <li>Se vor lua în considerare doar lucrările de unic autor, fiecare participant putând concura cu un singur eseu;</li>
														</ul>	
												
													<h4><text style="color: #f49387;">Criterii de evaluare:</text></h4>
														<ul style="list-style-type:disc">
 														 <li>Condiţii de formă (respectarea condiţiilor de tehnoredactare, aspect general) - 2 puncte;</li>
  														 <li>Respectarea temei evocate anterior - 5 puncte;</li>
  														 <li>Calitatea argumentelor şi gradul de originalitate - 10 puncte;</li>
														 <li>Calitatea generală a exprimării - 3 puncte;</li>
														</ul>

													<h4><text style="color: #f49387;">Termene limită:</text></h4>
														<ul style="list-style-type:disc">
 														 <li>25 ianuarie 2016 – înscrierea în concurs se realizează prin completarea formularului ce poate fi accesat aici;</li>
  														 <li>30 ianuarie 2016 - anunțarea rezultatelor;</li>
														</ul>	

													<h4><text style="color: #f49387;">Criterii de evaluare:</text></h4>
														<ul style="list-style-type:disc">
 														 <li>Premiul I: Cartea Mironei și Pânza de păianjen, ambele scrise de Cella Serghi;</li>
  														 <li>Premiul II: Cartea Mironei de Cella Serghi;</li>
  														 <li>Premiul III : Pânza de păianjen de Cella Serghi;</li>
														</ul>	

												<!--<p><a href="addEseu.php"><text style="color: #f49387;">Dați clik aici pentru a vă însrie în concurs.</text></a></p> -->
												<form id="form7" name="form7" runat="server" action="" method="post" enctype="multipart/form-data">
													<div class="4u"> 
														<p> Introdu eseul: </p> 
														<input type="file" name="eseu1" required />
													</div>
													<br>
													<input  name="submit6" class="form-button-submit button icon" value="Trimite eseu"/>
												</form>
												<?php

													if(isset($_POST['submit6'])){
		
														if(!isset($_SESSION['idUser'])){
															echo '<script>window.location="LogIn.php"</script>';
															exit();	
														}
														else{
															
																$uid=$_SESSION['idUser'];
																$result=mysqli_query($link, "select * from user where idUser='$uid'");
																$row=mysqli_fetch_array($result);
																if($row["inscris"] == "nu"){
																	$fnm=$_FILES["eseu1"]["name"];
																	$dst="./eseuri/".$fnm;
																	move_uploaded_file($_FILES["eseu1"]["tmp_name"], $dst);
																	mysqli_query($link, "insert into eseu values('$uid','$dst')");
																	$ok="da";
																	mysqli_query($link, "update user set inscris='$ok' where idUser=$uid");
																	echo '<script>alert("Multumim pentru inscrierea la concurs!")</script>';
																}
																else{
																	
																	echo '<script>alert("Sunteti deja inscris!")</script>';
																	exit();
																}
														}
	
													}

												?>
	
								</article>

						</div>
					</div>
				</div>

			<!-- Footer -->
			<div id="footer-wrapper">
				
				<div id="copyright" class="container">
					<ul class="links">
						<li>&copy; Acest site a fost creat de Diana Haidu şi Patricia Iosif </li><li>All rights reserved.</a></li>
					</ul>
				</div>
			</div>

	</body>
</html>