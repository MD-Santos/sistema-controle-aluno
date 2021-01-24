# Sistema de Controle de Alunos

 Sistema de controle de alunos de uma escola. Projeto criado como Teste de Seleção para Desenvolvedor PHP da Estuda.com

## Banco de dados
Importe o Banco de Dados 'controle_alunos' ou crie um novo executando as instruções SQLs abaixo para criar as tabelas `aluno`, `turma`, `escola`, `aluno_turma`:

```sql
  CREATE TABLE aluno (
id_aluno int PRIMARY KEY AUTO_INCREMENT,
nomeAluno varchar(255),
email varchar(50),
telefone varchar(50),
dtNascimento date,
genero ENUM('m','f'),
data timestamp,
situacao ENUM('s','n')
);

    CREATE TABLE turma (
id_turma int PRIMARY KEY AUTO_INCREMENT,
turno varchar(20),
nivelEnsino varchar(50),
ano varchar(20),
serie varchar(20),
data timestamp,
situcao ENUM('s','n')
);

    CREATE TABLE escola (
id_escola int PRIMARY KEY AUTO_INCREMENT,
nomeEscola varchar(255),
rua varchar(50),
cep varchar(50),
bairro varchar(100),
data timestamp,
situacao ENUM('s','n'),
id_turma int,
FOREIGN KEY(id_turma) REFERENCES turma (id_turma)
);

    CREATE TABLE aluno_turma (
id_turma int,
id_aluno int,
FOREIGN KEY(id_turma) REFERENCES turma (id_turma),
FOREIGN KEY(id_aluno) REFERENCES aluno (id_aluno)
)
  COLLATE='utf8_general_ci'
  ENGINE=InnoDB
```

## Configuração
As credenciais do banco de dados estão no arquivo `./app/Db/Database.php` e devem ser alteradas para as configurações do seu ambiente (HOST, NAME, USER e PASS).

## Composer
Para a aplicação funcionar, é necessário rodar o Composer para que sejam criados os arquivos responsáveis pelo autoload das classes.

Caso não tenha o Composer instalado, baixe pelo site oficial: [Composer](https://getcomposer.org/download/)

Para rodar o composer, basta acessar a pasta do projeto e executar o comando abaixo em seu terminal:
```shell
 composer install
```

Após essa execução uma pasta com o nome `vendor` será criada na raiz do projeto e você já poderá acessar pelo seu navegador.

