<?php
try{
 $conn = new PDO("mysql:host=localhost;dbname=sistemaTicket","root","", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8' "));
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch( PDOExcepion $e){
 throw new PDOEXception($e->getMesage(), (int)$e->getCode());
}

?>