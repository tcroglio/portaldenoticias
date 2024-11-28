<?php
session_start();

if (isset($_SESSION['user_id'])) {

	include_once "../src/classes/Database.php";
	include_once "../src/classes/User.php";
	include_once "../src/classes/Noticia.php";

	$db = new Database();
	$user = new User($db->getConnection());
	$noticia = new Noticia($db->getConnection());

	$usuarioLogado = $user->selectIDUser($_SESSION['user_id']);
	$bemvindoa = ($usuarioLogado['genero'] == 'M') ? "Bem vindo" : "Bem vinda";

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
		<h1><?= $bemvindoa . ", " . $usuarioLogado['nome']; ?>!</h1>
		<p>Seu usuário está logado e autenticado.</p>


		<br><br><br><br>


		<h4>Mostrando apenas as suas notícias abaixo:</h4>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Código</th>
					<th scope="col">Título</th>
					<th scope="col">Prévia</th>
					<th scope="col">Autor</th>
					<th scope="col">Imagem</th>
					<th scope="col">Ações</th>
				</tr>
			</thead>

			<tbody>
				<?php
				$arrayNoticias = $noticia->selectNoticiaPorAutor($_SESSION['user_id']);

				if (count($arrayNoticias) > 0) {
					foreach ($arrayNoticias as $dadosNoticia) {
						$corpoLimitado = strlen($dadosNoticia['corpo_noticia']) > 35
							? substr($dadosNoticia['corpo_noticia'], 0, 35) . "..."
							: $dadosNoticia['corpo_noticia'];
						?>
						<tr>
							<th scope="col"><?= $dadosNoticia['id'] ?></th>

							<th scope="col"><?= $dadosNoticia['titulo'] ?> </th>

							<th scope="col"><?= $corpoLimitado ?></th>

							<th scope="col">"<?= $dadosNoticia['nome'] ?>"</th>

							<th scope="col">
								<img height="100px" width="100px" src="<?= $dadosNoticia['caminho_foto'] ?>" alt="Imagem da noticia">
							</th>

							<th scope="col">
								<div class="d-flex gap-2">
									<button class="btn btn-warning" onclick="window.location.href='editarNoticia.php?id_noticia=<?= $dadosNoticia['id_noticia'] ?>'">Editar</button>
									<button class="btn btn-danger" onclick="window.location.href='procNoticia.php?acao=d&id_noticia=<?= $dadosNoticia['id_noticia'] ?>'">Apagar</button>
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