<?php
namespace Controlador;

use \Modelo\Vacina;
use \Framework\DW3Sessao;

class VacinaControlador extends Controlador
{
    public function index()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['saude']);

        $vacinas = Vacina::buscarTodos();
        $this->visao('vacinas/index.php', [
            'vacinas' => $vacinas, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function criar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['saude']);

        $this->visao('vacinas/criar.php', ['mensagem' => DW3Sessao::getFlash('mensagem', null)]);
    }

    public function editar($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['saude']);

        $vacina = Vacina::buscarId($id);
        $this->visao('vacinas/editar.php', [
            'vacina' => $vacina, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function atualizar($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['saude']);

        $vacina = Vacina::buscarId($id);
        $vacina->setVacina($_POST['vacina']);
        $vacina->atualizar();
        DW3Sessao::setFlash('mensagem', 'Vacina alterada com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'vacinas');
    }

    public function armazenar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['saude']);

        $vacina = new Vacina($_POST['vacina']);
        $vacina->salvar();        
        DW3Sessao::setFlash('mensagem', 'Vacina cadastrada com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'vacinas');
    }

    public function destruir($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['saude']);
        
        Vacina::destruir($id);
        DW3Sessao::setFlash('mensagem', 'Vacina excluida com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'vacinas');
    }

}
