<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;
use \Modelo\Secao;

class Usuario extends Modelo
{
    const BUSCAR_TODOS = 'SELECT * FROM usuarios';
    const BUSCAR_ID = 'SELECT * FROM usuarios WHERE id_usuario = ?';
    const BUSCAR_NOME = 'SELECT * FROM usuarios WHERE login = ?';
    const INSERIR = 'INSERT INTO usuarios(login, senha, id_su, tipo_operador, militar_responsavel, pelotao) VALUES (?, ?, ?, ?, UPPER(?), ?)';
    const ATUALIZAR = 'UPDATE usuarios SET login = ?, senha = ?, id_su = ?, tipo_operador = ?, militar_responsavel = UPPER(?), pelotao = ? WHERE id_usuario = ?';
    const ATUALIZAR_SEM_SENHA = 'UPDATE usuarios SET login = ?, id_su = ?, tipo_operador = ?, militar_responsavel = UPPER(?), pelotao = ? WHERE id_usuario = ?';
    const DELETAR = 'DELETE FROM usuarios WHERE id_usuario = ?';
    private $id;
    private $login;
    private $senha;
    private $senhaPlana;
    private $id_su;
    private $su;
    private $tipo_operador;
    private $militar_responsavel;
    private $pelotao;

    public function __construct(
        $login = null,
        $senhaPlana = null,
        $senha = null,
        $id_su = null,
        $tipo_operador = null,
        $militar_responsavel = null,
        $pelotao = null,
        $id = null
    ) {
        $this->login = $login;
        $this->senhaPlana = $senhaPlana;
        $this->senha = password_hash($senhaPlana, PASSWORD_BCRYPT);
        $this->id_su = $id_su;
        $this->tipo_operador = $tipo_operador;
        $this->militar_responsavel = $militar_responsavel;
        $this->pelotao = $pelotao;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getTipoOperador()
    {
        return $this->tipo_operador;
    }

     public function getSu()
    {
        if ($this->su == null) {
            $this->su = Su::buscarId($this->id_su);
        }
        return $this->su;
    }

    public function getIdSu()
    {
        return $this->id_su;
    }

    public function getMilitarResponsavel()
    {
        return $this->militar_responsavel;
    }

    public function getPelotao()
    {
        return $this->pelotao;
    }    


    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setSenha($senhaPlana)
    {
        $this->senhaPlana = $senhaPlana;
        $this->senha = password_hash($senhaPlana, PASSWORD_BCRYPT);
    }

    public function setIdSu($id_su)
    {
        $this->id_su = $id_su;
    }

    public function setTipoOperador($tipo_operador)
    {
        $this->tipo_operador = $tipo_operador;
    }

    public function setMilitarResponsavel($militar_responsavel)
    {
        $this->militar_responsavel = $militar_responsavel;
    }

    public function setPelotao($pelotao)
    {
        $this->pelotao = $pelotao;
    }

    public function isAdmin()
    {
        return ($this->tipo_operador == 'admin');
    }

    public function verificarSenha($senhaPlana)
    {
        return password_verify($senhaPlana, $this->senha);
    }

    public function salvar()
    {
        $this->inserir();
    }

    public function atualizar()
    {
        if($this->senhaPlana == ''){
            $comando = DW3BancoDeDados::prepare(self::ATUALIZAR_SEM_SENHA);
            $comando->bindValue(1, $this->login, PDO::PARAM_STR);
            $comando->bindValue(2, $this->id_su, PDO::PARAM_STR);
            $comando->bindValue(3, $this->tipo_operador, PDO::PARAM_STR);
            $comando->bindValue(4, $this->militar_responsavel, PDO::PARAM_STR);
            $comando->bindValue(5, $this->pelotao, PDO::PARAM_STR);
            $comando->bindValue(6, $this->id, PDO::PARAM_STR);
            $comando->execute();
        } else {
            $comando = DW3BancoDeDados::prepare(self::ATUALIZAR);
            $comando->bindValue(1, $this->login, PDO::PARAM_STR);
            $comando->bindValue(2, $this->senha, PDO::PARAM_STR);
            $comando->bindValue(3, $this->id_su, PDO::PARAM_STR);
            $comando->bindValue(4, $this->tipo_operador, PDO::PARAM_STR);
            $comando->bindValue(5, $this->militar_responsavel, PDO::PARAM_STR);
            $comando->bindValue(6, $this->pelotao, PDO::PARAM_STR);
            $comando->bindValue(7, $this->id, PDO::PARAM_STR);
            $comando->execute();
        }
    }

    public function inserir()
    {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);
        $comando->bindValue(1, $this->login, PDO::PARAM_STR);
        $comando->bindValue(2, $this->senha, PDO::PARAM_STR);
        $comando->bindValue(3, $this->id_su, PDO::PARAM_STR);
        $comando->bindValue(4, $this->tipo_operador, PDO::PARAM_STR);
        $comando->bindValue(5, $this->militar_responsavel, PDO::PARAM_STR);
        $comando->bindValue(6, $this->pelotao, PDO::PARAM_STR);
        $comando->execute();
        $this->id = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public static function buscarTodos()
    {
        $registros = DW3BancoDeDados::query(self::BUSCAR_TODOS);
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Usuario(
                $registro['login'],
                null,
                $registro['senha'],
                $registro['id_su'],
                $registro['tipo_operador'],
                $registro['militar_responsavel'],
                $registro['pelotao'],
                $registro['id_usuario']
            );
        }
        return $objetos;
    }

    public static function buscarId($id_usuario)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $id_usuario, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();
        return new Usuario(
            $registro['login'],
            null,
            $registro['senha'],
            $registro['id_su'],
            $registro['tipo_operador'],
            $registro['militar_responsavel'],
            $registro['pelotao'],
            $registro['id_usuario']
        );
    }

    public static function buscarLogin($login)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_NOME);
        $comando->bindValue(1, $login, PDO::PARAM_STR);
        $comando->execute();
        $registro = $comando->fetch();
        $usuario = null;
        if ($registro) {
            $usuario = new Usuario(
                $registro['login'],
                null,
                $registro['senha'],
                $registro['id_su'],
                $registro['tipo_operador'],
                $registro['militar_responsavel'],
                $registro['pelotao'],
                $registro['id_usuario']
            );
            $usuario->senha = $registro['senha'];
        }
        return $usuario;
    }

    public static function destruir($id_usuario)
    {
        $comando = DW3BancoDeDados::prepare(self::DELETAR);
        $comando->bindValue(1, $id_usuario, PDO::PARAM_INT);
        $comando->execute();
    }
}
