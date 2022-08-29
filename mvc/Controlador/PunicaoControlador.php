<?php
namespace Controlador;

use \Modelo\Militar;
use \Modelo\Usuario;
use \Modelo\Punicao;
use \Framework\DW3Sessao;

class PunicaoControlador extends Controlador
{
    public function index()
    {   
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'cmt su', 'cmt pelotao']);

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));

        $punicoes = Punicao::buscarSu($usuario->getIdSu());

        if ($usuario->getTipoOperador() == 'administrador') {
            $punicoes = Punicao::buscarTodos();
        }

        $this->visao('punicoes/index.php', [
            'punicoes' => $punicoes, 'usuario' => $usuario, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function visualizar($id)
    {   
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'cmt su', 'cmt pelotao']);

        $punicao = Punicao::buscarId($id);
        
        $this->visao('punicoes/visualizar.php', [
            'punicao' => $punicao, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function editar($id)
    {   
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'cmt su']);

        $punicao = Punicao::buscarId($id);
        
        $this->visao('punicoes/editar.php', [
            'punicao' => $punicao, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function atualizar($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'cmt su']);
        $punicao = Punicao::buscarId($id);
        $punicao->setPunicao($_POST['punicao']);
        $punicao->setBi($_POST['bi']);
        $punicao->setDataInicio($_POST['data-inicio']);
        $punicao->setDataTermino($_POST['data-termino']);
        $punicao->setMotivo($_POST['motivo']);
        $punicao->atualizar();
        DW3Sessao::setFlash('mensagem', 'Punição atualizada com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'punicoes');

    }

     public function pesquisar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'cmt su', 'cmt pelotao']);

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));
        $militares = Militar::buscarMilitarNumeroSu(trim($_POST['pesquisa']), $usuario->getIdSu());    

        $this->visao('punicoes/pesquisar.php', [
            'militares' => $militares, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function primeira_pesquisa()
    {    
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'cmt su', 'cmt pelotao']);

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));
        $militares = Militar::buscarMilitarSu($usuario->getIdSu());     

        $this->visao('punicoes/pesquisar.php', [
            'militares' => $militares, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function criar($id_militar)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'cmt su', 'cmt pelotao']);
        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));

        $militar = Militar::buscarId($id_militar);
        $this->visao('punicoes/criar.php', [
            'usuario' => $usuario, 'militar' => $militar, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function armazenar_cmt_pel()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['cmt pelotao']);

        $punicao = new Punicao($_POST['motivo'], $_POST['data_punicao'], $_POST['data_punicao'], '', $_POST['punicao'], $_POST['id_militar']);
        $punicao->salvar();     
        DW3Sessao::setFlash('mensagem', 'Punição inserida na ficha do Militar.');
        $this->redirecionar(URL_RAIZ . 'punicoes');
    }

    public function armazenar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'cmt su', 'cmt pelotao']);

        if ($_POST['punicao'] == 'advertencia') {
            $punicao = new Punicao($_POST['motivo'], $_POST['data_bi'], $_POST['data_bi'], 'ADT nº '.$_POST['numero_bi'].' do dia '.$_POST['data_bi'], $_POST['punicao'], $_POST['id_militar']);
        } else {
            $punicao = new Punicao($_POST['motivo'], $_POST['data_inicio'], $_POST['data_termino'], 'BI nº '.$_POST['numero_bi'].' do dia '.$_POST['data_bi'], $_POST['punicao'], $_POST['id_militar']);
        }

        
        $punicao->salvar();     
        DW3Sessao::setFlash('mensagem', 'Punição inserida na ficha do Militar.');
        $this->redirecionar(URL_RAIZ . 'punicoes');
    }

    public function destruir($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['sargenteante', 'cmt su']);

        Punicao::destruir($id);        
        DW3Sessao::setFlash('mensagem', 'A punição foi excluída com sucesso.');
        $this->redirecionar(URL_RAIZ . 'punicoes');
    }
}
