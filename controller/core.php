<?php

include_once 'userDAO.php';

function logon($login, $password) {
    $controller = new userDAO();
    $user = $controller->getUser($login, $password);

    session_start();
    $_SESSION['login'] = $user->getLogin();
    $_SESSION['privilege'] = $user->getPrivilege();
    
    header('Location: ../admin/view/packages.php');
}

function logoff() {
    session_start();
    unset($_SESSION['login']);
    unset($_SESSION['privilege']);
    header('Location: ../admin/login.php?ms=1');
    exit("1");
}

function isLogged() {
    session_start();
    if (!isset($_SESSION['login'])) {
        header('Location: ../admin/login.php?ms=0');
        exit("0");
    } else {
        return $_SESSION['privilege'];
    }
}

function getMenuAdmin($privilege) {
    echo '<ul>';
    if ($privilege == 0) {
        echo '<li><a href="#">Pacotes</a></li>
              <li><a href="#">Cidades</a></li>';
    }
    echo '<li><a href="#">Galeria</a></li>
          <li><a href="#">Reservas</a></li>
          </ul>';
}

?>
