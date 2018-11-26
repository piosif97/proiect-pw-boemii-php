<?php

	include "chooseHeader.php";
	$link=mysqli_connect("localhost", "root", "");
	mysqli_select_db($link, "proiectpw");

	$id=$_GET["id"];
	
	if(isset($_POST["submit3"])){
		
		
	}

?>
			
		<!-- Main -->
			<div id="main-wrapper">
				<div id="main" class="container">
					<div class="row">
					
						<!-- Sidebar -->
							<div id="sidebar" class="4u">
							
								<!-- Excerpts -->
									<section>
										<ul class="divided">
											<li>

												<!-- Excerpt -->
													<article class="box excerpt">
														<header>
															<span class="date">Până în 25 ianuarie</span>
															<h3><a href="#">Participă la concursul de eseuri "Boemii în literatura 																	interbelică"</a></h3>
														</header>
														<p>Cei care doresc să se înscrie la concurs, o pot face în perioada 1 decembrie 2014 – 25 ianuarie
 															2015, trimiţând un text de aproximativ 2.000 de cuvinte pe tema menționată în
 															articol...</p> 
														<a href="concursuri.php" class="button icon fa-file">Citeşte...</a>
													</article>


											</li>
											

										</ul>
									</section>
								</div>	
						<!-- Content -->
							<div id="content" class="8u important(collapse)">
								<form name="form3" action="" method="post">
								<?php 
									$res= mysqli_query($link, "select * from carte where id=$id");
									while($row=mysqli_fetch_array($res))
									{
								?>
								
										<!-- Post -->
									<ul class="divided">
													<li><article class="box highlight">
														<header>
															<h3><?php echo $row["titlu"] ?> </h3>
																<text style="color: #f49387;">Autor: <?php echo $row["autor"] ?></text></a></h3>
														</header>
														<a href="#" class="image left"><img src="../<?php echo $row["imagine"]; ?>" alt="" /></a>
														<p> <?php echo $row["descriere"] ?> </p>
                                                        <text style="color: #f49387;">PREȚ: </text> <?php echo $row["pret"] ?> lei <br><br>
															
                                                        <a href="adauga.php" class="button icon fa-file"> Adauga in cos</a> 
														<!--<input  name="submit3" class="form-button-submit button icon" value="ADAUGA IN COS"/>-->
														<hr>
													</li>
									</ul>
								
								<?php
									}
								?>	
								</form>
							</div>

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