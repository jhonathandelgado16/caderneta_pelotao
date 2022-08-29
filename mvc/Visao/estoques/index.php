<script src="<?= URL_JS . 'javascript.js' ?>">
</script>

<div class="row justify-content-md-center">
    <div class="col-8">
    <h2>Controle de Estoque</h2>
    <form class="row justify-content-md-center" action="<?= URL_RAIZ . 'estoques/pesquisar' ?>" method='post'>
        <input type="hidden" name="_metodo" value="SEARCH">
        <input class="col-7 form-control" type="text" name="descricao" value="<?php if(!empty($_POST['descricao'])){ echo $_POST['descricao']; } ?>">
        <button class="col-4 btn btn-primary" type="submit">Buscar</button>
    </form>
    
    <table class="table">
        <tbody class="col-12">
        <tr>
            <th class="col-1">Cat Mat</th>
            <th class="col-3">Descricao</th>
            <th class="col-1">Quantidade</th>
            <th class="col-2">Valor Unitário</th>
            <th class="col-2">Adicionar Entrada</th>
        </tr>
        <?php if (empty($estoques)) : ?>
            <tr>
                <td colspan="99" class="text-center">Nenhum Item encontrado.</td>
            </tr>
        <?php endif ?>
        <?php foreach ($estoques as $estoque) : ?>
            <tr>
                <td><?= $estoque->getIdItem() ?></td>
                <td><?= $estoque->getItem()->getDescricao() ?></td>
                <td><?= $estoque->getQuantidade() ?></td>
                <td><?=  $estoque->getValorUnitario() ?></td>
                <td>
                    <button type="button" class="btn btn-xs btn-add" onclick="$(function mostrar(){
                        if($( '#<?= $estoque->getIdItem() ?>' ).is( ':hidden' )){
                            $('#<?= $estoque->getIdItem() ?>').show();
                        } else {
                            $('#<?= $estoque->getIdItem() ?>').hide();
                        }
                    });">
                         <img class="icone" src="<?= URL_PUBLICO . '/img/adicionar.png'  ?>" alt="">
                    </button>
                </td>
            </tr>
            <tr>
                <td id="<?= $estoque->getIdItem() ?>" colspan="99" class="linha">
                    <fieldset class="border p-3 entrada-estoque">
                        <legend class="w-auto px-2">Entrada de <?= $estoque->getItem()->getDescricao() ?> no Estoque</legend>
                        <form action="<?= URL_RAIZ . 'estoques/'. $estoque->getId() ?>" method="post" class="row">
                            <input name="id" type="text" value="<?= $estoque->getIdItem() ?>" hidden>
                            <div class="form-group col-3 offset-2">
                                <label class="control-label" for="quantidade">Quantidade Entrada</label>
                                <input min="0" id="quantidade" name="quantidade" type="number" class="form-control" autofocus required>
                            </div>
                            <div class="form-group col-3">
                                <label class="control-label" for="data">Data Entrada</label>
                                <input id="data" value="<?= date('Y-m-d'); ?>" name="data" type="date" class="form-control" autofocus>
                            </div>
                            <div class="form-group col-2">
                                <button type="submit" class="btn btn-primary entrada">ENTRADA <img class="icone" src="<?= URL_PUBLICO . '/img/concluir.png'  ?>"></button>
                            </div>
                        </form>
                        <button class="btn-cancel" onclick="$(function esconder(){
                             $('#<?= $estoque->getIdItem() ?>').hide();
                        });">Cancelar</button>
                    </fieldset>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    </div>
</div>
