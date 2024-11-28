<?php
session_start();

include_once '../src/classes/Database.php';
include_once '../src/classes/Noticia.php';

if (isset($_GET['id'])) {
	// Conexão com o banco de dados
	$db = new Database();
	$noticia = new Noticia($db->getConnection());

	// Recuperar os detalhes da notícia com base no ID
	$detalhesNoticia = $noticia->selectIDNot($_GET['id']);

	if (!$detalhesNoticia) {
		// Se não encontrar a notícia, redireciona para a página inicial
		header('Location: /portaldenoticias/public');
		exit();
	}
} else {
	// Se o parâmetro 'id' não for passado, redireciona para a página inicial
	header('Location: /portaldenoticias/public');
	exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $detalhesNoticia['titulo'] ?> - Portal de Notícias</title>
</head>

<body>

	<?php include "../src/inc/index_header.php"; ?>

	<main class="container p-5">
		<h1><?= $detalhesNoticia['titulo'] ?></h1>
		<div class="mb-4">
			<img width="50%" height="auto" src="<?= $detalhesNoticia['caminho_foto'] ?>" class="img-fluid" alt="Imagem da notícia">
		</div>
		<p><strong>Publicado por:</strong> <?= $detalhesNoticia['nome'] ?></p>
		<p><strong>Data de publicação:</strong> <?= date('d/m/Y H:i', strtotime($detalhesNoticia['data_hora'])) ?></p>
		<div class="mt-4">
			<h4>Conteúdo completo:</h4>
			<p><?= nl2br($detalhesNoticia['corpo_noticia']) ?></p>
		</div>
	</main>

</body>

</html>