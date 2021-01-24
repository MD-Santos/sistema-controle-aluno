<main>
  <section>
    <a href="alunos.php">
      <button class="btn btn-primary mt-3">Voltar</button>
    </a>
  </section>

  <h2 class="mt-3 mb-4"><?= TITLE ?></h2>

  <form method="post">
    <div class="form-row">
      <div class="form-group col-md-6">
        <input type="text" class="form-control" name="nomeAluno" placeholder="Nome do Aluno" value="<?= $obAluno->nomeAluno ?>" required>
      </div>
      <div class="form-row">
        <div class="col-7 ml-1">
          <input type="email" class="form-control" name="email" placeholder="E-mail" value="<?= $obAluno->email ?>">
        </div>
        <div class="col">
          <input type="tel" class="form-control" name="telefone" placeholder="Telefone" value="<?= $obAluno->telefone ?>">
        </div>
        <div class="col">
          <input type="date" class="form-control" name="dtNascimento" placeholder="Data de Nascimento" value="<?= $obAluno->dtNascimento ?>">
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="mt-3">Gênero</label>

      <div>
        <div class="form-check form-check-inline">
          <label class="form-control">
            <input type="radio" name="genero" value="m" checked> Masculino
          </label>
        </div>

        <div class="form-check form-check-inline">
          <label class="form-control">
            <input type="radio" name="genero" value="f" <?= $obAluno->genero == 'f' ? 'checked' : '' ?>>Feminino
          </label>
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
            <input type="radio" name="situacao" value="n" <?= $obAluno->situacao == 'n' ? 'checked' : '' ?>>Inativo
          </label>
        </div>
      </div>

    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success"><?= TITLE2 ?></button>
    </div>

  </form>

</main>