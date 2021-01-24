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

//LISTAGEM DE DADOS DO ALUNO
$resultados = '';
foreach ($alunos as $aluno) {
    $resultados .= '<tr>
                        <td>' . $aluno->id_aluno . '</td>
                        <td>' . $aluno->nomeAluno . '</td>
                        <td>' . $aluno->email . '</td>
                        <td>' . $aluno->telefone . '</td>
                        <td>' . date('d/m/Y', strtotime($aluno->dtNascimento)) . '</td>
                        <td>' . ($aluno->genero == 'm' ? 'Masculino' : 'Feminino') . '</td>
                        <td>' . ($aluno->situacao == 's' ? 'Ativo' : 'Inativo') . '</td>
                        <td>' . date('d/m/Y à\s H:i:s', strtotime($aluno->data)) . '</td>
                        <td>
                          <a href="edit-aluno.php?id=' . $aluno->id_aluno . '"><button type="button" class="btn btn-primary">Editar</button></a>
                          <a href="delet-aluno.php?id=' . $aluno->id_aluno . '"><button type="button" class="btn btn-danger">Excluir</button></a>
                        </td>
                      </tr>';
}

$resultados = strlen($resultados) ? $resultados : '<tr>
                                                    <td colspan="6" class="text-center">
                                                        Nenhum aluno encontrada!
                                                    </td>
                                                    </tr>';

?>

<main>

    <?= $mensagem ?>

    <section>
        <a href="cad-aluno.php">
            <button class="btn btn-success mt-3">Novo Aluno</button>
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
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Data de Nascimento</th>
                    <th>Gênero</th>
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