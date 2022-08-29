<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Instrucao extends Modelo
{
    const BUSCAR_TODOS = 'SELECT * FROM instrucao';
    const BUSCAR_ID = 'SELECT * FROM instrucao WHERE id_instrucao = ?';
    const BUSCAR_NOME = 'SELECT * FROM instrucao WHERE materia LIKE ?';
    const BUSCAR_MATERIA_TAREFA = 'SELECT * FROM instrucao WHERE materia LIKE ? or tarefa LIKE ?';
    const PARTICIPOU = 'SELECT padrao_minimo FROM instrucao_militar WHERE id_instrucao = ? AND id_militar = ?;';
    const INSERIR = 'INSERT INTO instrucao(tarefa, identificacao, materia, fase) VALUES (?, ?, ?, ?)';
    const ATUALIZAR = 'UPDATE instrucao SET tarefa = ?, identificacao = ?, materia = ?, fase = ? WHERE id_instrucao = ?';
    const DELETAR = 'DELETE FROM instrucao WHERE id_instrucao = ?';
    
    private $materia;
    private $tarefa;
    private $identificacao;
    private $fase;
    private $id_instrucao;

    public function __construct($tarefa = null, $identificacao = null,  $materia = null, $fase = null, $id_instrucao = null)
    {
        $this->tarefa = $tarefa;
        $this->identificacao = $identificacao;
        $this->materia = $materia;
        $this->fase = $fase;
        $this->id_instrucao = $id_instrucao;
    }

    public function getTarefa()
    {
        return $this->tarefa;
    }

    public function getIdentificacao()
    {
        return $this->identificacao;
    }

    public function getMateria()
    {
        return $this->materia;
    }

    public function getIdinstrucao()
    {
        return $this->id_instrucao;
    }

    public function getFase()
    {
        return $this->fase;
    }

    public function setTarefa($tarefa)
    {
        $this->tarefa = $tarefa;
    }

    public function setMateria($materia)
    {
        $this->materia = $materia;
    }

    public function setIdentificacao($identificacao)
    {
        $this->identificacao = $identificacao;
    }

    public function setFase($fase)
    {
        $this->fase = $fase;
    }

    public function salvar()
    {
        $this->inserir();
    }

    public function inserir()
    {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);        
        $comando->bindValue(1, $this->tarefa, PDO::PARAM_STR);
        $comando->bindValue(2, $this->identificacao, PDO::PARAM_STR);
        $comando->bindValue(3, $this->materia, PDO::PARAM_STR);
        $comando->bindValue(4, $this->fase, PDO::PARAM_STR);
        $comando->execute();
        $this->id_instrucao = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public function atualizar()
    {
        $comando = DW3BancoDeDados::prepare(self::ATUALIZAR);
        $comando->bindValue(1, $this->tarefa, PDO::PARAM_STR);
        $comando->bindValue(2, $this->identificacao, PDO::PARAM_STR);
        $comando->bindValue(3, $this->materia, PDO::PARAM_STR);
        $comando->bindValue(3, $this->fase, PDO::PARAM_STR);
        $comando->bindValue(4, $this->id_instrucao, PDO::PARAM_STR);
        $comando->execute();
    }

    public static function buscarTodos()
    {
        $registros = DW3BancoDeDados::query(self::BUSCAR_TODOS);
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Instrucao(
                $registro['tarefa'],
                $registro['identificacao'],
                $registro['materia'],
                $registro['fase'],
                $registro['id_instrucao'],
            );
        }
        return $objetos;
    }

    public static function buscarId($id_instrucao)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $id_instrucao, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();
        return new Instrucao(
                 $registro['tarefa'],
                $registro['identificacao'],
                $registro['materia'],
                $registro['fase'],
                $registro['id_instrucao'],
        );
    }

    public static function buscarMateriaTarefa($pesquisa)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_MATERIA_TAREFA);
        $comando->bindValue(1, '%'.$pesquisa.'%', PDO::PARAM_STR);
        $comando->bindValue(2, '%'.$pesquisa.'%', PDO::PARAM_STR);
        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Instrucao(
                $registro['tarefa'],
                $registro['identificacao'],
                $registro['materia'],
                $registro['fase'],
                $registro['id_instrucao'],
            );
        }
        return $objetos;
    }

    public static function buscarAssunto($materia)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_NOME);
        $comando->bindValue(1, $materia, PDO::PARAM_STR);
        $comando->execute();
        $registro = $comando->fetch();
        $instrucao = null;
        if ($registro) {
            $instrucao = new Instrucao(
                $registro['tarefa'],
                $registro['identificacao'],
                $registro['materia'],
                $registro['fase'],
                $registro['id_instrucao'],       
            );
        }
        return $instrucao;
    }

    public static function participou($id_instrucao, $id_militar)
    {
        $comando = DW3BancoDeDados::prepare(self::PARTICIPOU);
        $comando->bindValue(1, $id_instrucao, PDO::PARAM_INT);
        $comando->bindValue(2, $id_militar, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();

        if (empty($registro)) {
            return 0;
        } else {
            return $registro['padrao_minimo'];
        }
    }

    public static function destruir($id_instrucao)
    {
        $comando = DW3BancoDeDados::prepare(self::DELETAR);
        $comando->bindValue(1, $id_instrucao, PDO::PARAM_INT);
        $comando->execute();
    }
}
