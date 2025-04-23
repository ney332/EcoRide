<?php

  $host = "localhost";
  $dbname = "ecoride";
  $user = "root";
  $pass = "root";

  try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    error_log($e->getMessage());
    echo "Erro ao conectar com o banco de dados.";
}

  function mensagem ($texto, $tipo) {
    echo "<div class='alert alert-$tipo' role='alert'>$texto</div>";
  }

?>