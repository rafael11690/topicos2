<?php

include_once $MODEL . 'edital.php';
include_once 'bd.php';

class editalDAO {

    public function adicionar(edital $obj1, $arrayAreas) {
        $nTentativas = 10;
//--Verificar se ja existe edital com esse numero
        $con = new bd();
        $r = $con->prepare('select count(numero) from edital where numero = ' . $obj1->getNumero() . ' ;');
        $r->execute();
        $n = $r->fetch();
        if ($n[0] != 0) {
            echo '<h3>Falha ao cadastrar edital, já existe um edital com o mesmo número.</h3>';
            return 0;
        }
        while ($nTentativas > 0) {
//--Edital
            $con = new bd();
            $sql = 'START TRANSACTION;
            Insert into edital (dataabertura,datafechamento,nome,numero,id_tipo,id_administrador,arquivo,tipoarquivo,
            nAnosCurriculo,nEditaisProjeto,titulacaoMin)
            values (?,?,?,?,?,?,?,?,?,?,?);
            SET @id = LAST_INSERT_ID();
            COMMIT;';

            $dados = array($obj1->getDataabertura(), $obj1->getDatafechamento(), $obj1->getNome(), $obj1->getNumero(),
                $obj1->getId_tipo(), $obj1->getId_administrador(), $obj1->getArquivo(), $obj1->getTipoarquivo(),
                $obj1->getNAnosCurriculo(), $obj1->getNEditaisProjeto(), $obj1->getTitulacaoMin());
//--Fim Edital
//
//--Pesos Area
            $key = new pesosarea();
            foreach ($arrayAreas as $key) {
                $obj2 = $key;
                $sql.='Insert INTO pesosarea (id_areapesquisa,id_edital,topico1,topico2,topico3,topico4,topico5,
            topico6,topico7,topico8,quantidadebolsas,notaprojeto,notaaluno,notacurriculo) values (?,@id,?,?,?,?,?,?,?,?,?,?,?,?);';
                $dados1 = array($obj2->getId_areapesquisa(), $obj2->getTopico1(), $obj2->getTopico2(), $obj2->getTopico3(), $obj2->getTopico4(),
                    $obj2->getTopico5(), $obj2->getTopico6(), $obj2->getTopico7(), $obj2->getTopico8(), $obj2->getQuantidadebolsas(),
                    $obj2->getNotaprojeto(), $obj2->getNotaaluno(), $obj2->getNotacurriculo());
                foreach ($dados1 as $key) {
                    array_push($dados, $key);
                }
            }
//-Fim Pesos Area

            $r = $con->prepare($sql);

            $r->execute($dados);
//--Checar se o edital foi cadastrado
            sleep(1); //aguarda fim do insert
            $con = new bd();
            $sql = 'Select idEdital from edital where nome = ? and numero = ? ;';
            $dados = array($obj1->getNome(), $obj1->getNumero());
            $r = $con->prepare($sql);
            $r->execute($dados);
            sleep(0.1);
            $idEdital = $r->fetch();

            if ($idEdital[0])
                return $idEdital[0];
            $nTentativas--;
        }
        echo '<h3>Edital não cadastrado, por favor tente novamente mais tarde.</h3>';
        return 0;
    }

    public function listar($finalizado=NULL) {
        $con = new bd();
        $sql = 'Select a.*,b.nome tipo from edital a, tipoedital b where a.id_tipo = b.idTipoEdital and ';
        if ($finalizado)
            $sql.= 'etaparesultadofinal = 1 order by datafechamento desc; ';
        else
            $sql.='etaparesultadofinal <> 1 order by dataabertura desc; ';
        $r = $con->prepare($sql);
        $r->execute();
        $i = 0;
        $edital = array();
        while ($edital[$i++] = $r->fetch(PDO::FETCH_OBJ)

            );
        return $edital;
    }

    public function getById($id, $finalizacao=NULL, $idProjeto=NULL) {
        global $con;
        //$con = new bd();
        if ($id) {
            $sql = 'Select a.*,b.nome tipo from edital a, tipoedital b where idEdital = "' . $id . '" and a.id_tipo = b.idTipoEdital ';
            if (!$finalizado === 2) {
                if ($finalizacao)
                    $sql.= ' and etaparesultadofinal = 1;';
                else
                    $sql.=' and etaparesultadofinal <> 1;';
            }
        } else if ($idProjeto)
            $sql = 'select e.* from edital e,projeto prj where prj.idProjeto = ' . $idProjeto . ' and prj.id_edital = e.`idEdital`';
        $r = $con->prepare($sql);
        $r->execute();
        return $r->fetch(PDO::FETCH_OBJ);
    }

}

?>
