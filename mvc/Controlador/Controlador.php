<?php
namespace Controlador;

use \Modelo\Usuario;
use \Framework\DW3Controlador;
use \Framework\DW3Sessao;

abstract class Controlador extends DW3Controlador
{
    protected $usuario;

	protected function verificarLogado($admin = false)
    {
    	$usuario = $this->getUsuario();
        if ($usuario == null || ($admin && ($usuario->getTipoOperador() != 'admin'))) {
        	$this->redirecionar(URL_RAIZ . 'login');
        }
    }

    protected function verificarPermissao($tipo_operador)
    {
        $usuario = $this->getUsuario();
        $resultado = false;

        for ($i=0; $i < count($tipo_operador); $i++) { 
            if ($usuario->getTipoOperador() == $tipo_operador[$i]) {                
                $resultado = true;
            } elseif ($usuario->getTipoOperador() == 'administrador') {
                $resultado = true;
            } 
        }

        if($resultado == false){
            DW3Sessao::deletar('usuario');
            $this->redirecionar(URL_RAIZ . 'login');
        }
        
    }

    protected function getUsuario()
    {
        if ($this->usuario == null) {
        	$usuarioId = DW3Sessao::get('usuario');
        	if ($usuarioId == null) {
        		return null;
        	}
        	$this->usuario = Usuario::buscarId($usuarioId);
        }
        return $this->usuario;
    }
}
