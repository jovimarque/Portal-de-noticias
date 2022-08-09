<?php
 
include'ajuda/connection.php';

?>

<html>
<head>
	<title> Ticket System </title>
	<meta charset="8tf-8">
	<link rel="stylesheet" type="text/css" href="css/home.css">
<head>
<body>

<div id="corpo">

<form method="post" class="categoriaFormulario"> 
	
	::Criar categoria
	<br>
	<input type="text" name="nomeCategoria" style="width: 23%;"> 
	<input type="submit" name="enviar" value="Criar" style="padding:2px;">
	
	<?php
		
if(isset($_POST{'enviar'})){
	 $nomeCategoria = $_POST['nomeCategoria'];
	 
	$valor = $conn->prepare("SELECT * FROM `categoria` WHERE nome = ? ");
	$valor->execute(array($nomeCategoria));
	$verifica = $valor->rowCount();

if($verifica >= 1){
	echo ' já existe';
}else{
  	
	$nomeCategoria = $_POST['nomeCategoria'];
	$inserir = $conn->prepare("INSERT INTO `categoria` VALUES(null,?)");
	$inserir->execute(array($nomeCategoria));
			 
	echo ' sucesso';
	   
	}
}	
	?>
</form>


<form method="post" class="topicoFormulario">
	<?php
	$sql= $conn->prepare("SELECT * FROM categoria ");
	$sql->execute();
	$stmt = $sql->fetchAll();
	?>
	::Selecione a categoria do tópico
	<br>
	<select name="categoria">
			<?php foreach ($stmt as $lista){ ?>
				<option value="<?php echo $lista['id'];?>"> <?php echo $lista['nome'];?></option>
			<?php 
			}
			?>
		</select>
	<br>
	::Titulo do Tópico
	<br>
	<input type="text" name="titulo" style="width: 23%;">
	<br>
	::Descrição do Tópico
	<br>
	<textarea  name="descricao" style="resize:none; width: 33%;">
	</textarea>
	<br>
	 <input type="submit"  name="publicar" value="publicar" style="width:33%;">
	 
	<?php



		if(empty($_POST['titulo']) && empty($_POST['descricao']) == null){

				echo '<br>não pode';
				exit;
		}		


	    if(isset($_POST['publicar'])){

	  
        	$titulo = $_POST['titulo'];
        	$descricao = $_POST['descricao'];
        	$categoria = $_POST['categoria'];
			#query do insert
        	$sql = $conn->prepare("INSERT INTO `topicos` (`id`, `titulo`, `descricao`, `id_carro`) VALUES (NULL, ?, ?, ?);");
			#bindValue verifica SQL INJECTION
        	$sql->execute(array($titulo,$descricao,$categoria));
        	
        	echo'<br>';
        	echo '<div style="background-color:green; padding:10px;"> Cadastrado com Sucesso</div>';



        }		

	?>
	 

</form>

</div>
		
		


</body>
</html>