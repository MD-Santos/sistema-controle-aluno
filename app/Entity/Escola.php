<?php

namespace App\Entity;

use App\Db\Database;
use PDO;

class Escola{

     /**
     * Identificador único da escola
     * @var integer
     */
    public $id;
  
    /**
     * NOme da escola
     * @var string
     */
    public $nomeEscola;
  
    /**
     * Endereço [Rua]
     * @var string
     */
    public $nomeRua;

    /**
     * Endereço [CEP]
     * @var string
     */
    public $cep;

    /**
     * Endereço [Bairro]
     * @var string
     */
    public $nomeBairro;
  
    /**
     * Define se a escola está ativa
     * @var string(s/n)
     */
    public $situacao;
  
    /**
     * Data de cadastro da escola
     * @var string
     */
    public $data;

    /**
   * Método responsável por cadastrar uma nova escola no banco
   * @return boolean
   */
  public function cadastrar(){
    //DEFINIR A DATA
    $this->data = date('Y-m-d H:i:s');

    //INSERIR A ESCOLA NO BANCO
    $obDatabase = new Database ('escola');
    $this->id = $obDatabase->insert([
                                      'nomeEscola'  =>  $this->nomeEscola,
                                      'nomeRua'     =>  $this->nomeRua,
                                      'cep'         =>  $this->cep,
                                      'nomeBairro'  =>  $this->nomeBairro,
                                      'situacao'    =>  $this->situacao,
                                      'data'        =>  $this->data
                                    ]);

    //RETORNAR SUCESSO
    return true;
  }

  /**
   * Método responsável por atualizar a escola no banco
   * @return boolean
   */
  public function atualizar(){
    return (new Database('escola'))->update('id = '.$this->id,[
                                        'nomeEscola' =>    $this->nomeEscola,
                                        'nomeRua'    =>    $this->nomeRua,
                                        'cep'        =>    $this->cep,
                                        'nomeBairro' =>    $this->nomeBairro,
                                        'situacao'   =>    $this->situacao,
                                        'data'       =>    $this->data
                                                              ]);
  }

  /**
   * Método responsável por excluir a escola do banco
   * @return boolean
   */
  public function excluir(){
    return (new Database('escola'))->delete('id = '.$this->id);
  }

  /**
   * Método responsável por obter as escolas do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getEscolas($where = null, $order = null, $limit = null){
    return (new Database('escola'))->select($where,$order,$limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  /**
   * Método responsável por buscar uma escola com base em seu ID
   * @param  integer $id
   * @return Escola
   */
  public static function getEscola($id){
    return (new Database('escola'))->select('id = '.$id)
                                  ->fetchObject(self::class);
  }

}