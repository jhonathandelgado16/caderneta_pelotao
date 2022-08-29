<?php

namespace Controlador;

use \Modelo\Militar;
use \Modelo\Usuario;
use \Modelo\Avaliacao;
use \Framework\DW3Sessao;

class AvaliacaoControlador extends Controlador
{
    public function index()
    {   
        $this->verificarLogado();
        $this->verificarPermissao(['cmt pelotao', 'cmt su']);

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));

        $avaliacoes = Avaliacao::buscarPelotao($usuario->getPelotao());

        if($usuario->getTipoOperador() == 'administrador'){
            $avaliacoes = Avaliacao::buscarTodos();
        }

        if($usuario->getTipoOperador() == 'cmt su'){
            $militares = Avaliacao::buscarSu($usuario->getIdSu());
        }
        
        $this->visao('avaliacoes/index.php', [
            'avaliacoes' => $avaliacoes, 'usuario' => $usuario, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function visualizar($id)
    {   
        $this->verificarLogado();
        $this->verificarPermissao(['cmt pelotao', 'cmt su']);

        $avaliacao = Avaliacao::buscarId($id);
        
        $this->visao('avaliacoes/visualizar.php', [
            'avaliacao' => $avaliacao, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function editar($id)
    {   
        $this->verificarLogado();
        $this->verificarPermissao(['cmt pelotao', 'cmt su']);

        $avaliacao = Avaliacao::buscarId($id);
        
        $this->visao('avaliacoes/editar.php', [
            'avaliacao' => $avaliacao, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function atualizar($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['cmt pelotao', 'cmt su']);
        $avaliacao = Avaliacao::buscarId($id);
        $avaliacao->setCooperacao($_POST['cooperacao']);
        $avaliacao->setAutoconfianca($_POST['autoconfianca']);
        $avaliacao->setPersistencia($_POST['persistencia']);
        $avaliacao->setIniciativa($_POST['iniciativa']);
        $avaliacao->setCoragem($_POST['coragem']);        
        $avaliacao->setResponsabilidade($_POST['responsabilidade']);
        $avaliacao->setDisciplina($_POST['disciplina']);
        $avaliacao->setEquilibrioEmocional($_POST['equilibrio_emocional']);
        $avaliacao->setEntusiasmoProfissional($_POST['entusiasmo_profissional']);
        $avaliacao->setMatriculaCfc($_POST['matricula_cfc']);
        $avaliacao->setPunido($_POST['punido']);
        $avaliacao->setAvaliacaoGlobal($_POST['avaliacao_global']);
        $avaliacao->setData(date('Y-m-d'));
        $avaliacao->atualizar();
        DW3Sessao::setFlash('mensagem', 'Avaliação de Atributos atualizada com Sucesso.');
        $this->redirecionar(URL_RAIZ . 'avaliacoes');
    }

     public function pesquisar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['cmt pelotao', 'cmt su']);

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));
        $militares = Militar::buscarMilitarNumeroPelotao(trim($_POST['pesquisa']), $usuario->getPelotao());  

        if($usuario->getTipoOperador() == 'administrador'){
            $militares = Militar::buscarMilitarNumero(trim($_POST['pesquisa']));
        }  

        if($usuario->getTipoOperador() == 'cmt su'){
            $militares = Militar::buscarMilitarNumeroSu(trim($_POST['pesquisa']), $usuario->getIdSu());
        }
        
        $this->visao('avaliacoes/pesquisar.php', [
            'militares' => $militares, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function primeira_pesquisa()
    {    
        $this->verificarLogado();
        $this->verificarPermissao(['cmt pelotao', 'cmt su']);

        $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));
        $militares = Militar::buscarMilitarPelotao($usuario->getPelotao());    

        if($usuario->getTipoOperador() == 'administrador'){
            $militares = Militar::buscarTodos();
        } 

        if($usuario->getTipoOperador() == 'cmt su'){
            $militares = Militar::buscarMilitarSu($usuario->getIdSu());
        }

        $this->visao('avaliacoes/pesquisar.php', [
            'militares' => $militares, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function criar($id_militar)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['cmt pelotao', 'cmt su']);

        $militar = Militar::buscarId($id_militar);

        $this->visao('avaliacoes/criar.php', [
            'militar' => $militar, 'mensagem' => DW3Sessao::getFlash('mensagem', null)
        ]);
    }

    public function armazenar()
    {
        $this->verificarLogado();
        $this->verificarPermissao(['cmt pelotao', 'cmt su']);

        $avaliacao = new Avaliacao($_POST['cooperacao'], $_POST['autoconfianca'], $_POST['persistencia'], $_POST['iniciativa'], $_POST['coragem'], $_POST['responsabilidade'], $_POST['disciplina'], $_POST['equilibrio_emocional'], $_POST['entusiasmo_profissional'], $_POST['matricula_cfc'], $_POST['punido'],  $_POST['avaliacao_global'], $_POST['id_militar'], date('Y-m-d') );
        $avaliacao->salvar();     
        DW3Sessao::setFlash('mensagem', 'Avaliação dos Atributos concluída.');
        $this->redirecionar(URL_RAIZ . 'avaliacoes');
    }

    public function destruir($id)
    {
        $this->verificarLogado();
        $this->verificarPermissao(['cmt pelotao', 'cmt su']);

        Avaliacao::destruir($id);        
        DW3Sessao::setFlash('mensagem', 'A Avaliação foi excluída com sucesso.');
        $this->redirecionar(URL_RAIZ . 'avaliacoes');
    }
}
