<div class="row justify-content-md-center">
    <div class="col-6">
        <h2 class="">Visualizar Punição</h2>
            
        <form action="<?= URL_RAIZ . 'punicoes/'. $punicao->getIdPunicao() ?>" method="post" class="margin-bottom row">
            <input type="hidden" name="_metodo" value="PATCH">
            <div class="row">
                <div class="form-group col-12 text-center">
                    <label class="control-label" for="militar">Militar</label>
                    <p><?= $punicao->getMilitar()->getPostoGrad()->getPostoGrad() .' '. $punicao->getMilitar()->getNumero() .' '. $punicao->getMilitar()->getNomeGuerra() ?></p>
                </div>
                <div class="form-group col-6">
                    <label class="control-label" for="punicao">Punição</label>
                    <select name="punicao" id="" class="form-control">
                        <option value="" >Selecionar Punição</option>
                        <option value="advertencia" <?php if($punicao->getPunicao() == 'Advertência'){ echo 'selected';}; ?>>Advertência</option>
                        <option value="impedimento" <?php if($punicao->getPunicao() == 'Impedimento'){ echo 'selected';}; ?>>Impedimento</option>
                        <option value="repreensao" <?php if($punicao->getPunicao() == 'Repreensão'){ echo 'selected';}; ?>>Repreensão</option>
                        <option value="detencao" <?php if($punicao->getPunicao() == 'Detenção'){ echo 'selected';}; ?>>Detenção</option>
                        <option value="prisao" <?php if($punicao->getPunicao() == 'Prisão'){ echo 'selected';}; ?>>Prisão</option>
                    </select>
                </div>
                <div class="form-group col-6">
                    <label class="control-label" for="bi">Boletim Interno</label>
                    <input class="form-control" value="<?= $punicao->getBi() ?>" type="text" name="bi" placeholder="Ex: BI 100 DE 02/02/2022">
                </div>
                <div class="form-group col-6">
                    <label class="control-label" for="data">Data de Início da Punição</label>
                    <input class="form-control" value="<?= $punicao->getDataInicio() ?>" type="date" name="data_inicio">
                </div>
                <div class="form-group col-6">
                    <label class="control-label" for="data">Data de Término da Punição</label>
                    <input class="form-control" value="<?= $punicao->getDataTermino() ?>" type="date" name="data_termino">
                </div>
                <div class=
                "form-group col-12">
                    <label class="control-label" for="motivo">Motivo da Punição</label>
                    <textarea name="motivo" class="form-control" rows="3"><?= $punicao->getMotivo() ?></textarea>
                </div>
                
                <div class="col-12">
                <button type="submit" class="btn btn-success col-8 offset-2">Editar</button>
                 
                <p class="col-12 text-center">
                    <a class="text-success" href="<?= URL_RAIZ . 'punicoes' ?>">Voltar para a tela de Punições</a>
                </p>
            </div>
            </div>
        </form>
       
    </div>
</div>
