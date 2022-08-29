<div class="row justify-content-md-center">
    <div class="col-6">
    <h2 class="">Chamadas do Teste de Aptidão Física</h1>
    <nav>
        <a href="<?= URL_RAIZ . 'periodo_tafs/criar' ?>" class="btn btn-success">Cadastrar nova Chamada</a>
    </nav>
    <table class="table">
        <tbody class="col-12">
        <tr>
            <th class="col-9">Teste de Aptidão Física</th>
            <th class="col-3">Opções</th>
        </tr>
        <?php if (empty($periodo_tafs)) : ?>
            <tr>
                <td colspan="99" class="text-center">Nenhuma Chamada encontrada.</td>
            </tr>
        <?php endif ?>
        <?php foreach ($periodo_tafs as $periodo_taf) : ?>
            <tr>
                <td><?= $periodo_taf->getChamadaCompleta() ?></td>
                <td>
                    <a href="<?= URL_RAIZ . 'periodo_tafs/' . $periodo_taf->getIdPeriodoTaf() . '/editar' ?>" class="btn btn-xs btn-edit" title="Editar">
                        <img class="icone" src="<?= URL_PUBLICO . '/img/editar.png'  ?>" alt="">
                    </a>

                    <form action="<?= URL_RAIZ . 'periodo_tafs/' . $periodo_taf->getIdPeriodoTaf() ?>" method="post" class="inline">
                        <input type="hidden" name="_metodo" value="DELETE">
                        <a href="" class="btn btn-xs btn-del" title="Deletar" onclick="if(confirm('Deseja excluir <?= $periodo_taf->getChamadaCompleta() ?>?')){
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
