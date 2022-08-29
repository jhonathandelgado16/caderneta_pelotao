<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class QualificacaoMilitar extends Modelo
{
    const BUSCAR_TODOS = 'SELECT * FROM qualificacao_militar';
    const BUSCAR_ID = 'SELECT * FROM qualificacao_militar WHERE id_qualificacao_militar = ?';
    const BUSCAR_NOME = 'SELECT * FROM qualificacao_militar WHERE qualificacao_militar LIKE ?';
    const INSERIR = 'INSERT INTO qualificacao_militar(qualificacao_militar) VALUES (?)';
    const ATUALIZAR = 'UPDATE qualificacao_militar SET qualificacao_militar = ? WHERE id_qualificacao_militar = ?';
    const DELETAR = 'DELETE FROM qualificacao_militar WHERE id_qualificacao_militar = ?';
    private $id_qualificacao_militar;
    private $qualificacao_militar;
       

    public function __construct($qualificacao_militar = null, $id_qualificacao_militar = null)
    {
        $this->qualificacao_militar = $qualificacao_militar;
        $this->id_qualificacao_militar = $id_qualificacao_militar;

    }

    public function getQualificacaoMilitar()
    {
        return $this->qualificacao_militar;
    }

    public function getId()
    {
        return $this->id_qualificacao_militar;
    }    
    

    public function setQualificacaoMilitar($qualificacao_militar)
    {
        $this->qualificacao_militar = $qualificacao_militar;
    }

    public function salvar()
    {
        $this->inserir();
    }

    public function inserir()
    {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);        
        $comando->bindValue(1, $this->qualificacao_militar, PDO::PARAM_STR);
        $comando->execute();
        $this->id_su = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public function atualizar()
    {
        $comando = DW3BancoDeDados::prepare(self::ATUALIZAR);
        $comando->bindValue(1, $this->qualificacao_militar, PDO::PARAM_STR);
        $comando->bindValue(2, $this->id_qualificacao_militar, PDO::PARAM_STR);
        $comando->execute();
    }

    public static function buscarTodos()
    {
        $registros = DW3BancoDeDados::query(self::BUSCAR_TODOS);
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new QualificacaoMilitar(
                $registro['qualificacao_militar'],
                $registro['id_qualificacao_militar'],
            );
        }
        return $objetos;
    }

    public static function buscarId($id_qualificacao_militar)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $id_qualificacao_militar, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();
        return new QualificacaoMilitar(
                $registro['qualificacao_militar'],
                $registro['id_qualificacao_militar'],
        );
    }

    public static function buscarQualificacaoMilitar($qualificacao_militar)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_NOME);
        $comando->bindValue(1, $qualificacao_militar, PDO::PARAM_STR);
        $comando->execute();
        $registro = $comando->fetch();
        $qualificacao = null;
        if ($registro) {
            $qualificacao = new QualificacaoMilitar(
                $registro['qualificacao_militar'],
                $registro['id_qualificacao_militar'],
            );
        }
        return $qualificacao;
    }

    public static function destruir($id_qualificacao_militar)
    {
        $comando = DW3BancoDeDados::prepare(self::DELETAR);
        $comando->bindValue(1, $id_qualificacao_militar, PDO::PARAM_INT);
        $comando->execute();
    }
}
