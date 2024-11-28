<?php
session_start();

if (isset($_SESSION['user_id'])) {
	include_once '../classes/Database.php';
	include_once '../classes/Noticia.php';
	include_once '../classes/User.php';

	$db = new Database();
	$user = new User($db->getConnection());

	date_default_timezone_set('America/Sao_Paulo');

} else {
	header('Location: /portaldenoticias/public/');

}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['acao'])) {

	// catálogo de ações
	// i = "insert"
	// l = "login"
	$acao = $_GET['acao'];

	if ($acao == 'i') {
		echo "Ação: INSERT <br>";

		$usuario = $_POST['usuario'];
		$email = $_POST['email'];
		$senha = trim($_POST['senha']);
		$fone = $_POST['fone'];
		$genero = $_POST['genero'];
		$senhaHash = password_hash($senha, PASSWORD_BCRYPT);

		if ($user->insertUser($usuario, $email, $senhaHash, $fone, $genero)) {

			echo "Usuário cadastrado com sucesso!";

		} else {
			echo "Ops! Parece que ocorreu um erro ao inserir o usuário!";

		}

		header('Location: /portaldenoticias/public/login.php');

	} else if ($acao == 'l') {
		echo "Ação: LOGIN <br>";

		$email = $_POST['login'];
		$senha = $_POST['senha'];


		if ($usuarioLogado = $user->login($email, $senha)) {

			$_SESSION['user_id'] = $usuarioLogado['id'];
			header('Location: /portaldenoticias/public/gerenciador.php');

		} else {

			echo "Ops! Parece que ocorreu um erro ao validar o usuário.";
			header('Location: /portaldenoticias/public/login.php');
		}
	}
} else {
	header('Location: /portaldenoticias/public/');
}