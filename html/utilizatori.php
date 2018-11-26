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
                        <h4 class="page-title">ADMINISTRARE UTILIZATORI</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">         
                        <ol class="breadcrumb">
                            <li><a href="utilizatori.php">ADMINISTRARE UTILIZATORI</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--/.row -->
                <!--row -->
                <!-- /.row -->
                
				
                <!-- ============================================================== -->
                <!-- table                 UTILIZATORI                               -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">UTILIZATORI:</h3>
                            <div class="table-responsive">
                                <table class="table">
								<?php 
									$res=mysqli_query($link,"select * from user");
								?>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>USERNAME</th>
                                            <th>NUME</th>
                                            <th>PRENUME</th>
                                            <th>ADRESA</th>
											<th>EMAIL</th>
											<th>STERGE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
										<?php
											
											$contor=1;
											while($row=mysqli_fetch_array($res)){
                                                
                                                if($row['type'] == 'User')
                                                {
                                                    echo "<tr>";
												    echo "<td>"; echo $contor; echo "</td>";
												    echo "<td>"; echo $row["username"]; echo "</td>";
												    echo "<td>"; echo $row["nume"]; echo "</td>";
                                                    echo "<td>"; echo $row["prenume"]; echo "</td>";
                                                    echo "<td>"; echo $row["adresa"]; echo "</td>";
												    echo "<td>"; echo $row["email"]; echo "</td>";
												    
												    echo "<td>"; ?> <a href="deleteuser.php?idUser=<?php echo $row["idUser"]; ?>"> <img src="../plugins/images/delete-sign.png" height="30" width="30"> </a> <?php echo "</td>";
												    echo "</tr>";
												    $contor=$contor + 1;

                                                }
												
											}
										
										?>
										
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
