<div class="row justify-content-md-center">
    <div class="col-md-8 col-xs-12">
        <h2 class="">Editar Seção</h2>
        <form class="col-12 row justify-content-md-center" action="<?= URL_RAIZ . 'instrucoes/'. $instrucao->getIdinstrucao() ?>" method="post" class="margin-bottom">
            <input type="hidden" name="_metodo" value="PATCH">
            <div class="form-group col-md-5 col-xs-12 offset-1">
                <label class="control-label" for="instrução">Matéria</label>
                <input value="<?= $instrucao->getMateria() ?>" id="materia" name="materia" class="form-control" autofocus>
            </div>
            <div class="form-group col-md-5 col-xs-12">
                <label class="control-label" for="identificacao">Identificação da Instrução</label>
                <input  value="<?= $instrucao->getIdentificacao() ?>" type="text" id="identificacao" name="identificacao" class="form-control" autofocus required>
            </div>
            <div class="form-group col-5 offset-1">
                <label class="control-label" for="su">Fase da Instrução</label>
                <select name="pelotao" id="" class="form-control">
                    <option value="IIB" <?php if($instrucao->getFase() == 'IIB'){ echo 'selected';}; ?>>IIB</option>
                    <option value="IIQ" <?php if($instrucao->getFase() == 'IIQ'){ echo 'selected';}; ?>>IIQ</option>
                    <option value="PAB-GLO" <?php if($instrucao->getFase() == 'PAB-GLO'){ echo 'selected';}; ?>>PAB/GLO</option>                   
                </select>
            </div>
            <div class="form-group col-md-10 offset-md-1 col-xs-12">
                <label class="control-label" for="instrução">Tarefa</label>
                <textarea name="tarefa" class="form-control" rows="3"><?= $instrucao->getTarefa() ?></textarea>
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-success col-md-8 offset-md-2 col-xs-12">Editar</button>
                 
                <p class="col-12 text-center">
                    <a class="text-success" href="<?= URL_RAIZ . 'instrucoes' ?>">Voltar para a tela de Instruções</a>
                </p>
            </div>
            
        </form>
       
    </div>
</div>
