<div class="row justify-content-md-center">
    <div class="col-8">
    <h2 class="">Recompensas da <?= $usuario->getSu()->getNome() ?></h1>
    <div class="row">
        <nav class="col-6">
            <a href="<?= URL_RAIZ . 'recompensas/primeira_pesquisa' ?>" class="btn btn-success">Cadastrar Nova Recompensa</a>
        </nav>
    </div>
    <div class="row">
        
    </div>
    <table class="table">
        <tbody class="col-12">
        <tr>
            <th class="col-4">Militar</th>
            <th class="col-2">Recompensa</th>
            <th class="col-3">Data</th>
            <th class="col-3">Opções</th>
        </tr>
        <?php if (empty($recompensas)) : ?>
            <tr>
                <td colspan="99" class="text-center">Nenhuma Recompensa encontrada.</td>
            </tr>
        <?php endif ?>
        <?php foreach ($recompensas as $recompensa) : ?>
            <tr>
                <td><?= $recompensa->getMilitar()->getPostoGrad()->getPostoGrad() .' '. $recompensa->getMilitar()->getNumero() .' '. $recompensa->getMilitar()->getNomeGuerra() ?></td>
                <td><?= $recompensa->getRecompensa() ?></td>
                <td><?= $recompensa->getData() ?></td>
                <td>
                    <a href="<?= URL_RAIZ . 'recompensas/' . $recompensa->getIdRecompensa() . '/visualizar' ?>" class="btn btn-xs btn-edit" title="Visualizar">
                        <img class="icone" src="<?= URL_PUBLICO . '/img/visualizar.png'  ?>" alt="">
                    </a>
                    <a href="<?= URL_RAIZ . 'recompensas/' . $recompensa->getIdRecompensa() . '/editar' ?>" class="btn btn-xs btn-edit" title="Editar">
                        <img class="icone" src="<?= URL_PUBLICO . '/img/editar.png'  ?>" alt="">
                    </a>

                    <form action="<?= URL_RAIZ . 'recompensas/' . $recompensa->getIdRecompensa() ?>" method="post" class="inline">
                        <input type="hidden" name="_metodo" value="DELETE">
                        <a href="" class="btn btn-xs btn-del" title="Deletar" onclick="if(confirm('Deseja excluir a <?= $recompensa->getRecompensa() ?> do <?= $recompensa->getMilitar()->getPostoGrad()->getPostoGrad() .' '. $recompensa->getMilitar()->getNumero() .' '. $recompensa->getMilitar()->getNomeGuerra() ?> ?')){
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
