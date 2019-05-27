<?php
include "rem.php";
include "create.php";
include "rename.php";
$cat_id = $_GET["cat_id"];
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
    <header><div class="top-imp ttop1">
      <p><a href="index.php"><h1>YACHTMEN HOUSE</h1></a></p>
      <div><h3><i><a class="cart login-imp" href="cart.php" title="cart" alt=cart><b>SIGN UP / SIGN IN<a></i> </b></h3></div><header>
    </div>
    <div class="canter">
        <div class="col_menu_0 left-frame-imp">
<ol><!--style="padding-left: 10px"-->
        <p><a class="chapter-imp" href="/index.php"><h1>HOME PAGE<h1></a></p>
         <p><a href="index.php"><img class="small-pic-imp" src="img/anchor.png" alt="Anchor picture"></a></p>
         <li><a href="a_cattss.php" class="a_m">Categories</a></li>
          <a href="cat_plus.php" class="ccrd">+add new</a>
         <li><a href="tovary_adm.php?cat_id=all" class="a_m">Items</a></li>
         <a href="tovar_plus.php" class="tvr0">+add new</a>
         <li><a href="a_print_user.php" class="a_m">Users</a></li>
         <a href="#" class="chuvak">+add new</a>
         <li></li> 
        </ol>
        <!-- START: Weather forecast-->
<p><div id="cont_7e70e0eaf2bb5aaff2fbc1925166a1f4"><script type="text/javascript" async src="https://www.theweather.com/wid_loader/7e70e0eaf2bb5aaff2fbc1925166a1f4"></script></div></p><br />
<!-- END: Weather forecast-->

<!--  START: Exchanger --><p><script language="JavaScript" type="text/javascript" src="http://exchanger.md/main/curs/197/ffffff/ffffff/en"></script><noscript><a href="http://exchanger.md" target="_blank"><strong>exchanger.md</strong></a>
</noscript></p>
<!--  END: Exchanger -->
        </div>
        <div class="glavn_str">
            <h3>Add new category</h3>
            <div class="add">
<?php

if ($_GET["rem"] && ($fd = fopen("categorys.csv", "r")) !== FALSE)
{
    ini_set('auto_detect_line_endings', TRUE);
    while (($arr = fgetcsv($fd, 0, ";")) !== FALSE)
    {
        if ($arr[0] === $cat_id)
            $img_name = $arr[3];
    }
fclose($fd);
}

$up_dir = "\MAMP\htdocs\img\cats\\";
if ($_GET["rem"])
{
    $up_file = $up_dir.basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $up_file) && !empty($_POST["cat_name"]) && !empty($_POST["descr"])) // OK!
    {
        unlink("img/cats/".$img_name);
        $descr = preg_replace("/\r\n/", "<br>", $_POST["descr"]);
        $c_name = preg_replace("/\r\n/", "<br>", $_POST["cat_name"]);
        $str = $cat_id.";".$c_name.";".$descr.";".$_FILES["image"]["name"];
        edit_str("/categorys.csv", "$str", $cat_id);
        echo "<p style='color: #173; font-weight: bold;'>Category has been edited!</p>\n";
    }
    else if ($_FILES["image"]["error"] === 2) // error
        echo "<p style='color: #a46; font-weight: bold;'>!!!The picture is too large, the image size should be no more 0.5Mb!!!</p>\n";
    else if (!move_uploaded_file($_FILES["image"]["tmp_name"], $up_file) && !empty($_POST["cat_name"]) && !empty($_POST["descr"])) // error
    {
        // unlink("img/cats/".$img_name);
        $descr = preg_replace("/\r\n/", "<br>", $_POST["descr"]);
        $c_name = preg_replace("/\r\n/", "<br>", $_POST["cat_name"]);
        $str = $cat_id.";".$c_name.";".$descr.";".$img_name;
        edit_str("/categorys.csv", "$str", $cat_id);
        echo "<p style='color: #173; font-weight: bold;'>Category has been edited!</p>\n";
    }
    else // error
        echo "<p style='color: #a46; font-weight: bold;'>You must to fill all fields!</p>\n";
}

if (($fd = fopen("categorys.csv", "r")) !== FALSE) 
{
    ini_set('auto_detect_line_endings', TRUE);
    while (($arr = fgetcsv($fd, 0, ";")) !== FALSE)
    {
        if ($arr[0] === $cat_id)
            $cat_find = $arr;
    }
fclose($fd);
}
$cat_find[2] = preg_replace("/<br>/", "\r\n", $cat_find[2]);

?>
<form enctype="multipart/form-data" action="/edit_category.php?cat_id=<?php echo $cat_find[0]; ?>&rem=true" method="POST">
    <img src="/img/cats/<?php echo $cat_find[3]; ?>" class="id_img" alt="">
    <input type="hidden" name="MAX_FILE_SIZE" value="512000">
    <p>You can select a new picture of category (up to 0.5Mb):
    <input name="image" type="file" accept=".jpg, .jpeg, .png, .gif" class="btt2"></p>
    <p>Category name: <input type="text" name="cat_name" class="inp" style="margin-left: 49px;" value="<?php echo $cat_find[1]; ?>"></p>
    <p>Category description: <textarea rows="3" cols="55" name="descr" class="inp"><?php echo $cat_find[2]; ?></textarea></p>
    <p><input type="submit" value="Edit it!" class="btt"></p>
</form>
            </div>
        </div>
       <p><article><p><i>DREAM BIG, WORK HARD, MAKE IT HAPPEN...</i></p></article></p>

    </div>        <p><a href="index.php"><img class="image-border-imp img-pad-imp" src="https://i.imgur.com/hmTGWIg.jpg" title="Sailor girl 2" alt="Sailor girl"></a></p>
        <div class="bottm"></div>
   <footer><p><div class="bottom-imp"><i>Contact us:&nbsp;&nbsp;mbiliaie@student.unit.ua  &nbsp;&nbsp;&nbsp;&nbsp; +38 (095) 272-90-49 <a class="cart" href="cart.php" title="cart" alt=cart><b>SHOPPING CART<a></i> </b></div></p></footer>

</body>
</html>