<?php
	
	session_start(); 
	
	$link=mysqli_connect("localhost", "root", "");
	mysqli_select_db($link, "proiectpw");
	
	include "header.php";
	include "menu.php";
	include "footer.php";
?>

 <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">VIZUALIZARE COMENZII</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">         
                        <ol class="breadcrumb">
                            <li><a href="utilizatori.php">VIZUALIZARE COMENZII</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--/.row -->
                <!--row -->
                <!-- /.row -->
                
				
                <!-- ============================================================== -->
                <!-- table                 COMENZI                              -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">COMENZI:</h3>
                            <div class="table-responsive">
							<?php
							
								$countComenzi = 1;
								$result = mysqli_query($link, "select * from comanda");
								while($row = mysqli_fetch_array($result)){
									
									$idc = $row["idComanda"];
									$idu = $row["idUser"];
							
									
									echo '<table class="table">';
									echo '<tr>';
									echo '<th>#</th>';
									echo '<th>username</th>';
									 
									$result2 = mysqli_query($link, "select * from produs_comandat where idComanda='$idc'");
									while($row2 = mysqli_fetch_array($result2)){
										
										$idp = $row2["idProdus"];
										//$result3 = mysqli_query($link, "select * from carte where id='$idp'"); 
										echo '<th> Carte </th>';
										echo '<th> Cantitate </th>';
									}
								
									echo '</tr>';
									
									$result2 = mysqli_query($link, "select * from produs_comandat where idComanda='$idc'");
									echo'<tr>';
									echo '<td>'; echo $countComenzi; echo '</td>';
									echo '<td>'; 
									
									$result5 = mysqli_query($link, "select * from user where idUser='$idu'");
									$row5 = mysqli_fetch_array($result5);
									$uname = $row5["username"];
									if($uname == ""){
										echo "Contul a fost sters!";
										
									}
									else
										echo $uname;
									echo '</td>';
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