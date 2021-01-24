<?php

require __DIR__ . '/vendor/autoload.php';

//CONSTANTES PARA NOMES DINAMICOS
define('TITLE','Cadastrar turma');
define('TITLE2','Cadastrar');


use \App\Entity\Turma;

$obTurma = new Turma;


//VALIDAÇÃO DO POST
if(isset($_POST['ano'],$_POST['turno'],$_POST['serie'],$_POST['nivelEnsino'],$_POST['situacao'])){
    
    $obTurma->ano           = $_POST['ano'];
    $obTurma->turno         = $_POST['turno'];
    $obTurma->serie         = $_POST['serie'];
    $obTurma->nivelEnsino   = $_POST['nivelEnsino'];
    $obTurma->situacao      = $_POST['situacao'];
    $obTurma->cadastrar();

    header('location: turmas.php?status=success');
  exit;
  }

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/form-turma.php';
include __DIR__ . '/includes/footer.php';

?>

