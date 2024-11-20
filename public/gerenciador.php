<?php


if (isset($_COOKIE['usuario_logado'])) {

	$usuario = htmlspecialchars($_COOKIE['usuario_logado']);
	// include "funcoesAgenda.php";

} else {
	header('Location: login.php?cookie=n');
	exit;
}
$exclusaoInvalida = false;


if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['senha-validacao'])) {

	include "funcoes.php";
	$id_excluir = $_POST['id_excluir'];
	// $usuarios = carregarUsuarios();

	foreach ($usuarios as $indice => $user) {
		if ($indice == $_COOKIE['id_usuario_logado']) {


			$senhaUsuario = $user['senha'];

			if ($senhaUsuario === $_POST['senha-validacao']) {
				echo "oi";
				header("Location: agendaExcluir.php?excluir=$id_excluir");


			} else {
				$exclusaoInvalida = true;

			}

			break;
		}
	}
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SISTEMA</title>
</head>

<body>

	<?php include "header.php"; ?>

	<main class="container p-5">
		<h1>Bem vindo, <?= $usuario; ?>!</h1>
		<h4>Seu usuário está logado e autenticado.</h4>
		<?php
		if ($exclusaoInvalida) {

			echo "<p class='text-danger'> Senha de confirmação incorreta. </p>";

		}
		?>

		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Código</th>
					<th scope="col">Nome</th>
					<th scope="col">Telefone</th>
					<th scope="col">Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php //echo listarAgenda(); ?>
			</tbody>
		</table>
	</main>

	<script>
		const modalConfirmacao = document.getElementById('modalConfirmacao')

		if (modalConfirmacao) {
			modalConfirmacao.addEventListener('show.bs.modal', event => {
				console.log('entoru  no evento');
				const button = event.relatedTarget;
				const recipient = button.getAttribute('data-bs-id');

				const id_excluir = document.getElementById('id_excluir');
				id_excluir.value = recipient;
			})
		}

	</script>

</body>

</html>