<?php

$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
            break;

        case 'error':
            $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
            break;
    }
}

//LISTAGEM DE DADOS DA ESCOLA
$resultados = '';
foreach ($escolas as $escola) {
    $resultados .= '<tr>
                        <td>' . $escola->id . '</td>
                        <td>' . $escola->nomeEscola . '</td>
                        <td>' . $escola->nomeRua . '</td>
                        <td>' . $escola->nomeBairro . '</td>
                        <td>' . $escola->cep . '</td>
                        <td>' . ($escola->situacao == 's' ? 'Ativo' : 'Inativo') . '</td>
                        <td>' . date('d/m/Y à\s H:i:s', strtotime($escola->data)) . '</td>
                        <td>
                          <a href="edit-escola.php?id=' . $escola->id . '"><button type="button" class="btn btn-primary">Editar</button></a>
                          <a href="delet-escola.php?id=' . $escola->id . '"><button type="button" class="btn btn-danger">Excluir</button></a>
                        </td>
                      </tr>';
}

$resultados = strlen($resultados) ? $resultados : '<tr>
                                                    <td colspan="6" class="text-center">
                                                        Nenhuma escola encontrada!
                                                    </td>
                                                    </tr>';

?>

<main>

    <?= $mensagem ?>

    <section>
        <a href="cad-escola.php">
            <button class="btn btn-success mt-3">Nova Escola</button>
        </a>
    </section>

    <section>
        <table class="table table-responsive-lg bg-light mt-3">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Rua</th>
                    <th>Bairro</th>
                    <th>CEP</th>
                    <th>Situação</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody class="bg-info">
                <?= $resultados ?>
            </tbody>
        </table>
    </section>

</main>