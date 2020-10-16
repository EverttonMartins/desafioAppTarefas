<?php
    session_start();

    //     echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
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
			</div>
		</nav>
<!------------------------------------>

<!------------------------------------>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">

                    <?php if(isset($_SESSION['id'])){?>
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item active"><a href="#">Nova tarefa</a></li>
                        <li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
                   <?php } ?>   
				                   
					</ul>
                </div>
       
        
 
<!------------------------------------>
				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Usuário</h4>
								<hr />

                                    <div class="container"><!-- container --> 

                                            
                                        <form method="POST" action="tarefa_controller.php?acao=login">
                                            
                                            <div class="form-group">
                                            
                                            <input type="text" name="NOME" id="inputUsuario" class="form-control mb-2" placeholder="Usuário" required autofocus>
                                            <input type="password" name="SENHA" id="inputPassword" class="form-control mb-2" placeholder="**********" required>

                                            <!--Novo-->

                                                <button class="btn btn-success" type="submit">Entrar</button>
                                                       
                                                <a class="btn btn-success" href="cadastrarUsuario.php?acao=login" role="button">Cadastre-se</a>
                                                                         
                                            </form> 
                                                             
                                    </div> <!-- /container -->
							</div>
						</div>
					</div>
				</div>

<!------------------------------------>
			</div>
		</div>
	</body>
</html>