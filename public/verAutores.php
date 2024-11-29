<?php
session_start();

if (isset($_SESSION['user_id'])) {

	include_once "../src/classes/Database.php";
	include_once "../src/classes/User.php";
	include_once "../src/classes/Noticia.php";

	$db = new Database();
	$user = new User($db->getConnection());
	$noticia = new Noticia($db->getConnection());

} else {
	header('Location: /portaldenoticias/public/');

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

	<?php include "../src/inc/header.php"; ?>

	<main class="container p-5">
		<h1>Autores cadastrados</h1>


		<br><br><br><br>


		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Código</th>
					<th scope="col">Nome</th>
					<th scope="col">Email</th>
					<th scope="col">Fone</th>
					<th scope="col">Gênero</th>
					<th scope="col">Ações</th>
				</tr>
			</thead>

			<tbody>
				<?php
				$arrayUsers = $user->selectUser();

				if ($arrayUsers) {
					foreach ($arrayUsers as $dadosUser) {
						?>
						<tr>
							<th scope="col"><?= $dadosUser['id'] ?></th>

							<th scope="col"><?= $dadosUser['nome'] ?></th>

							<th scope="col"><?= $dadosUser['email'] ?></th>

							<th scope="col"><?= $dadosUser['fone'] ?></th>

							<th scope="col"><?= ($dadosUser['genero'] == 'M') ? 'Masculino' : 'Feminino' ?></th>

							<th scope="col">
								<div class="d-flex gap-2">
									<button class="btn btn-warning" onclick="window.location.href='editarAutor.php?id_autor=<?= $dadosUser['id'] ?>'">Editar</button>
									<form method="POST" action="/portaldenoticias/src/php/procUser.php?acao=d&id_autor=<?= $dadosUser['id'] ?>">
										<button type="submit" class="btn btn-danger">Apagar</button>
									</form>
								</div>
							</th>
						</tr>

						<?php
					}
				} else {
					?>

					<tr>
						<th colspan="6" class="text-center">
							<p class="text-danger">Você ainda não possui nenhuma notícia publicada! Para publicar, clique <a href="cadastrarNoticia.php">aqui.</a>
							</p>
						</th>
					</tr>

					<?php
				}
				?>

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