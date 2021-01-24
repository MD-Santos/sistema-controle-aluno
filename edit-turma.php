<?php

require __DIR__ . '/vendor/autoload.php';

//CONSTANTES PARA NOMES DINAMICOS
define('TITLE','Editar turma');
define('TITLE2','Editar');

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
if(isset($_POST['ano'],$_POST['serie'],$_POST['turno'],$_POST['nivelEnsino'],$_POST['situacao'])){
    $obTurma->ano           = $_POST['ano'];
    $obTurma->serie         = $_POST['serie'];
    $obTurma->turno         = $_POST['turno'];
    $obTurma->nivelEnsino   = $_POST['nivelEnsino'];
    $obTurma->situacao      = $_POST['situacao'];
    $obTurma->atualizar();

    header('location: turmas.php?status=success');
  exit;
  }

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/form-turma.php';
include __DIR__ . '/includes/footer.php';



?>

