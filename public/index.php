<?php
session_start();

include_once '../src/classes/Database.php';
include_once '../src/classes/Noticia.php';

$db = new Database();
$noticia = new Noticia($db->getConnection());

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PORTAL DE NOTICIAS</title>
	<style>
		.card {
			cursor: pointer;
			text-decoration: none;
			color: inherit;
		}

		.card:hover {
			box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
		}
	</style>
</head>

<body>

	<?php include "../src/inc/index_header.php"; ?>

	<main class="container p-5">
		<h1>Bem vindo ao seu portal de notícias!</h1>
		<h4>Veja as noticias mais recentes.</h4>

		<div class="row">
			<?php
			$arrayNoticias = $noticia->selectNot();

			foreach ($arrayNoticias as $dadosNoticia) {
				$corpoLimitado = strlen($dadosNoticia['corpo_noticia']) > 50
					? substr($dadosNoticia['corpo_noticia'], 0, 50) . "..."
					: $dadosNoticia['corpo_noticia'];
				?>

				<div class="col-md-4 mb-4">
					<a href="detalhesNoticia.php?id=<?= $dadosNoticia['id_noticia'] ?>" class="card h-100">
						<img src="<?= $dadosNoticia['caminho_foto'] ?>" class="card-img-top" alt="Imagem da notícia" style="height: 200px; object-fit: cover;">
						<div class="card-body">
							<h5 class="card-title"><?= $dadosNoticia['titulo'] ?></h5>
							<p class="card-text"><?= $corpoLimitado ?></p>
						</div>
						<div class="card-footer">
							<small class="text-muted">Publicado por <?= $dadosNoticia['nome'] ?> em <?= date('d/m/Y H:i', strtotime($dadosNoticia['data_hora'])) ?></small>
						</div>
					</a>
				</div>

				<?php
			}
			?>
		</div>
	</main>
</body>

</html>