<?php
namespace Controlador;

use \Modelo\Usuario;
use \Framework\DW3Sessao;

class LoginControlador extends Controlador
{
    public function criar()
    {
        $this->visao('login/criar.php', ['mensagem' => DW3Sessao::getFlash('mensagem', null)] , 'login.php');
    }

    public function armazenar()
    {
        $usuario = Usuario::buscarLogin($_POST['login']);
        if ($usuario && $usuario->verificarSenha($_POST['senha'])) {
            DW3Sessao::set('usuario', $usuario->getId());
               
            switch ($usuario->getTipoOperador()) {
                 case 'sargenteante':
                     $this->redirecionar(URL_RAIZ . 'militares');
                     break;
                case 'cmt su':
                     $this->redirecionar(URL_RAIZ . 'militares');
                     break;
                 case 'instrutor':
                     $this->redirecionar(URL_RAIZ . 'instrucoes');
                     break;
                case 's3':
                     $this->redirecionar(URL_RAIZ . 'instrucoes');
                     break;
                 case 'cmt pelotao':
                     $this->redirecionar(URL_RAIZ . 'militares');
                     break;
                 case 'sargenteante':
                     $this->redirecionar(URL_RAIZ . 'militares');
                     break;
                case 'administrador':
                     $this->redirecionar(URL_RAIZ . 'militares');
                     break;
                case 'saude':
                     $this->redirecionar(URL_RAIZ . 'visitas_medicas');
                     break;
            } 
        } else {
            DW3Sessao::setFlash('mensagem', 'Login ou senha incorretos.');
            $this->visao('login/criar.php', ['mensagem' => DW3Sessao::getFlash('mensagem', null)] , 'login.php');
        }
    }

    public function destruir()
    {
        DW3Sessao::deletar('usuario');
        $this->redirecionar(URL_RAIZ . 'login');
    }
}
