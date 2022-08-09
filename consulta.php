<?php
include'ajuda/connection.php';

?>


<form method="post">
	<label> Search Bar</label>
	<input type="text" name="search"placeholder="buscar">
	
	<input type="submit" name="confirm">
<?php
if(isset($_POST['confirm'])){
 
 $buscar = $_POST['search'];
 $searchDB = $conn->prepare("SELECT * FROM `topicos` WHERE titulo = ?");
 $searchDB->setFetchMode(PDO:: FETCH_OBJ);
 $searchDB->execute(array($buscar));
	
	if($row = $searchDB->fetch()){
		echo " <h4> $row->titulo </h4>";
		echo "<p> $row->descricao </p>";
	
	}else{
		
		echo 'Nome não existe';
	}	
	
}
?>
</form>




	



