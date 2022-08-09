<?php
 
include'ajuda/connection.php';

$buscaBD = $conn->prepare("SELECT * FROM `topicos`");
$buscaBD->execute();
$lista = $buscaBD->fetchAll();

?>

<html>
<head>
	<title> Ticket System </title>
	<meta charset="8tf-8">
	<link rel="stylesheet" type="text/css" href="css/listaNoticias.css">
<head>
<body>

<div id="corpo">

	<aside id="menuLateral">
		<ul class="menu">
		<label> MENU</label>
			<li>Gastronomia</li>
			<li>Ciência</li>
			<li>Política</li>
			<li>Esporte</li>
			<li>Mercado Financeiro</li>
			<li>Educação</li>
			<li>E-Esport</li>

		<label style="margin-top:10px;"> ASSINATURA</label>

		</ul>
	</aside>
	<section id="corpoNoticia">
		<div style="width: 100%; background-color:#dddd;"><label>Noticias Principais </label></div>
		<?php foreach($lista as $busca):?>
			<h4><a href="#"><?php echo $busca['titulo'];?> ...</a></h4>
		<?php endforeach;?>

		<div class="imagemNoticias">
		<div style="width: 100%; background-color:#dddd;"><label>Games</label></div>
			<section id="imagens">
				<div class="imagem1">
					<img src="IMG/steve.png" width="100">
					<h4><label> Titulo	</label></h4>
					<h6> Link	</h6>
				</div>
				<div class="imagem1">
					<img src="IMG/steve.png" width="100">
					<h4><label> Titulo	</label></h4>
					<h6> Link	</h6>
				</div>
				<div class="imagem1">
					<img src="IMG/steve.png" width="100">
					<h4><label> Titulo	</label></h4>
					<h6> Link	</h6>
				</div>
				<div class="imagem1">
					<img src="IMG/steve.png" width="100">
					<h4><label> Titulo	</label></h4>
					<h6> Link	</h6>
				</div>

				</div>
				<?php
					$buscarRedacao = $conn->prepare("SELECT * FROM `e_esportes`");
					$buscarRedacao->execute();
					$redacao = $buscarRedacao->fetchAll();
					foreach($redacao as $noticia):
				?>
				<h3 style="margin-bottom: 0px; text-decoration:  underline;"> <?php echo $noticia['titulo'];?></h3>
				<p style="text-align: justify; width: 600px; margin:5px auto;"><?php echo $noticia['texto'];?></p>
				<a href="#" style="margin-bottom: 5px;"> Materia completa</a>
			<?php endforeach;?>
				
				<div style="width: 100%; background-color:#dddd;"><label>Mercado Financeiro</label></div>
				<?php
					$buscarRedacao = $conn->prepare("SELECT * FROM `mercadoFinanceiro`");
					$buscarRedacao->execute();
					$redacao = $buscarRedacao->fetchAll();		

					foreach($redacao as $noticia):
				?>
				<h3 style="margin-bottom: 0px; margin:0px; text-decoration:  underline;"> <?php echo $noticia['titulo'];?></h3>
				<p style="text-align: justify; width: 600px; margin:5px auto;"><?php echo $noticia['texto'];?></p>
				<a href="#" style="margin-bottom: 5px;"> Materia completa</a>


				<?php endforeach;?>

			</section>
		</div>	

	</section>


</div>
	
		
		

</body>
</html>