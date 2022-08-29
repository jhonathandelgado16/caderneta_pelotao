<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class InstrucaoMinistrada extends Modelo
{
    const BUSCAR_TODOS = 'SELECT * FROM instrucao_militar';
    const BUSCAR_TODOS_DATA = 'SELECT * FROM instrucao_militar GROUP BY data';
    const BUSCAR_ID = 'SELECT * FROM instrucao_militar WHERE id_instrucao_militar = ?';
    const BUSCAR_INSTRUTOR = 'SELECT * FROM instrucao_militar WHERE id_usuario = ? GROUP BY id_instrucao, data';
    const BUSCAR_INSTRUCAO = 'SELECT * FROM instrucao_militar JOIN instrucao USING(id_instrucao) WHERE id_instrucao = ?';
    const INSERIR = 'INSERT INTO instrucao_militar(id_militar, id_instrucao, data, padrao_minimo, id_usuario, instrutor) VALUES (?, ?, ?, ?, ?, ?)';
    const INSERIR_VARIOS = 'INSERT INTO instrucao_militar(id_militar, id_instrucao, data, padrao_minimo, id_usuario, instrutor) VALUES ?';
    const ATUALIZAR = 'UPDATE instrucao_militar SET id_militar = ?, id_instrucao = ?, data = ?, padrao_minimo = ?, id_usuario = ?, instrutor = ? WHERE id_instrucao_militar = ?';
    const DELETAR = 'DELETE FROM instrucao_militar WHERE id_instrucao_militar = ?';
    
    private $id_militar;
    private $militar;
    private $id_instrucao;
    private $instrucao;
    private $data;
    private $padrao_minimo;
    private $id_instrucao_militar;
    private $id_usuario;
    private $instrutor;
    private $usuario;

    public function __construct($id_militar = null, $id_instrucao = null, $data = null, $padrao_minimo = null, $militares = null, $id_instrucao_militar = null, $id_usuario = null, $instrutor = null)
    {
        $this->id_militar = $id_militar;
        $this->id_instrucao = $id_instrucao;
        $this->data = $data;
        $this->padrao_minimo = $padrao_minimo;
        $this->militares = $militares;
        $this->id_instrucao_militar = $id_instrucao_militar;
        $this->id_usuario = $id_usuario;
        $this->instrutor = $instrutor;
    }

    public function getIdMilitar()
    {
        return $this->id_militar;
    }

    public function getMilitar()
    {
        if ($this->militar == null) {
            $this->militar = Militar::buscarId($this->id_militar);
        }
        return $this->militar;
    }

    public function getIdInstrucao()
    {
        return $this->id_instrucao;
    }

    public function getInstrutor()
    {
        return $this->instrutor;
    }

    public function getInstrucao()
    {
        if ($this->instrucao == null) {
            $this->instrucao = Instrucao::buscarId($this->id_instrucao);
        }
        return $this->instrucao;
    }

    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function getUsuario()
    {
        if ($this->usuario == null) {
            $this->usuario = Usuario::buscarId($this->id_usuario);
        }
        return $this->usuario;
    }

    public function getData()
    {
        return $this->data;
    }   

    public function getPadraoMinimo()
    {
        return $this->padrao_minimo;
    }

    public function getIdinstrucaoMilitar()
    {
        return $this->id_instrucao_militar;
    }

    public function getMilitares()
    {
        return $this->militares;
    }

    public function setIdMilitar($id_militar)
    {
        $this->id_militar = $id_militar;
    }

    public function setIdInstrucao($id_instrucao)
    {
        $this->id_instrucao = $id_instrucao;
    }

    public function setInstrutor($instrutor)
    {
        $this->instrutor = $instrutor;
    }

    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function setPadraoMinimo($padrao_minimo)
    {
        $this->padrao_minimo = $padrao_minimo;
    }

    public function salvar()
    {
        $this->inserir();
    }

    public function inserir()
    {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);        
        $comando->bindValue(1, $this->id_militar, PDO::PARAM_STR);
        $comando->bindValue(2, $this->id_instrucao, PDO::PARAM_STR);
        $comando->bindValue(3, $this->data, PDO::PARAM_STR);
        $comando->bindValue(4, $this->padrao_minimo, PDO::PARAM_STR);
        $comando->bindValue(5, $this->id_usuario, PDO::PARAM_STR);
        $comando->bindValue(6, $this->instrutor, PDO::PARAM_STR);
        $comando->execute();
        $this->id_instrucao_militar = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public function inserirVarios($militares)
    {
        $query = "INSERT INTO instrucao_militar(id_militar, id_instrucao, data, padrao_minimo, id_usuario, instrutor) VALUES ";
        
        for ($i = 0; $i < count($militares) ; $i++) { 
            $array = $militares[$i];
            if ($array[0] != 0) {
                echo print_r($array[0]);
                if ($array[1] == '1') {
                    $query .= "(".$array[0].", $this->id_instrucao, '$this->data', 1, $this->id_usuario, '". strtoupper($this->instrutor)."'), ";
                } else {
                    $query .= "(".$array[0].", $this->id_instrucao, '$this->data', 2, $this->id_usuario, '". strtoupper($this->instrutor)."'), ";
                }
            }            
        }

        $query_final = rtrim($query, ", ");

        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare($query_final);        
        $comando->execute();
        $this->id_instrucao_militar = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public function atualizar()
    {
        $comando = DW3BancoDeDados::prepare(self::ATUALIZAR);
        $comando->bindValue(1, $this->id_militar, PDO::PARAM_STR);
        $comando->bindValue(2, $this->id_instrucao, PDO::PARAM_STR);
        $comando->bindValue(3, $this->data, PDO::PARAM_STR);
        $comando->bindValue(4, $this->padrao_minimo, PDO::PARAM_STR);
        $comando->bindValue(5, $this->id_usuario, PDO::PARAM_STR);
        $comando->bindValue(6, $this->instrutor, PDO::PARAM_STR);
        $comando->execute();
    }

    public static function buscarTodos()
    {
        $registros = DW3BancoDeDados::query(self::BUSCAR_TODOS);
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new InstrucaoMinistrada(
                $registro['id_militar'],
                $registro['id_instrucao'],
                $registro['data'],
                $registro['padrao_minimo'],
                null,
                $registro['id_instrucao_militar'],
                $registro['id_usuario'],
                $registro['instrutor'],
            );
        }
        return $objetos;
    }

    public static function buscarTodosData()
    {
        $registros = DW3BancoDeDados::query(self::BUSCAR_TODOS_DATA);
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new InstrucaoMinistrada(
                $registro['id_militar'],
                $registro['id_instrucao'],
                $registro['data'],
                $registro['padrao_minimo'],
                null,
                $registro['id_instrucao_militar'],
                $registro['id_usuario'],
                $registro['instrutor'],
            );
        }
        return $objetos;
    }

    public static function buscarId($id_instrucao_militar)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $id_instrucao_militar, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();
        return new InstrucaoMinistrada(
                $registro['id_militar'],
                $registro['id_instrucao'],
                $registro['data'],
                $registro['padrao_minimo'],
                null,
                $registro['id_instrucao_militar'],
                $registro['id_usuario'],
                $registro['instrutor'],
        );
    }

    public static function buscarInstrucaoMinistradaInstrutor($id_usuario)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_INSTRUTOR);
        $comando->bindValue(1, $id_usuario, PDO::PARAM_STR);
        $comando->execute();
        $objetos = [];
        $registros = $comando->fetchAll();
        foreach ($registros as $registro) {
            $objetos[] = new InstrucaoMinistrada(
                $registro['id_militar'],
                $registro['id_instrucao'],
                $registro['data'],
                $registro['padrao_minimo'],
                null,
                $registro['id_instrucao_militar'],
                $registro['id_usuario'],
                $registro['instrutor'],
            );
        }
        return $objetos;
    }

    public static function buscarInstrucaoAssunto($id_instrucao)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_INSTRUCAO);
        $comando->bindValue(1, $id_instrucao, PDO::PARAM_STR);
        $comando->execute();
        $objetos = [];
        $registros = $comando->fetchAll();
        foreach ($registros as $registro) {
            $objetos[] = new InstrucaoMinistrada(
                $registro['id_militar'],
                $registro['id_instrucao'],
                $registro['data'],
                $registro['padrao_minimo'],
                null,
                $registro['id_instrucao_militar'],
                $registro['id_usuario'],
                $registro['instrutor'],  
            );
        }
        return $objetos;
    }

    public static function destruir($id_instrucao_militar)
    {
        $comando = DW3BancoDeDados::prepare(self::DELETAR);
        $comando->bindValue(1, $id_instrucao_militar, PDO::PARAM_INT);
        $comando->execute();
    }
}
