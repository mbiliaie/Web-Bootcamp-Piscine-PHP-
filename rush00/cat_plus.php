<?php
include "rem.php";
include "create.php";
include "rename.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add new category - Admin Panel</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<div id="container" class="ct">
    <header><div class="header top-imp">
      <p><a href="index.php"><h1 >YACHTMEN HOUSE</h1></a></p>
      <div><h3><i><a class="cart" href="cart.php" title="cart" alt=cart><b>SIGN UP / SIGN IN<a></i> </b></h3></div><header>
    </div>
    <div class="canter">
        <div class="col_menu_0 left-frame-imp">
            <p><a class="chapter-imp" href="/index.php"><h1>HOME PAGE<h1></a></p>
            <p><a href="index.php"><img class="small-pic-imp" src="img/anchor.png" alt="Anchor picture"></a></p>
            <a href="a_cattss.php" class="a_m">Categories</a>
            <a href="cat_plus.php" class="ccrd">+add new</a>
            <a href="tovary_adm.php?cat_id=all" class="a_m">Items</a>
            <a href="tovar_plus.php" class="tvr0">+add new</a>
            <a href="a_print_user.php" class="a_m">Users</a>
            <a href="#" class="chuvak">+add new</a>
            
        </div>
        <div class="glavn_str">
            <h3>Add new category</h3>
            <div class="add">
<?php

$up_dir = "\MAMP\htdocs\img\cats\\"; 
if ($_GET["new"])
{
    $up_file = $up_dir.basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $up_file) && !empty($_POST["cat_name"]) && !empty($_POST["descr"])) // OK!
    {
        $descr = preg_replace("/\r\n/", "<br>", $_POST["descr"]);
        $c_name = preg_replace("/\r\n/", "<br>", $_POST["cat_name"]);
        $str = $c_name.";".$descr.";".$_FILES["image"]["name"];
        add_str("/categorys.csv", "$str");
        print "<p style='color: #173; font-weight: bold;'>A new category has been added, you can to add another category:</p>\n";
    }
    else if ($_FILES["image"]["error"] === 2) // error
        print "<p style='color: #a46; font-weight: bold;'>!!!The picture is too large, the image size should be no more 0.5Mb!!!</p>\n";
    else // error
        print "<p style='color: #a46; font-weight: bold;'>You must to fill all fields!</p>\n";
}
?>

<div><p><a href="index.php"><img class="image-border-imp" src="https://i.imgur.com/2plc5fn.jpg" title="Sailor girl 1" alt="Sailor girl"></a></p></div>
<article class="waves-imp"><p><i>WE DO AMAZE!</i></p></article>

                <form enctype="multipart/form-data" action="/cat_plus.php?new=true" method="POST">
                    <input type="hidden" name="MAX_FILE_SIZE" value="512000">
                    <p>Please select a picture to new category (up to 0.5Mb):
                    <input name="image" type="file" accept=".jpg, .jpeg, .png, .gif" class="btt2"></p>
                    <p>Category name: <input type="text" name="cat_name" class="inp" style="margin-left: 49px;"></p>
                    <p>Category description: <textarea rows="3" cols="55" name="descr" class="inp"></textarea></p>
                    <p><input type="submit" value="Add category" class="btt"></p>
                </form>
            </div>
        </div>
        <div class="bottm"></div>
    </div>
   <footer><p><div class="bottom-imp"><i>Contact us:&nbsp;&nbsp;mbiliaie@student.unit.ua  &nbsp;&nbsp;&nbsp;&nbsp; +38 (095) 272-90-49 <a class="cart" href="cart.php" title="cart" alt=cart><b>SHOPPING CART<a></i> </b></div></p></footer>
</div>

</body>
</html>