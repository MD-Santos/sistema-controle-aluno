<main>
    <h2 class="mt-3 mb-4">Excluir Escola</h2>

    <form method="post">
        <div class="form-group col-md-6">
            <p>Você realmente deseja excluir a escola <strong><?=$obEscola->nomeEscola ?></strong>?</p>
        </div>

        <div class="form-group">
        <a href="escolas.php"><button type="button" class="btn btn-primary mt-3">Cancelar</button></a>
            <button type="submit" name="excluir" class="btn btn-danger mt-3">Excluir</button>
        </div>

    </form>

</main>