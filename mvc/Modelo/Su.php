<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Su extends Modelo
{
    const BUSCAR_TODOS = 'SELECT * FROM su';
    const BUSCAR_ID = 'SELECT * FROM su WHERE id_su = ?';
    const BUSCAR_NOME = 'SELECT * FROM su WHERE nome LIKE ?';
    const INSERIR = 'INSERT INTO su(nome, cmt, cmt_fracao) VALUES (?, ?, ?)';
    const ATUALIZAR = 'UPDATE su SET nome = ?, cmt = ?, cmt_fracao = ? WHERE id_su = ?';
    const DELETAR = 'DELETE FROM su WHERE id_su = ?';
    private $id_su;
    private $nome;
    private $cmt;
    private $cmt_fracao;
       

    public function __construct($nome = null, $cmt = null, $cmt_fracao = null, $id_su = null)
    {
        $this->nome = $nome;
        $this->cmt = $cmt;
        $this->cmt_fracao = $cmt_fracao;
        $this->id_su = $id_su;

    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getCmt()
    {
        return $this->cmt;
    }

    public function getCmt_fracao()
    {
        return $this->cmt_fracao;
    }

    public function getId_su()
    {
        return $this->id_su;
    }    
    

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setCmt($cmt)
    {
        $this->cmt = $cmt;
    }

    public function setCmt_fracao($cmt_fracao)
    {
        $this->cmt_fracao = $cmt_fracao;
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
        $comando->bindValue(2, $this->cmt, PDO::PARAM_STR);
        $comando->bindValue(3, $this->cmt_fracao, PDO::PARAM_STR);
        $comando->execute();
        $this->id_su = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public function atualizar()
    {
        $comando = DW3BancoDeDados::prepare(self::ATUALIZAR);
        $comando->bindValue(1, $this->nome, PDO::PARAM_STR);
        $comando->bindValue(2, $this->cmt, PDO::PARAM_STR);
        $comando->bindValue(3, $this->cmt_fracao, PDO::PARAM_STR);
        $comando->bindValue(4, $this->id_su, PDO::PARAM_STR);
        $comando->execute();
    }

    public static function buscarTodos()
    {
        $registros = DW3BancoDeDados::query(self::BUSCAR_TODOS);
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Su(
                $registro['nome'],
                $registro['cmt'],
                $registro['cmt_fracao'],
                $registro['id_su'],
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
        return new Su(
                $registro['nome'],
                $registro['cmt'],
                $registro['cmt_fracao'],
                $registro['id_su'],
        );
    }

    public static function buscarSu($su)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_NOME);
        $comando->bindValue(1, $su, PDO::PARAM_STR);
        $comando->execute();
        $registro = $comando->fetch();
        $su = null;
        if ($registro) {
            $secao = new Su(
                $registro['nome'],
                $registro['cmt'],
                $registro['cmt_fracao'],
                $registro['id_su'],
            );
        }
        return $su;
    }

    public static function destruir($id_su)
    {
        $comando = DW3BancoDeDados::prepare(self::DELETAR);
        $comando->bindValue(1, $id_su, PDO::PARAM_INT);
        $comando->execute();
    }
}
