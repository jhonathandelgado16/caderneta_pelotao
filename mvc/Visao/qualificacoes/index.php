<div class="row justify-content-md-center">
    <div class="col-6">
    <h2 class="">Qualificação Militar Inseridas no Sistema</h1>
    <nav>
        <a href="<?= URL_RAIZ . 'qualificacoes/criar' ?>" class="btn btn-success">Cadastrar nova Qualificação Militar</a>
    </nav>
    <table class="table">
        <tbody class="col-12">
        <tr>
            <th class="col-7">Qualificação Militar</th>
            <th class="col-5">Opções</th>
        </tr>
        <?php if (empty($qualificacoes)) : ?>
            <tr>
                <td colspan="99" class="text-center">Nenhuma Qualificacao Militar encontrada.</td>
            </tr>
        <?php endif ?>
        <?php foreach ($qualificacoes as $qualificacao) : ?>
            <tr>
                <td><?= $qualificacao->getQualificacaoMilitar() ?></td>
                <td>
                    <a href="<?= URL_RAIZ . 'qualificacoes/' . $qualificacao->getId() . '/editar' ?>" class="btn btn-xs btn-edit" title="Editar">
                        <img class="icone" src="<?= URL_PUBLICO . '/img/editar.png'  ?>" alt="">
                    </a>

                    <form action="<?= URL_RAIZ . 'qualificacoes/' . $qualificacao->getId() ?>" method="post" class="inline">
                        <input type="hidden" name="_metodo" value="DELETE">
                        <a href="" class="btn btn-xs btn-del" title="Deletar" onclick="if(confirm('Deseja excluir <?= $qualificacao->getQualificacaoMilitar() ?>?')){
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
