<div class="row justify-content-md-center">
    <div class="col-6">
        <h2 class="">Cadastrar chamada do Teste de Aptidão Física</h2>
        <form action="<?= URL_RAIZ . 'periodo_tafs' ?>" method="post" class="margin-bottom row">
            <div class="form-group col-8 offset-2">
                <label class="control-label" for="chamada">Chamada do Teste de Aptidão Física</label>
                <select name="chamada" id="" class="form-control">
                    <option value="">Selecionar Chamada Teste de Aptidão Física</option>
                    <option value="1ª Chamada">1ª Chamada</option>
                    <option value="2ª Chamada">2ª Chamada</option>
                    <option value="3ª Chamada">3ª Chamada</option>
                    <option value="4ª Chamada">4ª Chamada</option>
                </select>
            </div>
            <div class="form-group col-8 offset-2">
                <label class="control-label" for="numero-taf">Teste de Aptidão Física</label>
                <select name="numero-taf" id="" class="form-control">
                    <option value="">Selecionar Teste de Aptidão Física</option>
                    <option value="1º TAF">1º TAF</option>
                    <option value="2º TAF">2º TAF</option>
                    <option value="3º TAF">3º TAF</option>
                </select>
            </div>
            <div class="form-group col-8 offset-2">
                <label class="control-label" for="data">Data de realização</label>
                <input id="data" name="data" type="date" class="form-control" value="" autofocus required>
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-success col-8 offset-2">Cadastrar</button>
                 
                <p class="col-12 text-center">
                    <a class="text-success" href="<?= URL_RAIZ . 'periodo_tafs' ?>">Voltar para a tela de Chamadas do TAF</a>
                </p>
            </div>
            
        </form>
       
    </div>
</div>
