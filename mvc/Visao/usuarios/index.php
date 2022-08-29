<div class="row justify-content-md-center">
    <div class="col-6">
    <h2 class="">Usuários Cadastrados</h1>
    <div class="row">
        <nav class="col-6">
            <a href="<?= URL_RAIZ . 'usuarios/criar' ?>" class="btn btn-success">Cadastrar Usuário</a>
        </nav>
    </div>
    <div class="row">
        
    </div>
    <table class="table">
        <tbody class="col-12">
        <tr>
            <th class="col-3">Login</th>
            <th class="col-3">Subunidade</th>
            <th class="col-3">Perfil</th>
            <th class="col-3">Opções</th>
        </tr>
        <?php if (empty($usuarios)) : ?>
            <tr>
                <td colspan="99" class="text-center">Nenhum Usuário encontrado.</td>
            </tr>
        <?php endif ?>
        <?php foreach ($usuarios as $usuario) : ?>
            <tr>
                <td><?= $usuario->getLogin() ?></td>
                <td><?= $usuario->getSu()->getNome() ?></td>
                <td><?= $usuario->getTipoOperador() ?></td>
                <td>
                    <a href="<?= URL_RAIZ . 'usuarios/' . $usuario->getId() . '/editar' ?>" class="btn btn-xs btn-edit" title="Editar">
                        <img class="icone" src="<?= URL_PUBLICO . '/img/editar.png'  ?>" alt="">
                    </a>

                    <form action="<?= URL_RAIZ . 'usuarios/' . $usuario->getId() ?>" method="post" class="inline">
                        <input type="hidden" name="_metodo" value="DELETE">
                        <a href="" class="btn btn-xs btn-del" title="Deletar" onclick="if(confirm('Deseja excluir o usuário <?= $usuario->getLogin() ?>?')){
                                event.preventDefault(); 
                                this.parentNode.submit()
                            }">
                            <img class="icone" src="<?= URL_PUBLICO . '/img/excluir.png'  ?>" alt="">
                        </a>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    </div>
</div>
