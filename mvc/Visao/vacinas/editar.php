<div class="row justify-content-md-center">
    <div class="col-6">
        <h2 class="">Editar Vacina</h2>
        <form action="<?= URL_RAIZ . 'vacinas/'. $vacina->getIdVacina() ?>" method="post" class="margin-bottom row">
            <input type="hidden" name="_metodo" value="PATCH">
             <div class="form-group col-8 offset-2">
                <label class="control-label" for="vacina">Vacina</label>
                <input value="<?= $vacina->getVacina() ?>" id="vacina" name="vacina" class="form-control" autofocus required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success col-8 offset-2">Editar</button>
                 
                <p class="col-12 text-center">
                    <a class="text-success" href="<?= URL_RAIZ . 'vacinas' ?>">Voltar para a tela de Vacinas Cadastrados</a>
                </p>
            </div>
            
        </form>
       
    </div>
</div>
