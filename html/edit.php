<?php 

	include "header.php";
	include "menu.php";

	$link=mysqli_connect("localhost", "root", "");
	mysqli_select_db($link, "proiectpw");
	
	$id=$_GET["id"];
	$res=mysqli_query($link, "select * from carte where id=$id");
	while($row=mysqli_fetch_array($res)){
		
		$titlu=$row["titlu"];
		$autor=$row["autor"];
		$pret=$row["pret"];
		$cantitate=$row["cantitate"];
		$imagine=$row["imagine"];
		$descriere=$row["descriere"];
	}
	
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
							
                           <div> <h3 class="box-title">Editeaza carte</h3> </div>
							<form id="form1" name="form1" runat="server" action="" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="7u" id="left-column">

										<div class="4u" > 
											<p> Titlu Carte: </p> 
											<input name="cnm" type="text" value="<?php echo $titlu; ?>" required />
										</div>
								
										<div class="4u" > 
										    <br>
											<p> Autor Carte: </p> 
											<input name="cauth" type="text" value="<?php echo $autor; ?>" required />
										</div>
								
										<div class="4u"> 
										    <br>
											<p> Pret Carte: </p> 
											<input type="text" name="cprice" value="<?php echo $pret; ?>" required />
										</div>
										
										<div class="4u"> 
										    <br>
											<p> Cantitate Carte: </p> 
											<input type="text" name="cquant" value="<?php echo $cantitate; ?>" required />
										</div>
										
									    <div>
											<br>
											<br>
											<br>
											<input type="submit" id="updateDetails" name="submit1" value="Actualizeaza" required />
											
										</div>
								</div>
								
								<div class="5u" id="right-column">
										<div class="4u"> 
											<p> Imagine Carte: </p> 
											
												<img src="<?php echo $imagine; ?>" height="110" width="150" />
												<br>
												<br>
												<input type="file" name="cimage" /> 

										</div>
								
										<div class="4u"> 
										    <br>
											<p> Descriere Carte: </p> 
											<textarea cols="80" rows="5" name="cdesc" required > <?php echo $descriere; ?> </textarea>
										</div>
								</div>	

							</div>
							</form>	
							<br>
							<?php
							
								if(isset($_POST["submit1"])){
		
									$fnm=$_FILES["cimage"]["name"];
									
									if($fnm==""){
										
										mysqli_query($link,"update carte set titlu='$_POST[cnm]', autor='$_POST[cauth]', pret='$_POST[cprice]', cantitate='$_POST[cquant]', descriere='$_POST[cdesc]' where id=$id");
									}
									else{
										
										$v1=rand(1111, 9999);
										$v2=rand(1111, 9999);
									
										$v3=$v1.$v2;
									
										$v3=md5($v3);
									
										$fnm=$_FILES["cimage"]["name"];
										$dst="./book_images/".$v3.$fnm;
										$dst1="book_images/".$v3.$fnm;
										move_uploaded_file($_FILES["cimage"]["tmp_name"], $dst);
									
										mysqli_query($link,"update carte set imagine='$dst1', titlu='$_POST[cnm]', autor='$_POST[cauth]', pret='$_POST[cprice]', cantitate='$_POST[cquant]', descriere='$_POST[cdesc]' where id=$id");
									
										echo "1 record updated";

								
										/*mysql_close($con)*/
									}
									?>
									<script type="text/javascript">
										window.location="demo.php";
									</script>
								<?php 	
								}
								
							?>
                        </div>
                    </div>
                </div>
<?php 
		include "footer.php";
?>				