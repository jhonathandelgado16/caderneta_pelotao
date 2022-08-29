<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Vacinacao extends Modelo
{
    const BUSCAR_TODOS = 'SELECT * FROM vacinacao ORDER BY id_vacina, data ASC';
    const BUSCAR_ID = 'SELECT * FROM vacinacao WHERE id_vacinacao = ?';
    const BUSCAR_VACINA = 'SELECT * FROM vacinacao WHERE id_vacina = ?';
    const BUSCAR_ID_MILITAR = 'SELECT * FROM vacinacao WHERE id_militar = ?';
    const INSERIR = 'INSERT INTO vacinacao(id_vacina, lote, validade, data, id_militar) VALUES (?, ?, ?, ?, ?)';
    const ATUALIZAR = 'UPDATE vacinacao SET id_vacina = ?, lote = ?, validade = ?, data = ?, id_militar = ? WHERE id_vacinacao = ?';
    const DELETAR = 'DELETE FROM vacinacao WHERE id_vacinacao = ?';
    private $vacina;
    private $id_vacina;
    private $lote;
    private $validade;
    private $data;
    private $id_militar;
    private $militar;
    private $id_vacinacao;   
    private $militares;

    public function __construct($id_vacina = null, $lote = null, $validade = null, $data = null, $id_militar = null, $id_vacinacao = null)
    {
        $this->id_vacina = $id_vacina;
        $this->lote = $lote;
        $this->validade = $validade;
        $this->data = $data;
        $this->id_militar = $id_militar;
        $this->id_vacinacao = $id_vacinacao;
    }

    public function getIdVacina()
    {
        return $this->id_vacina;
    }

    public function getVacina()
    {
        if ($this->vacina == null) {
            $this->vacina = Vacina::buscarId($this->id_vacina);
        }
        return $this->vacina;
    }

    public function getMilitar()
    {
        if ($this->militar == null) {
            $this->militar = Militar::buscarId($this->id_militar);
        }
        return $this->militar;
    }

    public function getLote()
    {
        return $this->lote;
    }

    public function getValidade()
    {
        return $this->validade;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getId_militar()
    {
        return $this->id_militar;
    }    

    public function getId_vacinacao()
    {
        return $this->id_vacinacao;
    }  

    public function setIdVacina($id_vacina)
    {
        $this->id_vacina = $id_vacina;
    }

    public function setLote($lote)
    {
        $this->lote = $lote;
    }

    public function setValidade($validade)
    {
        $this->validade = $validade;
    }

    public function setData($data)
    {
        $this->data = $data;
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
        $comando->bindValue(1, $this->id_vacina, PDO::PARAM_STR);
        $comando->bindValue(2, $this->lote, PDO::PARAM_STR);
        $comando->bindValue(3, $this->validade, PDO::PARAM_STR);
        $comando->bindValue(4, $this->data, PDO::PARAM_STR);
        $comando->bindValue(5, $this->id_militar, PDO::PARAM_STR);
        $comando->execute();
        $this->id_vacinacao = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public function inserirVarios($militares)
    {
        for ($i = 0; $i < count($militares) ; $i++) { 
            DW3BancoDeDados::getPdo()->beginTransaction();
            $comando = DW3BancoDeDados::prepare(self::INSERIR);        
            $comando->bindValue(1, $this->id_vacina, PDO::PARAM_STR);
            $comando->bindValue(2, $this->lote, PDO::PARAM_STR);
            $comando->bindValue(3, $this->validade, PDO::PARAM_STR);
            $comando->bindValue(4, $this->data, PDO::PARAM_STR);
            $comando->bindValue(5, $militares[$i], PDO::PARAM_STR);
            $comando->execute();
            $this->id_instrucao_militar = DW3BancoDeDados::getPdo()->lastInsertId();
            DW3BancoDeDados::getPdo()->commit();
        }
    }

    public function atualizar()
    {
        $comando = DW3BancoDeDados::prepare(self::ATUALIZAR);
        $comando->bindValue(1, $this->id_vacina, PDO::PARAM_STR);
        $comando->bindValue(2, $this->lote, PDO::PARAM_STR);
        $comando->bindValue(3, $this->validade, PDO::PARAM_STR);
        $comando->bindValue(4, $this->data, PDO::PARAM_STR);
        $comando->bindValue(5, $this->id_militar, PDO::PARAM_STR);
        $comando->bindValue(6, $this->id_vacinacao, PDO::PARAM_STR);
        $comando->execute();
    }

    public static function buscarTodos()
    {
        $registros = DW3BancoDeDados::query(self::BUSCAR_TODOS);
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Vacinacao(
                $registro['id_vacina'],
                $registro['lote'],
                $registro['validade'],
                $registro['data'],
                $registro['id_militar'],
                $registro['id_vacinacao'],
            );
        }
        return $objetos;
    }

    public static function buscarId($id_vacinacao)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $vacinacao, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();
        return new Vacinacao(
                $registro['id_vacina'],
                $registro['lote'],
                $registro['validade'],
                $registro['data'],
                $registro['id_militar'],
                $registro['id_vacinacao'],
        );
    }

    public static function buscarIdVacina($id_vacina)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_VACINA);
        $comando->bindValue(1, $id_vacina, PDO::PARAM_STR);
        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Vacinacao(
                $registro['id_vacina'],
                $registro['lote'],
                $registro['validade'],
                $registro['data'],
                $registro['id_militar'],
                $registro['id_vacinacao'],
            );
        }
        return $objetos;
    }

    public static function buscarMilitar($vacinacao)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_NOME);
        $comando->bindValue(1, $Vacinacao, PDO::PARAM_STR);
        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Vacinacao(
                $registro['id_vacina'],
                $registro['lote'],
                $registro['validade'],
                $registro['data'],
                $registro['id_militar'],
                $registro['id_vacinacao'],
            );
        }
        return $objetos;
    }

     public static function buscarIdMilitar($id_militar)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID_MILITAR);
        $comando->bindValue(1, $id_militar, PDO::PARAM_STR);
        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Vacinacao(
                $registro['id_vacina'],
                $registro['lote'],
                $registro['validade'],
                $registro['data'],
                $registro['id_militar'],
                $registro['id_vacinacao'],
            );
        }
        return $objetos;
    }

    public static function destruir($id_vacinacao)
    {
        $comando = DW3BancoDeDados::prepare(self::DELETAR);
        $comando->bindValue(1, $id_vacinacao, PDO::PARAM_INT);
        $comando->execute();
    }
}
