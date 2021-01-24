<main>
    <section>
        <a href="turmas.php">
            <button class="btn btn-primary mt-3">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3 mb-4"><?=TITLE?></h2>

    <form method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="nivelEnsino" placeholder="Nível de Ensino" value="<?=$obTurma->nivelEnsino ?>" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 ml-1">
                    <input type="text" class="form-control" name="turno" placeholder="Turno" value="<?=$obTurma->turno ?>">
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="serie" placeholder="Série" value="<?=$obTurma->serie ?>">
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="ano" placeholder="Ano" value="<?=$obTurma->ano ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="mt-3">Situação</label>

            <div>
                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="situacao" value="s" checked> Ativo
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="situacao" value="n" <?=$obTurma->situacao == 'n' ? 'checked' : '' ?>>Inativo
                    </label>
                </div>
            </div>

        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success"><?=TITLE2?></button>
        </div>

    </form>

</main>