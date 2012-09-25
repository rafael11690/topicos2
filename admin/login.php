<?php

$id_msg = $_GET['ms'];

switch ($id_msg) {

	case '0':
		$msg = 'Login ou senha incorretos!';
		break;
	case '1':
		$msg = 'Você foi desconectado com sucesso!';
		break;
	case '2':
		$msg = 'Você não tem permissão para acessar essa página!';
		break;
	case '3':
		$msg = 'Erro ao acessar o sistema!';
		break;
	default:
		$msg = '&nbsp;';
		break;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script>
function form_focus() {
	document.forms['form1']['login'].focus();
}
</script>
</head>

<body onload="form_focus();">
<br /><br />
<div id="box">
	<form name="form1" action="valida.php" method="post" id="form_login">
		<br />
		<label>Usu&aacute;rio: </label><input type="text" name="login" value="fulano84" /><br /><br />
		<label>Senha: </label><input type="password" name="senha" value="123456" /><br /><br />
		<span><input type="submit" value="Entrar" id="btn_entrar" /><span><br /><br />
		<span id="msg"><?php echo $msg; ?></span>
	</form>
</div>
</body>
</html>
