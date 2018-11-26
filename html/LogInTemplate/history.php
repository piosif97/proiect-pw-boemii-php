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
                <h2 class="title2">Istoricul comenzilor mele:</h3>

                <!-- TABEL STIL DETALII!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
                <style>
					table {
    						border-collapse: collapse;
    						width: 100%;
					}

					th {
    						text-align: left;
    						padding: 8px;
							background-color: #f49387;
    						color: white;

					}
 
					td {
    						text-align: left;
    						padding: 8px;
						}

					tr:nth-child(even){background-color: #f2f2f2}
				</style>





                <div>
					<!--<table>
						<tr>
							<th width="5%">#</th> -->
							<?php
							
								$idu = $_SESSION["idUser"];
								$countComenzi = 1;
								$result = mysqli_query($link, "select * from comanda where idUser='$idu'");
								while($row = mysqli_fetch_array($result)){
									
									$idc = $row["idComanda"];
									
									echo '<table>';
									echo '<tr>';
									echo '<th width="5%">#</th>';
									 
									$result2 = mysqli_query($link, "select * from produs_comandat where idComanda='$idc'");
									while($row2 = mysqli_fetch_array($result2)){
										
										$idp = $row2["idProdus"];
										//$result3 = mysqli_query($link, "select * from carte where id='$idp'"); 
										echo '<th width="10%"> Carte </th>';
										echo '<th width="10%"> Cantitate </th>';
									}
								
									echo '</tr>';
									
									$result2 = mysqli_query($link, "select * from produs_comandat where idComanda='$idc'");
									echo'<tr>';
									echo '<td>'; echo $countComenzi; echo '</td>';
									while($row2 = mysqli_fetch_array($result2)){
										
										
										echo '<td>';
										$idp = $row2["idProdus"];
										$result3 = mysqli_query($link, "select * from carte where id='$idp'"); 
										$row3 = mysqli_fetch_array($result3);
										$titlu = $row3["titlu"];
										echo $titlu;
										echo '</td>';
										echo '<td>';
										$result4 = mysqli_query($link, "select * from produs_comandat where idComanda='$idc' and idProdus='$idp'");
										$row4 = mysqli_fetch_array($result4);
										$q = $row4["cant"];	
										echo $q;										
										echo '</td>';
										//echo'</tr>';
									
										
									}
									echo'</tr>';
									$countComenzi = $countComenzi + 1;
									echo '</table>';
								}
							
							?>
						<!-- </tr>
					</table> -->
                </div>           
                </article>
			</div>
		</div>
	</div>	