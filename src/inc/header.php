<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- bootstrap end -->

<!-- jquery para input mask -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<!-- fim jquery -->

<!-- início font-awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!-- fim font-awesome -->


<header>
	<nav class="navbar navbar-dark bg-dark justify-content-between p-3">
		<a class="navbar-brand px-4 fw-bold text-success" href="./gerenciador.php">PORTAL DE NOTÍCIAS</a>
		<div class="d-flex gap-2">
			<button class="btn btn-outline-success my-2 my-sm-0" onclick="window.location.href='/portaldenoticias/public/cadastrarNoticia.php'">Nova notícia</button>
			<form method="POST" action="/portaldenoticias/src/php/logout.php">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">SAIR</button>
			</form>
		</div>
	</nav>
</header>