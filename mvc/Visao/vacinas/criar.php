<div class="row justify-content-md-center">
    <div class="col-6">
        <h2 class="">Cadastrar Vacina</h2>
        <form action="<?= URL_RAIZ . 'vacinas' ?>" method="post" class="margin-bottom row">
            <div class="form-group col-8 offset-2">
                <label class="control-label" for="vacina">Vacina</label>
                <input id="vacina" name="vacina" class="form-control" placeholder="Ex: HEPATITE B" value="" autofocus required>
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-success col-8 offset-2">Cadastrar</button>
                 
                <p class="col-12 text-center">
                    <a class="text-success" href="<?= URL_RAIZ . 'vacinas' ?>">Voltar para a tela de Vacinas cadastradas</a>
                </p>
            </div>
            
        </form>
       
    </div>
</div>
