<?php
include "rem.php";
include "create.php";
include "rename.php";
$cat_id = $_GET["cat_id"];
$rem_id = $_GET["rem_id"];
$cat_name = "All items";
if (is_numeric($rem_id))
{
    remove_id("/itm.csv", $rem_id);
    header("Location: ".preg_replace("/(.*)&[^&]*/", "$1", $_SERVER['REQUEST_URI']));
}
if (($fd = fopen("categorys.csv", "r")) !== FALSE) 
{
    while (($arr = fgetcsv($fd, 0, ";")) !== FALSE)
    {
        if (isset($arr) && isset($arr[0]) && $arr[0] === $_GET["cat_id"] && $cat_id != "all")
            $cat_name = "tovar_ones from \"".$arr[1]."\" category";
    }
    fclose($fd);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php print $cat_name; ?> - Admin Panel</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<div id="container" class="ct">
    <header><div class="top-imp ttop1">
      <p><a href="index.php"><h1>YACHTMEN HOUSE</h1></a></p>
      <div><h3><i><a class="cart login-imp" href="cart.php" title="cart" alt=cart><b>SIGN UP / SIGN IN<a></i> </b></h3></div><header>
    </div>

    <div class="canter">
        <div class="left-frame-imp col_menu_0">
            <a class="chapter-imp" href="/index.php">HOME PAGE</a>
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
            <h3><?php print $cat_name; ?></h3>
<?php
if (($fd = fopen("itm.csv", "r")) !== FALSE)
{
    $i = 1;
    while (($arr = fgetcsv($fd, 0, ";")) !== FALSE)
    {
        if ($arr[1] === $cat_id || if_cat($arr[1], $cat_id) === 1)
        {
            print "\n\t<div class=\"cat_list\">\n
                \t\t<p>".$i++.".</p>\n
                \t\t<img src=\"img/items/".$arr[5]."\">\n
                \t\t<a href=\"#\" class=\"tovar_one_l\">".$arr[2]."</a>\n
                \t\t<a href=\"".$_SERVER['REQUEST_URI']."&rem_id=".$arr[0]."\"><img src=\"img/adm/remove.png\" alt=\"Remove\" class=\"pic\"></a>\n
                \t\t<a href=\"#\"><img src=\"img/adm/edit.png\" alt=\"Edit\" class=\"pic\"></a>\n
                \t</div>";
        }
        else if ($cat_id === "all" && isset($arr[0]) && is_numeric($arr[0]))
        {
            print "\n\t<div class=\"cat_list\">\n
                \t\t<p>".$i++.".</p>\n
                \t\t<img src=\"img/items/".$arr[5]."\">\n
                \t\t<a href=\"#\" class=\"tovar_one_l\">".$arr[2]."</a>\n
                \t\t<a href=\"".$_SERVER['REQUEST_URI']."&rem_id=".$arr[0]."\"><img src=\"img/adm/remove.png\" alt=\"Remove\" class=\"pic\"></a>\n
                \t\t<a href=\"#\"><img src=\"img/adm/edit.png\" alt=\"Edit\" class=\"pic\"></a>\n
                \t</div>";
        }
        
        
    }
    fclose($fd);
}
?>
 <article class="waves-imp"><p><i>SOME THINGS LOOK JUST FINE BUT OURS ARE TRULY IMPRESSIVE!</i></p></article>
<div><p><a href="index.php"><img class="image-border-imp-med" src="https://i.imgur.com/O50YVeU.jpg" title="Sailor girl" alt="Sailor girl"></a></p></div>
         

            </div>
        <div class="bottm"></div>
    </div>
   <footer><p><div class="bottom-imp"><i>Contact us:&nbsp;&nbsp;mbiliaie@student.unit.ua  &nbsp;&nbsp;&nbsp;&nbsp; +38 (095) 272-90-49 <a class="cart" href="cart.php" title="cart" alt=cart><b>SHOPPING CART<a></i> </b></div></p></footer>
</div>

</body>
</html>