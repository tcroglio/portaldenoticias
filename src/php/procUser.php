<?php
session_start();

include_once '../classes/Database.php';
include_once '../classes/Noticia.php';
include_once '../classes/User.php';

$db = new Database();
$user = new User($db->getConnection());

date_default_timezone_set('America/Sao_Paulo');


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['acao'])) {

	// catálogo de ações
	// i = "insert"
	// l = "login"
	// d = "delete"	
	// u = "update"
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
	} else if ($acao == 'd') {
		echo "Ação: DELETE <br>";

		if (isset($_GET['id_autor'])) {

			if ($user->deleteUser($_GET['id_autor'])) {
				echo "Usuário excluído com sucesso";
			} else {
				echo "Ops! Parece que houve algum erro ao excluir o usuário";

			}

			header('Location: /portaldenoticias/public/verAutores.php');
		}


	} else if ($acao == 'u') {
		echo "AÇÃO: UPDATE <br>";

		if (isset($_GET['id_autor'])) {

			$nome = $_POST['nome'];
			$email = $_POST['email'];
			$fone = $_POST['fone'];
			$genero = $_POST['genero'];

			if ($user->updateUser($_GET['id_autor'], $nome, $fone, $email, $genero)) {
				echo "Usuário editado com sucesso!";

			} else {
				echo "Houve um erro ao editar a notícia!";

			}

			header('Location: /portaldenoticias/public/verAutores.php');
		}
	}


} else {
	header('Location: /portaldenoticias/public/');
}