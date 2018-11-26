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
                        <h4 class="page-title">ADMINISTRARE CARTI</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">         
                        <ol class="breadcrumb">
                            <li><a href="demo.php">ADMINISTRARE CARTI</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--/.row -->
                <!--row -->
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
							
                           <div> <h3 class="box-title">Adauga carte</h3> </div>
							<form id="form1" name="form1" runat="server" action="" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="7u" id="left-column">

										<div class="4u" > 
											<p> Titlu Carte: </p> 
											<input name="cnm" type="text" required />
										</div>
								
										<div class="4u" > 
										    <br>
											<p> Autor Carte: </p> 
											<input name="cauth" type="text" required />
										</div>
								
										<div class="4u"> 
										    <br>
											<p> Pret Carte: </p> 
											<input type="text" name="cprice" required />
										</div>
										
										<div class="4u"> 
										    <br>
											<p> Cantitate Carte: </p> 
											<input type="text" name="cquant" required />
										</div>
										
									    <div>
											<br>
											<input type="submit" id="updateDetails" name="submit1" value="Adauga" required />
											
										</div>
								</div>
								
								<div class="5u" id="right-column">
										<div class="4u"> 
											<p> Imagine Carte: </p> 
											<input type="file" name = "cimage" required />
										</div>
								
										<div class="4u"> 
										    <br>
											<p> Descriere Carte: </p> 
											<textarea cols="80" rows="9" name="cdesc" required > </textarea>
										</div>
								</div>	

							</div>
							</form>	
							<br>
							
							<?php
							
								$recordAdded = false;
								if(isset($_POST["submit1"])){
		
									$v1=rand(1111, 9999);
									$v2=rand(1111, 9999);
									
									$v3=$v1.$v2;
									
									$v3=md5($v3);
									
									$fnm=$_FILES["cimage"]["name"];
									$dst="./book_images/".$v3.$fnm;
									$dst1="book_images/".$v3.$fnm;
									move_uploaded_file($_FILES["cimage"]["tmp_name"], $dst);
									
									mysqli_query($link, "insert into carte values('','$_POST[cnm]','$_POST[cauth]',$_POST[cprice],$_POST[cquant],'$dst1','$_POST[cdesc]')");
									
									echo "1 record added";

									$recordAdded = true;
								
									/*mysql_close($con)*/
								}
								
							?>
							
							
                        </div>
                    </div>
                </div>
				
                <!-- ============================================================== -->
                <!-- table -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Oferta anticariatului:</h3>
                            <div class="table-responsive">
                                <table class="table">
								<?php 
									$res=mysqli_query($link,"select * from carte");
								?>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>COPERTA</th>
                                            <th>TITLU</th>
                                            <th>AUTOR</th>
                                            <th>CANTITATE</th>
											<th>PRET (LEI)</th>
											<th>DESCRIERE</th>
											<th>EDITEAZA</th>
											<th>STERGE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
										<?php
											
											$contor=1;
											while($row=mysqli_fetch_array($res)){
												
												echo "<tr>";
												
												echo "<td>"; echo $contor; echo "</td>";
												echo "<td>"; ?> <img src="<?php echo $row["imagine"]; ?>" height="150" width="190"> <?php echo "</td>";
												echo "<td>"; echo $row["titlu"]; echo "</td>";
												echo "<td>"; echo $row["autor"]; echo "</td>";
                                                echo "<td>"; echo $row["cantitate"]; echo "</td>";
                                                echo "<td>"; echo $row["pret"]; echo "</td>";
												echo "<td>"; echo $row["descriere"]; echo "</td>";
												echo "<td>"; ?> <a href="edit.php?id=<?php echo $row["id"]; ?>"> <img src="../plugins/images/edit-sign.png" height="30" width="30"> </a> <?php echo "</td>";
												echo "<td>"; ?> <a href="delete.php?id=<?php echo $row["id"]; ?>"> <img src="../plugins/images/delete-sign.png" height="30" width="30"> </a> <?php echo "</td>";
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
