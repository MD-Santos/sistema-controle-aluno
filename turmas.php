<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Turma;

$turmas = Turma::getTurmas();

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagem-turmas.php';
include __DIR__ . '/includes/footer.php';

?>