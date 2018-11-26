<?php

	include "chooseHeader.php";
	$con=mysqli_connect("localhost", "root", "");
	mysqli_select_db($con, "proiectpw");
	
	if(isset($_POST["add"]))
    {
		$cant = $_POST["quantity"];
		$noua_cantitate = $_GET["q"] - $cant;
		if($noua_cantitate < 0)
		{
			echo '<script>alert("Nu sunt destule produse in stoc!")</script>';
			echo '<script>window.location="Pagina-principala-CARTI.php"</script>';
			exit();
			
		}
		else{
			if(isset($_SESSION["cart"]))
			{
				$item_array_id = array_column($_SESSION["cart"], "id");
				
				if(!in_array($_GET["id"], $item_array_id))
				{
					$count = count($_SESSION["cart"]);
					$item_array = array(
						'id' => $_GET["id"],
						'nume' => $_POST["hidden_name"],
						'pret' => $_POST["hidden_price"],
						'cantitate' => $_POST["quantity"],
					);
					$_SESSION["cart"][$count] = $item_array;
					echo '<script>window.location="Pagina-principala-CARTI.php"</script>';
				}else{

					echo '<script>alert("product is already added")</script>';
					echo '<script>window.location="Pagina-principala-CARTI.php"</script>';
				}
			}else{
				$item_array = array(
					'id' => $_GET["id"],
					'nume' => $_POST["hidden_name"],
					'pret' => $_POST["hidden_price"],
					'cantitate' => $_POST["quantity"],
				);
				$_SESSION["cart"][0] = $item_array;
			}
				
		}
											
        
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

												<article class="box excerpt">
														<header>
															<span class="date">Până în 25 ianuarie</span>
															<h3><a href="#">Participă la concursul de eseuri "Boemii în literatura 																	interbelică"</a></h3>
														</header>
														<p>Cei care doresc să se înscrie la concurs, o pot face în perioada 1 decembrie 2014 – 25 ianuarie
 															2015, trimiţând un text de aproximativ 2.000 de cuvinte pe tema menționată în
 															articol...</p> 
														<a href="concursuri.php" class="button icon fa-file">Citește...</a>
													</article>


											</li>
											<li>

												<!-- Excerpt -->
													<article class="box excerpt">
														<header>
															<h3><a href="Vremea-noilor-boemi-ART.php">VREMEA "NOILOR BOEMI"</a></h3>
														</header>
														<a href="Vremea-noilor-boemi-ART.php" class="image left"><img src="images/holender1.jpg" ></a>
														<p>Ioan Holender, fost director al Operei de Stat din Viena: "Absurdul a devenit un clișeu. 															Cuvântul ăsta, cum s-ar spune, nu mai mișcă. Pentru că asta e soarta tuturor adevărurilor..."</p>
													<ul class="actions"><li><a href="Vremea-noilor-boemi-ART.php" class="button icon fa-file">Citeşte...</a></li></ul>
													</article>

											</li>
											
										</ul>
									</section>
							
								<!-- Highlights -->
									<section>
										<ul class="divided">
											<li>

												<!-- Highlight -->
													<article class="box highlight">
														<header>
															<h3><a href="Filme.php">Filmul românesc</a></h3>
														</header>
														<a href="Filme.php" class="image left"><img src="images/film-romanesc.jpg" alt="" /></a>
														<p>Filmul românesc cunoaște o istorie de peste un secol. Deși aducerea în România a tehnologiilor necesare filmului s-a făcut cu doar puțin timp după darea în folosință a primelor aparaturi performante (începând cu cele ale fraților Lumière), filmul românesc de artă a debutat la începutul deceniului doi al secolului XX...</p>
														<ul class="actions">
															<li><a href="Filme.php" class="button icon fa-file">Citeşte...</a></li>
														</ul>
													</article>

											</li>
											<li>

												<!-- Highlight -->
													<article class="box highlight">
														<header>
															<h3><a href="arta-fotografica.php">Arta fotgrafică. Scurt istoric</a></h3>
														</header>
														<p>Fotografia este una dintre artele care a marcat lumea și modul în care o percepem. Termenul „fotografie” provine din 
														limba greacă şi înseamnă „a picta cu lumină”. Fenomenul a fost observat încă din secolul al III-lea î.Hr., atunci 
														când Aristotel a constatat faptul că, dacă se realizează o gaură într-o cutie, pe peretele opus acesteia se va forma o imagine reală, însă răsturnată...</p>
														<ul class="actions">
															<li><a href="arta-fotografica.php" class="button icon fa-file">Citește...</a></li>
														</ul>
													</article>

											</li>
										</ul>
									</section>
							
							</div>

						<!-- Content -->
							<div id="content" class="8u important(collapse)">

								<!-- Post -->
									<article class="box post">
										<header>
											<h2><b>Anticariat</b></h2>
										</header>
										
										<form action="search.php" method="POST">
                                            <input type="text" name="search" placeholder="Search" /> 
                                            <input  name="submit-search" class="form-button-submit button icon" value="Search"/>
                                            
                                        </form>
										<br><br>
                                        <?php 

                                            if(isset($_POST["submit-search"]))
                                            {
                                               
                                                $search = mysqli_real_escape_string($con, $_POST['search']); //pt sql injections
                                                $sql = "SELECT * FROM carte WHERE titlu LIKE '%$search%' OR autor LIKE '%$search%'";
                                                $result = mysqli_query($con, $sql);
                                                $queryResults = mysqli_num_rows($result);

                                                if($queryResults > 0)
                                                {
                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                        ?>
                                                                <div class="box post">
                                                            <form method="post" action="Pagina-principala-CARTI.php?action=add&id=<?php echo $row["id"]?>&q=<?php echo $row["cantitate"]?>" enctype="multipart/form-data">
                                                            <ul class="divided">
                                                                <li><article class="box highlight">
                                                                    <header>
                                                                    <h3><?php echo $row["titlu"] ?> </h3>
                                                                        <text style="color: #f49387;">Autor: <?php echo $row["autor"]; ?></text></a></h3>
                                                                    </header>
                                                                    <a href="#" class="image left"><img src="../<?php echo $row["imagine"]; ?>" alt="" /></a>
                                                                    <p> <?php echo $row["descriere"] ?> </p>
                                                                    <text style="color: #f49387;">PREȚ: </text> <?php echo $row["pret"] ?> lei <br><br>
                                                                    <br>
                                                                    <text style="color: #f49387;">CANTITATE: </text>
                                                                    <input type="hidden" name="hidden_name" value="<?php echo $row["titlu"]; ?>" >
                                                                    <input type="hidden" name="hidden_price" value="<?php echo $row["pret"]; ?>" >	
                                                                    <div class="4u">
                                                                        <input type="text" name="quantity" value="1" />
                                                                    </div>	
                                                                    <br>

                                                                    <!--<input type="submit15" name="add" value="Add to Cart"> -->
                                                                    <input  name="add" class="form-button-submit button icon" value="ADAUGA IN COS"/>
                                                                </li>
                                                            </ul>
                                                            </form>
                                                            

                                                            </div>

                                                        <?php

                                                    }
                                                }else{
                                                    echo "There are no results matching your search!";
                                                }
                                            }
                                            ?>

										
										<div></div>

										</article> <br><br><br><br>

							
								
												





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