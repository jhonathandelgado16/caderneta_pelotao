<div class="row justify-content-md-center">
    <div class="col-xs-12 col-md-6">
    <h2 class="">Realizar vacinação</h2>
    <div class="row">
        <nav class="col-xs-12 col-md-8">
            <a href="<?= URL_RAIZ . 'vacinas/criar' ?>" class="btn btn-success col-xs-12 col-md-6">Cadastrar Nova Vacina</a>
        </nav>
    </div>
    <div class="row">
        
    </div>
    <table class="table">
        <tbody class="col-xs-12">
        <tr>
            <th class="col-8">Vacina</th>
            <th class="col-3">Opções</th>
        </tr>
        <?php if (empty($vacinas)) : ?>
            <tr>
                <td colspan="99" class="text-center">Nenhuma Vacina encontrada.</td>
            </tr>
        <?php endif ?>
        <?php foreach ($vacinas as $vacina) : ?>
            <tr>
                <td><?= $vacina->getVacina() ?></td>
                <td>
                    <a href="<?= URL_RAIZ . 'vacinacoes/' . $vacina->getIdVacina() . '/visualizar' ?>" class="btn btn-xs btn-edit" title="Visualizar Vacinas Realizadas">
                        <img class="icone" src="<?= URL_PUBLICO . '/img/visualizar.png'  ?>" alt="">
                    </a>

                    <a href="<?= URL_RAIZ . 'vacinacoes/' . $vacina->getIdVacina() . '/realizar' ?>" class="btn btn-xs btn-edit" title="Realizar vacinação">
                        <img class="icone" src="<?= URL_PUBLICO . '/img/vacinas.png'  ?>" alt="">
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    </div>
</div>

