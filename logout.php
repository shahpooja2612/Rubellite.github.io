
<?php
session_start();
unset($_SESSION['user']);
session_destroy();
header("Location: tp.php");

$cookie_name = '';
unset($_COOKIE[$cookie_name]);
// empty value and expiration one hour before
$res = setcookie($cookie_name, '', time() - 3600);
?>
