<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Escola;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: escolas.php?status=error');
  exit;
}

//CONSULTA A ESCOLA
$obEscola = Escola::getEscola($_GET['id']);

//VALIDAÇÃO DA ESCOLA
if(!$obEscola instanceof Escola){
  header('location: escolas.php?status=error');
  exit;
}


//VALIDAÇÃO DO POST
if(isset($_POST['excluir'])){

    $obEscola->excluir();

    header('location: escolas.php?status=success');
  exit;
  }

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/confirm-exclusao.php';
include __DIR__ . '/includes/footer.php';



?>

