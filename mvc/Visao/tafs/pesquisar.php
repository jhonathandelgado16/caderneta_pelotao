<div class="row justify-content-md-center">
    <div class="col-8">
    <h2 class="">Selecione o Militar que deseja alterar o TAF</h1>
    <div class="row">
        <form class="col-12 row" action="<?= URL_RAIZ . 'tafs/'. $periodo_taf->getIdPeriodoTaf() .'/pesquisar' ?>" method='post'>
            <p class="col-12 text-left">
                <a class="text-success" href="<?= URL_RAIZ . 'tafs' ?>">Voltar para a tela de TAF</a>
            </p>
            <input type="hidden" name="_metodo" value="SEARCH">
            <input class="col-8 form-control" type="text" name="pesquisa" value="<?php if(!empty($_POST['pesquisa'])){ echo $_POST['pesquisa']; } ?>">
            <button class="col-4 btn btn-success" type="submit">Buscar</button>
        </form>
    </div>
    <div class="row">
        
    </div>
    <table class="table">
        <tbody class="col-12">
        <tr>
            <th class="">Posto/Grad</th>
            <th class="">Número</th>
            <th class="">Nome de Guerra</th>
            <th class="">Editar TAF</th>
        </tr>
        <?php if (empty($tafs)) : ?>
            <tr>
                <td colspan="99" class="text-center">Nenhum Militar encontrado.</td>
            </tr>
        <?php endif ?>
        <?php foreach ($tafs as $taf) : ?>
            <tr>
                <td><?= $taf->getMilitar()->getPostoGrad()->getPostoGrad() ?></td>
                <td><?= $taf->getMilitar()->getNumero() ?></td>
                <td><?= $taf->getMilitar()->getNomeGuerra() ?></td>
                <td>
                    <a href="<?= URL_RAIZ . 'tafs/' . $taf->getIdTaf() . '/editar' ?>" class="btn btn-xs btn-edit" title="Editar TAF">
                        <img class="icone" src="<?= URL_PUBLICO . '/img/editar.png'  ?>" alt="">
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    </div>
</div>
