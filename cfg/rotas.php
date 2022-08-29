<?php

$rotas = [

    #USUÁRIOS
    '/usuarios/criar' => [
        'GET' => '\Controlador\UsuarioControlador#criar',
    ],
    '/usuarios/?' => [
        'DELETE' => '\Controlador\UsuarioControlador#destruir',
        'PATCH' => '\Controlador\UsuarioControlador#atualizar',
    ],
    '/usuarios' => [
        'POST' => '\Controlador\UsuarioControlador#armazenar',
        'GET' => '\Controlador\UsuarioControlador#index',
    ],
    '/usuarios' => [
        'POST' => '\Controlador\UsuarioControlador#armazenar',
        'GET' => '\Controlador\UsuarioControlador#index',
    ],
    '/usuarios/?' => [
        'DELETE' => '\Controlador\UsuarioControlador#destruir',
        'PATCH' => '\Controlador\UsuarioControlador#atualizar',
    ],
    '/usuarios/?/editar' => [
        'GET' => '\Controlador\UsuarioControlador#editar',
    ],
    '/usuarios/criar' => [
        'GET' => '\Controlador\UsuarioControlador#criar',
    ],
    '/usuarios/primeiro_login' => [
        'GET' => '\Controlador\UsuarioControlador#primeiro_login',
    ],
    '/usuarios/criar_primeiro_login' => [
        'POST' => '\Controlador\UsuarioControlador#armazenar_primeiro_login',
    ],
    #MILITARES
    '/militares' => [
        'GET' => '\Controlador\MilitarControlador#index',
    ],
    '/militares/gravar' => [
        'POST' => '\Controlador\MilitarControlador#armazenar',
    ],
    '/militares/sucesso' => [
        'GET' => '\Controlador\MilitarControlador#sucesso',
    ],
    '/militares/criar' => [
        'GET' => '\Controlador\MilitarControlador#criar',
    ],
    '/militares/visualizar' => [
        'GET' => '\Controlador\MilitarControlador#visualizar',
    ],
    '/militares/?' => [
        'DELETE' => '\Controlador\MilitarControlador#destruir',
        'PATCH' => '\Controlador\MilitarControlador#atualizar',
        'SEARCH' => '\Controlador\MilitarControlador#pesquisar',
    ],
    '/militares/?/editar' => [
        'GET' => '\Controlador\MilitarControlador#editar',
    ],
    '/militares/?/ficha' => [
        'GET' => '\Controlador\MilitarControlador#visualizar_ficha',
    ],
    #INSTRUCOES
    '/instrucoes' => [
        'POST' => '\Controlador\InstrucaoControlador#armazenar',
        'GET' => '\Controlador\InstrucaoControlador#index',
        'SEARCH' => '\Controlador\InstrucaoControlador#pesquisar',
    ],
    '/instrucoes/realizar' => [
        'GET' => '\Controlador\InstrucaoControlador#realizar',
    ],
    '/instrucoes/realizadas' => [
        'GET' => '\Controlador\InstrucaoControlador#index_realizadas',
    ],
    '/instrucoes/?' => [
        'DELETE' => '\Controlador\InstrucaoControlador#destruir',
        'PATCH' => '\Controlador\InstrucaoControlador#atualizar',
    ],
    '/instrucoes/?/editar' => [
        'GET' => '\Controlador\InstrucaoControlador#editar',
    ],
    '/instrucoes/criar' => [
        'GET' => '\Controlador\InstrucaoControlador#criar',
    ],
    '/instrucoes/?/visualizar' => [
        'GET' => '\Controlador\InstrucaoMinistradaControlador#visualizar',
    ],
    '/instrucoes/?/ministrar' => [
        'GET' => '\Controlador\InstrucaoMinistradaControlador#index',
        'POST' => '\Controlador\InstrucaoMinistradaControlador#ministrar',
        'SEARCH' => '\Controlador\InstrucaoMinistradaControlador#pesquisar',
    ],
    #MEDICO
    '/medicos/criar' => [
        'GET' => '\Controlador\MedicoControlador#criar',
    ],
    '/medicos/?' => [
        'DELETE' => '\Controlador\MedicoControlador#destruir',
        'PATCH' => '\Controlador\MedicoControlador#atualizar',
    ],
    '/medicos' => [
        'POST' => '\Controlador\MedicoControlador#armazenar',
        'GET' => '\Controlador\MedicoControlador#index',
    ],
    '/medicos/?/editar' => [
        'GET' => '\Controlador\MedicoControlador#editar',
    ],
    #VISITAS MEDICAS
    '/visitas_medicas/?/criar' => [
        'GET' => '\Controlador\VisitaMedicaControlador#criar',
    ],
    '/visitas_medicas/?' => [
        'DELETE' => '\Controlador\VisitaMedicaControlador#destruir',
        'PATCH' => '\Controlador\VisitaMedicaControlador#atualizar',
    ],
    '/visitas_medicas' => [
        'POST' => '\Controlador\VisitaMedicaControlador#armazenar',
        'GET' => '\Controlador\VisitaMedicaControlador#index',
    ],
    '/visitas_medicas/?/editar' => [
        'GET' => '\Controlador\VisitaMedicaControlador#editar',
    ],
    '/visitas_medicas/?/visualizar' => [
        'GET' => '\Controlador\VisitaMedicaControlador#visualizar',
    ],
    '/visitas_medicas/primeira_pesquisa' => [
        'GET' => '\Controlador\VisitaMedicaControlador#primeira_pesquisa',
    ],
    '/visitas_medicas/pesquisar' => [
        'SEARCH' => '\Controlador\VisitaMedicaControlador#pesquisar',
    ],
    #VACINA
    '/vacinas/criar' => [
        'GET' => '\Controlador\VacinaControlador#criar',
    ],
    '/vacinas/?' => [
        'DELETE' => '\Controlador\VacinaControlador#destruir',
        'PATCH' => '\Controlador\VacinaControlador#atualizar',
    ],
    '/vacinas' => [
        'POST' => '\Controlador\VacinaControlador#armazenar',
        'GET' => '\Controlador\VacinaControlador#index',
    ],
    '/vacinas/?/editar' => [
        'GET' => '\Controlador\VacinaControlador#editar',
    ],
    #VACINA
    '/vacinacoes/criar' => [
        'GET' => '\Controlador\VacinacaoControlador#criar',
    ],
    '/vacinacoes/?' => [
        'DELETE' => '\Controlador\VacinacaoControlador#destruir',
        'PATCH' => '\Controlador\VacinacaoControlador#atualizar',
    ],
    '/vacinacoes' => [        
        'GET' => '\Controlador\VacinacaoControlador#index',
    ],
    '/vacinacoes/?/editar' => [
        'GET' => '\Controlador\VacinacaoControlador#editar',
    ],
    '/vacinacoes/?/realizar' => [
        'GET' => '\Controlador\VacinacaoControlador#realizar',
        'SEARCH' => '\Controlador\VacinacaoControlador#pesquisar',
        'POST' => '\Controlador\VacinacaoControlador#aplicar',
    ],
    '/vacinacoes/?/visualizar' => [
        'GET' => '\Controlador\VacinacaoControlador#visualizarVacina',
    ],
    #PUNICOES
    '/punicoes' => [
        'POST' => '\Controlador\PunicaoControlador#armazenar',
        'GET' => '\Controlador\PunicaoControlador#index',
    ],
    '/punicoes/cmtpel' => [
        'POST' => '\Controlador\PunicaoControlador#armazenar_cmt_pel',
    ],
    '/punicoes/pesquisar' => [
        'SEARCH' => '\Controlador\PunicaoControlador#pesquisar',
    ],
    '/punicoes/primeira_pesquisa' => [
        'GET' => '\Controlador\PunicaoControlador#primeira_pesquisa',
    ],
    '/punicoes/?/criar' => [
        'GET' => '\Controlador\PunicaoControlador#criar',
    ],    
    '/punicoes/?/visualizar' => [
        'GET' => '\Controlador\PunicaoControlador#visualizar',
    ],
    '/punicoes/?' => [
        'DELETE' => '\Controlador\PunicaoControlador#destruir',
        'PATCH' => '\Controlador\PunicaoControlador#atualizar',
    ],
    '/punicoes/?/editar' => [
        'GET' => '\Controlador\PunicaoControlador#editar',
    ],
    #RECOMPENSAS
    '/recompensas' => [
        'POST' => '\Controlador\RecompensaControlador#armazenar',
        'GET' => '\Controlador\RecompensaControlador#index',
    ],
    '/recompensas/pesquisar' => [
        'SEARCH' => '\Controlador\RecompensaControlador#pesquisar',
    ],
    '/recompensas/primeira_pesquisa' => [
        'GET' => '\Controlador\RecompensaControlador#primeira_pesquisa',
    ],
    '/recompensas/?/criar' => [
        'GET' => '\Controlador\RecompensaControlador#criar',
    ],    
    '/recompensas/?/visualizar' => [
        'GET' => '\Controlador\RecompensaControlador#visualizar',
    ],
    '/recompensas/?' => [
        'DELETE' => '\Controlador\RecompensaControlador#destruir',
        'PATCH' => '\Controlador\RecompensaControlador#atualizar',
    ],
    '/recompensas/?/editar' => [
        'GET' => '\Controlador\RecompensaControlador#editar',
    ],
    #PERIODO_TAF
    '/periodo_tafs/criar' => [
        'GET' => '\Controlador\PeriodoTafControlador#criar',
    ],
    '/periodo_tafs/?' => [
        'DELETE' => '\Controlador\PeriodoTafControlador#destruir',
        'PATCH' => '\Controlador\PeriodoTafControlador#atualizar',
    ],
    '/periodo_tafs' => [
        'POST' => '\Controlador\PeriodoTafControlador#armazenar',
        'GET' => '\Controlador\PeriodoTafControlador#index',
    ],
    '/periodo_tafs/?/editar' => [
        'GET' => '\Controlador\PeriodoTafControlador#editar',
    ],
    #TAF
    '/tafs' => [
        'POST' => '\Controlador\TafControlador#armazenar',
        'GET' => '\Controlador\TafControlador#index',
    ],
    '/tafs/?/pesquisar' => [
        'SEARCH' => '\Controlador\TafControlador#pesquisar',
    ],
    '/tafs/realizar' => [
        'POST' => '\Controlador\TafControlador#realizar',
    ],
    '/tafs/?/primeira_pesquisa' => [
        'GET' => '\Controlador\TafControlador#primeira_pesquisa',
    ],
    '/tafs/?/criar' => [
        'GET' => '\Controlador\TafControlador#criar',
    ],    
    '/tafs/?/visualizar' => [
        'GET' => '\Controlador\TafControlador#visualizar',
    ],
    '/tafs/?' => [
        'DELETE' => '\Controlador\TafControlador#destruir',
        'PATCH' => '\Controlador\TafControlador#atualizar',
    ],
    '/tafs/?/editar' => [
        'GET' => '\Controlador\TafControlador#editar',
    ],
    #AVALIAÇÕES
    '/avaliacoes' => [
        'POST' => '\Controlador\AvaliacaoControlador#armazenar',
        'GET' => '\Controlador\AvaliacaoControlador#index',
    ],
    '/avaliacoes/pesquisar' => [
        'SEARCH' => '\Controlador\AvaliacaoControlador#pesquisar',
    ],
    '/avaliacoes/primeira_pesquisa' => [
        'GET' => '\Controlador\AvaliacaoControlador#primeira_pesquisa',
    ],
    '/avaliacoes/?/criar' => [
        'GET' => '\Controlador\AvaliacaoControlador#criar',
    ],    
    '/avaliacoes/?/visualizar' => [
        'GET' => '\Controlador\AvaliacaoControlador#visualizar',
    ],
    '/avaliacoes/?' => [
        'DELETE' => '\Controlador\AvaliacaoControlador#destruir',
        'PATCH' => '\Controlador\AvaliacaoControlador#atualizar',
    ],
    '/avaliacoes/?/editar' => [
        'GET' => '\Controlador\AvaliacaoControlador#editar',
    ],
    #OBSERVAÇÕES
    '/observacoes' => [
        'POST' => '\Controlador\ObservacaoControlador#armazenar',
        'GET' => '\Controlador\ObservacaoControlador#index',
    ],
    '/observacoes/pesquisar' => [
        'SEARCH' => '\Controlador\ObservacaoControlador#pesquisar',
    ],
    '/observacoes/primeira_pesquisa' => [
        'GET' => '\Controlador\ObservacaoControlador#primeira_pesquisa',
    ],
    '/observacoes/?/criar' => [
        'GET' => '\Controlador\ObservacaoControlador#criar',
    ],    
    '/observacoes/?/visualizar' => [
        'GET' => '\Controlador\ObservacaoControlador#visualizar',
    ],
    '/observacoes/?' => [
        'DELETE' => '\Controlador\ObservacaoControlador#destruir',
        'PATCH' => '\Controlador\ObservacaoControlador#atualizar',
    ],
    '/observacoes/?/editar' => [
        'GET' => '\Controlador\ObservacaoControlador#editar',
    ],


    '/relatorio' => [
        'GET' => '\Controlador\RelatorioControlador#index',
    ],

    #QM
    '/qualificacoes/criar' => [
        'GET' => '\Controlador\QualificacaoMilitarControlador#criar',
    ],
    '/qualificacoes/?' => [
        'DELETE' => '\Controlador\QualificacaoMilitarControlador#destruir',
        'PATCH' => '\Controlador\QualificacaoMilitarControlador#atualizar',
    ],
    '/qualificacoes' => [
        'POST' => '\Controlador\QualificacaoMilitarControlador#armazenar',
        'GET' => '\Controlador\QualificacaoMilitarControlador#index',
    ],
    '/qualificacoes/?/editar' => [
        'GET' => '\Controlador\QualificacaoMilitarControlador#editar',
    ],




    
    '/' => [
        'GET' => '\Controlador\RaizControlador#index',
    ],
    '/login' => [
        'GET' => '\Controlador\LoginControlador#criar',
        'POST' => '\Controlador\LoginControlador#armazenar',
        'DELETE' => '\Controlador\LoginControlador#destruir',
    ],
    
    '/categorias' => [
        'GET' => '\Controlador\CategoriaControlador#index',
    ],
    '/categorias/gravar' => [
        'POST' => '\Controlador\CategoriaControlador#armazenar',
    ],
    '/categorias/criar' => [
        'GET' => '\Controlador\CategoriaControlador#criar',
    ],
    '/categorias/sucesso' => [
        'GET' => '\Controlador\CategoriaControlador#sucesso',
    ],
    '/categorias/?' => [
        'DELETE' => '\Controlador\CategoriaControlador#destruir',
        'PATCH' => '\Controlador\CategoriaControlador#atualizar',
    ],
    '/categorias/?/editar' => [
        'GET' => '\Controlador\CategoriaControlador#editar',
    ],
    
    '/estoques' => [
        'GET' => '\Controlador\EstoqueControlador#index',
    ],
    '/estoques/?' => [
         'SEARCH' => 'Controlador\EstoqueControlador#pesquisar',
         'POST' => 'Controlador\EstoqueControlador#inserir',
    ],
    '/secoes' => [
        'POST' => '\Controlador\SecaoControlador#armazenar',
        'GET' => '\Controlador\SecaoControlador#index',
    ],
    '/secoes/?' => [
        'DELETE' => '\Controlador\SecaoControlador#destruir',
        'PATCH' => '\Controlador\SecaoControlador#atualizar',
    ],
    '/secoes/?/editar' => [
        'GET' => '\Controlador\SecaoControlador#editar',
    ],
    '/secoes/criar' => [
        'GET' => '\Controlador\SecaoControlador#criar',
    ],
    '/secoes/?/visualizar' => [
        'GET' => '\Controlador\SecaoControlador#visualizar',
    ],
    '/listas' => [
        'POST' => '\Controlador\ListaControlador#armazenar',
        'GET' => '\Controlador\ListaControlador#index',
    ],
    '/listas/?/visualizar' => [
        'GET' => '\Controlador\ListaControlador#visualizar',
    ],
    '/listas/criar' => [
        'GET' => '\Controlador\ListaControlador#criar',
    ],
    '/listas/?' => [
        'DELETE' => '\Controlador\ListaControlador#destruir',
        'PATCH' => '\Controlador\ListaControlador#atualizar',
    ],
    '/listas/?/editar' => [
        'GET' => '\Controlador\ListaControlador#editar',
    ],
    '/listas/?/adicionar' => [
        'GET' => '\Controlador\ListaControlador#adicionar',
        'SEARCH' => '\Controlador\ListaControlador#pesquisar',
    ],
    '/atividades' => [
        'POST' => '\Controlador\AtividadeControlador#armazenar',
        'GET' => '\Controlador\AtividadeControlador#index',
    ],
    '/atividades/criar' => [
        'GET' => '\Controlador\AtividadeControlador#criar',
    ],
    '/atividades/?/editar' => [
        'GET' => '\Controlador\AtividadeControlador#editar',
    ],
    '/atividades/?' => [
        'DELETE' => '\Controlador\AtividadeControlador#destruir',
        'PATCH' => '\Controlador\AtividadeControlador#atualizar',
    ],
    '/pi' => [
        'POST' => '\Controlador\PiControlador#armazenar',
        'GET' => '\Controlador\PiControlador#index',
    ],
    '/pi/criar' => [
        'GET' => '\Controlador\PiControlador#criar',
    ],
    '/pi/?' => [
        'DELETE' => '\Controlador\PiControlador#destruir',
        'PATCH' => '\Controlador\PiControlador#atualizar',
    ],
    '/pi/?/editar' => [
        'GET' => '\Controlador\PiControlador#editar',
    ],




    '/layout/coordenador' => [
        'GET' => '\Controlador\LayoutControlador#coordenador',
    ],
];
