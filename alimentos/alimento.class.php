<?php
require_once('../classes/database.class.php');

class Alimento{
    private $idalimentos;
    private $alimento;

    public function __construct($idalimentos, $alimento){
        $this->idalimentos = $idalimentos;
        $this->alimento = $alimento;
    }

    public function setId($idalimentos) {
        if ($idalimentos > 0) {
            $this->idalimentos = $idalimentos;
        }
    }

    public function setAlimento($alimento) {
        if (!empty($alimento)) {
            $this->alimento = $alimento;
        }
    }

    public function getId() {
        return $this->idalimentos;
    }

    public function getAlimento() {
        return $this->alimento;
    }

    public function inserir() {
        $sql = 'INSERT INTO alimentos (alimento)
                VALUES (:alimento)';
        $params = array(
            ':alimento' => $this->getAlimento(),
        );

        return Database::executar($sql, $params);
    }

    public function excluir() {
        $sql = 'DELETE FROM alimentos
                WHERE idalimentos = :idalimentos';
        $params = array(':idalimentos' => $this->getId());

        return Database::executar($sql, $params);
    }

    public function editar() {
        $sql = 'UPDATE alimentos
                SET alimento = :alimento
                WHERE idalimentos = :idalimentos';
        $params = array(
            ':idalimentos' => $this->getId(),
            ':alimento' => $this->getAlimento(),
        );

        return Database::executar($sql, $params);
    }

    public static function listar() {
        $sql = 'SELECT * FROM alimentos';

        return Database::listar($sql, $params);
    }
}
?>
