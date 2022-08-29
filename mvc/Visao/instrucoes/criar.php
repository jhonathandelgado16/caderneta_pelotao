<div class="row justify-content-md-center">
    <div class="col-8">
        <h2 class="">Cadastrar Instrução</h2>
        <form action="<?= URL_RAIZ . 'instrucoes' ?>" method="post" class="margin-bottom row">
            <div class="form-group col-5  offset-1">
                <label class="control-label" for="materia">Matéria</label>
                <input id="materia" name="materia" class="form-control" placeholder="Ex: 1. ARMAMENTO, MUNIÇÃO E TIRO" autofocus required>
            </div>            
            <div class="form-group col-5">
                <label class="control-label" for="identificacao">Identificação da Instrução</label>
                <input placeholder="Ex: 1. B-101" type="text" id="identificacao" name="identificacao" class="form-control" autofocus required>
            </div>            
            <div class="form-group col-5 offset-1">
                <label class="control-label" for="su">Fase da Instrução</label>
                <select name="fase" id="" class="form-control">
                    <option value="IIB">IIB</option>
                    <option value="IIQ">IIQ</option>
                    <option value="PAB-GLO">PAB/GLO</option>                    
                </select>
            </div>
            <div class="form-group col-10 offset-1">
                <label class="control-label" for="tarefa">Tarefa</label>
                <textarea name="tarefa" class="form-control" placeholder="Ex: Conhecer as principais características do armamento individual e coletivo da OM." rows="3"></textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success col-8 offset-2">Cadastrar</button>
                 
                <p class="col-12 text-center">
                    <a class="text-success" href="<?= URL_RAIZ . 'instrucoes' ?>">Voltar para a tela de Instruções Cadastradas</a>
                </p>
            </div>
            
        </form>
       
    </div>
</div>
