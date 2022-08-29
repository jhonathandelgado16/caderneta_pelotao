<?php
namespace Controlador;

use \Modelo\Usuario;
use \Modelo\Su;
use \Framework\DW3Sessao;

class UsuarioControlador extends Controlador
{

    public function index()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['administrador']);

        $usuarios = Usuario::buscarTodos();
        $this->visao('usuarios/index.php', [ 'usuarios' => $usuarios , 'mensagem' => DW3Sessao::getFlash('mensagem', null) ] , 'index.php');
    }

    public function criar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['administrador']);
        $subunidades = Su::buscarTodos();
        $this->visao('usuarios/criar.php', ['subunidades' => $subunidades , 'mensagem' => DW3Sessao::getFlash('mensagem', null)], 'index.php');
    }

    public function primeiro_login()
    {
        $subunidades = Su::buscarTodos();
        $this->visao('login/primeiro_login.php', ['subunidades' => $subunidades , 'mensagem' => DW3Sessao::getFlash('mensagem', null)], 'primeiro_login.php');
    }

    public function editar($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['administrador']);
        $subunidades = Su::buscarTodos();
        $usuario = Usuario::buscarId($id);
        $this->visao('usuarios/editar.php', [
            'usuario' => $usuario , 'subunidades' => $subunidades, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function armazenar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['administrador']);
        $usuario = new Usuario($_POST['login'], $_POST['senha'], null, $_POST['su'], $_POST['perfil'], $_POST['militar-responsavel'], $_POST['pelotao']);
        $usuario->salvar();
        DW3Sessao::setFlash('mensagem', 'Usuário cadastrado com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'usuarios');
    }

    public function armazenar_primeiro_login()
    {
        $usuario = new Usuario($_POST['login'], $_POST['senha'], null, $_POST['su'], $_POST['perfil'], $_POST['militar-responsavel'], $_POST['pelotao']);
        $usuario->salvar();
        DW3Sessao::setFlash('mensagem', 'Instrutor cadastrado com Sucesso. Agora basta fazer o login.');
        $this->redirecionar(URL_RAIZ . 'login');
    }

    public function atualizar($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['administrador']);
        $usuario = Usuario::buscarId($id);
        $usuario->setLogin($_POST['login']);
        $usuario->setSenha($_POST['nova-senha']);
        $usuario->setTipoOperador($_POST['perfil']);
        $usuario->setIdSu($_POST['su']);
        $usuario->setMilitarResponsavel($_POST['militar-responsavel']);
        $usuario->setPelotao($_POST['pelotao']);
        $usuario->atualizar();
        DW3Sessao::setFlash('mensagem', 'Usuário atualizado com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'usuarios');

    }

    public function destruir($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['administrador']);
        Usuario::destruir($id);        
        DW3Sessao::setFlash('mensagem', 'O Usuário foi excluido com sucesso.');
        $this->redirecionar(URL_RAIZ . 'usuarios');
    }
    
    
}
