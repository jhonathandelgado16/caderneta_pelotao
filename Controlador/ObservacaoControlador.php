<?php
namespace Controlador;

use \Modelo\Militar;
use \Modelo\Usuario;
use \Modelo\Observacao;
use \Framework\DW3Sessao;

class ObservacaoControlador extends Controlador
{
    public function index()
    {   
        $this->verificarLogado();
        $this->verificarPermissao(['cmt pelotao', 'cmt su']);

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));
        $militares = Militar::buscarMilitarPelotao($usuario->getPelotao());     

        if($usuario->getTipoOperador() == 'cmt su'){
            $militares = Militar::buscarMilitarSu($usuario->getIdSu());
        }

        if($usuario->getTipoOperador() == 'administrador'){
            $militares = Militar::buscarTodos();
        }

        $this->visao('observacoes/pesquisar.php', [
            'militares' => $militares, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function visualizar($id)
    {   
        $this->verificarLogado();
        $this->verificarPermissao(['cmt pelotao', 'cmt su']);

        $militar = Militar::buscarId($id);
        $observacoes = Observacao::buscarObservacaoMilitar($id);
        
        $this->visao('observacoes/visualizar.php', [
            'observacoes' => $observacoes, 'militar' => $militar, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function editar($id)
    {   
        $this->verificarLogado();
        $this->verificarPermissao(['cmt pelotao', 'cmt su']);

        $recompensa = Recompensa::buscarId($id);
        
        $this->visao('observacoes/editar.php', [
            'recompensa' => $recompensa, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function atualizar($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['cmt pelotao', 'cmt su']);
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
        $this->verificarPermissao(['cmt pelotao', 'cmt su']);

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));

        $militares = Militar::buscarMilitarNumeroPelotao(trim($_POST['pesquisa']), $usuario->getPelotao());    

        if($usuario->getTipoOperador() == 'cmt su'){
            $militares = Militar::buscarMilitarSu($usuario->getIdSu());
        }

        $this->visao('observacoes/pesquisar.php', [
            'militares' => $militares, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function primeira_pesquisa()
    {    
        $this->verificarLogado();
        $this->verificarPermissao(['cmt pelotao', 'cmt su']);

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));

        $militares = Militar::buscarMilitarPelotao($usuario->getPelotao());     

        if($usuario->getTipoOperador() == 'cmt su'){
            $militares = Militar::buscarMilitarNumeroSu(trim($_POST['pesquisa']), $usuario->getIdSu());
        }

        $this->visao('observacoes/pesquisar.php', [
            'militares' => $militares, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function criar($id_militar)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['cmt pelotao', 'cmt su']);

        $militar = Militar::buscarId($id_militar);

        $this->visao('observacoes/criar.php', [
            'militar' => $militar, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function armazenar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['cmt pelotao', 'cmt su']);

        $obsevacao = new Observacao($_POST['observacao'], $_POST['militar-responsavel'], $_POST['data'], $_POST['id_militar']);
        $obsevacao->salvar();     
        DW3Sessao::setFlash('mensagem', 'Observação inserida na ficha do Militar.');
        $this->redirecionar(URL_RAIZ . 'observacoes');
    }

    public function destruir($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['cmt pelotao', 'cmt su']);

        Observacao::destruir($id);        
        DW3Sessao::setFlash('mensagem', 'A Observação foi excluída com sucesso.');
        $this->redirecionar(URL_RAIZ . 'observacoes');
    }
}
