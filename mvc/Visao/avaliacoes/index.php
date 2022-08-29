<div class="row justify-content-md-center">
    <div class="col-8">
    <h2 class="">Avaliações de Atributos da <?= $usuario->getSu()->getNome() ?></h1>
    <div class="row">
        <nav class="col-6">
            <a href="<?= URL_RAIZ . 'avaliacoes/primeira_pesquisa' ?>" class="btn btn-success">Realizar Nova Avaliacao</a>
        </nav>
    </div>
    <div class="row">
        
    </div>
    <table class="table">
        <tbody class="col-12">
        <tr>
            <th class="col-4">Militar</th>
            <th class="col-2">Avaliação Global</th>
            <th class="col-2">Data</th>
            <th class="col-4">Opções</th>
        </tr>
        <?php if (empty($avaliacoes)) : ?>
            <tr>
                <td colspan="99" class="text-center">Nenhuma Avaliação encontrada.</td>
            </tr>
        <?php endif ?>
        <?php foreach ($avaliacoes as $avaliacao) : ?>
            <tr>
                <td><?= $avaliacao->getMilitar()->getMilitarCompleto() ?></td>
                <td><?= $avaliacao->getAvaliacaoGlobal() ?></td>
                <td><?= $avaliacao->getDataBr() ?></td>
                <td>
                    <a href="<?= URL_RAIZ . 'avaliacoes/' . $avaliacao->getIdAvaliacao() . '/visualizar' ?>" class="btn btn-xs btn-edit" title="Visualizar">
                        <img class="icone" src="<?= URL_PUBLICO . '/img/visualizar.png'  ?>" alt="">
                    </a>
                    <a href="<?= URL_RAIZ . 'avaliacoes/' . $avaliacao->getIdAvaliacao() . '/editar' ?>" class="btn btn-xs btn-edit" title="Editar">
                        <img class="icone" src="<?= URL_PUBLICO . '/img/editar.png'  ?>" alt="">
                    </a>

                    <?php if($usuario->getTipoOperador() == 'administrador') { ?>
                    <form action="<?= URL_RAIZ . 'avaliacoes/' . $avaliacao->getIdAvaliacao() ?>" method="post" class="inline">
                        <input type="hidden" name="_metodo" value="DELETE">
                        <a href="" class="btn btn-xs btn-del" title="Deletar" onclick="if(confirm('Deseja excluir a Avaliação do <?= $avaliacao->getMilitar()->getMilitarCompleto() ?> ?')){
                                event.preventDefault(); 
                                this.parentNode.submit()
                            }">
                            <img class="icone" src="<?= URL_PUBLICO . '/img/excluir.png'  ?>" alt="">
                        </a>
                    </form>
                    <?php } ?>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    </div>
</div>
