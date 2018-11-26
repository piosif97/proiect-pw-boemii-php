<?php

    include "chooseHeader.php";
	if(isset($_GET["action"])){
		if($_GET["action"] == "delete"){
			foreach($_SESSION["cart"] as $keys => $value){
				if($value["id"] == $_GET["id"]){
					unset($_SESSION["cart"][$keys]);
					echo '<script>alert("Cartea a fost eliminata din cos!")</scipt>';
					echo '<script>window.location="Cos.php"</script>';
				}
				
			}
		}
	}
  
?>

<?php

    //add button
    if(filter_input(INPUT_GET,'action')=='add'){
        //loop trhough shopping cart
        foreach($_SESSION['cart'] as $key =>$value){
            if($value['id']==filter_input(INPUT_GET, 'id')){
                $_SESSION['cart'][$key]['cantitate']++;
            }
        }
        //reset session array keys so they match with $product_ids numeric array
        $_SESSION['cart']=array_values($_SESSION['cart']);
    }

    //remove button
    if(filter_input(INPUT_GET,'action')=='remove'){
        //loop trhough shopping cart
        foreach($_SESSION['cart'] as $key =>$value){
            if($value['id']==filter_input(INPUT_GET, 'id')){
                if($value['cantitate']==1){
                    unset($_SESSION['cart'][$key]);				
                }else{
                    $_SESSION['cart'][$key]['cantitate']--;
                }
            }
        }
        //reset session array keys so they match with $product_ids numeric array
        $_SESSION['cart']=array_values($_SESSION['cart']);
    }
?>

    <!-- Main -->
    <div id="main-wrapper">
        <div id="main" class="container">
            <div id="content">

                <!-- Post -->
                <article class="box post">
                <article class="box post">
                <h2 class="title2">Continutl cosului de cumparaturi:</h3>

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
                        <th width="30%">Titlu</th>
                        <th width="10%">Cantitate</th>
                        <th width="13%">Pret/bucata</th>
                        <th width="10%">Pret total</th>
                        <th width="10%">Sterge</th>
                        <th width="3%"></th>
                        <th width="3%"></th>
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
                                    <td><?php echo number_format($value["cantitate"] * $value["pret"], 2)?> lei </td>
                                    <td><a href="Cos.php?action=delete&id=<?php echo $value["id"]; ?>"><span>Sterge</span></a></td>
                                    <td><a href="Cos.php?action=add&id=<?php echo $value["id"]; ?>"><span>+</span></a></td>
                                    <td><a href="Cos.php?action=remove&id=<?php echo $value["id"]; ?>"><span>-</span></a></td>
                                </tr>
                                <?php
                                    $total = $total + ($value["cantitate"] * $value["pret"]);
                            }
                                ?> 
                                <tr>
                                    <td colspan="3" > Total</td>
                                    <td> <?php echo number_format($total, 2);?> lei </td>
                                    <td></td>
                                </tr>

                    <?php
                        }
                     ?>
                </table> 
                </div>           
                </article>
				<a href="checkout.php" class="form-button-submit button icon"> CHECKOUT </a>
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