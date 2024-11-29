<?php
class User
{

    private $conn;
    private $table_name = "tbl_usuarios";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Cria um novo usuário
    public function insertUser($nome, $email, $senha, $fone, $genero)
    {
        $query = "INSERT INTO " . $this->table_name . " (nome, email, senha, fone, genero) VALUES (?, ?, ?, ?, ?)";

        // Preparando o comando...
        $stmt = $this->conn->prepare($query);

        // Setando os parâmetros...
        $stmt->execute([$nome, $email, $senha, $fone, $genero]);

        return $stmt;
    }


    // Valida o login e retorna true or false
    public function login($email, $senha)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = ?";

        // Preparando o comando...
        $stmt = $this->conn->prepare($query);

        // Setando os parâmetros...
        $stmt->execute([$email]);

        // O "fetch" com o "FETCH_ASSOC" é utilizado para mostrar apenas um resultado, como buscou diretamente pelo ID
        // é como o mysqli_fetch_assoc();           
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Se $usuario for true quer dizer que encontrou uma linha, em seguida ele verifica a senha usando o mesmo hash utilizado no login
        if ($usuario && password_verify($senha, $usuario['senha'])) {

            // Se ambas validações foram verdadeiras, retorna o usuário
            return $usuario;
        }

        // Se não, retorna falso
        return false;
    }

    // Seleciona todos os usuários
    public function selectUser()
    {
        $query = "SELECT * FROM " . $this->table_name;

        // Preparando o comando...
        $stmt = $this->conn->prepare($query);

        // Como não precisa setar parâmetro, apenas executa
        $stmt->execute();

        return $stmt;
    }


    // Seleciona apenas um usuário específica
    public function selectIDUser($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";

        // Preparando o comando...
        $stmt = $this->conn->prepare($query);

        // Setando os parâmetros...
        $stmt->execute([$id]);

        // O "fetch" com o "FETCH_ASSOC" é utilizado para mostrar apenas um resultado, como buscou diretamente pelo ID
        // é como o mysqli_fetch_assoc();   
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Faz um update no usuário do $id enviado
    public function updateUser($id, $nome, $fone, $email, $genero)
    {
        $query = "UPDATE " . $this->table_name . " SET nome = ?, fone = ?, email = ?, genero = ? WHERE id = ?";

        // Preparando o comando...
        $stmt = $this->conn->prepare($query);

        // Setando os parâmetros...
        $stmt->execute([$nome, $fone, $email, $genero, $id]);

        return $stmt;
    }

    // Deleta o usuário do $id enviado
    public function deleteUser($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        // Preparando o comando...
        $stmt = $this->conn->prepare($query);

        // Setando os parâmetros...
        $stmt->execute([$id]);

        return $stmt;
    }
}
