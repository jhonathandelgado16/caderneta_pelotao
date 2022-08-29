<?php
namespace Controlador;

use \Modelo\Instrucao;
use \Modelo\InstrucaoMinistrada;
use \Modelo\Militar;
use \Modelo\Usuario;
use \Modelo\Su;
use \Modelo\QualificacaoMilitar;
use \Framework\DW3Sessao;

class InstrucaoMinistradaControlador extends Controlador
{
    public function index($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['s3', 'instrutor', 'cmt pelotao']);

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));

        $militares = Militar::buscarMilitarPelotao('pelotaoforpron');

        $subunidades = Su::buscarTodos();

        $instrucao = Instrucao::buscarId($id);

        if($usuario->getTipoOperador() == 'administrador'){
            $instrucoes = Instrucao::buscarTodos();
        }

        if($usuario->getTipoOperador() == 'cmt pelotao'){
            $militares = Militar::buscarMilitarPelotao($usuario->getPelotao());
        }
        
        $qualificacoes = QualificacaoMilitar::buscarTodos();
        
        $this->visao('instrucoes/ministrar.php', [
            'usuario' => $usuario, 'instrucao' => $instrucao, 'militares' => $militares,'subunidades' => $subunidades, 'qualificacoes' => $qualificacoes, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function pesquisar($id)
    {

        $this->verificarLogado();
        $this->verificarPermissao(['s3', 'instrutor', 'cmt pelotao']);

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));

        $militares = Militar::buscarTodos(); 

        if(empty($_POST['pelotao'])){ 
            if($_POST['qm'] != ""){
                $militares = Militar::buscarQualificacaoMilitar($_POST['qm']);
                if($_POST['su'] != ""){
                    $militares = Militar::buscarQualificacaoMilitarSu($_POST['qm'], $_POST['su']);
                }
            } else {
                if($_POST['su'] != ""){
                    $militares = Militar::buscarMilitarSu($_POST['su']);
                } else {
                    $militares = Militar::buscarTodos();
                }
            }          
        } else {
            $militares = Militar::buscarMilitarPelotao($_POST['pelotao']);
        }        

        $subunidades = Su::buscarTodos();

        $instrucao = Instrucao::buscarId($id);

        if($usuario->getTipoOperador() == 'administrador'){
            $instrucoes = Instrucao::buscarTodos();
        }
        
        $qualificacoes = QualificacaoMilitar::buscarTodos();
        
        $this->visao('instrucoes/ministrar.php', [
            'usuario' => $usuario, 'instrucao' => $instrucao, 'militares' => $militares,'subunidades' => $subunidades, 'qualificacoes' => $qualificacoes, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
        
    }

    public function criar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['s3', 'instrutor']);

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

    public function visualizar($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['s3', 'instrutor', 'cmt pelotao']);

        $instrucao = Instrucao::buscarId($id);
        $instrucoes = InstrucaoMinistrada::buscarInstrucaoAssunto($id);
        $this->visao('instrucoes/visualizar.php', [
            'instrucoes' => $instrucoes, 'instrucao' => $instrucao, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function atualizar($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['s3', 'instrutor']);

        $instrucao = Instrucao::buscarId($id);
        $instrucao->setMateria($_POST['assunto']);
        $instrucao->setIdentificacao($_POST['identificacao']);
        $instrucao->atualizar();
        DW3Sessao::setFlash('mensagem', 'Instrução alterada com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'instrucoes');
    }

    public function ministrar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['s3', 'instrutor', 'cmt pelotao']);

        $instrucao = new InstrucaoMinistrada(null, $_POST['id-instrucao'], $_POST['data'], null, $_POST['militares'], $_POST['militares'], $_POST['id_instrutor'], $_POST['nome_instrutor']);

        $instrucao->inserirVarios($_POST['militares']);        
        DW3Sessao::setFlash('mensagem', 'Instrução ministrada com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'instrucoes');
    }

    public function armazenar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['s3', 'instrutor']);

        $instrucao = new Instrucao($_POST['assunto'], $_POST['identificacao'], DW3Sessao::get('usuario'));
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
