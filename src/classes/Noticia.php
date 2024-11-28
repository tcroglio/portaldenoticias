<?php


class Noticia
{

    private $conn;
    private $table_name = "tbl_noticias";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Insere uma nova notícia no banco
    public function insertNot($titulo, $autor, $data_hora, $noticia, $caminho_foto)
    {
        $query = "INSERT INTO " . $this->table_name . " (titulo, id_autor, data_hora, corpo_noticia, caminho_foto) VALUES (?, ?, ?, ?, ?)";

        // Preparando o comando...
        $stmt = $this->conn->prepare($query);

        // Setando os parâmetros...
        $stmt->execute([$titulo, $autor, $data_hora, $noticia, $caminho_foto]);

        return $stmt;
    }

    // Seleciona todas as notícias
    public function selectNot()
    {
        $query = "SELECT n.*, n.id AS id_noticia, u.* FROM $this->table_name AS n 
                    JOIN tbl_usuarios AS u
                    ON u.id = n.id_autor";

        // Preparando o comando...
        $stmt = $this->conn->prepare($query);

        // Como não precisa setar parâmetro, apenas executa
        $stmt->execute();

        return $stmt;
    }

    // Seleciona apenas uma notícia específica
    public function selectIDNot($id)
    {
        $query = "SELECT * FROM $this->table_name AS n 
                    JOIN tbl_usuarios AS u
                    ON u.id = n.id_autor
                    WHERE n.id = ?";

        // Preparando o comando...
        $stmt = $this->conn->prepare($query);

        // Setando os parâmetros...
        $stmt->execute([$id]);

        // O "fetch" com o "FETCH_ASSOC" é utilizado para mostrar apenas um resultado, como buscou diretamente pelo ID
        // é como o mysqli_fetch_assoc();   
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function selectNoticiaPorAutor($id_autor)
    {
        $query = "SELECT n.*, n.id AS id_noticia, u.* FROM $this->table_name AS n 
                    JOIN tbl_usuarios AS u
                        ON u.id = n.id_autor
                    WHERE id_autor = ?";

        // Preparando o comando...
        $stmt = $this->conn->prepare($query);

        // Setando os parâmetros...
        $stmt->execute([$id_autor]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Faz um update na notícia do $id enviado
    public function updateNot($id, $titulo, $autor, $data, $noticia, $foto)
    {

        if ($foto == '') { // QUERY SEM ATUALIZAR A FOTO

            $query = "UPDATE " . $this->table_name . " SET titulo = ?, id_autor = ?, data_hora = ?, corpo_noticia = ? WHERE id = ?";

            // Preparando o comando...
            $stmt = $this->conn->prepare($query);

            // Setando os parâmetros...
            $stmt->execute([$titulo, $autor, $data, $noticia, $id]);

        } else { // QUERY ATUALIZANDO A FOTO

            $query = "UPDATE " . $this->table_name . " SET titulo = ?, id_autor = ?, data_hora = ?, corpo_noticia = ?, caminho_foto = ? WHERE id = ?";

            // Preparando o comando...
            $stmt = $this->conn->prepare($query);

            // Setando os parâmetros...
            $stmt->execute([$titulo, $autor, $data, $noticia, $foto, $id]);
        }


        return $stmt;
    }

    // Deleta a notícia do $id enviado
    public function deleteNot($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        // Preparando o comando...
        $stmt = $this->conn->prepare($query);

        // Setando os parâmetros...
        $stmt->execute([$id]);

        return $stmt;
    }
}