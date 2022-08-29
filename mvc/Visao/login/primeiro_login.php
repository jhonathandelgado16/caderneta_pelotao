<div class="row justify-content-md-center">
    <div class="col-6 row justify-content-md-center">
       
        <h2 class="col-12">Cadastrar Login Instrutor</h2>
        <form class="col-12 row justify-content-md-center" action="<?= URL_RAIZ . 'usuarios/criar_primeiro_login' ?>" method="post" class="margin-bottom">

            <div class="form-group col-10">
                <label class="control-label" for="militar-responsavel">Militar Responsável</label>
                <input id="militar-responsavel" placeholder="Ex: 2º TEN SANTOS" name="militar-responsavel" class="form-control" autofocus required>
            </div>
            <div class="form-group col-10">
                <label class="control-label" for="nome">Usuário</label>
                <input id="login" name="login" class="form-control" autofocus required>
            </div>
            <div class="form-group col-10">
                <label class="control-label" for="senha">Senha</label>
                <input id="senha" name="senha" pattern="([A-Za-z0-9])\w+" class="form-control" type="password">
            </div>
            <div class="form-group col-10">
                <label class="control-label" for="su">Subunidade</label>
                <select name="su" id="" class="form-control">
                    <?php if (empty($subunidades)) : ?>
                        <option value="0">Não existem Subunidades cadastradas</option>
                    <?php endif ?>
                    <option value="0">Selecione uma Subunidade</option>
                    <?php foreach ($subunidades as $subunidade) : ?>
                        <option value="<?= $subunidade->getId_su() ?>"><?= $subunidade->getNome() ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group col-10" readonly>
                <label class="control-label" for="perfil">Perfil de Usuário</label>
                <select name="perfil" id="" class="form-control">
                    <option value="instrutor">INSTRUTOR</option>
                </select>
            </div>
            <input hidden type="text" name="pelotao" value="">
            
            <button type="submit" class="btn btn-success col-8">Cadastrar</button>
        </form>
        <p class="text-center col-12">
            <a class="text-success" href="<?= URL_RAIZ . 'login' ?>">Voltar</a>
        </p>
    </div>
</div>

