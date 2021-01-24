<?php

//MENSAGEM PARA SUCESSO OU NÃO DE UMA EXECUÇÃO
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

//LISTAGEM DE DADOS DA TURMA
$resultados = '';
foreach ($turmas as $turma) {
    $resultados .= '<tr>
                        <td>' . $turma->id_turma . '</td>
                        <td>' . $turma->ano . '</td>
                        <td>' . $turma->turno . '</td>
                        <td>' . $turma->serie . '</td>
                        <td>' . $turma->nivelEnsino . '</td>
                        <td>' . ($turma->situacao == 's' ? 'Ativo' : 'Inativo') . '</td>
                        <td>' . date('d/m/Y à\s H:i:s', strtotime($turma->data)) . '</td>
                        <td>
                          <a href="edit-turma.php?id=' . $turma->id_turma . '"><button type="button" class="btn btn-primary">Editar</button></a>
                          <a href="delet-turma.php?id=' . $turma->id_turma . '"><button type="button" class="btn btn-danger">Excluir</button></a>
                        </td>
                      </tr>';
}

$resultados = strlen($resultados) ? $resultados : '<tr>
                                                    <td colspan="6" class="text-center">
                                                        Nenhuma turma encontrada!
                                                    </td>
                                                    </tr>';

?>

<main>

    <?= $mensagem ?>

    <section>
        <a href="cad-turma.php">
            <button class="btn btn-success mt-3">Nova Turma</button>
        </a>
    </section>

    <section>
        <form method="get" action="">
            <div class="row my-4">
                <div class="col">
                    <label for="">Buscar por nome</label>
                    <input type="text" name="busca" class="form-control" value="<?=$busca ?>">
                </div>

                <div class="col">
                    <label for="">Status</label>
                    <select name="status" class="form-control">
                        <option value="">Ativa/Inativa</option>
                        <option value="s" <?=$filtroStatus == 's' ? 'selected' : '' ?>>Ativa</option>
                        <option value="n" <?=$filtroStatus == 'n' ? 'selected' : '' ?>>Inativa</option>
                    </select>                    
                </div>

                <div class="col d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
            </div>
        </form>
    </section>

    <section>
        <table class="table table-responsive-lg bg-light mt-3">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Ano</th>
                    <th>Turno</th>
                    <th>Série</th>
                    <th>Nível de Ensino</th>
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