<?php

include_once 'userDAO.php';

function logon ($login, $password) {
    $controller = new userDAO();
    $user = $controller->getUser($login, $password);

    start_session();
    $_SESSION['login'] = $user->getLogin();
    $_SESSION['privilege'] = $user->getPrivilege();
}

function logoff () {
        start_session();
        unset($_SESSION['login']);
        unset($_SESSION['privilege']);
	header('Location: ../admin/login.php?ms=1');
	exit("1");
}

function isLogged () {
    start_session();
    if (!isset($_SESSION['login'])) {
        header('Location: ../admin/login.php?ms=0');
        exit("0");
    } else {
        return $_SESSION['privilege'];
    }
}

?>
