<div class="row justify-content-md-center">
    <div class="col-6">
        <h2 class="">Editar Chamada do Teste de Aptidão Física</h2>
        <form action="<?= URL_RAIZ . 'periodo_tafs/'.$periodo_taf->getIdPeriodoTaf() ?>" method="post" class="margin-bottom row">
            <input type="hidden" name="_metodo" value="PATCH">
            <div class="form-group col-8 offset-2">
                <label class="control-label" for="chamada">Chamada do Teste de Aptidão Física</label>
                <select name="chamada" id="" class="form-control">
                    <option value="">Selecionar Chamada Teste de Aptidão Física</option>
                    <option value="1ª Chamada" <?php if($periodo_taf->getChamada() == '1ª Chamada'){ echo 'selected';}; ?>>1ª Chamada</option>
                    <option value="2ª Chamada" <?php if($periodo_taf->getChamada() == '2ª Chamada'){ echo 'selected';}; ?>>2ª Chamada</option>
                    <option value="3ª Chamada" <?php if($periodo_taf->getChamada() == '3ª Chamada'){ echo 'selected';}; ?>>3ª Chamada</option>
                    <option value="4ª Chamada" <?php if($periodo_taf->getChamada() == '4ª Chamada'){ echo 'selected';}; ?>>4ª Chamada</option>
                </select>
            </div>
            <div class="form-group col-8 offset-2">
                <label class="control-label" for="numero-taf">Teste de Aptidão Física</label>
                <select name="numero-taf" id="" class="form-control">
                    <option value="">Selecionar Teste de Aptidão Física</option>
                    <option value="1º TAF" <?php if($periodo_taf->getNumeroTaf() == '1º TAF'){ echo 'selected';}; ?>>1º TAF</option>
                    <option value="2º TAF" <?php if($periodo_taf->getNumeroTaf() == '2º TAF'){ echo 'selected';}; ?>>2º TAF</option>
                    <option value="3º TAF" <?php if($periodo_taf->getNumeroTaf() == '3º TAF'){ echo 'selected';}; ?>>3º TAF</option>
                </select>
            </div>
            <div class="form-group col-8 offset-2">
                <label class="control-label" for="data">Data de realização</label>
                <input id="data" name="data" type="date" class="form-control" value="<?= $periodo_taf->getData() ?>" autofocus required>
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-success col-8 offset-2">Editar</button>
                 
                <p class="col-12 text-center">
                    <a class="text-success" href="<?= URL_RAIZ . 'periodo_tafs' ?>">Voltar para a tela de Chamadas do TAF</a>
                </p>
            </div>
            
        </form>
       
    </div>
</div>
