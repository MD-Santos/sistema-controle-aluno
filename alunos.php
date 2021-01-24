<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Aluno;

//BUSCA
$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);

//BUSCA POR FILTRO STATUS
$filtroStatus = filter_input(INPUT_GET, 'status', FILTER_SANITIZE_STRING);
$filtroStatus = in_array($filtroStatus, ['s','n']) ? $filtroStatus : "";

//CONDIÇÕES SQL
$condicoes = [
    strlen($busca) ? 'nomeAluno LIKE "%'.str_replace(' ','%',$busca).'%"' : null,
    strlen($filtroStatus) ? 'situacao = "'.$filtroStatus.'"' : null
];

//REMOVE POSIÇÕES VAZIAS
$condicoes = array_filter($condicoes);

//CLAUSULA WHERE
$where = implode(' AND ', $condicoes);

//OBTEM AS ALUNOS
$alunos = Aluno::getAlunos($where);

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagem-alunos.php';
include __DIR__ . '/includes/footer.php';

?>