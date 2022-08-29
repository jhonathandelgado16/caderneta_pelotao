<div class="row justify-content-md-center">
    <div class="col-6 row justify-content-md-center">
       
        <h2 class="col-12">Cadastrar Usuário</h2>
        <form class="col-12 row justify-content-md-center" action="<?= URL_RAIZ . 'usuarios' ?>" method="post" class="margin-bottom">

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
                        <option value="1">Não existem Subunidades cadastradas</option>
                    <?php endif ?>
                    <option value="0">Selecione uma Subunidade</option>
                    <?php foreach ($subunidades as $subunidade) : ?>
                        <option value="<?= $subunidade->getId_su() ?>"><?= $subunidade->getNome() ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group col-5">
                <label class="control-label" for="perfil">Perfil de Usuário</label>
                <select name="perfil" id="" class="form-control">
                    <option value="1">Selecionar perfil</option>
                    <option value="sargenteante">SARGENTEANTE</option>
                    <option value="saude">SAÚDE</option>
                    <option value="instrutor">INSTRUTOR</option>
                    <option value="cmt pelotao">CMT PELOTÃO</option>
                    <option value="cmt su">CMT SU</option>
                    <option value="s3">OPERADOR S3</option>
                </select>
            </div>
            <div class="form-group col-5">
                <label class="control-label" for="su">Pelotão (Somente Usuário Cmt Pel)</label>
                <select name="pelotao" id="" class="form-control">
                    <option value="1">Selecionar PEL</option>
                    <option value="pelotaoforpron">Pelotão Forpron</option>
                    <option value="1ºpelotao">1º Pelotão</option>
                    <option value="2ºpelotao">2º Pelotão</option>
                    <option value="3ºpelotao">3º Pelotão</option>
                    <option value="4ºpelotao">4º Pelotão</option>
                    <option value="5ºpelotao">5º Pelotão</option>
                    <option value="6ºpelotao">6º Pelotão</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success col-8">Cadastrar</button>
        </form>
        <p class="text-center col-12">
            <a class="text-success" href="<?= URL_RAIZ . 'usuarios' ?>">Voltar</a>
        </p>
    </div>
</div>

