<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Aluno;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: alunos.php?status=error');
  exit;
}

//CONSULTA O ALUNO
$obAluno = Aluno::getAluno($_GET['id']);

//VALIDAÇÃO DO ALUNO
if(!$obAluno instanceof Aluno){
  header('location: alunos.php?status=error');
  exit;
}


//VALIDAÇÃO DO POST
if(isset($_POST['excluir'])){

    $obAluno->excluir();

    header('location: alunos.php?status=success');
  exit;
  }

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/confirm-exclusao-aluno.php';
include __DIR__ . '/includes/footer.php';



?>

