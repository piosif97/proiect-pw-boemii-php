<?php

	include "chooseHeader.php";

?>
			
		<!-- Main -->
			<div id="main-wrapper">
				<div id="main" class="container">
					<div id="content">

						<!-- Post -->
				<article class="box post">

		<header>
			<h2>Register</h2>
		</header>
								
	





				</article>
					
					</div>

				</div>
				<div id="footer" class="container">
					<form id="form1" name="form1" runat="server" action="signupAux.php" method="POST">

						<div class="row">
							<div class="4u">
								<section>
									<img src="images/box1.jpg" alt="">
									<img src="images/box1.jpg" alt="">
								
								</section>
							</div>
						
							<div class="4u">
								<section>
										<div class="11u">
											<p>Nume:</p> 
											<input name="nume" type="text" required /> <br>
										</div>

										<div class="11u">
											<p>Prenume:</p> 
											<input name="prenume" type="text" required /> <br>
										</div>
										
										<div class="11u">
											<p>Adresa:</p> 
											<input name="adresa" type="text" required /> <br>
										</div>

										<div class="11u">
											<p>Email:</p> 
											<input name="email" type="text" required /> <br>
										</div>

										<div class="11u">
											<p>Username:</p> 
											<input name="username" type="text" required /> <br>
										</div>
													
										<div class="11u">
											<p>Password:</p> 
											<input name="password" type="password" required /> <br>
										</div>

										<!--<div class="11u">
											<p>Confirm Password:</p> 
											<input name="confirmpassword" type="text" required /> <br>
										</div>-->
	
										<br><br>
													
										<div class="row 50%">
											<div class="12u">
												<!--<a href="#" name="submit1" class="form-button-submit button icon">LOG IN</a> -->
												<input  name="submit2" class="form-button-submit button icon" value="REGISTER"/>
											</div>
										</div>

								</section>
							</div>

							<div class="4u">
									<section>
										<div id="goright">
											<img src="images/box1.jpg" alt="">
											<img src="images/box1.jpg" alt="">
										</div>
									
									</section>
							</div>
							

						</div><!--<div class="row">-->

					</form>
				</div><!--<div id="footer" class="container">-->



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