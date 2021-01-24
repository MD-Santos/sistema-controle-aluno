<main>
    <section>
        <a href="escolas.php">
            <button class="btn btn-primary mt-3">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3 mb-4"><?=TITLE?></h2>

    <form method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="nomeEscola" placeholder="Nome da Escola" value="<?=$obEscola->nomeEscola ?>" required>
            </div>
            <div class="form-row">
                <div class="col-7 ml-1">
                    <input type="text" class="form-control" name="nomeRua" placeholder="Rua" value="<?=$obEscola->nomeRua ?>">
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="nomeBairro" placeholder="Bairro" value="<?=$obEscola->nomeBairro ?>">
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="cep" placeholder="CEP" value="<?=$obEscola->cep ?>">
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
                        <input type="radio" name="situacao" value="n" <?=$obEscola->situacao == 'n' ? 'checked' : '' ?>>Inativo
                    </label>
                </div>
            </div>

        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success"><?=TITLE2?></button>
        </div>

    </form>

</main>