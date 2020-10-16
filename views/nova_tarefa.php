<?php
    session_start();
    if(!isset($_SESSION['id']))
    {
        header("location: login.php");
        exit;
	}

?>


<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					App Lista Tarefas
				</a>

				<ul class="navbar-nav">
					<li class="nav-item"><a class="nav-link" href="sair.php">Sair</a></li>
				</ul>

			</div>
		</nav>

	<?php if( isset($_GET['inclusao']) && $_GET['inclusao'] == 1 ) { ?>
		<div class="bg-success pt-2 text-white d-flex justify-content-center" >
			<h5>Tarefa inserida com sucesso!</h5>
		</div>
	<?php } ?>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item active"><a href="#">Nova tarefa</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Nova tarefa</h4>
								<hr />

								<form method="post" action="tarefa_controller.php?acao=inserir">
									<div class="form-group">
										<label>Titulo</label>
										<input type="text" class="form-control" name="tarefa" placeholder="Exemplo: Fazer projeto.">
									</div>
									<div class="form-group">
										<label>Descrição</label>
										<textarea class="form-control" name="descricao" placeholder="Exemplo: Como fazer o projeto..." required="" cols="30" rows="5"></textarea>
									</div>
									<div>
									
									<div class="row mb-4">
											
											<div class="col-md-6">
											<label>Data de início</label><br>									
												<input type="date"  class="form-control" name="datainicio" min="2020-10-16">
												</div>
																
										
											
												<div class="col-md-6">
												<label>Data de término</label><br>
												<input type="date" class="form-control" name="datatermino" min="2020-10-16">
												</div>
												
								
									</div>
									
									</div>
									<button type="submit" class="btn btn-success">CADASTRAR</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>