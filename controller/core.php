<?php

include("settings.inc");

function con_db ($login, $senha) {
	$con = mysql_connect($GLOBALS['urlDB'],$GLOBALS['userDB'],$GLOBALS['passwordDB']);
	if (!$con) {
		header('Location: login.php?ms=3');
		exit("3");
	}

	$db = mysql_select_db("tp3", $con);

	$query = 'SELECT nome FROM usuario WHERE login ="'.$login.'" AND senha = "'.$senha.'"';
	$result = mysql_query($query);

	if (!$result) {
		return null;
	} else {
		$r = mysql_fetch_assoc($result);
		return $r['nome'];
	}
}

function logon ($nome) {
	$time = time()+3600;
	setcookie("user", $nome, $time);
}

function logoff () {
	$time = time()-3600;
	setcookie("user", "", $time);
	header('Location: login.php?ms=1');
	exit("1");
}

function isLogged () {
	if (!$_COOKIE['user']) {
		header('Location: login.php?ms=2');
		exit("2");
	}
}

?>
