<?php
session_start();


if (isset($_SESSION['user_id'])) {

	include_once '../src/classes/User.php';
	include_once '../src/classes/Database.php';
	include_once '../src/classes/Noticia.php';

	$db = new Database;
	$user = new User($db->getConnection());
	$noticia = new Noticia($db->getConnection());

	$dadosNoticia = $noticia->selectIDNot($_GET['id_noticia']);

} else {
	header('Location: /portaldenoticias/public/');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PORTAL DE NOTÍCIAS</title>
</head>

<body>
	<?php include_once "../src/inc/header.php"; ?>

	<div class="container mt-5">
		<h2 class="text-center mb-4">Editar notícia</h2>

		<form method="POST" action="/portaldenoticias/src/php/procNoticia.php?acao=u&id_noticia=<?= $_GET['id_noticia'] ?>" id="form-noticia" class="border m-5 p-4 rounded bg-light" enctype="multipart/form-data">
			<div class="form-group mb-3">
				<label for="titulo" class="form-label">Título da Notícia</label>
				<input type="text" class="form-control" name="titulo" id="titulo" value="<?= $dadosNoticia['titulo'] ?>" placeholder="Digite o título da notícia" required>
			</div>

			<div class="form-group mb-3">
				<label for="corpo" class="form-label">Corpo da Notícia</label>
				<textarea class="form-control" name="corpo_noticia" id="corpo" rows="5" placeholder="Escreva o conteúdo da notícia" required><?= $dadosNoticia['corpo_noticia'] ?></textarea>
			</div>

			<div class="form-group mb-3">
				<label for="autor" class="form-label">Autor</label>
				<select class="form-control" name="autor" id="autor">
					<option disabled selected>Selecione Autor</option>
					<?php
					$arrayUsers = $user->selectUser();

					foreach ($arrayUsers as $dadosUser) {
						$selected = ($dadosNoticia['id_autor'] == $dadosUser['id']) ? 'selected' : '' ;
						?>
						<option value="<?= $dadosUser['id'] ?>" <?= $selected ?> > <?= $dadosUser['nome'] ?></option>
						<?php
					}
					?>
				</select>
			</div>

			<div class="form-group mb-3">
				<label for="foto" class="form-label">Foto da Notícia</label>
				<input type="file" class="form-control mb-3" name="imagem" id="foto" accept="image/*">
				<img width="200px" src="<?= $dadosNoticia['caminho_foto'] ?>" alt="Imagem da notícia">
			</div>

			<button type="submit" class="btn btn-success w-100">Salvar edições</button>
			<a href="gerenciador.php" class="btn btn-secondary mt-3 w-100">Voltar</a>
		</form>
	</div>

</body>

</html>