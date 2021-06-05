<?php
$hostname='127.0.0.1';
$dbname='test';
$username='root';
try{
$PDO = new PDO("mysql://hostname={$hostname};dbname={$dbname}",$username,'');
$PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
   $e->getMessage();
}
?>