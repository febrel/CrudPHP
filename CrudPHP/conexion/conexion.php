<?php
   $servidor = "mysql:dbname=empresa;host=127.0.0.1";
   $usuario = "root";
   $pass="";
   try {
       $pdo = new PDO($servidor,$usuario,$pass); 
       echo "Conectado...";

   } catch (PDOException $e) {
      echo "Conexion mala" .$e->getMessage();
   }

?>