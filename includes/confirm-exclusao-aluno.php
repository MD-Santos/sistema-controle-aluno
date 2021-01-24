<main>
    <h2 class="mt-3 mb-4">Excluir Aluno</h2>

    <form method="post">
        <div class="form-group col-md-6">
            <p>Você realmente deseja excluir o aluno <strong><?=$obAluno->nomeAluno ?></strong>?</p>
        </div>

        <div class="form-group">
        <a href="alunos.php"><button type="button" class="btn btn-primary mt-3">Cancelar</button></a>
            <button type="submit" name="excluir" class="btn btn-danger mt-3">Excluir</button>
        </div>

    </form>

</main>