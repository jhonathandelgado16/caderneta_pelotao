<?php
namespace Controlador;

use \Modelo\QualificacaoMilitar;
use \Framework\DW3Sessao;

class QualificacaoMilitarControlador extends Controlador
{
    public function index()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['administrador']);

        $qualificacoes = QualificacaoMilitar::buscarTodos();
        $this->visao('qualificacoes/index.php', [
            'qualificacoes' => $qualificacoes, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function criar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['administrador']);

        $this->visao('qualificacoes/criar.php', ['mensagem' => DW3Sessao::getFlash('mensagem', null)]);
    }

    public function editar($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['administrador']);

        $qualificacao = QualificacaoMilitar::buscarId($id);
        $this->visao('qualificacoes/editar.php', [
            'qualificacao' => $qualificacao, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function atualizar($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['administrador']);

        $qualificacao = QualificacaoMilitar::buscarId($id);
        $qualificacao->setQualificacaoMilitar($_POST['qualificacao_militar']);
        $qualificacao->atualizar();
        DW3Sessao::setFlash('mensagem', 'QM alterada com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'qualificacoes');
    }

    public function armazenar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['administrador']);

        $qualificacao = new QualificacaoMilitar($_POST['qualificacao_militar']);
        $qualificacao->salvar();        
        DW3Sessao::setFlash('mensagem', 'QM cadastrada com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'qualificacoes');
    }

    public function destruir($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['administrador']);
        
        QualificacaoMilitar::destruir($id);
        DW3Sessao::setFlash('mensagem', 'QM excluida com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'qualificacoes');
    }

}
