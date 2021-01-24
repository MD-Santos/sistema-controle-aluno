<?php

require __DIR__ . '/vendor/autoload.php';

//CONSTANTES PARA NOMES DINAMICOS
define('TITLE','Cadastrar Escola');
define('TITLE2','Cadastrar');


use \App\Entity\Escola;

$obEscola = new Escola;


//VALIDAÇÃO DO POST
if(isset($_POST['nomeEscola'],$_POST['nomeRua'],$_POST['nomeBairro'],$_POST['cep'],$_POST['situacao'])){
    
    $obEscola->nomeEscola   = $_POST['nomeEscola'];
    $obEscola->nomeRua      = $_POST['nomeRua'];
    $obEscola->nomeBairro   = $_POST['nomeBairro'];
    $obEscola->cep          = $_POST['cep'];
    $obEscola->situacao     = $_POST['situacao'];
    $obEscola->cadastrar();

    header('location: escolas.php?status=success');
  exit;
  }

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/form-escola.php';
include __DIR__ . '/includes/footer.php';



?>

