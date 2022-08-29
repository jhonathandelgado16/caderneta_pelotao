<div class="row justify-content-md-center">

    <div class="col-xs-12 col-md-8">

    <h2 class="">Instruções Ministradas</h1>
    
    <div class="row">
        
    </div>
    <table class="table">
        <tbody class="col-12">
        <tr>
            <th class="col-3 hidden-xs">Matéria</th>
            <th class="col-2 hidden-xs">Instrutor</th>
            <th class="col-2">Identificação</th>
            <th class="col-1">Fase</th>
            <th class="col-1">Data de Realização</th>
            <th class="col-2">Opções</th>
        </tr>
        <?php if (empty($ministradas)) : ?>
            <tr>
                <td colspan="99" class="text-center">Nenhuma Instrução ministrada.</td>
            </tr>
        <?php endif ?>
        <?php foreach ($ministradas as $ministrada) : ?>
            <tr>
                <td><?= $ministrada->getInstrucao()->getMateria() ?></td>
                <td><?= $ministrada->getUsuario()->getMilitarResponsavel() ?></td>
                <td><?= $ministrada->getInstrucao()->getIdentificacao() ?></td>
                <td><?= $ministrada->getInstrucao()->getFase(); ?></td>
                <td><?= $ministrada->getData(); ?></td>
                <td>
                    <a href="<?= URL_RAIZ . 'instrucoes/' . $ministrada->getIdinstrucao() . '/visualizar' ?>" class="btn btn-xs btn-edit" title="Editar">
                        <img class="icone" src="<?= URL_PUBLICO . '/img/visualizar.png'  ?>" alt="">
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    </div>
</div>
