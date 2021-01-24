<?php

require __DIR__ . '/vendor/autoload.php';

//CONSTANTES PARA NOMES DINAMICOS
define('TITLE','Editar Escola');
define('TITLE2','Editar');

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
if(isset($_POST['nomeEscola'],$_POST['nomeRua'],$_POST['nomeBairro'],$_POST['cep'],$_POST['situacao'])){
    //$obEscola = new Escola;
    $obEscola->nomeEscola   = $_POST['nomeEscola'];
    $obEscola->nomeRua      = $_POST['nomeRua'];
    $obEscola->nomeBairro   = $_POST['nomeBairro'];
    $obEscola->cep          = $_POST['cep'];
    $obEscola->situacao     = $_POST['situacao'];
    $obEscola->atualizar();

    header('location: escolas.php?status=success');
  exit;
  }

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/form-escola.php';
include __DIR__ . '/includes/footer.php';



?>

