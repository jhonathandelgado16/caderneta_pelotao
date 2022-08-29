<?php
namespace Controlador;

use \Modelo\Militar;
use \Modelo\PeriodoTaf;
use \Modelo\Usuario;
use \Modelo\Taf;
use \Framework\DW3Sessao;

class TafControlador extends Controlador
{
    public function index()
    {   
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'cmt pelotao', 'cmt su']);

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));

        $periodo_tafs = PeriodoTaf::buscarTodos();
        
        $this->visao('tafs/index.php', [
            'periodo_tafs' => $periodo_tafs, 'usuario' => $usuario, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function criar($id_periodo_taf)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'cmt pelotao', 'cmt su']);

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));

        $militares = Militar::buscarMilitarSu($usuario->getIdSu());

        $periodo_taf = PeriodoTaf::buscarId($id_periodo_taf);
        $this->visao('tafs/criar.php', [
            'periodo_taf' => $periodo_taf, 'militares' => $militares, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function realizar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'cmt pelotao', 'cmt su']);

        $taf = new Taf($_POST['militares']);
        $taf->inserirVarios($_POST['militares']);        
        DW3Sessao::setFlash('mensagem', 'Testes de Aptidão Física inseridos com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'tafs');
    }

    public function visualizar($id)
    {   
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'cmt pelotao', 'cmt su']);

        $periodo_taf = PeriodoTaf::buscarId($id);

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));



        $tafs = Taf::buscarTafSuPeriodo($usuario->getIdSu(), $id);

        if($usuario->getTipoOperador() == 'administrador'){
            $tafs = Taf::buscarTafPeriodo($id);
        }
        
        $this->visao('tafs/visualizar.php', [
            'periodo_taf' => $periodo_taf, 'tafs' => $tafs, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function editar($id)
    {   
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'cmt pelotao', 'cmt su']);

        $taf = Taf::buscarId($id);

        $chamada_tafs = PeriodoTaf::buscarTodos();
        
        $this->visao('tafs/editar.php', [
            'taf' => $taf, 'chamada_tafs' => $chamada_tafs, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function atualizar($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'cmt pelotao', 'cmt su']);

        $taf = Taf::buscarId($id);
        $taf->setIdPeriodoTaf($_POST['chamada']);
        $taf->setSuficiencia($_POST['suficiencia']);
        $taf->setConceito($_POST['conceito']);
        $taf->setIndCorrida($_POST['ind-corrida']);
        $taf->setCorrida($_POST['corrida']);
        $taf->setIndFlexao($_POST['ind-flexao']);
        $taf->setFlexao($_POST['flexao']);
        $taf->setIndAbdominal($_POST['ind-abdominal']);
        $taf->setAbdominal($_POST['abdominal']);
        $taf->setIndBarra($_POST['ind-barra']);
        $taf->setBarra($_POST['barra']);
        $taf->atualizar();

        DW3Sessao::setFlash('mensagem', 'TAF atualizado com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'tafs');

    }

     public function pesquisar($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'cmt pelotao', 'cmt su']);

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));

        $periodo_taf = PeriodoTaf::buscarId($id);

        $tafs = Taf::buscarTafSuPesquisa(trim($_POST['pesquisa']), $usuario->getIdSu(), $id);    

        $this->visao('tafs/pesquisar.php', [
            'tafs' => $tafs, 'periodo_taf' => $periodo_taf, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function primeira_pesquisa($id)
    {    
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'cmt pelotao', 'cmt su']);

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));

        $periodo_taf = PeriodoTaf::buscarId($id);

        $tafs = Taf::buscarTafSuPeriodo($usuario->getIdSu(), $id);     

        $this->visao('tafs/pesquisar.php', [
            'tafs' => $tafs, 'periodo_taf' => $periodo_taf, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
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

        Taf::destruir($id);        
        DW3Sessao::setFlash('mensagem', 'O TAF foi excluído com sucesso.');
        $this->redirecionar(URL_RAIZ . 'tafs');
    }
}
