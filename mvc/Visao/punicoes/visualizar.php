<div class="row justify-content-md-center">
    <div class="col-6">
        <h2 class="">Visualizar Punição</h2>
            
            <div class="row">
                <div class="form-group col-12 text-center">
                    <label class="control-label" for="militar">Militar</label>
                    <p><?= $punicao->getMilitar()->getPostoGrad()->getPostoGrad() .' '. $punicao->getMilitar()->getNumero() .' '. $punicao->getMilitar()->getNomeGuerra() ?></p>
                </div>
                <div class="form-group col-6">
                    <label class="control-label" for="punicao">Punição</label>
                    <input class="form-control" value="<?= $punicao->getPunicao() ?>" type="text" name="bi" placeholder="Ex: BI 100 DE 02/02/2022" readonly>
                </div>
                <div class="form-group col-6">
                    <label class="control-label" for="bi">Boletim Interno</label>
                    <input class="form-control" value="<?= $punicao->getBi() ?>" type="text" name="bi" placeholder="Ex: BI 100 DE 02/02/2022" readonly>
                </div>
                <div class="form-group col-6">
                    <label class="control-label" for="data">Data de Início da Punição</label>
                    <input class="form-control" value="<?= $punicao->getDataInicio() ?>" type="date" name="data_inicio" readonly>
                </div>
                <div class="form-group col-6">
                    <label class="control-label" for="data">Data de Término da Punição</label>
                    <input class="form-control" value="<?= $punicao->getDataTermino() ?>" type="date" name="data_termino" readonly>
                </div>
                <div class=
                "form-group col-12">
                    <label class="control-label" for="motivo">Motivo da Punição</label>
                    <textarea name="motivo" class="form-control" rows="3" readonly><?= $punicao->getMotivo() ?></textarea>
                </div>
                
                <div class="col-12">
                    <p class="col-12 text-center">
                        <a class="text-success" href="<?= URL_RAIZ . 'punicoes' ?>">Voltar para a tela de Punições</a>
                    </p>
                </div>
            </div>
       
    </div>
</div>
