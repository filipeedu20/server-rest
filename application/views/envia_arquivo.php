<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $titulo; ?></title>
</head>
<body>
<h1><?php echo $titulo;?></h1>
	<div>	
		<form class="form-horizontal" method="POST" action="<?=base_url('api/arquivo')?>" id="formUsuario" enctype="multipart/form-data">
			<div>
				<label for="">Nome</label>
				<input type="text" name="nome_sistema">
			</div>		
			<div>
				<label for="">Arquivo</label>
				<input name="arquivo" placeholder="Foto de perfil" type="file">
			</div>
			<div class="col-md-9">
				<label for="">Descrição</label>
				<input name="descricao" placeholder="Descrição do arquivo" type="text">
			</div>			
			<div>
				<input type="submit" value="Enviar">
			</div>	
	
		</form>
	<br>url para envio do arquivo : http://projetos/rest-arquivo/api/arquivo - method: post
	</div>
</body>
</html>
