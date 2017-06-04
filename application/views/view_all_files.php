<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title><?php echo $titulo; ?></title>
</head>
<body>
<li class="teste">
	<a href="<?php echo base_url().'arquivo/envia_arquivo';?>">Enviar arquivos</a>
	<a href="<?php echo base_url('arquivo/arquivos');?>">Arquivos enviados</a>
</li>
	<h1><?php echo $titulo;?></h1>
	<strong>URL que os dados serão retornados via json: </strong>
	<?php 

		// RETORNA ARQUIVOS CADASTRADOS NO SISTEMA 
		echo  base_url('api/arquivo'); 
	?>
	<div>	
	</div>
</body>
</html>
