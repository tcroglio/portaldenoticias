<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LOGIN</title>
</head>

<body>
	<?php include "../src/inc/index_header.php"; ?>

	<main class="container d-flex justify-content-center align-items-center min-vh-100">
		<div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
			<?php
			if (isset($usuarioValidado)) {
				if (!$usuarioValidado) { ?>
					<div class='alert alert-danger'>Usuário ou senha incorretos.</div>
					<?php
				}
			} ?>

			<h2 class="text-center mb-4">LOGIN</h2>
			<form method="POST">
				<div class="mb-3">
					<label for="usuario" class="form-label">Usuário</label>
					<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Digite seu usuário" required>
				</div>
				<div class="mb-3">
					<label for="senha" class="form-label">Senha</label>
					<input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha" required>
				</div>
				<div class="d-grid">
					<button type="submit" class="btn btn-primary">Entrar</button>
				</div>
				<div class="text-center mt-3">
					<a href="cadastrarUsuario.php">Não tem login? Cadastre-se</a>
				</div>
			</form>
		</div>
	</main>

</body>

</html>