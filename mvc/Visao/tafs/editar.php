<div class="row justify-content-md-center">
    <div class="col-6">
        <h2 class="">Editar TAF realizado</h2>
            
        <form action="<?= URL_RAIZ . 'tafs/'. $taf->getIdTaf() ?>" method="post" class="margin-bottom row justify-content-md-center">
            <input type="hidden" name="_metodo" value="PATCH">
            
                <div class="form-group col-12 text-center">
                    <label class="control-label" for="militar">Militar</label>
                    <p><?= $taf->getMilitar()->getMilitarCompleto() ?></p>
                </div>

                <div class="form-group col-6 text-center">
                    <label class="control-label" for="recompensa">Chamada do Teste de Aptidão Física</label>
                    <select name="chamada" id="" class="form-control">
                        <?php if (empty($chamada_tafs)) : ?>
                            <option value="1">Não existem Chamadas cadastradas</option>
                        <?php endif ?>
                        <option value="0">Selecionar Chamada do TAF</option>
                        <?php foreach ($chamada_tafs as $chamada_taf) : ?>
                            <option value="<?= $chamada_taf->getIdPeriodoTaf() ?>" <?php if($chamada_taf->getIdPeriodoTaf() == $taf->getPeriodoTaf()->getIdPeriodoTaf()){ echo 'selected';}; ?>><?= $chamada_taf->getChamadaCompleta() ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group col-3 text-center">
                    <label class="control-label" for="">Suficiência</label>
                    <select name="suficiencia" id="" class="form-control text-center">
                        <option value="1" <?php if($taf->getSuficiencia() == 1){ echo 'selected';}; ?>>Suficiente</option>
                        <option value="2" <?php if($taf->getSuficiencia() == 2){ echo 'selected';}; ?>>Insuficiente</option>                          
                    </select>
                </div>

                <div class="form-group col-3 text-center">
                    <label class="control-label" for="">Conceito/Menção</label>
                    <input value="<?= $taf->getConceito() ?>" class="form-control text-center" type="text" name="conceito">
                </div>

                <div class="form-group col-6 row">
                    <p class="col-12">CORRIDA</p>
                    <div class="col-6">
                        <label class="control-label" for="data">Índice</label>
                        <input class="form-control" value="<?= $taf->getIndCorrida() ?>" type="text" name="ind-corrida">
                    </div>
                    <div class="col-6">
                        <label class="control-label" for="data">Valor</label>
                        <input class="form-control" value="<?= $taf->getCorrida() ?>" type="text" name="corrida">
                    </div>                    
                </div>

                <div class="form-group col-6 row">
                    <p class="col-12">FLEXÃO</p>
                    <div class="col-6">
                        <label class="control-label">Índice</label>
                        <input class="form-control" value="<?= $taf->getIndFlexao() ?>" type="text" name="ind-flexao">
                    </div>
                    <div class="col-6">
                        <label class="control-label" for="data">Valor</label>
                        <input class="form-control" value="<?= $taf->getFlexao() ?>" type="text" name="flexao">
                    </div>                    
                </div>

                <div class="form-group col-6 row">
                    <p class="col-12">ABDOMINAL</p>
                    <div class="col-6">
                        <label class="control-label">Índice</label>
                        <input class="form-control" value="<?= $taf->getIndAbdominal() ?>" type="text" name="ind-abdominal">
                    </div>
                    <div class="col-6">
                        <label class="control-label">Valor</label>
                        <input class="form-control" value="<?= $taf->getAbdominal() ?>" type="text" name="abdominal">
                    </div>                    
                </div>

                <div class="form-group col-6 row">
                    <p class="col-12">BARRA</p>
                    <div class="col-6">
                        <label class="control-label">Índice</label>
                        <input class="form-control" value="<?= $taf->getIndBarra() ?>" type="text" name="ind-barra">
                    </div>
                    <div class="col-6">
                        <label class="control-label">Valor</label>
                        <input class="form-control" value="<?= $taf->getBarra() ?>" type="text" name="barra">
                    </div>                    
                </div>
                
                <div class="col-12">       
                    <button type="submit" class="btn btn-success col-8 offset-2">Editar</button>
                                  
                    <p class="col-12 text-center">
                        <a class="text-success" href="<?= URL_RAIZ . 'tafs' ?>">Voltar para a tela de TAF</a>
                    </p>
                </div>
            </div>
        </form>
       
    </div>
</div>
