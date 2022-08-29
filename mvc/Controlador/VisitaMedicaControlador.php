<?php
namespace Controlador;
use \Modelo\Medico;
use \Modelo\Militar;
use \Modelo\VisitaMedica;
use \Modelo\Usuario;
use \Framework\DW3Sessao;

class VisitaMedicaControlador extends Controlador
{

    public function index()
    {   
        $this->verificarLogado();
        $this->verificarPermissao(['saude', 'cmt pelotao']);

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));

        $visitas_medicas = VisitaMedica::buscarTodos();

        if($usuario->getTipoOperador() == 'cmt pelotao'){
            $visitas_medicas = VisitaMedica::buscarPelotao($usuario->getPelotao());
        }
        
        $this->visao('visitas_medicas/index.php', [
            'visitas_medicas' => $visitas_medicas, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function visualizar($id)
    {   
        $this->verificarLogado();
        $this->verificarPermissao(['saude', 'cmt pelotao']);

        $visita_medica = VisitaMedica::buscarId($id);
        
        $this->visao('visitas_medicas/visualizar.php', [
            'visita_medica' => $visita_medica, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

     public function pesquisar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['saude', 'cmt pelotao']);

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));

        $militares = Militar::buscarMilitarNumero(trim($_POST['pesquisa']));    

        if($usuario->getTipoOperador() == 'cmt pelotao'){
            $militares = Militar::buscarMilitarNumeroPelotao(trim($_POST['pesquisa']), $usuario->getPelotao());
        }

        $this->visao('visitas_medicas/pesquisar.php', [
            'militares' => $militares, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function primeira_pesquisa()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['saude', 'cmt pelotao']);
                  
         $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));

        $militares = Militar::buscarTodos();

        if($usuario->getTipoOperador() == 'cmt pelotao'){
            $militares = Militar::buscarMilitarPelotao($usuario->getPelotao());
        }    

        $this->visao('visitas_medicas/pesquisar.php', [
            'militares' => $militares, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function criar($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['saude', 'cmt pelotao']);

        $militar = Militar::buscarId($id);
        $medicos = Medico::buscarTodos();
        $this->visao('visitas_medicas/criar.php', [
            'medicos' => $medicos, 'militar' => $militar, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function armazenar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['saude', 'cmt pelotao']);

        $visita_medica = new VisitaMedica($_POST['motivo'], $_POST['data'], $_POST['id_militar'], $_POST['id_medico']);
        $visita_medica->salvar();     
        DW3Sessao::setFlash('mensagem', 'Visita Médica cadastrada com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'visitas_medicas');
    }

    public function destruir($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['saude', 'cmt pelotao']);

        VisitaMedica::destruir($id);        
        DW3Sessao::setFlash('mensagem', 'A Visita Médica foi excluída com sucesso.');
        $this->redirecionar(URL_RAIZ . 'visitas_medicas');
    }
}
