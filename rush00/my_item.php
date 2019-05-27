<?php
if (($fd = fopen("itm.csv", "r")) !== FALSE)
{
	while (($arr = fgetcsv($fd, 0, ";")) !== FALSE)
	{
        if ($arr[0] === $_GET["item_id"])
        {
            $item = $arr;
        }
	}
	fclose($fd);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php print $item[2] ?> - Yachtmen house</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<!--  The name of the shop leads to HOME PAGE. Rework the format of main title!!! -->
<div id="container" class="ct">
    <header><div class="top-imp ttop1">
      <p><a href="index.php"><h1 >YACHTMEN HOUSE</h1></a></p>
      <div><h3><i><a class="cart login-imp" href="cart.php" title="cart" alt=cart><b>SIGN UP / SIGN IN<a></i> </b></h3></div><header>
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
<?php

            print "<h3>".$item[2]."</h3>";
			print "<div class=\"tovar_one_page\">\n<p class=\"desc\">\n<b>Details: <b/><br />".$item[4]."</p>\n<img src=\"img/items/".$item[5]."\">\n<p class=\"price\">";
			print "Price: ".$item[3]."$</p>";
?>
                <input type="button" class="btn-imp" value="Order!">
                <div class="bottm"></div>
            </div>
            </div>
    <!-- Informtation about delivery and payment terms: -->
    <article>
        <table class="terms-imp">
        <td width="700px" height="50" s><p><h4> <i>Delivery terms: free shipping, post payment 10 days, additional discount after 2000 $ in your invoice. <p> Please contact administration for details </i></h4></p></td>
    </table>
    </article>

        <div class="bottm"></div>
    </div>
    <!--  Contacts and additional link to shopping cart: -->
   <footer><p><div class="bottom-imp"><i>Contact us:&nbsp;&nbsp;mbiliaie@student.unit.ua  &nbsp;&nbsp;&nbsp;&nbsp; +38 (095) 272-90-49 <a class="cart" href="cart.php" title="cart" alt=cart><b>SHOPPING CART<a></i> </b></div></p></footer>
</div>

</body>
</html>