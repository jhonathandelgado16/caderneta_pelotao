<div class="row justify-content-md-center">
    <div class="col-8">
        <?php
            if($usuario->getTipoOperador() == 'cmt pelotao'){
        ?>
            <h2 class="">Militares do <?= $usuario->getPelotao() ?> da <?= $usuario->getSu()->getNome() ?></h1>
        <?php
        } else {
        ?>
            <h2 class="">Militares da <?= $usuario->getSu()->getNome() ?></h1>
        <?php
            }
        ?>
    <div class="row">
        <nav class="col-6">
            <a href="<?= URL_RAIZ . 'militares/criar' ?>" class="btn btn-success">Cadastrar Novo Militar</a>
        </nav>
        <form class="col-6 row" action="<?= URL_RAIZ . 'militares/pesquisar' ?>" method='post'>
            <input type="hidden" name="_metodo" value="SEARCH">
            <input class="col-8 form-control" type="text" name="pesquisa" value="<?php if(!empty($_POST['pesquisa'])){ echo $_POST['pesquisa']; } ?>">
            <button class="col-4 btn btn-success" type="submit">Buscar</button>
        </form>
    </div>
    <div class="row">
        
    </div>
    <table class="table">
        <tbody class="col-12">
        <tr>
            <th class="">Posto/Grad</th>
            <th class="">Número</th>
            <th class="">Nome de Guerra</th>
            <th class="">Opções</th>
        </tr>
        <?php if (empty($militares)) : ?>
            <tr>
                <td colspan="99" class="text-center">Nenhum Militar encontrado.</td>
            </tr>
        <?php endif ?>
        <?php foreach ($militares as $militar) : ?>
            <tr>
                <td><?= $militar->getPostoGrad()->getPostoGrad() ?></td>
                <td><?= $militar->getNumero() ?></td>
                <td><?= $militar->getNomeGuerra() ?></td>
                <td>
                    <?php if ($usuario->getTipoOperador() == 'cmt pelotao' OR $usuario->getTipoOperador() == 'administrador') { ?>
                        <a href="<?= URL_RAIZ . 'militares/' . $militar->getId() . '/ficha' ?>" class="btn btn-xs btn-edit" title="Visualizar Ficha do Militar">
                            <img class="icone" src="<?= URL_PUBLICO . '/img/ficha.png'  ?>" alt="">
                        </a>                    
                    <?php 
                        }
                    ?>
                    
                    <a href="<?= URL_RAIZ . 'militares/' . $militar->getId() . '/editar' ?>" class="btn btn-xs btn-edit" title="Editar">
                        <img class="icone" src="<?= URL_PUBLICO . '/img/editar.png'  ?>" alt="">
                    </a>

                    <form action="<?= URL_RAIZ . 'militares/' . $militar->getId() ?>" method="post" class="inline">
                        <input type="hidden" name="_metodo" value="DELETE">
                        <a href="" class="btn btn-xs btn-del" title="Deletar" onclick="if(confirm('Deseja excluir <?= $militar->getNomeGuerra() ?>?')){
                                event.preventDefault(); 
                                this.parentNode.submit()
                            }">
                            <img class="icone" src="<?= URL_PUBLICO . '/img/excluir.png'  ?>" alt="">
                        </a>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    </div>
</div>
