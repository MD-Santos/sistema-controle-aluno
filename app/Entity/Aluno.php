<?php

namespace App\Entity;

use App\Db\Database;
use PDO;

class Aluno{

     /**
     * Identificador único do aluno
     * @var integer
     */
    public $id_aluno;
  
    /**
     * Nome do aluno
     * @var string
     */
    public $nomeAluno;
  
    /**
     * E-mail do aluno
     * @var string
     */
    public $email;

    /**
     * Telefone do aluno
     * @var string
     */
    public $telefone;

    /**
     * Data de nascimento
     * @var string
     */
    public $dtNascimento;

    /**
     * Genero do aluno
     * @var string(m/f)
     */
    public $genero;
  
    /**
     * Define se o aluno está ativo
     * @var string(s/n)
     */
    public $situacao;
  
    /**
     * Data de cadastro do aluno
     * @var string
     */
    public $data;

    /**
   * Método responsável por cadastrar um novo aluno no banco
   * @return boolean
   */
  public function cadastrar(){
    //DEFINIR A DATA
    $this->data = date('Y-m-d H:i:s');

    //INSERIR A ALUNO NO BANCO
    $obDatabase = new Database ('aluno');
    $this->id = $obDatabase->insert([
                                      'nomeAluno'       =>  $this->nomeAluno,
                                      'email'           =>  $this->email,
                                      'telefone'        =>  $this->telefone,
                                      'dtNascimento'    =>  $this->dtNascimento,
                                      'genero'          =>  $this->genero,
                                      'situacao'        =>  $this->situacao,
                                      'data'            =>  $this->data
                                    ]);

    //RETORNAR SUCESSO
    return true;
  }

  /**
   * Método responsável por atualizar o aluno no banco
   * @return boolean
   */
  public function atualizar(){
    return (new Database('aluno'))->update('id_aluno = '.$this->id_aluno,[
                                            'nomeAluno'       =>  $this->nomeAluno,
                                            'email'           =>  $this->email,
                                            'telefone'        =>  $this->telefone,
                                            'dtNascimento'    =>  $this->dtNascimento,
                                            'genero'          =>  $this->genero,
                                            'situacao'        =>  $this->situacao,
                                            'data'            =>  $this->data
                                        ]);
  }

  /**
   * Método responsável por excluir o aluno do banco
   * @return boolean
   */
  public function excluir(){
    return (new Database('aluno'))->delete('id_aluno = '.$this->id_aluno);
  }

  /**
   * Método responsável por obter os alunos do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getAlunos($where = null, $order = null, $limit = null){
    return (new Database('aluno'))->select($where,$order,$limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  /**
   * Método responsável por buscar um aluno com base em seu ID
   * @param  integer $id
   * @return Aluno
   */
  public static function getAluno($id_aluno){
    return (new Database('aluno'))->select('id_aluno = '.$id_aluno)
                                  ->fetchObject(self::class);
  }

}