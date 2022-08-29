<div class="row justify-content-md-center">
    <div class="col-6">
        <h2 class="">Editar Médico</h2>
        <form action="<?= URL_RAIZ . 'medicos/'. $medico->getIdMedico() ?>" method="post" class="margin-bottom row">
            <input type="hidden" name="_metodo" value="PATCH">
             <div class="form-group col-8 offset-2">
                <label class="control-label" for="codigo">Médico</label>
                <input value="<?= $medico->getNome() ?>" id="nome" name="nome" class="form-control" placeholder="Ex: 2º TEN DOSS " value="" autofocus required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success col-8 offset-2">Editar</button>
                 
                <p class="col-12 text-center">
                    <a class="text-success" href="<?= URL_RAIZ . 'medicos' ?>">Voltar para a tela de médicos Cadastrados</a>
                </p>
            </div>
            
        </form>
       
    </div>
</div>
