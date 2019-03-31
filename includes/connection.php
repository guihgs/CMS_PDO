<?php
try{
$pdo = new PDO('mysql:host=localhost;dbname=cms_db', 'admin1', 'adb55kts');
}catch(PDOExeption $e){
	exit('Data base error.');
}
?>