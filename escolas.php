<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Escola;

$escolas = Escola::getEscolas();

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagem-escolas.php';
include __DIR__ . '/includes/footer.php';

?>

