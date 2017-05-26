<!DOCTYPE html>
<html lang="pt-br">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="Study Control Team" content="">

	<title>Controle de Estudos</title>

	<link href="css/bootstrap.css" rel="stylesheet">

</head>
<body>

	<div class="container" style="margin-top: 20px;">
		<form class="form-horizontal col-xs-4 col-xs-push-4" method="post" action="login.php" target="iframe">
			<fieldset class="text-center"><legend>Autenticação</legend>
				<div class="form-group">
					<label class="col-xs-2 control-label" for="login">Login</label>
					<div class="col-xs-10">
						<input class="form-control" type="text" name="login" id="login">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-2 control-label" for="senha">Senha</label>
					<div class="col-xs-10">
						<input class="form-control" type="password" name="senha" id="senha">
					</div>
				</div>
			</fieldset>
			<iframe name="iframe" style="width: 250px; height: 35px; border: none;" scrolling="no"></iframe>
			<button class="btn btn-success pull-right" name="entrar">Entrar</button>
		</form>
	</div>

	<script src="js/jquery-3.2.0.js"></script>
	<script src="js/bootstrap.js"></script>

</body>
</html>
