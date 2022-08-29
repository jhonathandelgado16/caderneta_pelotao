<div class="row justify-content-md-center">
    <div class="col-6">
        <h2 class="">Visita Médica</h2>
        <div class="row">
            <div class="form-group col-12 text-center">
                <label class="control-label" for="militar">Militar</label>
                <p><?= $visita_medica->getMilitar()->getPostoGrad()->getPostoGrad() .' '. $visita_medica->getMilitar()->getNumero() .' '. $visita_medica->getMilitar()->getNomeGuerra() ?></p>
            </div>
            <div class="form-group col-6">
                <label class="control-label" for="medico">Médico</label>
                <input class="form-control" type="text" value="<?= $visita_medica->getMedico()->getNome() ?>" name="" readonly>
            </div>
            <div class="form-group col-6">
                <label class="control-label" for="data">Data da Visita Médica</label>
                <input value="<?= $visita_medica->getData() ?>" class="form-control" type="date" name="data" readonly>
            </div>
            <div class=
            "form-group col-12">
                <label class="control-label" for="motivo">Motivo da Visita Médica</label>
                <textarea value="" name="motivo" class="form-control" rows="3" readonly><?= $visita_medica->getMotivo() ?></textarea>
            </div>
            
            <div class="col-12">                              
                <p class="col-12 text-center">
                    <a class="text-success" href="<?= URL_RAIZ . 'visitas_medicas' ?>">Voltar para a tela de Visitas Médicas</a>
                </p>
            </div>
       </div>
    </div>
</div>
