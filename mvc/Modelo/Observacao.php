<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Observacao extends Modelo
{
    const BUSCAR_TODOS = 'SELECT * FROM observacao';
    const BUSCAR_ID = 'SELECT * FROM observacao WHERE id_observacao = ?';
    const BUSCAR_PELOTAO = 'SELECT * FROM observacao JOIN militar USING(id_militar) WHERE pelotao = ?';
    const BUSCAR_ID_MILITAR = 'SELECT * FROM observacao JOIN militar USING(id_militar) WHERE id_militar = ?';
    const INSERIR = 'INSERT INTO observacao(observacao, militar_responsavel, data, id_militar) VALUES (?, ?, ?, ?)';
    const ATUALIZAR = 'UPDATE observacao SET observacao = ?, militar_responsavel = ?, data = ?, id_militar = ? WHERE id_observacao = ?';
    const DELETAR = 'DELETE FROM observacao WHERE id_observacao = ?';
    private $observacao;
    private $militar_responsavel;
    private $data;
    private $id_militar;
    private $militar;
    private $id_observacao;   

    public function __construct($observacao = null, $militar_responsavel = null, $data = null, $id_militar = null, $id_observacao = null)
    {
        $this->observacao = $observacao;
        $this->militar_responsavel = $militar_responsavel;
        $this->data = $data;
        $this->id_militar = $id_militar;
        $this->id_observacao = $id_observacao;
    }

    public function getObservacao()
    {
        return $this->observacao;
    }

    public function getMilitarResponsavel()
    {
        return $this->militar_responsavel;
    }  

    public function getData()
    {
        return $this->data;
    }      

    public function getDataBr()
    {
        return date('d/m/Y',  strtotime($this->data));
    }

    public function getIdMilitar()
    {
        return $this->id_militar;
    }
    

    public function getMilitar()
    {
        if ($this->militar == null) {
            $this->militar = Militar::buscarId($this->id_militar);
        }
        return $this->militar;
    }

    public function getIdObservacao()
    {
        return $this->id_observacao;
    }

    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;
    }

    public function setMilitarResponsavel($militar_responsavel)
    {
        $this->militar_responsavel = $militar_responsavel;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function setIdMilitar($id_militar)
    {
        $this->id_militar = $id_militar;
    }

    public function salvar()
    {
        $this->inserir();
    }

    public function inserir()
    {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);        
        $comando->bindValue(1, $this->observacao, PDO::PARAM_STR);
        $comando->bindValue(2, $this->militar_responsavel, PDO::PARAM_STR);
        $comando->bindValue(3, $this->data, PDO::PARAM_STR);
        $comando->bindValue(4, $this->id_militar, PDO::PARAM_STR);
        $comando->execute();
        $this->id_observacao = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public function atualizar()
    {
        $comando = DW3BancoDeDados::prepare(self::ATUALIZAR);
        $comando->bindValue(1, $this->observacao, PDO::PARAM_STR);
        $comando->bindValue(2, $this->militar_responsavel, PDO::PARAM_STR);
        $comando->bindValue(3, $this->data, PDO::PARAM_STR);
        $comando->bindValue(4, $this->id_militar, PDO::PARAM_STR);
        $comando->bindValue(5, $this->id_observacao, PDO::PARAM_STR);
        $comando->execute();
    }

    public static function buscarTodos()
    {
        $registros = DW3BancoDeDados::query(self::BUSCAR_TODOS);
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Observacao(
                $registro['observacao'],
                $registro['militar_responsavel'],
                $registro['data'],
                $registro['id_militar'],
                $registro['id_observacao']
            );
        }
        return $objetos;
    }

    public static function buscarId($id_recompensa)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $id_recompensa, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();
        return new Observacao(
                $registro['observacao'],
                $registro['militar_responsavel'],
                $registro['data'],
                $registro['id_militar'],
                $registro['id_observacao']
        );
    }

    public static function buscarPelotao($pelotao)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_PELOTAO);
        $comando->bindValue(1, $pelotao, PDO::PARAM_STR);
        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Observacao(
                $registro['observacao'],
                $registro['militar_responsavel'],
                $registro['data'],
                $registro['id_militar'],
                $registro['id_observacao']
            );
        }
        return $objetos;
    }

    public static function buscarObservacaoMilitar($id_militar)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID_MILITAR);
        $comando->bindValue(1, $id_militar, PDO::PARAM_STR);
        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Observacao(
                $registro['observacao'],
                $registro['militar_responsavel'],
                $registro['data'],
                $registro['id_militar'],
                $registro['id_observacao']
            );
        }
        return $objetos;
    }

    public static function destruir($id_observacao)
    {
        $comando = DW3BancoDeDados::prepare(self::DELETAR);
        $comando->bindValue(1, $id_observacao, PDO::PARAM_INT);
        $comando->execute();
    }
}
