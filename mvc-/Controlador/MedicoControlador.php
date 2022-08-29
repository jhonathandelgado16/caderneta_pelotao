<?php
namespace Controlador;

use \Modelo\Medico;
use \Framework\DW3Sessao;

class MedicoControlador extends Controlador
{
    public function index()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['saude']);

        $medicos = Medico::buscarTodos();
        $this->visao('medicos/index.php', [
            'medicos' => $medicos, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function criar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['saude']);

        $this->visao('medicos/criar.php', ['mensagem' => DW3Sessao::getFlash('mensagem', null)]);
    }

    public function editar($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['saude']);

        $medico = Medico::buscarId($id);
        $this->visao('medicos/editar.php', [
            'medico' => $medico, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function atualizar($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['saude']);

        $medico = Medico::buscarId($id);
        $medico->setNome($_POST['nome']);
        $medico->atualizar();
        DW3Sessao::setFlash('mensagem', 'Médico alterado com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'medicos');
    }

    public function armazenar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['saude']);

        $medico = new Medico($_POST['nome']);
        $medico->salvar();        
        DW3Sessao::setFlash('mensagem', 'Médico cadastrada com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'medicos');
    }

    public function destruir($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['saude']);
        
        Medico::destruir($id);
        DW3Sessao::setFlash('mensagem', 'Médico excluido com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'medicos');
    }

}
