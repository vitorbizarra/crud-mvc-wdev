<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Vaga
{
    /**
     * Identificador único da vaga
     * @var integer
     */
    private $id;

    /**
     * Título da vaga
     * @var string
     */
    private $titulo;

    /**
     * Descrição da vaga (pode conter html)
     * @var string
     */
    private $descricao;

    /**
     * Define se a vaga está ativa
     * @var string(s/n)
     */
    private $ativo;

    /**
     * Data de publicação da vaga
     * @var string
     */
    private $data;

    /**
     * Retorna o id da vaga
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Define o titulo da vaga
     * @param string $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * Retorna o titulo da vaga
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Define a descricao da vaga
     * @param string $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * Retorna a descricao da vaga
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Define o status da vaga
     * @param string(s/n)
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
    }

    /**
     * Retorna o status da vaga
     * @return string(s/n)
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Retorna a data da vaga
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Método responsável por cadastrar uma nova vaga no banco
     * @return boolean
     */
    public function cadastrar()
    {
        // Inserir a vaga no banco
        $objDatabase = new Database('vagas');

        // Atribuir o id da vaga na instancia
        $this->id = $objDatabase->insert([
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'ativo' => $this->ativo,
        ]);
        // Retornar sucesso
    }

    /**
     * Método responsável por atualizar uma vaga no banco
     * @return boolean
     */
    public function atualizar()
    {
        return (new Database('vagas'))->update('id = ' . $this->id, [
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'ativo' => $this->ativo,
        ]);
    }

    /**
     * Método responsável por excluir uma vaga no banco
     * @return boolean
     */
    public function excluir()
    {
        return (new Database('vagas'))->delete('id = ' . $this->id);
    }

    /**
     * Método responsável por obter as vagas do banco de dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getVagas($where = null, $order = null, $limit = null)
    {
        return (new Database('vagas'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método responsável por obter as vagas do banco de dados
     * @param integer $id
     * @return Vaga
     */
    public static function getVaga($id)
    {
        return (new Database('vagas'))->select('id = ' . $id)->fetchObject(self::class);
    }
}
