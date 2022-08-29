<?php
namespace Controlador;
include PASTA_RAIZ."/mvc/Visao/conexao-sipam.php";

use \Modelo\Militar;
use \Modelo\Su;
use \Modelo\VisitaMedica;
use \Modelo\Vacinacao;
use \Modelo\Punicao;
use \Modelo\Recompensa;
use \Modelo\Avaliacao;
use \Modelo\Usuario;
use \Modelo\Instrucao;
use \Modelo\InstrucaoMinistrada;
use \Modelo\Taf;
use \Modelo\Observacao;
use \Modelo\PeriodoTaf;
use \Modelo\PostoGraduacao;
use \Modelo\QualificacaoMilitar;
use \Framework\DW3Sessao;


class MilitarControlador extends Controlador
{
    public function index()
    {   
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'instrutor', 'cmt pelotao', 'cmt su']);

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));

        $militares = Militar::buscarMilitarPelotao($usuario->getPelotao());

        if($usuario->getTipoOperador() == 'administrador'){
            $militares = Militar::buscarTodos();
        }

        if($usuario->getTipoOperador() == 'sargenteante' OR $usuario->getTipoOperador() == 'cmt su'){
            $militares = Militar::buscarMilitarSu($usuario->getIdSu());
        }
        
        $this->visao('militares/index.php', [
            'usuario' => $usuario, 'militares' => $militares, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function visualizar()
    {   
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'instrutor', 'cmt pelotao', 'cmt su']);

        $itens = Item::buscarTodos();
        $this->visao('itens/visualizar.php', [
            'itens' => $itens, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function pesquisar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'instrutor', 'cmt pelotao', 'cmt su']);

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));
        $militares = Militar::buscarMilitarNumero(trim($_POST['pesquisa']));

        $this->visao('militares/index.php', [
            'usuario' => $usuario, 'militares' => $militares, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
            ]);
        
    }

    public function criar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'instrutor', 'cmt pelotao', 'cmt su']);

        $subunidades = Su::buscarTodos();
        $posto_graduacoes = PostoGraduacao::buscarTodos();
        $qualificacoes = QualificacaoMilitar::buscarTodos();
        $this->visao('militares/criar.php', [
            'posto_graduacoes' => $posto_graduacoes , 'subunidades' => $subunidades , 'qualificacoes' => $qualificacoes, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function editar($id)
    {   
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'instrutor', 'cmt pelotao', 'cmt su']);
         $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));
        $subunidades = Su::buscarTodos();
        $posto_graduacoes = PostoGraduacao::buscarTodos();
        $militar = Militar::buscarId($id);        
        $qualificacoes = QualificacaoMilitar::buscarTodos();
        $this->visao('militares/editar.php', [
            'usuario' => $usuario, 'militar' => $militar, 'posto_graduacoes' => $posto_graduacoes , 'subunidades' => $subunidades, 'qualificacoes' => $qualificacoes, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function visualizar_ficha($id)
    {   
        $this->verificarLogado();
        $this->verificarPermissao(['cmt pelotao', 'cmt su']);
         $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));

        $militar = Militar::buscarId($id);

        $visitas_medicas = VisitaMedica::buscarIdMilitar($id);
        $vacinacoes = Vacinacao::buscarIdMilitar($id);
        $punicoes = Punicao::buscarPunicaoMilitar($id);
        $recompensas = Recompensa::buscarPunicaoMilitar($id);
        $avaliacoes = Avaliacao::buscarIdMilitar($id);
        $tafs = Taf::buscarTafMilitar($id);
        $observacoes = Observacao::buscarObservacaoMilitar($id);

        $instrucoes = Instrucao::buscarTodos();

        $this->visao('militares/ficha-militar.php', [
            'usuario' => $usuario, 'militar' => $militar, 'visitas_medicas' => $visitas_medicas, 'vacinacoes' => $vacinacoes , 'punicoes' => $punicoes, 'recompensas' => $recompensas, 'avaliacoes' => $avaliacoes, 'instrucoes' => $instrucoes, 'tafs' => $tafs, 'observacoes' => $observacoes, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function atualizar($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'instrutor', 'cmt pelotao', 'cmt su']);

        $militar = Militar::buscarId($id);
        $militar->setNome($_POST['nome']);
        $militar->setNomeGuerra($_POST['nome-guerra']);
        $militar->setIdSu($_POST['su']);
        $militar->setIdPostoGrad(trim($_POST['posto-grad']));
        $militar->setNomeGuerra($_POST['nome-guerra']);
        $militar->setNumero($_POST['numero']);
        $militar->setIdtMilitar($_POST['idt']);
        $militar->setCpf($_POST['cpf']);
        $militar->setPelotao($_POST['pelotao']);
        $militar->setIdQualificacaoMilitar($_POST['qualificacao']);
        $militar->setEndereco($_POST['rua'].', '.$_POST['numero-endereco'].', '.$_POST['bairro'].', '.$_POST['cidade'].', '.$_POST['cep']);
        $militar->atualizar();
        DW3Sessao::setFlash('mensagem', 'Informações do Militar atualizadas com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'militares');
    }

    public function armazenar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'instrutor', 'cmt pelotao', 'cmt su']);

        $militar = new Militar($_POST['nome'], $_POST['nome-guerra'], $_POST['numero'], $_POST['idt'], $_POST['cpf'], $_POST['rua'].', '.$_POST['numero-endereco'].', '.$_POST['bairro'].', '.$_POST['cidade'].', '.$_POST['cep'], $_POST['su'], $_POST['posto-grad'], $_POST['pelotao'], $_POST['qualificacao']);
        $militar->salvar(); 
        
        DW3Sessao::setFlash('mensagem', 'Militar cadastrado com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'militares');
    }

    public function destruir($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'instrutor', 'cmt pelotao', 'cmt su']);

        Militar::destruir($id);        
        DW3Sessao::setFlash('mensagem', 'o Militar foi excluido com sucesso.');
        $this->redirecionar(URL_RAIZ . 'militares');
    }
}
