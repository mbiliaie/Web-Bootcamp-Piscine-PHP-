<?php
include "rem.php";
include "create.php";
include "rename.php";
if (($fd = fopen("categorys.csv", "r")) !== FALSE)
{

    while (($arr = fgetcsv($fd, 0, ";")) !== FALSE)
    {
        if ($arr[0] === $_GET["cat_id"])
        {
            $categ_name = $arr[1];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php print $categ_name?> - Yachtmen house</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<--! HEEEEEELP!!!!!!!!!!!!! -->

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
if (($fd = fopen("categorys.csv", "r")) !== FALSE)
{
    while (($arr = fgetcsv($fd, 0, ";")) !== FALSE)
    {
        if (isset($arr) && isset($arr[0]))
        {
            print"<ul>";
            print "\t\t\t"."<a href=\"/catss.php?cat_id=".$arr[0]."\">"."<li>".$arr[1]."</li>"."</a>"."\n";
            print"</ul>";
        }
    }
    fclose($fd);
}
?>
<!-- START: Weather forecast-->
<p><div id="cont_7e70e0eaf2bb5aaff2fbc1925166a1f4"><script type="text/javascript" async src="https://www.theweather.com/wid_loader/7e70e0eaf2bb5aaff2fbc1925166a1f4"></script></div></p><br />
<!-- END: Weather forecast-->

<!--  START: Exchanger --><p><script language="JavaScript" type="text/javascript" src="http://exchanger.md/main/curs/197/ffffff/ffffff/en"></script><noscript><a href="http://exchanger.md" target="_blank"><strong>exchanger.md</strong></a>
</noscript></p>
<!--  END: Exchanger -->

        </div>
        <div class="glavn_str">
            <p><h3><?php print $categ_name?></h3></p>
<?php
if (($fd = fopen("itm.csv", "r")) !== FALSE) 
{
    while (($arr = fgetcsv($fd, 0, ";")) !== FALSE)
    {
        if ($arr[1] === $_GET["cat_id"] || if_cat($arr[1], $_GET["cat_id"]) === 1)
        {
            print "<div class=\"tovar_one\">";
            print "<img src=\"img/items/".$arr[5]."\">\n<h2><a href=\"/my_item.php?item_id=".$arr[0]."\">".$arr[2]."</a></h2>";
            print "<p class=\"price\">".$arr[3]." $</p>\n<input type=\"button\" class=\"btn-imp\" value=\"Order!\">\n<p class=\"desc\">".$arr[4]."</p>";
            print "</div>";
        }
    }
	fclose($fd);
}
?>
            </div>
        <div class="bottm"></div>
    </div>
    <!--  Contacts and additional link to shopping cart: -->
   <footer><p><div class="bottom-imp"><i>Contact us:&nbsp;&nbsp;mbiliaie@student.unit.ua  &nbsp;&nbsp;&nbsp;&nbsp; +38 (095) 272-90-49 <a class="cart" href="cart.php" title="cart" alt=cart><b>SHOPPING CART<a></i> </b></div></p></footer>
</div>
</div>
</body>
</html>