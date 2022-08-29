<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class PeriodoTaf extends Modelo
{
    const BUSCAR_TODOS = 'SELECT * FROM periodo_taf';
    const BUSCAR_ID = 'SELECT * FROM periodo_taf WHERE id_periodo_taf = ?';
    const INSERIR = 'INSERT INTO periodo_taf(numero_taf, data, chamada) VALUES (?, ?, ?)';
    const ATUALIZAR = 'UPDATE periodo_taf SET numero_taf = ?, data = ?, chamada = ? WHERE id_periodo_taf = ?';
    const DELETAR = 'DELETE FROM periodo_taf WHERE id_periodo_taf = ?';
    private $id_periodo_taf;
    private $numero_taf;
    private $data;
    private $chamada;
       

    public function __construct($numero_taf = null, $data = null, $chamada = null, $id_periodo_taf = null)
    {
        $this->numero_taf = $numero_taf;
        $this->data = $data;
        $this->chamada = $chamada;
        $this->id_periodo_taf = $id_periodo_taf;

    }

    public function getNumeroTaf()
    {
        return $this->numero_taf;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getChamada()
    {
        return $this->chamada;
    }

    public function getIdPeriodoTaf()
    {
        return $this->id_periodo_taf;
    }    
    
    public function getChamadaCompleta()
    {
        return $this->chamada.' do '.$this->numero_taf.' de '. date('d/m/Y',  strtotime($this->data));
    }

    public function setNumeroTaf($numero_taf)
    {
        $this->numero_taf = $numero_taf;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function setChamada($chamada)
    {
        $this->chamada = $chamada;
    }

    public function salvar()
    {
        $this->inserir();
    }

    public function inserir()
    {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);        
        $comando->bindValue(1, $this->numero_taf, PDO::PARAM_STR);
        $comando->bindValue(2, $this->data, PDO::PARAM_STR);
        $comando->bindValue(3, $this->chamada, PDO::PARAM_STR);
        $comando->execute();
        $this->id_periodo_taf = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public function atualizar()
    {
        $comando = DW3BancoDeDados::prepare(self::ATUALIZAR);   
        $comando->bindValue(1, $this->numero_taf, PDO::PARAM_STR);
        $comando->bindValue(2, $this->data, PDO::PARAM_STR);
        $comando->bindValue(3, $this->chamada, PDO::PARAM_STR);
        $comando->bindValue(4, $this->id_periodo_taf, PDO::PARAM_STR);
        $comando->execute();
    }

    public static function buscarTodos()
    {
        $registros = DW3BancoDeDados::query(self::BUSCAR_TODOS);
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new PeriodoTaf(
                $registro['numero_taf'],
                $registro['data'],
                $registro['chamada'],
                $registro['id_periodo_taf'],
            );
        }
        return $objetos;
    }

    public static function buscarId($id_su)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $id_su, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();
        return new PeriodoTaf(
                $registro['numero_taf'],
                $registro['data'],
                $registro['chamada'],
                $registro['id_periodo_taf'],
        );
    }

    public static function destruir($id_periodo_taf)
    {
        $comando = DW3BancoDeDados::prepare(self::DELETAR);
        $comando->bindValue(1, $id_periodo_taf, PDO::PARAM_INT);
        $comando->execute();
    }
}
