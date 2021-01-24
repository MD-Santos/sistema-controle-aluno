<?php

require __DIR__ . '/vendor/autoload.php';

//CONSTANTES PARA NOMES DINAMICOS
define('TITLE','Cadastrar Aluno');
define('TITLE2','Cadastrar');


use \App\Entity\Aluno;

$obAluno = new Aluno;


//VALIDAÇÃO DO POST
if(isset($_POST['nomeAluno'],$_POST['email'],$_POST['telefone'],$_POST['dtNascimento'],$_POST['genero'],$_POST['situacao'])){
    
    $obAluno->nomeAluno           = $_POST['nomeAluno'];
    $obAluno->email         = $_POST['email'];
    $obAluno->telefone         = $_POST['telefone'];
    $obAluno->dtNascimento   = $_POST['dtNascimento'];
    $obAluno->genero      = $_POST['genero'];
    $obAluno->situacao      = $_POST['situacao'];
    $obAluno->cadastrar();

    header('location: alunos.php?status=success');
  exit;
  }

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/form-aluno.php';
include __DIR__ . '/includes/footer.php';

?>

