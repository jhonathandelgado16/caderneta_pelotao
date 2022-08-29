<div class="row justify-content-md-center">
    <div class="col-6">
        <h2 class="">Visita Médica</h2>
        <form action="<?= URL_RAIZ . 'visitas_medicas' ?>" method="post" class="margin-bottom row">

            <div class="form-group col-12 text-center">
                <label class="control-label" for="militar">Militar</label>
                <input type="hidden" name="id_militar" value="<?= $militar->getId() ?>">
                <p><?= $militar->getPostoGrad()->getPostoGrad() .' '. $militar->getNumero() .' '. $militar->getNomeGuerra() ?></p>
            </div>
            <div class="form-group col-6">
                <label class="control-label" for="medico">Médico</label>
                <select name="id_medico" id="medico" class="form-control">
                    <?php if (empty($medicos)) : ?>
                        <option value="1">Não existem Subunidades cadastradas</option>
                    <?php endif ?>
                    <option value="0">Selecionar o Médico</option>
                    <?php foreach ($medicos as $medico) : ?>
                        <option value="<?= $medico->getIdMedico() ?>"><?= $medico->getNome() ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group col-6">
                <label class="control-label" for="data">Data da Visita Médica</label>
                <input class="form-control" type="date" name="data">
            </div>
            <div class=
            "form-group col-12">
                <label class="control-label" for="motivo">Motivo da Visita Médica</label>
                <textarea name="motivo" class="form-control" rows="3"></textarea>
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-success col-8 offset-2">Cadastrar</button>
                 
                <p class="col-12 text-center">
                    <a class="text-success" href="<?= URL_RAIZ . 'visitas_medicas' ?>">Voltar para a tela de Visitas Médicas</a>
                </p>
            </div>
            
        </form>
       
    </div>
</div>
