<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class PostoGraduacao extends Modelo
{
    const BUSCAR_TODOS = 'SELECT * FROM posto_grad';
    const BUSCAR_ID = 'SELECT * FROM posto_grad WHERE id_posto_grad = ?';
    const INSERIR = 'INSERT INTO posto_grad(posto_grad) VALUES (?)';
    const ATUALIZAR = 'UPDATE posto_grad SET posto_grad = ? WHERE id_posto_grad = ?';
    const DELETAR = 'DELETE FROM posto_grad WHERE id_posto_grad = ?';
    private $id;
    private $posto_grad;
       

    public function __construct($posto_grad = null, $id = null)
    {
        $this->posto_grad = $posto_grad;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPostoGrad()
    {
        return $this->posto_grad;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setPostoGrad($posto_grad)
    {
        $this->posto_grad = $posto_grad;
    }

    public function salvar()
    {
        $this->inserir();
    }

    public function inserir()
    {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);        
        $comando->bindValue(1, $this->posto_grad, PDO::PARAM_STR);
        $comando->execute();
        $this->id = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public function atualizar()
    {
        $comando = DW3BancoDeDados::prepare(self::ATUALIZAR);
        $comando->bindValue(1, $this->posto_grad, PDO::PARAM_STR);
        $comando->bindValue(2, $this->id, PDO::PARAM_STR);
        $comando->execute();
    }

    public static function buscarTodos()
    {
        $registros = DW3BancoDeDados::query(self::BUSCAR_TODOS);
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new PostoGraduacao(
                $registro['posto_grad'],
                $registro['id_posto_grad'],
            );
        }
        return $objetos;
    }

    public static function buscarId($id)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $id, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();
        return new PostoGraduacao(
                $registro['posto_grad'],
                $registro['id_posto_grad'],
        );
    }

    public static function destruir($id_posto_grad)
    {
        $comando = DW3BancoDeDados::prepare(self::DELETAR);
        $comando->bindValue(1, $id, PDO::PARAM_INT);
        $comando->execute();
    }
}
