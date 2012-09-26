<?php

include_once '../controller/core.php';

$login = $_POST['login'];
$password = $_POST['password'];

logon($login, $password);

?>
