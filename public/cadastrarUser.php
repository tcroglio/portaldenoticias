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
	<title>PORTAL DE NOTICIAS</title>
</head>

<body>

	<?php include_once "../src/inc/header.php"; ?>

	<div class="container mt-5">
		<h2 class="text-center mb-4">Cadastre um novo usuário</h2>

		<form method="POST" action="/portaldenoticias/src/php/procUser.php?acao=i" id="form" class="border m-5 p-4 rounded bg-light">
			<div class="form-group mb-1">
				<label for="usuario" class="form-label">Nome completo</label>
				<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Nome completo">
			</div>

			<div class="form-group mb-1">
				<label for="email" class="form-label">Email</label>
				<input type="email" class="form-control" name="email" id="email" placeholder="Email">
			</div>
			<div class="form-group d-flex gap-2 w-100 mb-1">
				<div class="w-50">
					<label for="senha" class="form-label">Senha</label>
					<input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
				</div>

				<div class="w-50">
					<label for="senhaconfirm" class="form-label">Confirme sua senha</label>
					<input type="password" class="form-control" id="senhaconfirm" placeholder="Confirme sua senha">
				</div>
			</div>

			<div class="form-group d-flex gap-2 w-100 mb-1">
				<div class="w-50">
					<label for="fone" class="form-label">Telefone</label>
					<input type="text" class="form-control" name="fone" id="fone" placeholder="Telefone">
				</div>

				<div class="w-50">
					<label for="genero" class="form-label">Gênero</label>
					<select class="form-control" name="genero" id="genero">
						<option value="" disabled selected>Selecione o gênero</option>
						<option value="M">Masculino</option>
						<option value="F">Feminino</option>
					</select>
				</div>
			</div>

			<button type="submit" class="btn mt-3 btn-success w-100">Cadastrar</button>
			<a href="login.php" class="btn btn-secondary mt-5">Voltar</a>
		</form>
	</div>

	<script>
		document.addEventListener("DOMContentLoaded", () => {
			const form = document.getElementById("form");
			const senha = document.getElementById("senha");
			const senhaConfirm = document.getElementById("senhaconfirm");

			form.addEventListener("submit", function (event) {
				// Verificar se as senhas coincidem
				if (senha.value !== senhaConfirm.value) {
					event.preventDefault(); // Impede o envio do formulário
					alert("As senhas não coincidem. Por favor, verifique e tente novamente.");
				}
			});
		});

	</script>
</body>

</html>