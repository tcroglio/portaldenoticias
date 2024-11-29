<?php
session_start();


if (isset($_SESSION['user_id'])) {

	include_once '../src/classes/User.php';
	include_once '../src/classes/Database.php';
	include_once '../src/classes/Noticia.php';

	$db = new Database;
	$user = new User($db->getConnection());
	$noticia = new Noticia($db->getConnection());

	$dadosUser = $user->selectIDUser($_GET['id_autor']);

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
		<h2 class="text-center mb-4">Editar usuário</h2>

		<form method="POST" action="/portaldenoticias/src/php/procUser.php?acao=u&id_autor=<?= $_GET['id_autor'] ?>" id="form-noticia" class="border m-5 p-4 rounded bg-light" enctype="multipart/form-data">
			<div class="form-group mb-3">
				<label for="nome" class="form-label">Nome</label>
				<input type="text" class="form-control" name="nome" id="nome" value="<?= $dadosUser['nome'] ?>" placeholder="Digite o nome" required>
			</div>

			<div class="form-group mb-3">
				<label for="email" class="form-label">Email</label>
				<input type="text" class="form-control" name="email" id="email" value="<?= $dadosUser['email'] ?>" placeholder="Digite o email" required>
			</div>
			
			<div class="form-group mb-3">
				<label for="fone" class="form-label">Fone</label>
				<input type="text" class="form-control" name="fone" id="fone" value="<?= $dadosUser['fone'] ?>" placeholder="Digite o fone" required>
			</div>

			<div class="form-group mb-3">
				<label for="genero" class="form-label">Gênero</label>
				<select class="form-control" name="genero" id="genero">
					<?php 
					$selectedM = '';
					$selectedF = '';
					if ($dadosUser['genero'] == 'M') {
						$selectedM = 'selected';
					} else {
						$selectedF = 'selected';
					}
					?>
					<option disabled selected>Selecione Autor</option>
					<option <?= $selectedM ?> value="M">Masculino</option>
					<option <?= $selectedF ?> value="F">Feminino</option>
				</select>
			</div>

			<button type="submit" class="btn btn-success w-100">Salvar edições</button>
			<a href="gerenciador.php" class="btn btn-secondary mt-3 w-100">Voltar</a>
		</form>
	</div>

</body>

</html>