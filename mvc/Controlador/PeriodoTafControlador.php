<?php
namespace Controlador;

use \Modelo\PeriodoTaf;
use \Framework\DW3Sessao;

class PeriodoTafControlador extends Controlador
{
    public function index()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['sgt-tfm']);

        $periodo_tafs = PeriodoTaf::buscarTodos();
        $this->visao('periodo_tafs/index.php', [
            'periodo_tafs' => $periodo_tafs, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function criar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['sgt-tfm']);

        $this->visao('periodo_tafs/criar.php', ['mensagem' => DW3Sessao::getFlash('mensagem', null)]);
    }

    public function editar($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['sgt-tfm']);

        $periodo_taf = PeriodoTaf::buscarId($id);
        $this->visao('periodo_tafs/editar.php', [
            'periodo_taf' => $periodo_taf, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function atualizar($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['sgt-tfm']);

        $periodo_taf = PeriodoTaf::buscarId($id);
        $periodo_taf->setNumeroTaf($_POST['numero-taf']);
        $periodo_taf->setData($_POST['data']);
        $periodo_taf->setChamada($_POST['chamada']);
        $periodo_taf->atualizar();
        DW3Sessao::setFlash('mensagem', 'Período do TAF alterado com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'periodo_tafs');
    }

    public function armazenar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['sgt-tfm']);

        $periodo_taf = new PeriodoTaf($_POST['numero-taf'], $_POST['data'], $_POST['chamada']);
        $periodo_taf->salvar();        
        DW3Sessao::setFlash('mensagem', 'Período do TAF cadastrado com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'periodo_tafs');
    }

    public function destruir($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['sgt-tfm']);
        
        PeriodoTaf::destruir($id);
        DW3Sessao::setFlash('mensagem', 'Período do TAF excluido com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'periodo_tafs');
    }

}
