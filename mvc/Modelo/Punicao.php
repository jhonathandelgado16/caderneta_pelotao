<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Punicao extends Modelo
{
    const BUSCAR_TODOS = 'SELECT * FROM punicao';
    const BUSCAR_ID = 'SELECT * FROM punicao WHERE id_punicao = ?';
    const BUSCAR_SU = 'SELECT * FROM punicao JOIN militar USING(id_militar) WHERE id_su = ?';
    const BUSCAR_ID_MILITAR = 'SELECT * FROM punicao JOIN militar USING(id_militar) WHERE id_militar = ?';
    const INSERIR = 'INSERT INTO punicao( motivo, data_inicio, data_termino, bi, punicao, id_militar) VALUES (?, ?, ?, ?, ?, ?)';
    const ATUALIZAR = 'UPDATE punicao SET motivo = ?, data_inicio = ?, data_termino = ?, bi = ?, punicao = ?, id_militar = ? WHERE id_punicao = ?';
    const DELETAR = 'DELETE FROM punicao WHERE id_punicao = ?';

    private $motivo;
    private $data_inicio;
    private $data_termino;
    private $bi;
    private $punicao;
    private $id_militar;
    private $id_punicao;    
    private $militar;

    public function __construct($motivo = null, $data_inicio = null, $data_termino = null, $bi = null, $punicao = null, $id_militar = null, $id_punicao = null)
    {
        $this->motivo = $motivo;
        $this->data_inicio = $data_inicio;
        $this->data_termino = $data_termino;
        $this->bi = $bi;
        $this->punicao = $punicao;
        $this->id_militar = $id_militar;
        $this->id_punicao = $id_punicao;
    }

    public function getMotivo()
    {
        return $this->motivo;
    }

    public function getDataInicio()
    {
        return $this->data_inicio;
    }

    public function getDataTermino()
    {
        return $this->data_termino;
    }

    public function getBi()
    {
        return $this->bi;
    }    

    public function getPunicao()
    {
        switch ($this->punicao) {
            case 'fo-':
                return 'FO-';
                break;
            case 'advertencia':
                return 'Advertência';
                break;
            case 'impedimento':
                return 'Impedimento';
                break;
            case 'repreensao':
                return 'Repreensão';
                break;
            case 'detencao':
                return 'Detenção';
                break;
            case 'prisao':
                return 'Prisão';
                break;
        }
        
    }

    public function getIdMilitar()
    {
        return $this->id_militar;
    }

     public function getIdPunicao()
    {
        return $this->id_punicao;
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

    public function setDataInicio($data_inicio)
    {
        $this->data_inicio = $data_inicio;
    }

    public function setDataTermino($data_termino)
    {
        $this->data_termino = $data_termino;
    }

    public function setBi($bi)
    {
        $this->bi = $bi;
    }

    public function setPunicao($punicao)
    {
        $this->punicao = $punicao;
    }

    public function setId_militar($id_militar)
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
        $comando->bindValue(2, $this->data_inicio, PDO::PARAM_STR);
        $comando->bindValue(3, $this->data_termino, PDO::PARAM_STR);
        $comando->bindValue(4, $this->bi, PDO::PARAM_STR);
        $comando->bindValue(5, $this->punicao, PDO::PARAM_STR);
        $comando->bindValue(6, $this->id_militar, PDO::PARAM_STR);
        $comando->execute();
        $this->id_punicao = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public function atualizar()
    {
        $comando = DW3BancoDeDados::prepare(self::ATUALIZAR);
        $comando->bindValue(1, $this->motivo, PDO::PARAM_STR);
        $comando->bindValue(2, $this->data_inicio, PDO::PARAM_STR);
        $comando->bindValue(3, $this->data_termino, PDO::PARAM_STR);
        $comando->bindValue(4, $this->bi, PDO::PARAM_STR);
        $comando->bindValue(5, $this->punicao, PDO::PARAM_STR);
        $comando->bindValue(6, $this->id_militar, PDO::PARAM_STR);
        $comando->bindValue(7, $this->id_punicao, PDO::PARAM_STR);
        $comando->execute();
    }

    public static function buscarTodos()
    {
        $registros = DW3BancoDeDados::query(self::BUSCAR_TODOS);
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Punicao(
                $registro['motivo'],
                $registro['data_inicio'],
                $registro['data_termino'],
                $registro['bi'],
                $registro['punicao'],
                $registro['id_militar'],
                $registro['id_punicao'],
            );
        }
        return $objetos;
    }

    public static function buscarId($id_punicao)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $id_punicao, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();
        return new Punicao(
                $registro['motivo'],
                $registro['data_inicio'],
                $registro['data_termino'],
                $registro['bi'],
                $registro['punicao'],
                $registro['id_militar'],
                $registro['id_punicao'],
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
            $objetos[] = new Punicao(
                $registro['motivo'],
                $registro['data_inicio'],
                $registro['data_termino'],
                $registro['bi'],
                $registro['punicao'],
                $registro['id_militar'],
                $registro['id_punicao'],
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
            $objetos[] = new Punicao(
                $registro['motivo'],
                $registro['data_inicio'],
                $registro['data_termino'],
                $registro['bi'],
                $registro['punicao'],
                $registro['id_militar'],
                $registro['id_punicao'],
            );
        }
        return $objetos;
    }

    public static function destruir($id_punicao)
    {
        $comando = DW3BancoDeDados::prepare(self::DELETAR);
        $comando->bindValue(1, $id_punicao, PDO::PARAM_INT);
        $comando->execute();
    }
}
