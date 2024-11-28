<?php
session_start();

if (isset($_SESSION['user_id'])) {
	include_once '../classes/Database.php';
	include_once '../classes/Noticia.php';
	include_once '../classes/User.php';

	$db = new Database();
	$user = new User($db->getConnection());
	$noticia = new Noticia($db->getConnection());

	date_default_timezone_set('America/Sao_Paulo');

} else {

	header('Location: /portaldenoticias/public/');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


	// Catalogo de acoes
	// $acao = i -> insert (cadastrarNoticia.php)
	$acao = $_GET['acao'];

	if ($acao == 'i') {
		$titulo = $_POST['titulo'];
		$corpo_noticia = $_POST['corpo_noticia'];
		$autor = $_POST['autor'];
		$imagem = $_FILES['imagem'];
		$data_hora = date('Y-m-d H:i:s');
		$caminho_imagem = '';

		// Validações do upload da imagem
		if ($imagem['error'] === UPLOAD_ERR_OK) {
			$extensao = strtolower(pathinfo($imagem['name'], PATHINFO_EXTENSION));
			$tamanhoMaximo = 10 * 1024 * 1024; // 10 MB

			// Validar tipo de arquivo
			$tiposPermitidos = ['jpg', 'jpeg', 'png'];
			if (!in_array($extensao, $tiposPermitidos)) {
				die("Apenas arquivos JPG ou PNG são permitidos.");
			}

			// Validar tamanho do arquivo
			if ($imagem['size'] > $tamanhoMaximo) {
				die("O tamanho do arquivo não pode exceder 10 MB.");
			}

			// Gerar nome único para o arquivo
			$nomeImagem = uniqid() . "." . $extensao;
			$caminho_imagem = "../assets/uploads/$nomeImagem";

			// Mover o arquivo para o diretório
			if (!move_uploaded_file($imagem['tmp_name'], $caminho_imagem)) {
				die("Erro ao salvar a imagem.");
			}
		} else if ($imagem['error'] !== UPLOAD_ERR_NO_FILE) {
			die("Erro ao fazer upload da imagem.");
		}

		$imagem_no_banco = "/portaldenoticias/src/assets/uploads/$nomeImagem";

		// Salvar a notícia no banco de dados
		if ($noticia->insertNot($titulo, $autor, $data_hora, $corpo_noticia, $imagem_no_banco)) {
			echo "Notícia salva com sucesso!";

		} else {
			echo "Houve um erro ao salvar a notícia!";

		}

		header('Location: /portaldenoticias/public/gerenciador.php');

	}
}