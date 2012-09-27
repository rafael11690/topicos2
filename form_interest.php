<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/topicos2/settings.php';
include_once _URL . 'controller/core.php';
include_once _URL . 'controller/cityDAO.php';
include_once _URL . 'controller/packageDAO.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="template/style.css" rel="stylesheet" type="text/css" />
        <script src="template/valida.js" type="text/javascript"></script>
        <title>Aoba's Tur</title><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <div id="wrapper">
            <div id="sidebar">
                <ul>
                    <li class="title">Cidades</li>
                    <?php
                    $controller = new cityDAO();
                    $cities = $controller->getCities(0, 30);
                    foreach ($cities as $key => $value) :
                        ?>
                        <li><a href="index.php?city=<?php echo $cities[$key]->getIdCity(); ?>"><?php echo $cities[$key]->getName(); ?></a></li>
                    <?php endforeach; ?>
                    <li><a href="index.php">Todos os pacotes</a></li>
                </ul>
            </div>
            <div id="content">
                <?php
                $controller2 = new packageDAO();
                $package = $controller2->getPackageById($_GET['package']);

                $controller3 = new cityDAO();
                $city = $controller3->getCityById($package->getIdCity());
                ?>
                <h3>Reserva de pacote</h3>
                <form name="form_interest" method="POST" action="insert.php">
                    <table id="form_interest">
                        <tr>
                            <td class="col_left">Pacote:</td>
                            <td><?php echo $package->getName(); ?></td>
                        </tr>
                        <tr>
                            <td class="col_left">Cidade:</td>
                            <td><?php echo $city->getName(); ?></td>
                        </tr>
                        <tr>
                            <td class="col_left">Preço:</td>
                            <td <?php if ($package->getPricePromo()) echo 'class="old_price"'; ?>><?php echo $package->getPrice(); ?></td>
                        </tr>
                        <?php if ($package->getPricePromo()) : ?>
                            <tr>
                                <td class="col_left">Preço promocional:</td>
                                <td><?php echo $package->getPricePromo(); ?></td>
                            </tr>
                        <?php endif; ?>
                        <tr>
                            <td class="col_left">Data partida:</td>
                            <td><?php echo $package->getDateStart(); ?></td>
                        </tr>
                        <tr>
                            <td class="col_left">Data retorno:</td>
                            <td><?php echo $package->getDateEnd(); ?></td>
                        </tr>
                        <tr>
                            <td class="col_left">Nome:</td>
                            <td><input type="text" name="first_name" onblur="reset_color(this);" /></td>
                        </tr>
                        <tr>
                            <td class="col_left">Sobrenome:</td>
                            <td><input type="text" name="last_name" onblur="reset_color(this);" /></td>
                        </tr>
                        <tr>
                            <td class="col_left">Quantidade<br />de hóspedes:</td>
                            <td>
                                <select name="guests_number">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="col_left">Quantidade de quartos<br />para casal:</td>
                            <td>
                                <select name="couple_room">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="col_left">Quantidade de quartos<br />individuais:</td>
                            <td>
                                <select name="individual_room">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="col_left">Quantidade de quartos<br />para 2 pessoas:</td>
                            <td>
                                <select name="double_room">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="col_left">Quantidade de quartos<br />para 3 pessoas:</td>
                            <td>
                                <select name="triple_room">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="col_left">E-mail:</td>
                            <td><input type="text" name="email" onblur="reset_color(this);" /></td>
                        </tr>
                        <tr>
                            <td class="col_left">Telefone:</td>
                            <td>
                                <input type="text" name="area_code" size="3" maxlength="2" onblur="reset_color(this);" />
                                <input type="text" name="phone" maxlength="8" onblur="reset_color(this);" />
                            </td>
                        </tr>
                        <tr>
                            <td class="col_left">Observação:</td>
                            <td><textarea name="observation" rows="5" cols="40"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label>
                                    <input type="checkbox" name="newsletter" value="1" />
                                    Deseja receber e-mail promocionais?
                                </label>
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" value="<?php echo $package->getIdPackage(); ?>" name="id_package" />
                    <input type="button" value="  Enviar  " onclick="valida_form(); return false;" />
                </form>
            </div>
        </div>
    </body>
</html>
