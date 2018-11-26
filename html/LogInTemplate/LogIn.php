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
		<h2>Log In</h2>
	</header>
                    

				</article>
					
					</div>

				</div>
				<div id="footer" class="container">
					<div class="row">
						<div class="7u">
							<section>
								<img src="images/box1.jpg" alt="">
								<img src="images/box2.jpg" alt="">
								<img src="images/box3.jpg" alt="">
							</section>
						</div>
						<div class="5u">
							<section>
								<p> </p>
								
                                <!-- FORMULAR--><!-- FORMULAR--><!-- FORMULAR--><!-- FORMULAR-->
					
                                    <form id="form1" name="form1" runat="server" action="loginAux.php" method="POST">
                                        <div>

											<div class="7u">
												<p>Username:</p> 
												<input name="username" type="text" required /> <br>
											</div>
											
										    <div class="7u">
												<p>Password:</p> 
												<input name="password" type="password" required />
											</div>
											
                                            <br><br>
											
											<div class="row 50%">
												<div class="12u">
													<!--<a href="#" name="submit1" class="form-button-submit button icon">LOG IN</a> -->
													<input  name="submit1" class="form-button-submit button icon" value="LOG IN"/>
												</div>
											</div>
                                    
                                        </div>
                                    </form>	
                                
                                <br>
                                    Don't have an account? <a href="Register.php">Sign up</a>
								<!-- < ?php
		
										/*if(isset($_POST["submit1"])){
											
											$res=mysqli_query($link, "select * from admin_login where username='$_POST[username]' && password='$_POST[password]'");
											while($row=mysqli_fetch_array($res)){
											
											$_SESSION["admin"]=$row["username"];
								?>
											<script type="text/javascript">
											window.location="../demo.php";
											</script>
											< ?php
											}
										}*/
										
								?> -->
                                <!-- FORMULAR--><!-- FORMULAR--><!-- FORMULAR--><!-- FORMULAR-->
                                
                                
                                <!--<div class="row">
									<div class="6u">
										<ul class="icons">
											
											<li class="icon fa-envelope">
												<a href="#">boemii@gmail.com</a>
											</li>
										
									
											<li class="icon fa-instagram">
												<a href="#">instagram.com/boemii</a>
											</li>
											<li class="icon fa-facebook">
												<a href="#">facebook.com/De la vechii la noii boemi</a>
											</li>
										</ul>
									</div>
								</div>-->
							</section>
						</div>
					</div>
				</div>



</div>




<!-- Footer -->
			<div id="footer-wrapper">
				
				<div id="copyright" class="container">
					<ul class="links">
						<li>&copy; Acest site a fost creat de Diana Haidu şi Patricia Iosif </li><li>All rights reserved.</li>
					</ul>
				</div>
			</div>




</body>
</html>
