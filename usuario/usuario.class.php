<?php
require_once "../conf/Conexao.php";
require_once('../classes/database.class.php'); 

class Usuario {
    private $idusuario;
    private $nome;
    private $matricula;
    private $nascimento;
    private $sexo;
    private $turma;
    private $senha;
    private $alergias;
    private $cpf;

    public function __construct($idusuario, $nome, $matricula, $nascimento, $sexo, $turma, $senha, $alergias, $cpf) {
        $this->idusuario = $idusuario;
        $this->nome = $nome;
        $this->matricula = $matricula;
        $this->nascimento = $nascimento;
        $this->sexo = $sexo;
        $this->turma = $turma;
        $this->senha = $senha;
        $this->alergias = $alergias;
        $this->cpf = $cpf;
    }
    
    public function getId() {
        return $this->idusuario;
    }

    public function getNome() {
        return $this->nome;
    }
    
    public function getMatricula() {
        return $this->matricula;
    }
    
    public function getNascimento() {
        return $this->nascimento;
    }
    
    public function getSexo() {
        return $this->sexo;
    }

    public function getTurma() {
        return $this->turma;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getAlergias() {
        return $this->alergias;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setId($idusuario) {
        if ($idusuario > 0) {
            $this->idusuario = $idusuario;
        }
    }
    

    public function setNome($nome) {
        if (!empty($nome)) {
            $this->nome = $nome;
        }
    }

    public function setMatricula($matricula) {
        if (!empty($matricula)) {
            $this->matricula = $matricula;
        }
    }

    public function setNascimento($nascimento) {
        
        $this->nascimento = $nascimento;
    }

    public function setSexo($sexo) {
        
        $this->sexo = $sexo;
    }

    public function setTurma($turma) {
        if (!empty($turma)) {
            $this->turma = $turma;
        }
    }

    public function setSenha($senha) {
        if (!empty($senha)) {
            $this->senha = $senha;
        }
    }

    public function setAlergias($alergias) {
        $this->alergias = $alergias;
    }

    public function setCpf($cpf) {
        
        $this->cpf = $cpf;
    }

    public function inserir() {
        $sql = 'INSERT INTO usuario (nome, matricula, nascimento, sexo, turma, senha, alergias, cpf)
                VALUES (:nome, :matricula, :nascimento, :sexo, :turma, :senha, :alergias, :cpf)';
        $params = array(
            ':nome' => $this->getNome(),
            ':matricula' => $this->getMatricula(),
            ':nascimento' => $this->getNascimento(),
            ':sexo' => $this->getSexo(),
            ':turma' => $this->getTurma(),
            ':senha' => $this->getSenha(),
            ':alergias' => $this->getAlergias(),
            ':cpf' => $this->getCpf(),
        );

        return Database::executar($sql, $params);
    }

    public function excluir() {
        $sql = 'DELETE FROM usuario
                WHERE idusuario = :idusuario';
        $params = array(':idusuario' => $this->getId());

        return Database::executar($sql, $params);
    }

    public function editar() {
        $sql = 'UPDATE usuario
                SET nome = :nome,
                    matricula = :matricula,
                    nascimento = :nascimento,
                    sexo = :sexo,
                    turma = :turma,
                    senha = :senha,
                    alergias = :alergias,
                    cpf = :cpf
                WHERE idusuario = :idusuario';
        $params = array(
            ':idusuario' => $this->getId(),
            ':nome' => $this->getNome(),
            ':matricula' => $this->getMatricula(),
            ':nascimento' => $this->getNascimento(),
            ':sexo' => $this->getSexo(),
            ':turma' => $this->getTurma(),
            ':senha' => $this->getSenha(),
            ':alergias' => $this->getAlergias(),
            ':cpf' => $this->getCpf(),
        );

        return Database::executar($sql, $params);
    }

    public static function listar() {
        $sql = 'SELECT * FROM usuario';

        return Database::listar($sql);
    }

    public static function findById($idusuario) {
        $sql = 'SELECT * FROM usuario WHERE idusuario = :idusuario';
        $params = array(':idusuario' => $idusuario);

        $result = Database::buscar($sql, $params);

        if ($result) {
            $linha = $result[0];
            return new Usuario(
                $linha['idusuario'],
                $linha['nome'],
                $linha['matricula'],
                $linha['nascimento'],
                $linha['sexo'],
                $linha['turma'],
                $linha['senha'],
                $linha['alergias'],
                $linha['cpf']
            );
        } else {
            return null;
        }
    }
}
?>
