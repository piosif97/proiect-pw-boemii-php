<?php

    include "chooseHeader.php";
    /*$database_name = "proiectpw";
    $con = mysqli_connect("localhost","root","", $database_name);*/
    $con=mysqli_connect("localhost", "root", "");
    mysqli_select_db($con, "proiectpw");
    
    if(isset($_POST["add"]))
    {
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
                echo '<script>window.location="Cos.php"</script>';
            }else{

                echo '<script>alert("product is already added")</script>';
                echo '<script>window.location="Cos.php"</script>';
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
?>

    <!-- Main -->
    <div id="main-wrapper">
        <div id="main" class="container">
            <div id="content">

                <!-- Post -->
                <article class="box post">

                    <header>
                        <h2>Coș</h2>
                    </header>
                     
                   <?php 
                    $query = "SELECT * FROM carte ORDER BY id ASC";
                    $result = mysqli_query($con, $query);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_array($result))
                        {
                            ?>

                            <div class="box post">
                              <form method="post" action="Cos.php?action=add&id=<?php echo $row["id"]?>">
                              <div>
                                <img src="../<?php echo $row["imagine"]; ?>" alt="" />
                                <h3><?php echo $row["titlu"] ?> </h3>
                                <text style="color: #f49387;">Autor: <?php echo $row["autor"] ?></text></a>
                                <text style="color: #f49387;">PREȚ: </text> <?php echo $row["pret"] ?> lei <br><br>
                                <input type="hidden" name="hidden_name" value="<?php echo $row["titlu"]; ?>" >
                                <input type="hidden" name="hidden_price" value="<?php echo $row["pret"]; ?>" >
                                <input type="text" name="quantity" value="1" >
                        
                                <!--<input type="submit15" name="add" value="Add to Cart"> -->
                                <input  name="add" class="form-button-submit button icon" value="Add to Cart"/>
                              </div>
                              </form>

                            </div>
                            <?php
                        }
                    }

                ?>   

                <div></div>
                <br><br><br>
                <h3 class="title2">Shopping Cart Details</h3>

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
                <table>
                    <tr>
                        <th width="30%">Product name</th>
                        <th width="10%">Quantity</th>
                        <th width="13%">Price Details</th>
                        <th width="10%">Total Price</th>
                        <th width="17%">Remove Item</th>
                    </tr>

                    <?php
                        if(!empty($_SESSION["cart"]))
                        {
                            $total = 0;
                            foreach($_SESSION["cart"] as $key => $value)
                            {
                                ?>
                                <tr>
                                    <td><?php echo $value["nume"] ?></td>
                                    <td><?php echo $value["cantitate"] ?></td>
                                    <td><?php echo $value["pret"] ?> lei</td>
                                    <td><?php echo number_format($value["cantitate"] * $value["pret"], 2)?></td>
                                    <td><a href="Cos.php?action=delete&id=<?php echo $value["id"]; ?>"><span>Remove Item</span></a></td>
                                </tr>
                                <?php
                                    $total = $total + ($value["cantitate"] * $value["pret"]);
                            }
                                ?> 
                                <tr>
                                    <td colspan="3" > Total</td>
                                    <td> $ <?php echo number_format($total, 2);?></td>
                                    <td></td>
                                </tr>

                    <?php
                        }
                     ?>
                </table> 
                </div>
                           
                       
                        
                        
                        
                </article>

            </div>

        </div>
            <div id="footer" class="container">
            
        </div>



    </div>




    <!-- Footer -->
    <div id="footer-wrapper">

        <div id="copyright" class="container">
            <ul class="links">
                <li>&copy; Acest site a fost creat de Diana Haidu şi Patricia Iosif </li>
                <li>All rights reserved.</a></li>
            </ul>
        </div>
    </div>

</body>
</html>