<div class="row justify-content-md-center conteiner-fluid">
    <div class="col-md-4 col-sm-8 row div-login justify-content-md-center">
        <img class="col-md-4 col-sm-6 logo" src="<?= URL_PUBLICO . '/img/caderneta.png' ?>" alt="" align="right" id="logo">
        <h1 class="text-center col-md-10">Caderneta de Pelotão</h1>
        <?php if ($mensagem) : ?>
        
                <div class="col-10 alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?= $mensagem ?>
                </div>
        <?php endif ?>
        <form class="col-sm-10 row justify-content-md-center" action="<?= URL_RAIZ . 'login' ?>" method="post" class="margin-bottom">
            <div class="form-group col-sm-10">
                <label class="control-label" for="nome">Login</label>
                <input id="login" name="login" class="form-control" autofocus value="<?= $this->getPost('login') ?>">
            </div>
            <div class="form-group col-sm-10">
                <label class="control-label" for="senha">Senha</label>
                <input id="senha" name="senha" class="form-control" type="password">
            </div>
            <button type="submit" class="btn btn-success col-sm-10">Entrar</button>
            <a class="text-success" href="<?= URL_RAIZ . 'usuarios/primeiro_login' ?>">Primeiro Login Instrutor</a>
        </form>
    </div>
</div>
