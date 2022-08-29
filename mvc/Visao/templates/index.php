<!DOCTYPE html>
<html>
<head>
    <title><?= APLICACAO_NOME ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= URL_CSS . 'bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?= URL_CSS . 'geral.css' ?>">
    <script src="<?= URL_JS . 'jquery-3.1.1.min.js' ?>"></script>
    <script src="<?= URL_JS . 'javascript.js' ?>"></script>
    <script src="<?= URL_JS . 'bootstrap.min.js' ?>"></script>
    <script src="<?= URL_JS . 'popper.min.js' ?>"></script>
    <link rel="shortcut icon" href="<?= URL_PUBLICO . '/img/caderneta.png' ?>"/>
</head>
<body>
    <header class="header-top">
	<nav class="nav-principal navbar row justify-content-md-center nav-color">
            <div class="center-block col-md-8 col-xs-12">
                <div class="row">
                    <img class="col-md-2 col-xs-12 logo" src="<?= URL_PUBLICO . '/img/caderneta.png' ?>" alt="" align="right" id="logo">
                    <div class="col-md-8 col-xs-12 hidden-xs">
                        <h1 class="navbar-brand col" href="#" id="logo-inicio">
                        Caderneta de Pelotão
                        </h1>                
                    </div>                    
                </div>
            </div>
        </nav>
        <nav class="navbar row justify-content-md-center nav-color">
            <?php
                use \Modelo\Usuario;
                use \Framework\DW3Sessao;
                ?>

                <div id='menu' class="col col-lg-8" align="right">
                <?php

                $usuario = Usuario::buscarId(DW3Sessao::get('usuario'));


                switch ($usuario->getTipoOperador()) {
                    case 'sargenteante':
                    ?>
                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Militares
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'militares' ?>">Visualizar Militares</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'militares/criar' ?>">Cadastrar Militar</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Recompensas
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'recompensas' ?>">Visualizar Recompensas</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'recompensas/primeira_pesquisa' ?>">Cadastrar Recompensa</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Punições
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'punicoes' ?>">Visualizar Punições</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'punicoes/primeira_pesquisa' ?>">Cadastrar Punição</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Teste de Aptidão Física
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'tafs' ?>">Visualizar Testes de Aptidão Física</a>
                            </div>
                        </div>
                    <?php
                        break;
                    case 'administrador':
                    ?>
                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle a-link" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Relatório
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'relatorio' ?>">Visualizar Relatório</a>
                            </div>
                        </div>
                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle a-link" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Militares
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'militares' ?>">Visualizar Militares</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'militares/criar' ?>">Cadastrar Militar</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                QM
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'qualificacoes' ?>">Visualizar QM</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'qualificacoes/criar' ?>">Cadastrar QM</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle a-link" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Instruções
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'instrucoes/criar' ?>">Cadastrar Instrução</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'instrucoes' ?>">Visualizar Instrução</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'instrucoes/realizar' ?>">Realizar Instrução</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Avaliações
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'avaliacoes' ?>">Visualizar Avaliações</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'avaliacoes/primeira_pesquisa' ?>">Cadastrar Avaliacao</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle a-link" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Usuários
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'usuarios/criar' ?>">Cadastrar Usuário</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'usuarios' ?>">Visualizar Usuários</a>
                            </div>
                        </div>

                         <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Recompensas
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'recompensas' ?>">Visualizar Recompensas</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'recompensas/primeira_pesquisa' ?>">Cadastrar Recompensa</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Observações
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'observacoes' ?>">Visualizar Observação</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'observacoes' ?>">Cadastrar Observação</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Punições
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'punicoes' ?>">Visualizar Punições</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'punicoes/primeira_pesquisa' ?>">Cadastrar Punição</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                TAF
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'tafs' ?>">Visualizar Testes de Aptidão Física</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'periodo_tafs' ?>">Visualizar Chamadas Testes de Aptidão Física</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'periodo_tafs/criar' ?>">Cadastrar Chamadas Testes de Aptidão Física</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Visitas Médicas
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'visitas_medicas' ?>">Visualizar Visitas</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'visitas_medicas/primeira_pesquisa' ?>">Cadastrar Visita</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Médicos
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'medicos' ?>">Visualizar Médicos</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'medicos/criar' ?>">Cadastrar Médicos</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Vacinação
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'vacinas' ?>">Visualizar Vacinas</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'vacinas/criar' ?>">Cadastrar Vacinas</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'vacinacoes' ?>">Vacinações</a>
                            </div>
                        </div>
                    <?php
                        break;
                    case 'saude':
                    ?>
                         <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Visitas Médicas
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'visitas_medicas' ?>">Visualizar Visitas</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'visitas_medicas/primeira_pesquisa' ?>">Cadastrar Visita</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Médicos
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'medicos' ?>">Visualizar Médicos</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'medicos/criar' ?>">Cadastrar Médicos</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Vacinação
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'vacinas' ?>">Visualizar Vacinas</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'vacinas/criar' ?>">Cadastrar Vacinas</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'vacinacoes' ?>">Vacinações</a>
                            </div>
                        </div>
                        <?php
                        break;
                    case 's3':
                        ?>
                         <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Instruções
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'instrucoes/criar' ?>">Cadastrar Instrução</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'instrucoes' ?>">Visualizar Instrução</a>
                            </div>
                        </div>
                        <?php
                        break;
                    case 'instrutor':
                        ?>
                         <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Instruções
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'instrucoes/criar' ?>">Cadastrar Instrução</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'instrucoes' ?>">Visualizar Instrução</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'instrucoes/realizar' ?>">Realizar Instrução</a>
                            </div>
                        </div>
                        <?php
                        break;
                    case 'cmt pelotao':
                    ?>
                         <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Militares
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'militares' ?>">Visualizar Militares</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'militares/criar' ?>">Cadastrar Militar</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Recompensas
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'recompensas' ?>">Visualizar Recompensas</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'recompensas/primeira_pesquisa' ?>">Cadastrar Recompensa</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Punições
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'punicoes' ?>">Visualizar Punições</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'punicoes/primeira_pesquisa' ?>">Cadastrar Punição</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Observações
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'observacoes' ?>">Visualizar Observação</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'observacoes' ?>">Cadastrar Observação</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Avaliações
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'avaliacoes' ?>">Visualizar Avaliações</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'avaliacoes/primeira_pesquisa' ?>">Cadastrar Avaliacao</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle a-link" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Instruções
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'instrucoes' ?>">Visualizar Instrução</a>                                
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'instrucoes/realizar' ?>">Realizar Instrução</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Visitas Médicas
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'visitas_medicas' ?>">Visualizar Visitas</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'visitas_medicas/primeira_pesquisa' ?>">Cadastrar Visita</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Teste de Aptidão Física
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'tafs' ?>">Visualizar Testes de Aptidão Física</a>
                            </div>
                        </div>
                        <?php
                        break;
                        case 'cmt su':
                    ?>
                         <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Militares
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'militares' ?>">Visualizar Militares</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'militares/criar' ?>">Cadastrar Militar</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Recompensas
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'recompensas' ?>">Visualizar Recompensas</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'recompensas/primeira_pesquisa' ?>">Cadastrar Recompensa</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Observações
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'observacoes' ?>">Visualizar Observação</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'observacoes' ?>">Cadastrar Observação</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Avaliações
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'avaliacoes' ?>">Visualizar Avaliações</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'avaliacoes/primeira_pesquisa' ?>">Cadastrar Avaliacao</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Teste de Aptidão Física
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'tafs' ?>">Visualizar Testes de Aptidão Física</a>
                            </div>
                        </div>

                        <div class="a-menu btn btn-default dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Punições
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'punicoes' ?>">Visualizar Punições</a>
                                <a class="dropdown-item" href="<?= URL_RAIZ . 'punicoes/primeira_pesquisa' ?>">Cadastrar Punição</a>
                            </div>
                        </div>

                        <?php
                        break;
                }
            ?>
            
                <form action="<?= URL_RAIZ . 'login' ?>" method="post" class="inline">
                    <input type="hidden" name="_metodo" value="DELETE">
                    <a href="" class="a-menu btn btn-default" onclick="event.preventDefault(); this.parentNode.submit()">
                        Sair
                    </a>
                </form>
            </div>
        </nav>
    </header>
    
    <?php if ($mensagem) : ?>
    <div class="row justify-content-md-center">
        <div class="col-8">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?= $mensagem ?>
            </div>
        </div>
    </div>
    <?php endif ?>

	<?php $this->imprimirConteudo() ?>

</body>
</html>
