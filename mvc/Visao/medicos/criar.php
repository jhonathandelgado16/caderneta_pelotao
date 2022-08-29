<div class="row justify-content-md-center">
    <div class="col-6">
        <h2 class="">Cadastrar Médico</h2>
        <form action="<?= URL_RAIZ . 'medicos' ?>" method="post" class="margin-bottom row">
            <div class="form-group col-8 offset-2">
                <label class="control-label" for="codigo">Médico</label>
                <input id="nome" name="vacina" class="form-control" placeholder="EX: ASP MATHIAS" value="" autofocus required>
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-success col-8 offset-2">Cadastrar</button>
                 
                <p class="col-12 text-center">
                    <a class="text-success" href="<?= URL_RAIZ . 'medicos' ?>">Voltar para a tela de vacinas cadastradas</a>
                </p>
            </div>
            
        </form>
       
    </div>
</div>
