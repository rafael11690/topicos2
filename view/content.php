<?php

include("core.php");
isLogged();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Conteúdo</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<?php echo $_COOKIE['user']; ?> você foi logado com sucesso!<br>
<a href="logoff.php">Sair</a>
</body>
</html>
