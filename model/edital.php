<?php

class edital {

    private $idEdital;
    private $nome;
    private $numero;
    private $id_tipo;
    private $arquivo;
    private $id_administrador;
    private $dataabertura;
    private $datafechamento;
    private $tipoarquivo;
    private $nEditaisProjeto;
    private $nAnosCurriculo;
    private $titulacaoMin;

    public function getTitulacaoMin() {
        return $this->titulacaoMin;
    }

    public function setTitulacaoMin($titulacaoMin) {
        $this->titulacaoMin = $titulacaoMin;
    }

    public function getNEditaisProjeto() {
        return $this->nEditaisProjeto;
    }

    public function setNEditaisProjeto($nEditaisProjeto) {
        $this->nEditaisProjeto = $nEditaisProjeto;
    }

    public function getNAnosCurriculo() {
        return $this->nAnosCurriculo;
    }

    public function setNAnosCurriculo($nAnosCurriculo) {
        $this->nAnosCurriculo = $nAnosCurriculo;
    }

    public function getTipoarquivo() {
        return $this->tipoarquivo;
    }

    public function setTipoarquivo($tipoarquivo) {
        $this->tipoarquivo = $tipoarquivo;
    }

    public function getIdEdital() {
        return $this->idEdital;
    }

    public function setIdEdital($idEdital) {
        $this->idEdital = $idEdital;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getId_tipo() {
        return $this->id_tipo;
    }

    public function setId_tipo($id_tipo) {
        $this->id_tipo = $id_tipo;
    }

    public function getArquivo() {
        return $this->arquivo;
    }

    public function setArquivo($arquivo) {
        $this->arquivo = $arquivo;
    }

    public function getId_administrador() {
        return $this->id_administrador;
    }

    public function setId_administrador($id_administrador) {
        $this->id_administrador = $id_administrador;
    }

    public function getDataabertura() {
        return $this->dataabertura;
    }

    public function setDataabertura($dataabertura) {
        $this->dataabertura = $dataabertura;
    }

    public function getDatafechamento() {
        return $this->datafechamento;
    }

    public function setDatafechamento($datafechamento) {
        $this->datafechamento = $datafechamento;
    }

}

?>
