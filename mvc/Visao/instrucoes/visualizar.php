
    <script type="text/javascript" src="<?= URL_PUBLICO . '/js/javascript.js'  ?>">
    </script>

    <div class="row justify-content-md-center">
    <div class="col-md-8 col-xs-12">
            <h2 class="">Instrução Ministrada</h2>

            <div class="form-group col-12 text-center">
                <label class="control-label" for="">Instrução</label>
                <p><?= $instrucao->getMateria(). ' - ' .$instrucao->getIdentificacao() ?></p>
                <label class="control-label" for="">Fase</label>
                <p><?= $instrucao->getFase() ?></p>
                <label class="control-label" for="">Instrutor</label>
                <p><?= $instrucoes[0]->getInstrutor() ?></p>
                <label class="control-label" for="">Data de Realização</label>
                <p><?= date('d/m/Y',  strtotime($instrucoes[0]->getData())) ?></p>
            </div>
            
            <table class="table">
                <tbody class="col-xs-12">
                <tr>
                    <th rowspan="2" class="col-md-6 col-xs-2">Militar</th>
                    <th colspan="2" class="col-md-3 col-xs-2">Padrão Mínimo Alcançado</th>
                </tr>
                <tr>
                    <th class="text-center">SIM</th>
                    <th class="text-center">NÃO</th>
                </tr>
                <?php if (empty($instrucoes)) : ?>
                    <tr>
                        <td colspan="99" class="text-center">Nenhum Militar encontrado.</td>
                    </tr>
                <?php endif ?>
                <?php foreach ($instrucoes as $ministrada) : ?>
                    <tr class="quebra">
                        <td><?= $ministrada->getMilitar()->getPostoGrad()->getPostoGrad() . ' ' .$ministrada->getMilitar()->getNumero() .' '.$ministrada->getMilitar()->getNomeGuerra() ?></td>
                        <?php if($ministrada->getPadraoMinimo() == '1'){ ?> 
                            <td><input type="checkbox" onclick="return false;" name="" checked readonly></td>
                            <td><input type="checkbox" onclick="return false;" name="" readonly></td>
                        <?php } else { ?>
                            <td><input type="checkbox" onclick="return false;" name="" readonly></td>
                            <td><input type="checkbox" onclick="return false;" name="" checked readonly></td>
                        <?php } ?>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
            <div class="col-md-12 col-xs-12">
                <p class="col-12 text-center">
                    <a class="text-success" href="<?= URL_RAIZ . 'instrucoes' ?>">Voltar para a tela de Inicial</a>
                </p>
            </div>
    </div>
</div>
