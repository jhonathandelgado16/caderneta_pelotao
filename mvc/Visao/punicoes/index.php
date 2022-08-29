<div class="row justify-content-md-center">
    <div class="col-8">
    <h2 class="">Punições Disciplinares da <?= $usuario->getSu()->getNome() ?></h1>
    <div class="row">
        <nav class="col-6">
            <a href="<?= URL_RAIZ . 'punicoes/primeira_pesquisa' ?>" class="btn btn-success">Cadastrar Nova Punição</a>
        </nav>
    </div>
    <div class="row">
        
    </div>
    <table class="table">
        <tbody class="col-12">
        <tr>
            <th class="col-4">Militar</th>
            <th class="col-2">Punição</th>
            <th class="col-2">Boletim Interno</th>
            <?php
                if($usuario->getTipoOperador() != 'cmt pelotao'){
            ?>
                <th class="col-4">Opções</th>
            <?php }
            ?>
        </tr>
        <?php if (empty($punicoes)) : ?>
            <tr>
                <td colspan="99" class="text-center">Nenhuma Punição encontrada.</td>
            </tr>
        <?php endif ?>
        <?php foreach ($punicoes as $punicao) : ?>
            <tr>
                <td><?= $punicao->getMilitar()->getPostoGrad()->getPostoGrad() .' '. $punicao->getMilitar()->getNumero() .' '. $punicao->getMilitar()->getNomeGuerra() ?></td>
                <td><?= $punicao->getPunicao() ?></td>
                <td><?= $punicao->getBi() ?></td>
                <?php
                    if($usuario->getTipoOperador() != 'cmt pelotao'){
                ?>
                <td>
                    <a href="<?= URL_RAIZ . 'punicoes/' . $punicao->getIdPunicao() . '/visualizar' ?>" class="btn btn-xs btn-edit" title="Visualizar">
                        <img class="icone" src="<?= URL_PUBLICO . '/img/visualizar.png'  ?>" alt="">
                    </a>
                    <a href="<?= URL_RAIZ . 'punicoes/' . $punicao->getIdPunicao() . '/editar' ?>" class="btn btn-xs btn-edit" title="Editar">
                        <img class="icone" src="<?= URL_PUBLICO . '/img/editar.png'  ?>" alt="">
                    </a>

                    <form hidden action="<?= URL_RAIZ . 'punicoes/' . $punicao->getIdPunicao() ?>" method="post" class="inline">
                        <input type="hidden" name="_metodo" value="DELETE">
                        <a href="" class="btn btn-xs btn-del" title="Deletar" onclick="if(confirm('Deseja excluir a <?= $punicao->getPunicao() ?> do <?= $punicao->getMilitar()->getPostoGrad()->getPostoGrad() .' '. $punicao->getMilitar()->getNumero() .' '. $punicao->getMilitar()->getNomeGuerra() ?> ?')){
                                event.preventDefault(); 
                                this.parentNode.submit()
                            }">
                            <img class="icone" src="<?= URL_PUBLICO . '/img/excluir.png'  ?>" alt="">
                        </a>
                    </form>
                </td>
                <?php }
                ?>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    </div>
</div>
