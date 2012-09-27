<?php

include_once 'userDAO.php';

function logon($login, $password) {
    $controller = new userDAO();
    $user = $controller->getUser($login, $password);

    if ($user) {
        session_start();
        $_SESSION['login'] = $user->getLogin();
        $_SESSION['privilege'] = $user->getPrivilege();
        
        header('Location: ../admin/view/reserve/reserve.php');
    } else {
        header('Location: ../admin/login.php?ms=0');
        exit("0");
    }
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
        echo '<li><a href="' . _HTTP . 'admin/view/packages/packages.php">Pacotes</a></li>
              <li><a href="' . _HTTP . 'admin/view/city/city.php">Cidades</a></li>';
    }
    echo '<li><a href="' . _HTTP . 'admin/view/reserve/reserve.php">Reservas</a></li>
          </ul>';
}

?>
