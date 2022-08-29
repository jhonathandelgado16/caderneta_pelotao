<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Recompensa extends Modelo
{
    const BUSCAR_TODOS = 'SELECT * FROM recompensa';
    const BUSCAR_ID = 'SELECT * FROM recompensa WHERE id_recompensa = ?';
    const BUSCAR_SU = 'SELECT * FROM recompensa JOIN militar USING(id_militar) WHERE id_su = ?';
    const BUSCAR_ID_MILITAR = 'SELECT * FROM recompensa JOIN militar USING(id_militar) WHERE id_militar = ?';
    const INSERIR = 'INSERT INTO recompensa(motivo, data, recompensa, militar_responsavel, id_militar) VALUES (?, ?, ?, ?, ?)';
    const ATUALIZAR = 'UPDATE recompensa SET motivo = ?, data = ?, recompensa = ?, militar_responsavel = ?, id_militar = ? WHERE id_recompensa = ?';
    const DELETAR = 'DELETE FROM recompensa WHERE id_recompensa = ?';
    private $motivo;
    private $data;
    private $recompensa;
    private $militar_responsavel;
    private $militar;
    private $id_militar;
    private $id_recompensa;   

    public function __construct($motivo = null, $data = null, $recompensa = null, $militar_responsavel = null, $id_militar = null, $id_recompensa = null)
    {
        $this->motivo = $motivo;
        $this->data = $data;
        $this->recompensa = $recompensa;
        $this->militar_responsavel = $militar_responsavel;
        $this->id_militar = $id_militar;
        $this->id_recompensa = $id_recompensa;

    }

    public function getMotivo()
    {
        return $this->motivo;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getRecompensa()
    {
        return $this->recompensa;
    }

    public function getMilitarResponsavel()
    {
        return $this->militar_responsavel;
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

    public function getIdRecompensa()
    {
        return $this->id_recompensa;
    }

    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function setRecompensa($recompensa)
    {
        $this->recompensa = $recompensa;
    }

    public function setMilitarResponsavel($militar_responsavel)
    {
        $this->militar_responsavel = $militar_responsavel;
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
        $comando->bindValue(1, $this->motivo, PDO::PARAM_STR);
        $comando->bindValue(2, $this->data, PDO::PARAM_STR);
        $comando->bindValue(3, $this->recompensa, PDO::PARAM_STR);
        $comando->bindValue(4, $this->militar_responsavel, PDO::PARAM_STR);
        $comando->bindValue(5, $this->id_militar, PDO::PARAM_STR);
        $comando->execute();
        $this->id_recompensa = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public function atualizar()
    {
        $comando = DW3BancoDeDados::prepare(self::ATUALIZAR);
        $comando->bindValue(1, $this->motivo, PDO::PARAM_STR);
        $comando->bindValue(2, $this->data, PDO::PARAM_STR);
        $comando->bindValue(3, $this->recompensa, PDO::PARAM_STR);
        $comando->bindValue(4, $this->militar_responsavel, PDO::PARAM_STR);
        $comando->bindValue(5, $this->id_militar, PDO::PARAM_STR);
        $comando->bindValue(6, $this->id_recompensa, PDO::PARAM_STR);
        $comando->execute();
    }

    public static function buscarTodos()
    {
        $registros = DW3BancoDeDados::query(self::BUSCAR_TODOS);
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Recompensa(
                $registro['motivo'],
                $registro['data'],
                $registro['recompensa'],
                $registro['militar_responsavel'],
                $registro['id_militar'],
                $registro['id_recompensa']
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
        return new Recompensa(
                $registro['motivo'],
                $registro['data'],
                $registro['recompensa'],
                $registro['militar_responsavel'],
                $registro['id_militar'],
                $registro['id_recompensa']
        );
    }

    public static function buscarSu($id_su)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_SU);
        $comando->bindValue(1, $id_su, PDO::PARAM_STR);
        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Recompensa(
                $registro['motivo'],
                $registro['data'],
                $registro['recompensa'],
                $registro['militar_responsavel'],
                $registro['id_militar'],
                $registro['id_recompensa']
            );
        }
        return $objetos;
    }

    public static function buscarPunicaoMilitar($id_militar)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID_MILITAR);
        $comando->bindValue(1, $id_militar, PDO::PARAM_STR);
        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Recompensa(
                $registro['motivo'],
                $registro['data'],
                $registro['recompensa'],
                $registro['militar_responsavel'],
                $registro['id_militar'],
                $registro['id_recompensa']
            );
        }
        return $objetos;
    }

    public static function destruir($id_recompensa)
    {
        $comando = DW3BancoDeDados::prepare(self::DELETAR);
        $comando->bindValue(1, $id_recompensa, PDO::PARAM_INT);
        $comando->execute();
    }
}
