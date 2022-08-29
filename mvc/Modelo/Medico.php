<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Medico extends Modelo
{
    const BUSCAR_TODOS = 'SELECT * FROM medico';
    const BUSCAR_ID = 'SELECT * FROM medico WHERE id_medico = ?';
    const BUSCAR_NOME = 'SELECT * FROM medico WHERE nome LIKE ?';
    const INSERIR = 'INSERT INTO medico(nome) VALUES (?)';
    const ATUALIZAR = 'UPDATE medico SET nome = ? WHERE id_medico = ?';
    const DELETAR = 'DELETE FROM medico WHERE id_medico = ?';
    private $nome;
    private $id_medico;

    public function __construct($nome = null, $id_medico = null)
    {
        $this->nome = $nome;
        $this->id_medico = $id_medico;

    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getIdMedico()
    {
        return $this->id_medico;
    }


 
    public function setNOme($nome)
    {
        $this->nome = $nome;
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
        $comando->bindValue(1, $this->nome, PDO::PARAM_STR);
        $comando->execute();
        $this->id_medico = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public function atualizar()
    {
        $comando = DW3BancoDeDados::prepare(self::ATUALIZAR);
        $comando->bindValue(1, $this->nome, PDO::PARAM_STR);
        $comando->bindValue(2, $this->id_medico, PDO::PARAM_STR);
        $comando->execute();
    }

    public static function buscarTodos()
    {
        $registros = DW3BancoDeDados::query(self::BUSCAR_TODOS);
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Medico(
                $registro['nome'],
                $registro['id_medico'],
            );
        }
        return $objetos;
    }

    public static function buscarId($id_medico)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $id_medico, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();
        return new Medico(
                $registro['nome'],
                $registro['id_medico'],
        );
    }

    public static function buscarMilitar($medico)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_NOME);
        $comando->bindValue(1, $medico, PDO::PARAM_STR);
        $comando->execute();
        $registro = $comando->fetch();
        $medico = null;
        if ($registro) {
            $secao = new Medico(
                $registro['nome'],
                $registro['id_medico'],     
            );
        }
        return $Medico;
    }

    public static function destruir($id_medico)
    {
        $comando = DW3BancoDeDados::prepare(self::DELETAR);
        $comando->bindValue(1, $id_medico, PDO::PARAM_INT);
        $comando->execute();
    }
}
