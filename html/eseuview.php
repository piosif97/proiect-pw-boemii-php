<?php
	
	session_start();
	//if($_SESSION["admin"]==""){ //the user is not logged in as admin but is trying to open thi page
?>	
<!--	<script type="text/javascript">
	window.location="./LogInTemplate/LogIn.php";
	</script> -->

<!--< ?php	
	}

?> -->

<?php 

	include "header.php";
	include "menu.php";
	include "footer.php";
?>

<?php

	$link=mysqli_connect("localhost", "root", "");
	mysqli_select_db($link, "proiectpw");
	
?>
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">VIZUALIZARE ESEURI</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">         
                        <ol class="breadcrumb">
                            <li><a href="utilizatori.php">VIZUALIZARE ESEURI</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--/.row -->
                <!--row -->
                <!-- /.row -->
                
				
                <!-- ============================================================== -->
                <!-- table                 ESEURI                               -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">VIZUALIZARE ESEURI:</h3>
                            <div class="table-responsive">
                                <table class="table">
								<?php 
									$res=mysqli_query($link,"select * from eseu");
								?>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>USERNAME</th>
                                            <th>NUME</th>
                                            <th>PRENUME</th>
                                            <th>ESEU</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
										<?php
											
											$contor=1;
											while($row=mysqli_fetch_array($res)){
                                                
                                                
                                                    echo "<tr>";
												    echo "<td>"; echo $contor; echo "</td>";
													$idu=$row["idUser"];
													$result2=mysqli_query($link,"select * from user where idUser='$idu'");
													$row2=mysqli_fetch_array($result2);
												    echo "<td>"; echo $row2["username"]; echo "</td>";
												    echo "<td>"; echo $row2["nume"]; echo "</td>";
                                                    echo "<td>"; echo $row2["prenume"]; echo "</td>";
                                                    echo "<td>"; echo $row["eseu"]; echo "</td>";
												    
												    echo "</tr>";
												    $contor=$contor + 1;

												
											}
										
										?>
										
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
