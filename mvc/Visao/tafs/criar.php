<div class="row justify-content-md-center">
    <div class="col-11">
        <h2 class="text-center">Cadastrar Teste de Aptidão Física</h2>
        <form action="<?= URL_RAIZ . 'tafs/realizar' ?>" method="post" class="margin-bottom row">

            <div class="form-group col-12 text-center">
                <label class="control-label" for="militar">Teste de Aptidão Física</label>
                <input type="hidden" name="id_militar" value="<?= $periodo_taf->getIdPeriodoTaf() ?>">
                <p><?= $periodo_taf->getChamadaCompleta() ?></p>
            </div>

            <table class="table taf text-center">
                <tbody class="col-xs-12">
                <tr>
                    <th rowspan="2" class="col-md-2 col-xs-6">Militar</th>
                    <th rowspan="2" class="col-md-1 col-xs-6">Participou</th>
                    <th colspan="2" class="">Corrida</th>
                    <th colspan="2" class="">Flexão</th>
                    <th colspan="2" class="">Abdominal</th>
                    <th colspan="2" class="">Barra</th>
                    <th hidden colspan="2" class="">PPM</th>
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
                    <th hidden class="">Índice</th>
                    <th hidden class="">Valor</th>
                </tr>
                <?php if (empty($militares)) : ?>
                    <tr>
                        <td colspan="99" class="text-center">Nenhum Militar encontrado.</td>
                    </tr>
                <?php endif ?>
                <?php
                    $counter = 0;
                    foreach ($militares as $militar) : ?>
                    <tr>
                        <td><?= $militar->getPostoGrad()->getPostoGrad() . ' ' .$militar->getNumero() .' '.$militar->getNomeGuerra() ?></td>
                        <td>
                            <select name="militares[<?= $counter ?>][0]" id="" class="form-control">
                                <option value="<?= $militar->getId() ?>">SIM</option>
                                <option value="0" selected>NÃO</option>                          
                            </select>                          
                        </td>
                        <td>
                            <input type="text" placeholder="Ex: B" class="form-control" name="militares[<?= $counter ?>][1]">
                        </td>
                        <td>
                            <input type="text" placeholder="Ex: 2600" class="form-control" name="militares[<?= $counter ?>][2]">
                        </td>
                        <td>
                            <input type="text" placeholder="Ex: B" class="form-control" name="militares[<?= $counter ?>][3]">                            
                        </td>
                        <td>
                            <input type="text" placeholder="Ex: 28" class="form-control" name="militares[<?= $counter ?>][4]">
                        </td>
                        <td>
                            <input type="text" placeholder="Ex: B" class="form-control" name="militares[<?= $counter ?>][5]">
                        </td>
                        <td>
                            <input type="text" placeholder="Ex: 60" class="form-control" name="militares[<?= $counter ?>][6]">
                        </td>                           
                        <td>
                            <input type="text" placeholder="Ex: B" class="form-control" name="militares[<?= $counter ?>][7]">
                        </td>
                        <td>
                            <input type="text" placeholder="Ex: 8" class="form-control" name="militares[<?= $counter ?>][8]">
                        </td>
                        <td hidden>
                            <input type="text" placeholder="Ex: B" class="form-control" name="militares[<?= $counter ?>][9]">
                        </td>
                        <td hidden>
                            <input type="text" placeholder="Ex: 4:10" class="form-control" name="militares[<?= $counter ?>][10]">
                        </td>
                        <td>
                            <select name="militares[<?= $counter ?>][11]" id="" class="form-control">
                                <option value="1" selected>SIM</option>
                                <option value="2">NÃO</option>                          
                            </select>                          
                        </td>
                        <td>
                            <input type="text" placeholder="Ex: B" class="form-control" name="militares[<?= $counter ?>][12]">
                            <input hidden type="text" value="<?= $periodo_taf->getIdPeriodoTaf() ?>" class="form-control" name="militares[<?= $counter ?>][13]">                          
                        </td>
                    </tr>
                <?php $counter++;
                    endforeach ?>
                </tbody>
            </table>
            
            <div class="col-12">
                <button type="submit" class="btn btn-success col-8 offset-2">Cadastrar</button>
                 
                <p class="col-12 text-center">
                    <a class="text-success" href="<?= URL_RAIZ . 'tafs' ?>">Voltar para a tela de TAF</a>
                </p>
            </div>
            
        </form>
       
    </div>
</div>
