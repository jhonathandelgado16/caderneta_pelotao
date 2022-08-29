<?php
namespace Controlador;

use \Modelo\Instrucao;
use \Modelo\InstrucaoMinistrada;
use \Modelo\Usuario;
use \Framework\DW3Sessao;

class InstrucaoControlador extends Controlador
{
    public function index()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['s3', 'instrutor', 'cmt pelotao']);

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));

        $ministradas = InstrucaoMinistrada::buscarInstrucaoMinistradaInstrutor(DW3Sessao::get('usuario'));

        if($usuario->getTipoOperador() == 's3' OR $usuario->getTipoOperador() == 'administrador'){
            $ministradas = InstrucaoMinistrada::buscarTodosData();
        }
        
        $this->visao('instrucoes/index.php', [
            'ministradas' => $ministradas, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function realizar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['s3', 'instrutor', 'cmt pelotao']);

        $instrucoes = Instrucao::buscarTodos();

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));
        
        $this->visao('instrucoes/realizar.php', [
            'instrucoes' => $instrucoes, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function index_realizadas()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['s3', 'instrutor', 'cmt pelotao']);

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));

        $ministradas = InstrucaoMinistrada::buscarTodosData();
        
        $this->visao('instrucoes/visualizar-realizadas.php', [
            'ministradas' => $ministradas, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function pesquisar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['s3', 'instrutor', 'cmt pelotao']);

        $instrucoes = Instrucao::buscarMateriaTarefa(trim($_POST['pesquisa']));

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));

        $ministradas = InstrucaoMinistrada::buscarInstrucaoMinistradaInstrutor(DW3Sessao::get('usuario'));

        if($usuario->getTipoOperador() == 's3'){
            $ministradas = InstrucaoMinistrada::buscarTodosData();
        }
        
        $this->visao('instrucoes/realizar.php', [
            'instrucoes' => $instrucoes, 'ministradas' => $ministradas, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
        
    }


    public function criar()
    {
        $this->verificarPermissao(['s3', 'instrutor']);
        $this->verificarLogado();
        $this->visao('instrucoes/criar.php', ['mensagem' => DW3Sessao::getFlash('mensagem', null)]);
    }

    public function editar($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['s3', 'instrutor']);
        $instrucao = Instrucao::buscarId($id);
        $this->visao('instrucoes/editar.php', [
            'instrucao' => $instrucao, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function atualizar($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['s3', 'instrutor']);
        $instrucao = Instrucao::buscarId($id);
        $instrucao->setMateria($_POST['materia']);
        $instrucao->setIdentificacao($_POST['identificacao']);
        $instrucao->setTarefa($_POST['tarefa']);
        $instrucao->setFase($_POST['fase']);
        $instrucao->atualizar();
        DW3Sessao::setFlash('mensagem', 'Instrução alterada com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'instrucoes');
    }

    public function armazenar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['s3', 'instrutor']);
        $instrucao = new Instrucao($_POST['tarefa'], $_POST['identificacao'], $_POST['materia'], $_POST['fase']);
        $instrucao->salvar();        
        DW3Sessao::setFlash('mensagem', 'Instrução cadastrada com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'instrucoes');
    }

    public function destruir($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['s3', 'instrutor']);
        Instrucao::destruir($id);
        DW3Sessao::setFlash('mensagem', 'Instrução excluida com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'instrucoes');
    }

}
