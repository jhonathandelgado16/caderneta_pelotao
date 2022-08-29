<div class="row justify-content-md-center">
    <div class="col-6">
        <h2 class="">Visualizar Punição</h2>
            
        <form action="<?= URL_RAIZ . 'recompensas/'. $recompensa->getIdRecompensa() ?>" method="post" class="margin-bottom row">
            <input type="hidden" name="_metodo" value="PATCH">
            <div class="row">
                <div class="form-group col-12 text-center">
                    <label class="control-label" for="militar">Militar</label>
                    <p><?= $recompensa->getMilitar()->getPostoGrad()->getPostoGrad() .' '. $recompensa->getMilitar()->getNumero() .' '. $recompensa->getMilitar()->getNomeGuerra() ?></p>
                </div>
                <div class="form-group col-6">
                    <label class="control-label" for="recompensa">Tipo da Recompensa</label>
                    <input class="form-control" value="<?= $recompensa->getRecompensa() ?>" type="text" name="recompensa" placeholder="Ex: FO+">
                </div>
                <div class="form-group col-6">
                    <label class="control-label" for="data">Data da Recompensa</label>
                    <input class="form-control" value="<?= $recompensa->getData() ?>" type="date" name="data">
                </div>
                <div class="form-group col-6 offset-3">
                    <label class="control-label" for="militar-responsavel">Militar que observou o fato</label>
                    <input class="form-control" value="<?= $recompensa->getMilitarResponsavel() ?>" type="text" name="militar-responsavel" placeholder="Ex: 3º SGT SANTOS">
                </div>
                
                <div class=
                "form-group col-12">
                    <label class="control-label" for="motivo">Motivo da Recompensa</label>
                    <textarea name="motivo" class="form-control" rows="3"><?= $recompensa->getMotivo() ?></textarea>
                </div>
                
                <div class="col-12">       
                    <button type="submit" class="btn btn-success col-8 offset-2">Editar</button>
                                  
                    <p class="col-12 text-center">
                        <a class="text-success" href="<?= URL_RAIZ . 'recompensas' ?>">Voltar para a tela de Recompensas</a>
                    </p>
                </div>
            </div>
        </form>
       
    </div>
</div>
