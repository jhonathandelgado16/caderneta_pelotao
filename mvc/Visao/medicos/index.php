<div class="row justify-content-md-center">
    <div class="col-6">
    <h2 class="">Médicos Inseridos no Sistema</h1>
    <nav>
        <a href="<?= URL_RAIZ . 'medicos/criar' ?>" class="btn btn-success">Cadastrar novo Médico</a>
    </nav>
    <table class="table">
        <tbody class="col-12">
        <tr>
            <th class="col-7">Médico</th>
            <th class="col-5">Opções</th>
        </tr>
        <?php if (empty($medicos)) : ?>
            <tr>
                <td colspan="99" class="text-center">Nenhuma Médico encontrado.</td>
            </tr>
        <?php endif ?>
        <?php foreach ($medicos as $medico) : ?>
            <tr>
                <td><?= $medico->getNome() ?></td>
                <td>
                    <a href="<?= URL_RAIZ . 'medicos/' . $medico->getIdMedico() . '/editar' ?>" class="btn btn-xs btn-edit" title="Editar">
                        <img class="icone" src="<?= URL_PUBLICO . '/img/editar.png'  ?>" alt="">
                    </a>

                    <form action="<?= URL_RAIZ . 'medicos/' . $medico->getIdMedico() ?>" method="post" class="inline">
                        <input type="hidden" name="_metodo" value="DELETE">
                        <a href="" class="btn btn-xs btn-del" title="Deletar" onclick="if(confirm('Deseja excluir o Médico <?= $medico->getNome() ?>?')){
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
