<?php

// include "funcoes.php";

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['usuario']) && isset($_POST['senha'])) {
	$novoUsuario = $_POST['usuario'];
	$novaSenha = $_POST['senha'];

	// salvarUsuario($novoUsuario, $novaSenha);
	header('Location: login.php');
}

// Processa exclusão do usuário
if (isset($_GET['excluir'])) {
	$index = $_GET['excluir'];
	// excluirUsuario($index);
	header("Location: cadastro.php");
	exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de Usuários</title>
</head>

<body>

	<?php include_once "../src/inc/header.php"; ?>

	<div class="container mt-5">
		<h2 class="text-center mb-4">Cadastre um novo usuário</h2>

		<form method="POST" class="border p-4 rounded bg-light">
			<div class="mb-3">
				<label for="usuario" class="form-label">Usuário</label>
				<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuário" required>
			</div>

			<div class="mb-3">
				<label for="senha" class="form-label">Senha</label>
				<input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" required>
			</div>

			<button type="submit" class="btn btn-primary w-100">Cadastrar</button>
		</form>
		<a href="login.php" class="btn btn-secondary mt-3">Voltar</a>
	</div>

</body>

</html>