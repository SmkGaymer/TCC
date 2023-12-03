<?php
require_once('../classes/database.class.php');

class Cardapioalimento{
    public $id;
    public $cardapio_id;
    public $alimento_id;

    public function __construct($id, $cardapio_id, $alimento_id){
        $this->id = $id;
        $this->cardapio_id = $cardapio_id;
        $this->alimento_id = $alimento_id;
    }

    public function setId($id) {
        if ($id > 0) {
            $this->id = $id;
        }
    }

    public function setCardapio($cardapio_id) {
        if (!empty($cardapio_id)) {
            $this->cardapio_id = $cardapio_id;
        }
    }

    public function setAlimento($alimento_id) {
        if (!empty($alimento_id)) {
            $this->alimento_id = $alimento_id;
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getCardapio() {
        return $this->cardapio_id;
    }

    public function getAlimento() {
        return $this->alimento_id;
    }

    public function inserir() {
        $sql = 'INSERT INTO cardapio_alimento (alimento_id, cardapio_id )
                VALUES (:alimento_id, :cardapio_id)';
        $params = array(
            ':alimento_id' => $this->getAlimento(),
            ':cardapio_id' => $this->getCardapio(),
        );

        return Database::executar($sql, $params);
    }

    public function excluir() {
        $sql = 'DELETE FROM cardapio_alimento
                WHERE id = :id';
        $params = array(':id' => $this->getId());

        return Database::executar($sql, $params);
    }

    public function editar() {
        $sql = 'UPDATE cardapio_alimento
                SET cardapio_id = :cardapio_id, alimento_id = :alimento_id
                WHERE id = :id';
        $params = array(
            ':id' => $this->getId(),
            ':cardapio_id' => $this->getCardapio(),
            ':alimento_id' => $this->getAlimento(),
        );

        return Database::executar($sql, $params);
    }

    public static function listar() {
        $sql = 'SELECT * FROM cardapio_alimento';

        return Database::listar($sql, $params);
    }
}
?>
