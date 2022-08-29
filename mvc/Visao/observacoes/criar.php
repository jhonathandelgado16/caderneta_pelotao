<div class="row justify-content-md-center">
    <div class="col-6">
        <h2 class="">Cadastrar Observação</h2>
        <form action="<?= URL_RAIZ . 'observacoes' ?>" method="post" class="margin-bottom row">

            <div class="form-group col-12 text-center">
                <label class="control-label" for="militar">Militar</label>
                <input type="hidden" name="id_militar" value="<?= $militar->getId() ?>">
                <p><?= $militar->getMilitarCompleto() ?></p>
            </div>

            <div class="form-group col-6">
                <label class="control-label" for="militar-responsavel">Militar que observou o fato</label>
                <input class="form-control" type="text" name="militar-responsavel" placeholder="Ex: 3º SGT SANTOS" required>
            </div>
            <div class="form-group col-6">
                <label class="control-label" for="data">Data da Recompensa</label>
                <input class="form-control" type="date" value="<?= date('Y-m-d') ?>" name="data" readonly>
            </div>          
    
            <div class=
            "form-group col-12">
                <label class="control-label" for="motivo">Observação</label>
                <textarea name="observacao" class="form-control" rows="3"></textarea>
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-success col-8 offset-2">Cadastrar</button>
                 
                <p class="col-12 text-center">
                    <a class="text-success" href="<?= URL_RAIZ . 'observacoes' ?>">Voltar para a tela de Observações</a>
                </p>
            </div>
            
        </form>
       
    </div>
</div>
