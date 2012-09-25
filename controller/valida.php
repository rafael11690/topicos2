<?php

include("core.php");

$login = $_POST['login'];
$senha = MD5($_POST['senha']);
$nome = con_db($login,$senha);

if (!$nome) {
	header('Location: login.php?ms=0');
	exit("0");
} else {
	logon($nome,$login,$senha);
	header('Location: content.php');
	exit("0");
}

?>
