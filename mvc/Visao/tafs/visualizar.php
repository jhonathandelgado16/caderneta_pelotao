<div class="row justify-content-md-center">
    <div class="col-8">
        <h2 class="">Visualizar Chamada do TAF</h2>
            
            <div class="row">
                <p class="col-12 text-left">
                    <a class="text-success" href="<?= URL_RAIZ . 'tafs' ?>">Voltar para a tela de TAF</a>
                </p>
                <div class="form-group col-12 text-center">
                <label class="control-label" for="militar">Teste de Aptidão Física</label>
                <p><?= $periodo_taf->getChamadaCompleta() ?></p>
            </div>

            <table class="table taf-visualizar text-center">
                <tbody class="col-xs-12">
                <tr>
                    <th rowspan="2" class="col-md-2 col-xs-6">Militar</th>
                    <th colspan="2" class="">Corrida</th>
                    <th colspan="2" class="">Flexão</th>
                    <th colspan="2" class="">Abdominal</th>
                    <th colspan="2" class="">Barra</th>
                    <th colspan="2" class="">PPM</th>
                    <th rowspan="2" class="col-md-1 col-xs-6">Suficiência</th>
                    <th rowspan="2" class="">Conceito</th>
                </tr>
                 <tr>
                    <th class="">Índice</th>
                    <th class="">Valor</th>
                    <th class="">Índice</th>
                    <th class="">Valor</th>
                    <th class="">Índice</th>
                    <th class="">Valor</th>
                    <th class="">Índice</th>
                    <th class="">Valor</th>
                    <th class="">Índice</th>
                    <th class="">Valor</th>
                </tr>
                <?php if (empty($tafs)) : ?>
                    <tr>
                        <td colspan="99" class="text-center">Nenhum Teste de Aptidão Física encontrado.</td>
                    </tr>
                <?php endif ?>
                <?php
                    foreach ($tafs as $taf) : ?>
                    <tr>
                        <td><?= $taf->getMilitar()->getMilitarCompleto() ?></td>
                        <td><?= $taf->getIndCorrida() ?></td>
                        <td><?= $taf->getCorrida() ?></td>
                        <td><?= $taf->getIndFlexao() ?></td>
                        <td><?= $taf->getFlexao() ?></td>
                        <td><?= $taf->getIndAbdominal() ?></td>
                        <td><?= $taf->getAbdominal() ?></td>                           
                        <td><?= $taf->getIndBarra() ?></td>
                        <td><?= $taf->getBarra() ?></td>
                        <td><?= $taf->getIndPpm() ?></td>
                        <td><?= $taf->getPpm() ?></td>
                        <td><?= $taf->getSuficiencia() == 1 ? "Suficiente" : "Insuficiente"; ?></td>
                        <td><?= $taf->getConceito() ?></td>
                    </tr>
                <?php
                    endforeach ?>
                </tbody>
            </table>

            <div class="col-12">                 
                <p class="col-12 text-center">
                    <a class="text-success" href="<?= URL_RAIZ . 'tafs' ?>">Voltar para a tela de TAF</a>
                </p>
            </div>
            </div>
       
    </div>
</div>
