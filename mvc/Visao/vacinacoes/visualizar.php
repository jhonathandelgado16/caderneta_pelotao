<div class="row justify-content-md-center">
    <div class="col-md-8 col-xs-12">
            <h2 class=""><?=  $vacina->getVacina() . ' aplicadas' ?></h2>
            
            <table class="table">
                <tbody class="col-xs-12">
                <tr>
                    <th class="">Militar</th>
                    <th class="">Vacina</th>
                    <th class="">Lote</th>
                    <th class="">Validade</th>
                    <th class="">Aplicação</th>
                </tr>
                <?php if (empty($vacinacoes)) : ?>
                    <tr>
                        <td colspan="99" class="text-center">Nenhum Militar encontrado.</td>
                    </tr>
                <?php endif ?>
                <?php foreach ($vacinacoes as $vacinacao) : ?>
                    <tr>
                        <td><?= $vacinacao->getMilitar()->getPostoGrad()->getPostoGrad().' '.$vacinacao->getMilitar()->getNumero().' '.$vacinacao->getMilitar()->getNomeGuerra() ?></td>
                        <td><?= $vacinacao->getVacina()->getVacina(); ?></td>
                        <td><?= $vacinacao->getLote(); ?></td>
                        <td><?= $vacinacao->getValidade(); ?></td>
                        <td><?= $vacinacao->getData(); ?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
            <div class="col-md-12 col-xs-12">
                <p class="col-12 text-center">
                    <a class="text-success" href="<?= URL_RAIZ . 'vacinacoes' ?>">Voltar para a tela de Inicial</a>
                </p>
            </div>
    </div>
</div>
