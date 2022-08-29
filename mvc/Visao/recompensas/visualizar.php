<div class="row justify-content-md-center">
    <div class="col-6">
        <h2 class="">Visualizar Recompensa</h2>
            
            <div class="row">
                <div class="form-group col-12 text-center">
                    <label class="control-label" for="militar">Militar</label>
                    <p><?= $recompensa->getMilitar()->getPostoGrad()->getPostoGrad() .' '. $recompensa->getMilitar()->getNumero() .' '. $recompensa->getMilitar()->getNomeGuerra() ?></p>
                </div>
                <div class="form-group col-6">
                    <label class="control-label" for="recompensa">Tipo da Recompensa</label>
                    <input class="form-control" value="<?= $recompensa->getRecompensa() ?>" type="text" name="recompensa" placeholder="Ex: FO+" readonly>
                </div>
                <div class="form-group col-6">
                    <label class="control-label" for="data">Data da Recompensa</label>
                    <input class="form-control" value="<?= $recompensa->getData() ?>" type="date" name="data" readonly>
                </div>
                <div class="form-group col-6 offset-3">
                    <label class="control-label" for="militar-responsavel">Militar que observou o fato</label>
                    <input class="form-control" value="<?= $recompensa->getMilitarResponsavel() ?>" type="text" name="militar-responsavel" placeholder="Ex: 3º SGT SANTOS" readonly>
                </div>
                
                <div class=
                "form-group col-12">
                    <label class="control-label" for="motivo">Motivo da Recompensa</label>
                    <textarea name="motivo" class="form-control" rows="3" readonly><?= $recompensa->getMotivo() ?></textarea>
                </div>
                
                <div class="col-12">                     
                    <p class="col-12 text-center">
                        <a class="text-success" href="<?= URL_RAIZ . 'recompensas' ?>">Voltar para a tela de Recompensas</a>
                    </p>
                </div>
            </div>
       
    </div>
</div>
