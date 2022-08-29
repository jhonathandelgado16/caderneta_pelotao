<?php
namespace Controlador;

use \Modelo\Militar;
use \Modelo\Vacina;
use \Modelo\Vacinacao;
use \Framework\DW3Sessao;

class VacinacaoControlador extends Controlador
{
    public function index()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['saude']);

        $vacinas = Vacina::buscarTodos();
        
        $this->visao('vacinacoes/index.php', [
            'vacinas' => $vacinas, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function visualizar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['saude']);

        $vacinas = Vacina::buscarTodos();
        $vacinacao = Vacinacao::buscarTodos();
        $this->visao('vacinacoes/visualizar.php', [
            'vacinas' => $vacinas, 'vacinacao' => $vacinacao, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function visualizarVacina($id_vacina)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['saude']);

        $vacina = Vacina::buscarId($id_vacina);
        $vacinacoes = Vacinacao::buscarIdVacina($id_vacina);
        $this->visao('vacinacoes/visualizar.php', [
            'vacina' => $vacina,'vacinacoes' => $vacinacoes, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function realizar($id_vacina)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['saude']);

        $vacina = Vacina::buscarId($id_vacina);
        $militares = Militar::buscarTodos();
        $this->visao('vacinacoes/realizar.php', [
            'vacina' => $vacina, 'militares' => $militares, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function aplicar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['saude']);

        $vacinacao = new Vacinacao($_POST['id_vacina'], $_POST['lote'], $_POST['validade'], $_POST['data'], $_POST['militares']);
        $vacinacao->inserirVarios($_POST['militares']);        
        DW3Sessao::setFlash('mensagem', 'Vacinação realizada com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'vacinacoes');
    }

    public function destruir($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['saude']);
        
        vacinacao::destruir($id);
        DW3Sessao::setFlash('mensagem', 'Vacinação excluida com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'vacinacoes');
    }

}
