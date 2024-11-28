<?php
session_start();
if (isset($_SESSION['user_id'])) {
	header('Location: /portaldenoticias/public/gerenciador.php');
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
	<?php include "../src/inc/index_header.php"; ?>

	<main class="container d-flex justify-content-center align-items-center min-vh-100">
		<div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
			<h2 class="text-center mb-4">LOGIN</h2>
			<form method="POST" action="/portaldenoticias/src/php/procUser.php?acao=l">
				<div class="mb-3">
					<label for="login" class="form-label">Email</label>
					<input type="text" class="form-control" name="login" id="login" placeholder="Informe seu email de login" required>
				</div>
				<div class="mb-3">
					<label for="senha" class="form-label">Senha</label>
					<input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha" required>
				</div>
				<div class="d-grid">
					<button type="submit" class="btn btn-primary">Entrar</button>
				</div>
				<div class="text-center mt-3">
					<a href="/portaldenoticias/public/cadastrarUser.php">Não tem login? Cadastre-se</a>
				</div>
			</form>
		</div>
	</main>

</body>

</html>