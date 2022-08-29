<div class="row justify-content-md-center">
    <div class="col-8">
    <h2 class="">Testes de Aptidão Física lançados</h1>
    <div class="row">
        
    </div>
    
    <table class="table">
        <tbody class="col-xs-12">
        <tr>
            <th class="col-8">Chamada dos TAF</th>
            <th class="col-4">Opções</th>
        </tr>
        <?php if (empty($periodo_tafs)) : ?>
            <tr>
                <td colspan="99" class="text-center">Nenhuma Chamama do TAF encontrada.</td>
            </tr>
        <?php endif ?>
        <?php foreach ($periodo_tafs as $periodo_taf) : ?>
            <tr>
                <td><?= $periodo_taf->getChamadaCompleta() ?></td>
                <td>
                    <a href="<?= URL_RAIZ . 'tafs/'. $periodo_taf->getIdPeriodoTaf() .'/primeira_pesquisa' ?>" class="btn btn-xs btn-edit" title="Editar TAFs realizados">
                        <img class="icone" src="<?= URL_PUBLICO . '/img/editar.png'  ?>" alt="">
                    </a>

                    <a href="<?= URL_RAIZ . 'tafs/' . $periodo_taf->getIdPeriodoTaf() . '/visualizar' ?>" class="btn btn-xs btn-edit" title="Visualizar TAFs realizados">
                        <img class="icone" src="<?= URL_PUBLICO . '/img/visualizar.png'  ?>" alt="">
                    </a>

                    <a href="<?= URL_RAIZ . 'tafs/' . $periodo_taf->getIdPeriodoTaf() . '/criar' ?>" class="btn btn-xs btn-edit" title="Realizar Chamada do TAF">
                        <img class="icone" src="<?= URL_PUBLICO . '/img/taf.png'  ?>" alt="">
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    </div>
</div>


