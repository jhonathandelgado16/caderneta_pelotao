<?php
namespace Controlador;

use \Modelo\Militar;
use \Modelo\Usuario;
use \Modelo\Recompensa;
use \Framework\DW3Sessao;

class RecompensaControlador extends Controlador
{
    public function index()
    {   
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'cmt pelotao', 'cmt su']);

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));

        $recompensas = Recompensa::buscarSu($usuario->getIdSu());

        if($usuario->getTipoOperador() == 'administrador'){
            $recompensas = Recompensa::buscarTodos();
        }
        
        $this->visao('recompensas/index.php', [
            'recompensas' => $recompensas, 'usuario' => $usuario, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function visualizar($id)
    {   
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'cmt pelotao', 'cmt su']);

        $recompensa = Recompensa::buscarId($id);
        
        $this->visao('recompensas/visualizar.php', [
            'recompensa' => $recompensa, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function editar($id)
    {   
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'cmt pelotao', 'cmt su']);

        $recompensa = Recompensa::buscarId($id);
        
        $this->visao('recompensas/editar.php', [
            'recompensa' => $recompensa, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function atualizar($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'cmt pelotao', 'cmt su']);
        $recompensa = Recompensa::buscarId($id);
        $recompensa->setMotivo($_POST['motivo']);
        $recompensa->setData($_POST['data']);
        $recompensa->setRecompensa($_POST['recompensa']);
        $recompensa->setMilitarResponsavel($_POST['militar-responsavel']);
        $recompensa->atualizar();
        DW3Sessao::setFlash('mensagem', 'Recompensa atualizada com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'recompensas');

    }

     public function pesquisar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'cmt pelotao', 'cmt su']);

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));

        $militares = Militar::buscarMilitarNumeroSu(trim($_POST['pesquisa']), $usuario->getIdSu());    

        $this->visao('recompensas/pesquisar.php', [
            'militares' => $militares, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function primeira_pesquisa()
    {    
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'cmt pelotao', 'cmt su']);

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));
        $militares = Militar::buscarMilitarSu($usuario->getIdSu());     

        $this->visao('recompensas/pesquisar.php', [
            'militares' => $militares, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function criar($id_militar)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'cmt pelotao', 'cmt su']);

        $militar = Militar::buscarId($id_militar);
        $this->visao('recompensas/criar.php', [
            'militar' => $militar, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function armazenar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'cmt pelotao', 'cmt su']);

        $recompensa = new Recompensa($_POST['motivo'], $_POST['data'], $_POST['recompensa'], $_POST['militar-responsavel'], $_POST['id_militar']);
        $recompensa->salvar();     
        DW3Sessao::setFlash('mensagem', 'Recompensa inserida na ficha do Militar.');
        $this->redirecionar(URL_RAIZ . 'recompensas');
    }

    public function destruir($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'cmt pelotao', 'cmt su']);

        Recompensa::destruir($id);        
        DW3Sessao::setFlash('mensagem', 'A Recompensa foi excluída com sucesso.');
        $this->redirecionar(URL_RAIZ . 'recompensas');
    }
}
