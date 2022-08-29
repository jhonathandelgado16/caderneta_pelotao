<div class="row justify-content-md-center">
    <div class="col-xs-12 col-md-6">
    <h2 class="">Realizar Vacinação <?= $vacina->getVacina() ?></h2>

    <form action="<?= URL_RAIZ . 'vacinacoes/'. $vacina->getIdVacina() .'/realizar' ?>" method="post" class="margin-bottom row">
        <div class="row col-md-12">
            <div class="form-group col-md-12 col-xs-12">
                <input name="id_vacina" style="display:none" type="text" value="<?= $vacina->getIdVacina() ?>" class="form-control">                
            </div>
            <div class="form-group col-md-6 col-xs-12">
                <label class="control-label" for="su">Lote da Vacina (preencher)</label>
                <input type="text" name="lote" class="form-control" value="" autofocus required>
            </div>
            <div class="form-group col-md-6 col-xs-12">
                <label class="control-label" for="validade">Data de Validade do Lote (selecionar)</label>
                <input type="date" name="validade" class="form-control" autofocus required>
            </div>
            <div class="form-group col-md-6 col-xs-12">
                <label class="control-label" for="su">Vacina Aplicada</label>
                <input readonly type="text" name="vacina" value="<?= $vacina->getVacina() ?>" class="form-control" value="" autofocus required>
            </div>
            <div class="form-group col-md-6 col-xs-12">
                <label class="control-label" for="su">Data de realização</label>
                <input type="date" name="data" value="<?= date('Y-m-d'); ?>" class="form-control" value="" autofocus required>
            </div>
        </div>
        
        <table class="table">
            <tbody>
            <tr>
                <th class="">Militar</th>
                <th class="">Tomou a Vacina</th>
            </tr>
            <?php if (empty($militares)) : ?>
                <tr>
                    <td colspan="99" class="text-center">Nenhum Militar encontrado.</td>
                </tr>
            <?php endif ?>
            <?php foreach ($militares as $militar) : ?>
                <tr>
                    <td><?= $militar->getPostoGrad()->getPostoGrad() . ' ' .$militar->getNumero() .' '.$militar->getNomeGuerra() ?></td>
                    <td><input value="<?= $militar->getId() ?>" type="checkbox" name="militares[]"></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>

        <button type="submit" class="btn btn-success col-xs-12 col-md-8 offset-md-2">Concluir</button>
        <div class="col-md-12 col-xs-12">
                <p class="col-12 text-center">
                    <a class="text-success" href="<?= URL_RAIZ . 'vacinacoes' ?>">Voltar para a tela de Inicial</a>
                </p>
            </div>
    </form>
    </div>
</div>
