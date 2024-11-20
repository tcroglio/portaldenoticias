<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	$usuarioValidado = false;

	// Carrega os usuários do arquivo
	// $usuarios = carregarUsuarios();

	// Verifica se o usuário e a senha estão no vetor de usuários
	foreach ($usuarios as $id_usuario => $user) {
		if ($user['usuario'] === $usuario && $user['senha'] === $senha) {
			$usuarioValidado = true;
			$id_usuario;
			break;
		}
	}

	if ($usuarioValidado) {
		// Define o cookie para o login por 5 minutos
		setcookie("usuario_logado", $usuario, time() + 600, "/");
		setcookie("id_usuario_logado", $id_usuario, time() + 600, "/");
		header("Location: index.php");
		exit;
	}
}

$cookie = isset($_GET['cookie']) ? $_GET['cookie'] : "";
?>