<div class="row justify-content-md-center">
    <div class="col-6">
        <h2 class="">Cadastrar Recompensa</h2>
        <form action="<?= URL_RAIZ . 'recompensas' ?>" method="post" class="margin-bottom row">

            <div class="form-group col-12 text-center">
                <label class="control-label" for="militar">Militar</label>
                <input type="hidden" name="id_militar" value="<?= $militar->getId() ?>">
                <p><?= $militar->getPostoGrad()->getPostoGrad() .' '. $militar->getNumero() .' '. $militar->getNomeGuerra() ?></p>
            </div>
            <div class="form-group col-4">
                <label class="control-label" for="recompensa">Tipo da Recompensa</label>
                <select name="recompensa" id="" class="form-control">
                    <option value="">Selecionar recompensa</option>
                    <option value="Referência Elogiosa">Referência Elogiosa</option>
                    <option value="Elogio">Elogio</option>
                    <option value="FO+">FO+</option>
                    <option value="Dispensa como Recompensa">Dispensa como Recompensa</option>
                </select>
            </div>
            <div class="form-group col-4">
                <label class="control-label" for="data">Data da Recompensa</label>
                <input class="form-control" type="date" name="data">
            </div>
            <div class="form-group col-4">
                <label class="control-label" for="militar-responsavel">Militar que observou o fato</label>
                <input class="form-control" type="text" name="militar-responsavel" placeholder="Ex: 3º SGT SANTOS">
            </div>
            
            <div class=
            "form-group col-12">
                <label class="control-label" for="motivo">Motivo da Recompensa</label>
                <textarea name="motivo" class="form-control" rows="3"></textarea>
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-success col-8 offset-2">Cadastrar</button>
                 
                <p class="col-12 text-center">
                    <a class="text-success" href="<?= URL_RAIZ . 'recompensas' ?>">Voltar para a tela de Recompensas</a>
                </p>
            </div>
            
        </form>
       
    </div>
</div>
