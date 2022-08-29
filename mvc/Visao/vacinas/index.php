<div class="row justify-content-md-center">
    <div class="col-6">
    <h2 class="">Vacinas Inseridas no Sistema</h1>
    <nav>
        <a href="<?= URL_RAIZ . 'vacinas/criar' ?>" class="btn btn-success">Cadastrar nova Vacina</a>
    </nav>
    <table class="table">
        <tbody class="col-12">
        <tr>
            <th class="col-7">Vacina</th>
            <th class="col-5">Opções</th>
        </tr>
        <?php if (empty($vacinas)) : ?>
            <tr>
                <td colspan="99" class="text-center">Nenhuma Médico encontrado.</td>
            </tr>
        <?php endif ?>
        <?php foreach ($vacinas as $vacina) : ?>
            <tr>
                <td><?= $vacina->getVacina() ?></td>
                <td>
                    <a href="<?= URL_RAIZ . 'vacinas/' . $vacina->getIdVacina() . '/editar' ?>" class="btn btn-xs btn-edit" title="Editar">
                        <img class="icone" src="<?= URL_PUBLICO . '/img/editar.png'  ?>" alt="">
                    </a>

                    <form action="<?= URL_RAIZ . 'vacinas/' . $vacina->getIdVacina() ?>" method="post" class="inline">
                        <input type="hidden" name="_metodo" value="DELETE">
                        <a href="" class="btn btn-xs btn-del" title="Deletar" onclick="if(confirm('Deseja excluir <?= $vacina->getVacina() ?>?')){
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
