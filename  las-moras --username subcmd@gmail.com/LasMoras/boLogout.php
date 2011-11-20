<?PHP

session_start();
session_destroy();

header ("Location: boLogin.php");
?>