<div class="row justify-content-md-center">
    <div class="col-6 row justify-content-md-center">

        <h2 class="col-12">Editar Usuário</h2>
        <form action="<?= URL_RAIZ . 'usuarios/'. $usuario->getId() ?>" method="post" class="row justify-content-md-center">
            <input type="hidden" name="_metodo" value="PATCH">
            <div class="form-group col-10">
                <label class="control-label" for="militar-responsavel">Militar Responsável</label>
                <input id="militar-responsavel" value="<?= $usuario->getMilitarResponsavel() ?>" placeholder="Ex: 2º TEN SANTOS" name="militar-responsavel" class="form-control" autofocus required>
            </div>
            <div class="form-group col-10">
                <label class="control-label" for="nome">Usuário</label>
                <input id="login" value="<?= $usuario->getLogin() ?>" name="login" class="form-control" autofocus required>
            </div>
            <div class="form-group col-10">
                <label class="control-label" for="senha">Senha</label>
                <input id="nova-senha" name="nova-senha" placeholder="Digite a Nova Senha" pattern="([A-Za-z0-9])\w+" class="form-control" type="password">
            </div>
                      
            <div class="form-group col-4">
                <label class="control-label" for="perfil">Perfil de Usuário</label>
                <select name="perfil" id="" class="form-control">
                    <option value="1">Selecionar perfil</option>
                    <option value="sargenteante" <?php if($usuario->getTipoOperador() == 'sargenteante'){ echo 'selected';}; ?>>SARGENTEANTE</option>
                    <option value="saude" <?php if($usuario->getTipoOperador() == 'saude'){ echo 'selected';}; ?>>SAÚDE</option>
                    <option value="instrutor" <?php if($usuario->getTipoOperador() == 'instrutor'){ echo 'selected';}; ?>>INSTRUTOR</option>
                    <option value="cmt pelotao" <?php if($usuario->getTipoOperador() == 'cmt pelotao'){ echo 'selected';}; ?>>CMT PELOTÃO</option>
                    <option value="cmt su" <?php if($usuario->getTipoOperador() == 'cmt su'){ echo 'selected';}; ?>>CMT SU</option>
                </select>
            </div>
            
            <div class="form-group col-3">
                <label class="control-label" for="su">Subunidade</label>
                <select name="su" id="" class="form-control">
                    <?php if (empty($subunidades)) : ?>
                        <option value="1">Não existem Subunidades cadastradas</option>
                    <?php endif ?>
                    <option value="0">Selecione uma Subunidade</option>
                    <?php foreach ($subunidades as $subunidade) : ?>
                        <option value="<?= $subunidade->getId_su() ?>" <?php if($subunidade->getId_su() == $usuario->getIdSu()){ echo 'selected';}; ?>><?= $subunidade->getNome() ?></option>
                    <?php endforeach ?>
                </select>
            </div>  

            <div class="form-group col-3">
                <label class="control-label" for="su">Pelotão</label>
                <select name="pelotao" id="" class="form-control">
                    <option value="1">Selecionar PEL</option>
                    <option value="pelotaoforpron" <?php if($usuario->getPelotao() == 'pelotaoforpron'){ echo 'selected';}; ?>>Pelotão Forpron</option>
                    <option value="1ºpelotao" <?php if($usuario->getPelotao() == '1ºpelotao'){ echo 'selected';}; ?>>1º Pelotão</option>
                    <option value="2ºpelotao" <?php if($usuario->getPelotao() == '2ºpelotao'){ echo 'selected';}; ?>>2º Pelotão</option>
                    <option value="3ºpelotao" <?php if($usuario->getPelotao() == '3ºpelotao'){ echo 'selected';}; ?>>3º Pelotão</option>
                    <option value="4ºpelotao" <?php if($usuario->getPelotao() == '4ºpelotao'){ echo 'selected';}; ?>>4º Pelotão</option>
                    <option value="5ºpelotao" <?php if($usuario->getPelotao() == '5ºpelotao'){ echo 'selected';}; ?>>5º Pelotão</option>
                    <option value="6ºpelotao" <?php if($usuario->getPelotao() == '6ºpelotao'){ echo 'selected';}; ?>>6º Pelotão</option>
                </select>
            </div>
        
            <button type="submit" class="btn btn-success col-8">Editar</button>
        </form>
        <p class="text-center col-12">
            <a class="text-success" href="<?= URL_RAIZ . 'usuarios' ?>">Voltar</a>
        </p>
    </div>
</div>

