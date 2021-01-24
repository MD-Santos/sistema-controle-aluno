<?php

namespace App\Entity;

use App\Db\Database;
use PDO;

class Turma{

     /**
     * Identificador único da turma
     * @var integer
     */
    public $id_turma;

    /**
     * Ano da turma
     * @var string
     */
    public $ano;
  
    /**
     * Turno da turma
     * @var string
     */
    public $turno;
  
    /**
     * Série da turma
     * @var string
     */
    public $serie;

    /**
     * Nível de ensino
     * @var string
     */
    public $nivelEnsino;
  
    /**
     * Define se a turma está ativa
     * @var string(s/n)
     */
    public $situacao;
  
    /**
     * Data de cadastro da turma
     * @var string
     */
    public $data;

    /**
   * Método responsável por cadastrar uma nova turma no banco
   * @return boolean
   */
  public function cadastrar(){
    //DEFINIR A DATA
    $this->data = date('Y-m-d H:i:s');

    //INSERIR A TURMA NO BANCO
    $obDatabase = new Database ('turma');
    $this->id_turma = $obDatabase->insert([
                                      'ano'         =>  $this->ano,
                                      'turno'       =>  $this->turno,
                                      'serie'       =>  $this->serie,
                                      'nivelEnsino' =>  $this->nivelEnsino,
                                      'situacao'    =>  $this->situacao,
                                      'data'        =>  $this->data
                                    ]);

    //RETORNAR SUCESSO
    return true;
  }

  /**
   * Método responsável por atualizar a turma no banco
   * @return boolean
   */
  public function atualizar(){
    return (new Database('turma'))->update('id_turma = '.$this->id_turma,[
                                            'ano'         =>  $this->ano,
                                            'turno'       =>  $this->turno,
                                            'serie'       =>  $this->serie,
                                            'nivelEnsino' =>  $this->nivelEnsino,
                                            'situacao'    =>  $this->situacao,
                                            'data'        =>  $this->data
                                        ]);
  }

  /**
   * Método responsável por excluir a turma do banco
   * @return boolean
   */
  public function excluir(){
    return (new Database('turma'))->delete('id_turma = '.$this->id_turma);
  }

  /**
   * Método responsável por obter as turmas do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getTurmas($where = null, $order = null, $limit = null){
    return (new Database('turma'))->select($where,$order,$limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  /**
   * Método responsável por buscar uma turma com base em seu ID
   * @param  integer $id
   * @return Turma
   */
  public static function getTurma($id_turma){
    return (new Database('turma'))->select('id_turma = '.$id_turma)
                                  ->fetchObject(self::class);
  }

}