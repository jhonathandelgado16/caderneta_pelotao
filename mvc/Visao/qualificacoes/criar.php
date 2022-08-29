<div class="row justify-content-md-center">
    <div class="col-6">
        <h2 class="">Cadastrar Qualificação Militar</h2>
        <form action="<?= URL_RAIZ . 'qualificacoes' ?>" method="post" class="margin-bottom row">
            <div class="form-group col-8 offset-2">
                <label class="control-label" for="codigo">Qualificação Militar</label>
                <input id="qualificacao_militar" name="qualificacao_militar" class="form-control" placeholder="EX: 06/01 Linha de Fogo" value="" autofocus required>
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-success col-8 offset-2">Cadastrar</button>
                 
                <p class="col-12 text-center">
                    <a class="text-success" href="<?= URL_RAIZ . 'qualificacoes' ?>">Voltar para a tela de QM</a>
                </p>
            </div>
            
        </form>
       
    </div>
</div>
