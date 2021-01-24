<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Turma;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: turmas.php?status=error');
  exit;
}

//CONSULTA A TURMA
$obTurma = Turma::getTurma($_GET['id']);

//VALIDAÇÃO DA TURMA
if(!$obTurma instanceof Turma){
  header('location: turmas.php?status=error');
  exit;
}


//VALIDAÇÃO DO POST
if(isset($_POST['excluir'])){

    $obEscola->excluir();

    header('location: turmas.php?status=success');
  exit;
  }

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/confirm-exclusao-turma.php';
include __DIR__ . '/includes/footer.php';



?>

