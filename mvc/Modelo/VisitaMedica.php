<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;
use \Modelo\Usuario;

class VisitaMedica extends Modelo
{
    const BUSCAR_TODOS = 'SELECT * FROM visita_medica';
    const BUSCAR_ID = 'SELECT * FROM visita_medica WHERE id_visita_medica = ?';
    const BUSCAR_NOME = 'SELECT * FROM visita_medica WHERE motivo LIKE ?';
    const BUSCAR_PELOTAO = 'SELECT * FROM visita_medica JOIN militar USING(id_militar) WHERE pelotao = ?';
    const BUSCAR_ID_MILITAR = 'SELECT * FROM visita_medica WHERE id_militar = ?';
    const INSERIR = 'INSERT INTO visita_medica(motivo, data, id_militar, id_medico) VALUES (?, ?, ?, ?)';
    const ATUALIZAR = 'UPDATE visita_medica SET motivo = ?, data = ?, id_militar = ?, id_medico = ? WHERE id_visita_medica = ?';
    const DELETAR = 'DELETE FROM visita_medica WHERE id_visita_medica = ?';
    private $motivo;
    private $data;
    private $medico;
    private $id_militar;
    private $militar;
    private $id_medico;
    private $id_visita_medica;   

    public function __construct($motivo = null, $data = null, $id_militar = null, $id_medico = null, $id_visita_medica = null)
    {
        $this->motivo = $motivo;
        $this->data = $data;
        $this->id_militar = $id_militar;
        $this->id_medico = $id_medico;
        $this->id_visita_medica = $id_visita_medica;

    }

    public function getMotivo()
    {
        return $this->motivo;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getMedico()
    {
        if ($this->medico == null) {
            $this->medico = Medico::buscarId($this->id_medico);
        }
        return $this->medico;
    }

    public function getId_militar()
    {
        return $this->id_militar;
    }    

    public function getId_medico()
    {
        return $this->id_medico;
    }

    public function getId()
    {
        return $this->id_visita_medica;
    }

     public function getMilitar()
    {
        if ($this->militar == null) {
            $this->militar = Militar::buscarId($this->id_militar);
        }
        return $this->militar;
    }

    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function setId_militar($id_militar)
    {
        $this->id_militar = $id_militar;
    }

     public function setId_medico($id_medico)
    {
        $this->id_medico = $id_medico;
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
        $comando->bindValue(3, $this->id_militar, PDO::PARAM_STR);
        $comando->bindValue(4, $this->id_medico, PDO::PARAM_STR);
        $comando->execute();
        $this->id_visita_medica = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public function atualizar()
    {
        $comando = DW3BancoDeDados::prepare(self::ATUALIZAR);
        $comando->bindValue(1, $this->motivo, PDO::PARAM_STR);
        $comando->bindValue(2, $this->data, PDO::PARAM_STR);
        $comando->bindValue(3, $this->id_militar, PDO::PARAM_STR);
        $comando->bindValue(4, $this->id_medico, PDO::PARAM_STR);
        $comando->bindValue(5, $this->id_visita_medica, PDO::PARAM_STR);
        $comando->execute();
    }

    public static function buscarTodos()
    {
        $registros = DW3BancoDeDados::query(self::BUSCAR_TODOS);
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new VisitaMedica(
                $registro['motivo'],
                $registro['data'],
                $registro['id_militar'],
                $registro['id_medico'],
                $registro['id_visita_medica'],
            );
        }
        return $objetos;
    }

    public static function buscarId($id_visita_medica)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $id_visita_medica, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();
        return new VisitaMedica(
                $registro['motivo'],
                $registro['data'],
                $registro['id_militar'],
                $registro['id_medico'],
                $registro['id_visita_medica'],
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
            $objetos[] = new VisitaMedica(
                $registro['motivo'],
                $registro['data'],
                $registro['id_militar'],
                $registro['id_medico'],
                $registro['id_visita_medica'],
            );
        }
        return $objetos;
    }

    public static function buscarMilitar($visita_medica)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_NOME);
        $comando->bindValue(1, $visita_medica, PDO::PARAM_STR);
        $comando->execute();
        $registro = $comando->fetch();
        $visita_medica = null;
        if ($registro) {
            $secao = new VisitaMedica(
                $registro['motivo'],
                $registro['data'],
                $registro['id_militar'],
                $registro['id_medico'],
                $registro['id_visita_medica'],
            );
        }
        return $visita_medica;
    }

    public static function buscarIdMilitar($id_militar)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID_MILITAR);
        $comando->bindValue(1, $id_militar, PDO::PARAM_STR);
        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new VisitaMedica(
                $registro['motivo'],
                $registro['data'],
                $registro['id_militar'],
                $registro['id_medico'],
                $registro['id_visita_medica'],
            );
        }
        return $objetos;
    }

    public static function destruir($id_visita_medica)
    {
        $comando = DW3BancoDeDados::prepare(self::DELETAR);
        $comando->bindValue(1, $id_visita_medica, PDO::PARAM_INT);
        $comando->execute();
    }
}
