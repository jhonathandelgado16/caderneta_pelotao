<?php
namespace Controlador;

use \Framework\DW3Sessao;

class LayoutControlador extends Controlador
{
    public function coordenador()
    {
        $this->visao('layouts/coordenador.php', ['mensagem' => DW3Sessao::getFlash('mensagem', null)], 'layout.php');
    }

    public function destruir()
    {
        DW3Sessao::deletar('usuario');
        $this->redirecionar(URL_RAIZ . 'login');
    }
}
