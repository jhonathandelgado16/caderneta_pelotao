<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Vacina extends Modelo
{
    const BUSCAR_TODOS = 'SELECT * FROM vacina';
    const BUSCAR_ID = 'SELECT * FROM vacina WHERE id_vacina = ?';
    const BUSCAR_NOME = 'SELECT * FROM vacina WHERE vacina LIKE ?';
    const INSERIR = 'INSERT INTO vacina(vacina) VALUES (?)';
    const ATUALIZAR = 'UPDATE vacina SET vacina = ? WHERE id_vacina = ?';
    const DELETAR = 'DELETE FROM vacina WHERE id_vacina = ?';
    private $vacina;
    private $id_vacina;

    public function __construct($vacina = null, $id_vacina = null)
    {
        $this->vacina = $vacina;
        $this->id_vacina = $id_vacina;

    }

    public function getVacina()
    {
        return $this->vacina;
    }

    public function getIdVacina()
    {
        return $this->id_vacina;
    }
 
    public function setVacina($vacina)
    {
        $this->vacina = $vacina;
    }
 
    public function salvar()
    {
        $this->inserir();
    }

    public function inserir()
    {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);        
        $comando->bindValue(1, $this->vacina, PDO::PARAM_STR);
        $comando->execute();
        $this->id_medico = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public function atualizar()
    {
        $comando = DW3BancoDeDados::prepare(self::ATUALIZAR);
        $comando->bindValue(1, $this->vacina, PDO::PARAM_STR);
        $comando->bindValue(2, $this->id_vacina, PDO::PARAM_STR);
        $comando->execute();
    }

    public static function buscarTodos()
    {
        $registros = DW3BancoDeDados::query(self::BUSCAR_TODOS);
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Vacina(
                $registro['vacina'],
                $registro['id_vacina'],
            );
        }
        return $objetos;
    }

    public static function buscarId($id_vacina)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $id_vacina, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();
        return new Vacina(
                $registro['vacina'],
                $registro['id_vacina'],
        );
    }

    public static function destruir($id_vacina)
    {
        $comando = DW3BancoDeDados::prepare(self::DELETAR);
        $comando->bindValue(1, $id_vacina, PDO::PARAM_INT);
        $comando->execute();
    }
}
