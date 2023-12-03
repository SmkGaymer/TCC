<?php
require_once('../classes/database.class.php');

class Cardapio{
    private $idcardapio;
    private $data;
    private $diasemana;

    public function __construct($idcardapio, $data, $diasemana){
        $this->idcardapio = $idcardapio;
        $this->data = $data;
        $this->diasemana = $diasemana;
    }

    public function setIdCardapio($idcardapio) {
        if ($idcardapio > 0) {
            $this->idcardapio = $idcardapio;
        }
    }

    public function setData($data) {
        if (!empty($data)) {
            $this->data = $data;
        }
    }

    public function setDiaSemana($diasemana) {
        if (!empty($diasemana)) {
            $this->diasemana = $diasemana;
        }
    }

    public function getId() {
        return $this->idcardapio;
    }

    public function getData() {
        return $this->data;
    }

    public function getDiaSemana() {
        return $this->diasemana;
    }

    public function inserir() {
        $sql = 'INSERT INTO cardapio (data, diasemana)
                VALUES (:data, :diasemana)';
        $params = array(
            ':data' => $this->getData(),
            ':diasemana' => $this->getDiaSemana(),
        );

        return Database::executar($sql, $params);
    }

    public function excluir() {
        $sql = 'DELETE FROM cardapio
                WHERE idcardapio = :idcardapio';
        $params = array(':idcardapio' => $this->getId());

        
        return Database::executar($sql, $params);
    }

    public function editar() {
        $sql = 'UPDATE cardapio
                SET data = :data, diasemana = :diasemana
                WHERE idcardapio = :idcardapio';
        $params = array(
            ':idcardapio' => $this->getId(),
            ':data' => $this->getData(),
            ':diasemana' => $this->getDiaSemana(),
        );

        return Database::executar($sql, $params);
    }

    public static function listar() {
        $sql = 'SELECT * FROM cardapio';

        return Database::listar($sql, $params);
    }
}
?>
