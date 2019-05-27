<?php
$u_pwd = $_SERVER['PHP_AUTH_PW'];
$u_name = $_SERVER['PHP_AUTH_USER'];

$image = base64_encode(file_get_contents('../img/42.png'));

if($u_name == "zaz" && $u_pwd == "jaimelespetitsponeys")
{
	echo "<html><body>\nHello Zaz<br />\n<img src='data:image/png;base64,$image'>\n</body></html>\n";
}
else
{
	header('HTTP/1.0 401 Unauthorized');
	header("WWW-Authenticate: Basic realm=''Member area''");
	echo "<html><body>That area is accessible for members only</body></html>";
}
?>