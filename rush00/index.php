<!DOCTYPE html>
<html lang="en">
<head>
    <title>Yachtmen house</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<div id="container" class="ct">
    <header><div class="top-imp ttop1"</header>  
        <h1>YACHTMEN HOUSE</h1>

      <a class="cart-imp" href="/cart.php"><b>SHOPPING CART</b></a>    
      <a class="cart-pic-imp" href="/cart.php"><img class="small-pic-imp" src="/img/cart.png" alt="Shopping cart"></a>
      <a class="login-imp" href="/login.php"><b>SIGN IN / SIGN UP</b></a>

    </div>            

    <div class="canter">
        <div class="col_menu_0 left-frame-imp">
            
            <p><a class="chapter-imp" href="/index.php"><h1>HOME PAGE<h1></a></p>
            <p><a href="index.php"><img class="small-pic-imp" src="img/anchor.png" alt="Anchor picture"></a></p>
<?php
$catIdPlace = 0; //remade!
include "rem.php";
include "create.php";
include "rename.php";
if (($idFile = fopen("categorys.csv", "r")) !== FALSE)
{
	while (($txt = fgetcsv($idFile, $catIdPlace, ";")) !== FALSE)
	{
		if (isset($txt) && isset($txt[$catIdPlace]))
        {   
            print"<ul>";
			print "\t\t\t<a href=\"/catss.php?cat_id=".$txt[$catIdPlace]."\">"."<li>".$txt[1]."</li>"."</a>\n";
            print"</ul>";
        }
	}
	fclose($idFile);
}
?>
<!-- START: Weather forecast-->
<div id="container">
<p><div id="cont_7e70e0eaf2bb5aaff2fbc1925166a1f4"><script type="text/javascript" async src="https://www.theweather.com/wid_loader/7e70e0eaf2bb5aaff2fbc1925166a1f4"></script></div>
</div></p></div>
<!-- END: Weather forecast-->
<div class="glavn_str">
            <p><h3 class="chapter-imp">!!! HOT SALES !!!</h3></p>
<?php
$itemIdPlace = 0; //remade!
if (($idFile = fopen("itm.csv", "r")) !== FALSE)  //remade!
{
	$i = 6;
    while (($txt = fgetcsv($idFile, $itemIdPlace, ";")) !== FALSE)
    {
        if (($txt[1] === "4" || if_cat($txt[1], "4") === 1) && $i > 0)
        {
            print "<aside>\n<div class=\"tovar_one\">\n<img src=\"img/items/".$txt[5]."\">";
            print "<h2><a href=\"/my_item.php?item_id=".$txt[$itemIdPlace]."\">".$txt[2]."</a></h2>";
            print "<p class=\"price\">".$txt[3]." $</p>\n<input type=\"button\" class=\"btn-imp\" value=\"Order!\">";
            print "<p class=\"desc\">".$txt[4]."</p>";
            print "</div>";
            print "<aside>";
			$i = $i - 1;
        }
    }
	fclose($idFile);
}
?>

<h3 class="chapter-imp" class="clear lower" >CATALOGUE:</h3>
<?php
$catIdPlace = 0; 
if (($idFile = fopen("categorys.csv", "r")) !== FALSE) 
{
	while (($txt = fgetcsv($idFile, $catIdPlace, ";")) !== FALSE)
	{
		if (isset($txt) && isset($txt[$catIdPlace]))
		{
            print "<article>\n<div class=\"my_lists\">\n<img src=\"img/cats/";
			print $txt[3]."\">\n<h4><p><a href=\"/catss.php?cat_id=".$txt[$catIdPlace]."\">".$txt[1]."</a></p></h4>\n<p class=\"desc\">";
			print $txt[2]."</p>\n</div>\n</article>";

		}
	}
	fclose($idFile);
}
?>

    <!--  Contacts and additional link to shopping cart: -->
        </div>
        <div class="bottm"></div>
    </div>
   <footer><p><div class="bottom-imp"><i>Contact us:&nbsp;&nbsp;mbiliaie@student.unit.ua  &nbsp;&nbsp;&nbsp;&nbsp; +38 (095) 272-90-49 <a class="cart" href="/cart.php" title="cart" alt=cart><b>SHOPPING CART<a></i> </b></div></p></footer>
</div>

</body>
</html>