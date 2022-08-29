<div class="row justify-content-md-center">
    <div class="col-8">
    <h2 class="">Visitas Médicas</h1>
    <div class="row">
        <nav class="col-6">
            <a href="<?= URL_RAIZ . 'visitas_medicas/primeira_pesquisa' ?>" class="btn btn-success">Cadastrar Nova Visita Médica</a>
        </nav>
    </div>
    <div class="row">
        
    </div>
    <table class="table">
        <tbody class="col-12">
        <tr>
            <th class="">Militar</th>
            <th class="">Motivo</th>
            <th class="">Data</th>
            <th class="">Opções</th>
        </tr>
        <?php if (empty($visitas_medicas)) : ?>
            <tr>
                <td colspan="99" class="text-center">Nenhum registro encontrado.</td>
            </tr>
        <?php endif ?>
        <?php foreach ($visitas_medicas as $visita_medica) : ?>
            <tr>
                <td><?= $visita_medica->getMilitar()->getMilitarCompleto() ?></td>
                <td><?= $visita_medica->getMotivo() ?></td>
                <td><?= $visita_medica->getData() ?></td>
                <td>
                    <a href="<?= URL_RAIZ . 'visitas_medicas/' . $visita_medica->getId() . '/visualizar' ?>" class="btn btn-xs btn-edit" title="Visualizar">
                        <img class="icone" src="<?= URL_PUBLICO . '/img/visualizar.png'  ?>" alt="">
                    </a>
                    <form action="<?= URL_RAIZ . 'visitas_medicas/' . $visita_medica->getId() ?>" method="post" class="inline">
                        <input type="hidden" name="_metodo" value="DELETE">
                        <a href="" class="btn btn-xs btn-del" title="Deletar" onclick="if(confirm('Deseja excluir a visita médica do <?= $visita_medica->getMilitar()->getMilitarCompleto() ?>?')){
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
