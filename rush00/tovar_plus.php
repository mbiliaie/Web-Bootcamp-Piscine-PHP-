<?php
include "rem.php";
include "create.php";
include "rename.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add new item - Admin Panel</title>
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
            <p><a class="chapter-imp" href="/index.php"><h1>HOME PAGE<h1></a></p>
             <p><a href="a_cattss.php" class="a_m">Categories</a></p>
             <p><a href="cat_plus.php" class="ccrd">+add new</a></p>
             <p><a href="tovary_adm.php?cat_id=all" class="a_m">Items</a></p>
             <p><a href="tovar_plus.php" class="tvr0">+add new</a></p>
            <p><a href="a_print_user.php" class="a_m">Users</a></p>
             <p><a href="#" class="chuvak">+add new</a></p>
             <p></p>
             <!-- START: Weather forecast-->
<p><div id="cont_7e70e0eaf2bb5aaff2fbc1925166a1f4"><script type="text/javascript" async src="https://www.theweather.com/wid_loader/7e70e0eaf2bb5aaff2fbc1925166a1f4"></script></div></p><br />
<!-- END: Weather forecast-->

<!--  START: Exchanger --><p><script language="JavaScript" type="text/javascript" src="http://exchanger.md/main/curs/197/ffffff/ffffff/en"></script><noscript><a href="http://exchanger.md" target="_blank"><strong>exchanger.md</strong></a>
</noscript></p>
<!--  END: Exchanger -->
        </div>
        <div class="glavn_str">
            <h3>Add new item</h3>
            <div class="add">
<?php
$up_dir = "\MAMP\htdocs\img\items\\";
if ($_GET["new"])
{
    $up_file = $up_dir.basename($_FILES["image"]["name"]); 
    $cat_ids = $_POST['cat'];
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $up_file) && !empty($_POST["tovar_one_name"]) && !empty($_POST["descr"]) && !empty($cat_ids)) // OK!
    {
        // <Categorys is maker
        $n = count($cat_ids);
        for($i=0; $i < $n; $i++)
        {
            if ($i + 1 != $n)
                $new_cat_ids .= $cat_ids[$i].":#:";
            else
                $new_cat_ids .= $cat_ids[$i];
        }
        // Category is maker>

        $i_name = preg_replace("/\r\n/", "<br>", $_POST["tovar_one_name"]);
        $descr = preg_replace("/\r\n/", "<br>", $_POST["descr"]);
        $price = intval($_POST["tovar_one_price"]);
        $str = $new_cat_ids.";".$i_name.";".$price.";".$descr.";".$_FILES["image"]["name"];
        add_str("/itm.csv", "$str");
        echo "<p style='color: #173; font-weight: bold;'>A new category has been added, you can to add another category:</p>\n";
    }
    else if ($_FILES["image"]["error"] === 2) // error
        echo "<p style='color: #a46; font-weight: bold;'>!!!The picture is too large, the image size should be no more 0.5Mb!!!</p>\n";
    else // error
        echo "<p style='color: #a46; font-weight: bold;'>You must to fill all fields!</p>\n";
}
?>
                <form enctype="multipart/form-data" action="/tovar_plus.php?new=true" method="POST">
                    <input type="hidden" name="MAX_FILE_SIZE" value="512000">
                    <p>Please select a picture to new category (up to 0.5Mb):
                    <input name="image" type="file" accept=".jpg, .jpeg, .png, .gif" class="btt2"></p>
                    <p>Item name: <input type="text" name="tovar_one_name" class="inp" style="margin-left: 49px;"></p>
                    <p>Item description: <textarea rows="3" cols="55" name="descr" class="inp"></textarea></p>
                    <p>Item price: <input type="text" name="tovar_one_price" class="inp" style="margin-left: 49px;"> $</p>
                    <p>Select a category/s:</p>
<?php
if (($fd = fopen("categorys.csv", "r")) !== FALSE)
{
    while (($arr = fgetcsv($fd, 0, ";")) !== FALSE)
    {
        if (isset($arr) && isset($arr[0]))
            echo "\t\t\t\t\t<p><input type=\"checkbox\" name=\"cat[]\" value=\"".$arr[0]."\"> ".$arr[1]."</p>\n";
    }
    fclose($fd);
}
?>
                    <p><input type="submit" value="Add category" class="btt"></p>
                </form>
                                 </div>
            </div>
            <article class="waves-imp"><p><i>SATISFIED CUSTOMERS - THE BIGGEST PLEASURE FOR US!</i></p></article>
            <div><p><a href="index.php"><img class="image-border-imp-med img-pad-imp" src="https://i.imgur.com/ZetDmWD.jpg" title="Sailor girl" alt="Sailor girl"></a></p></div>
            
   <footer><p><div class="bottom-imp"><i>Contact us:&nbsp;&nbsp;mbiliaie@student.unit.ua  &nbsp;&nbsp;&nbsp;&nbsp; +38 (095) 272-90-49 <a class="cart" href="cart.php" title="cart" alt=cart><b>SHOPPING CART<a></i> </b></div></p></footer>
</div>

</body>
</html>