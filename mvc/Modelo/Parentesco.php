<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Parentesco extends Modelo
{
    const BUSCAR_TODOS = 'SELECT * FROM parentesco';
    const BUSCAR_ID = 'SELECT * FROM parentesco WHERE id_parentesco = ?';
    const BUSCAR_NOME = 'SELECT * FROM parentesco WHERE nome LIKE ?';
    const INSERIR = 'INSERT INTO ´parentesco(nome, contato, grau_parentesco, id_militar, id_parentesco) VALUES (?, ?, ?, ?, ?)';
    const ATUALIZAR = 'UPDATE parentesco SET nome = ?, contato = ?, grau_parentesco = ?, id_militar = ?, id_parentesco = ? WHERE id_parentesco = ?';
    const DELETAR = 'DELETE FROM parentesco WHERE id_parentesco = ?';;
    private $nome;
    private $contato;
    private $grau_parentesco;
    private $id_militar;
    private $id_parentesco;

    public function __construct($nome = null, $contato = null, $grau_parentesco = null, $id_militar = null, $id_parentesco = null)
    {
        $this->nome = $nome;
        $this->contato = $contato;
        $this->grau_parentesco = $grau_parentesco];
        $this->id_militar = $id_militar;
        $this->id_parentesco = $id_parentesco;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getContato()
    {
        return $this->contato;
    }

    public function getGrau_parentesco()
    {
        return $this->grau_parentesco;
    }

    public function getId_militar()
    {
        return $this->id_militar;
    }    

    public function getId_parentesco()
    {
        return $this->id_parentesco;
    }
    

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setContato($contato)
    {
        $this->contato = $contato;
    }


    public function setGrau_parentesco($grau_parentesco)
    {
        $this->grau_parentesco = $grau_parentesco;
    }

    public function setId_militar($id_militar)
    {
        $this->id_militar = $id_militar;
    }

    public function setId_parentesco($id_parentesco)
    {
        $this->id_parentesco = $id_parentesco;
    }


    public function inserir()
    {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);        
        $comando->bindValue(1, $this->nome, PDO::PARAM_STR);
        $comando->bindValue(2, $this->contato, PDO::PARAM_STR);
        $comando->bindValue(3, $this->grau_parentesco, PDO::PARAM_STR);
        $comando->bindValue(4, $this->id_militar, PDO::PARAM_STR);
        $comando->execute();
        $this->id_parentesco = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public function atualizar()
    {
        $comando = DW3BancoDeDados::prepare(self::ATUALIZAR);
        $comando->bindValue(1, $this->nome, PDO::PARAM_STR);
        $comando->bindValue(2, $this->contato, PDO::PARAM_STR);
        $comando->bindValue(3, $this->grau_parentesco, PDO::PARAM_STR);
        $comando->bindValue(4, $this->id_militar, PDO::PARAM_STR);
        $comando->bindValue(5, $this->id_parentesco, PDO::PARAM_STR);
        $comando->execute();
    }

    public static function buscarTodos()
    {
        $registros = DW3BancoDeDados::query(self::BUSCAR_TODOS);
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Parentesco(
                $registro['nome'],
                $registro['contato'],
                $registro['grau_parentesco']
                $registro['id_militar'],
                $registro['id_parentesco'],
            );
        }
        return $objetos;
    }

    public static function buscarId($id_parentesco)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $id_parentesco, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();
        return new Parentesco(
                $registro['nome'],
                $registro['contato'],
                $registro['grau_parentesco']
                $registro['id_militar'],
                $registro['id_parentesco'],
        );
    }

    public static function buscarMilitar($parentesco)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_NOME);
        $comando->bindValue(1, $Parentesco, PDO::PARAM_STR);
        $comando->execute();
        $registro = $comando->fetch();
        $parentesco = null;
        if ($registro) {
            $secao = new Parentesco(
                $registro['nome'],
                $registro['contato'],
                $registro['grau_parentesco']
                $registro['id_militar'],
                $registro['id_parentesco'],
            );
        }
        return $Parentesco;
    }

    public static function destruir($id_parentesco)
    {
        $comando = DW3BancoDeDados::prepare(self::DELETAR);
        $comando->bindValue(1, $id_parentesco, PDO::PARAM_INT);
        $comando->execute();
    }
}
