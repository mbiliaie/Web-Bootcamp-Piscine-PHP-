<?php
include "rem.php";
include "create.php";
include "rename.php";
$rem_id = $_GET["rem_id"];
if (is_numeric($rem_id))
{
    remove_id("/user.csv", $rem_id);
    header("Location: /a_print_user.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Users - Admin Panel</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<div id="container" class="ct">
    <header><div class="top-imp ttop1">
      <p><a href="index.php"><h1 >YACHTMEN HOUSE</h1></a></p>
      <div><h3><i><a class="cart login-imp" href="cart.php" title="cart" alt=cart><b>SIGN UP / SIGN IN<a></i> </b></h3></div><header>
    </div>
    <div class="canter">
        <div class="left-frame-imp col_menu_0">
            
            <p><a class="chapter-imp" href="/index.php"><h1>HOME PAGE<h1></a></p>
            <p><a href="index.php"><img class="small-pic-imp" src="img/anchor.png" alt="Anchor picture"></a></p>
            <a href="a_cattss.php" class="a_m">Categories</a>
            <a href="cat_plus.php" class="ccrd">+add new</a>
            <a href="tovary_adm.php?cat_id=all" class="a_m">Items</a>
            <a href="tovar_plus.php" class="tvr0">+add new</a>
            <a href="a_print_user.php" class="a_m">Users</a>
            <a href="#" class="chuvak">+add new</a>
            

<!-- START: Weather forecast-->
<p><div id="cont_7e70e0eaf2bb5aaff2fbc1925166a1f4"><script type="text/javascript" async src="https://www.theweather.com/wid_loader/7e70e0eaf2bb5aaff2fbc1925166a1f4"></script></div></p><br />
<!-- END: Weather forecast-->

<!--  START: Exchanger --><p><script language="JavaScript" type="text/javascript" src="http://exchanger.md/main/curs/197/ffffff/ffffff/en"></script><noscript><a href="http://exchanger.md" target="_blank"><strong>exchanger.md</strong></a>
</noscript></p>
<!--  END: Exchanger -->
            
        </div>
        <div class="glavn_str">
            <h3>Users administration</h3>
<?php
if (($fd = fopen("user.csv", "r")) !== FALSE) 
{
    $i = 1;
    while (($arr = fgetcsv($fd, 0, ";")) !== FALSE)
    {
        if (isset($arr) && isset($arr[0]))
        {
            echo "\n\t<div class=\"cat_list\">\n
                \t\t<p>".$i++.".</p>\n
                \t\t<a href=\"#\" class=\"tovar_one_l\">".$arr[1]."</a>\n
                \t\t<span>[".$arr[3]."]</span>\n
                \t\t<a href=\"".$_SERVER['REQUEST_URI']."?rem_id=".$arr[0]."\"><img src=\"img/adm/remove.png\" alt=\"Remove\" class=\"pic\"></a>\n
                \t\t<a href=\"#\"><img src=\"img/adm/edit.png\" alt=\"Edit\" class=\"pic\"></a>\n
                \t</div>";
        }
    }
    fclose($fd);
}
?>
 <article class="waves-imp"><p><i> HELLO <span style="text-decoration:line-through">SAILOR</span> SWIMMER! SO U WERE BORN 2 <span style="text-decoration:line-through">SAIL</span> CODE, WEREN'T U?</i></p></article>
<div><p><a href="index.php"><img class="image-border-imp-med" src="https://i.imgur.com/OsggviQ.png" title="Sailor girl 1" alt="Sailor girl"></a></p></div>

            </div>
        <div class="bottm"></div>
    </div>
   <footer><p><div class="bottom-imp"><i>Contact us:&nbsp;&nbsp;mbiliaie@student.unit.ua  &nbsp;&nbsp;&nbsp;&nbsp; +38 (095) 272-90-49 <a class="cart" href="cart.php" title="cart" alt=cart><b>SHOPPING CART<a></i> </b></div></p></footer>
</div>

</body>
</html>