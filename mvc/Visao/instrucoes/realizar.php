<div class="row justify-content-md-center">
    
    <div class="col-xs-12 col-md-8">
        <h2 class="">Instruções Cadastradas</h1>
        <div class="row">

            <?php 
                use \Framework\DW3Sessao;
                use \Modelo\Usuario;

                
                if(Usuario::buscarId(DW3Sessao::get('usuario'))->getTipoOperador() == 's3'){
            ?>
            <nav class="col-xs-12 col-md-6">
                <a href="<?= URL_RAIZ . 'instrucoes/criar' ?>" class="btn btn-success col-xs-12 col-md-6">Cadastrar Nova Instrução</a>
            </nav>
            <?php
                }
            ?>
        </div>
        <div class="row">
            <form class="col-12 row" action="<?= URL_RAIZ . 'instrucoes' ?>" method='post'>
                    <input type="hidden" name="_metodo" value="SEARCH">
                    <input class="col-8 form-control" type="text" name="pesquisa" value="<?php if(!empty($_POST['pesquisa'])){ echo $_POST['pesquisa']; } ?>">
                    <button class="col-4 btn btn-success" type="submit">Buscar</button>
                </form>
        </div>
        <div class="table-instrucoes">
        <table class="table">
            <tbody class="col-xs-12">
            <tr>
                <th class="col-3">Matéria</th>
                <th class="col-1">Identificação</th>
                <th class="col-1">Fase</th>
                <th class="col-4">Tarefa</th>
                <th class="col-3">Opções</th>
            </tr>
            <?php if (empty($instrucoes)) : ?>
                <tr>
                    <td colspan="99" class="text-center">Nenhuma Instrução encontrada.</td>
                </tr>
            <?php endif ?>
            <?php foreach ($instrucoes as $instrucao) : ?>
                <tr>
                    <td><?= $instrucao->getMateria() ?></td>
                    <td><?= $instrucao->getIdentificacao() ?></td>
                    <td><?= $instrucao->getFase() ?></td>
                    <td><?= $instrucao->getTarefa() ?></td>
                    <td>

                        <?php
                        if(Usuario::buscarId(DW3Sessao::get('usuario'))->getTipoOperador() == 's3'){
                        ?>
                        <a href="<?= URL_RAIZ . 'instrucoes/' . $instrucao->getIdinstrucao() . '/editar' ?>" class="btn btn-xs btn-edit" title="Editar">
                            <img class="icone" src="<?= URL_PUBLICO . '/img/editar.png'  ?>" alt="">
                        </a>

                        <form action="<?= URL_RAIZ . 'instrucoes/' . $instrucao->getIdinstrucao() ?>" method="post" class="inline">
                            <input type="hidden" name="_metodo" value="DELETE">
                            <a href="" class="btn btn-xs btn-del" title="Deletar" onclick="if(confirm('Deseja excluir <?= $instrucao->getMateria(). ' ' .$instrucao->getIdentificacao() ?>?')){
                                    event.preventDefault(); 
                                    this.parentNode.submit()
                                }">
                                <img class="icone" src="<?= URL_PUBLICO . '/img/excluir.png'  ?>" alt="">
                            </a>
                        </form>
                        <?php
                            }
                        ?>

                        <a href="<?= URL_RAIZ . 'instrucoes/' . $instrucao->getIdinstrucao() . '/ministrar' ?>" class="btn btn-xs btn-edit" title="Ministrar Instrução">
                            <img class="icone" src="<?= URL_PUBLICO . '/img/ministrar.png'  ?>" alt="">
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
        </div>
    </div>

</div>