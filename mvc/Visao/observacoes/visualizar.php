<div class="row justify-content-md-center">
    <div class="col-6">
        <h2 class="">Visualizar Observações</h2>
            
            <div class="row">
                <p class="col-12 text-left">
                    <a class="text-success" href="<?= URL_RAIZ . 'observacoes' ?>">Voltar para a tela de Observações</a>
                </p>

                <div class="form-group col-12 text-center">
                    <label class="control-label" for="militar">Militar</label>
                    <p><?= $militar->getMilitarCompleto() ?></p>
                </div>

                <form class="col-12" action="<?= URL_RAIZ . 'observacoes/'. $militar->getId() .'/criar' ?>" method='get'>
                    <button class="col-md-6 offset-md-3 col-xs-12 btn btn-success" type="submit">Cadastrar nova observação</button>
                </form>
                <?php if (empty($observacoes)) : ?>
                    <div class="form-group col-12 text-center">
                        <p>Nenhuma Observação encontrada.</p>
                    </div>
                <?php endif ?>
                <?php foreach ($observacoes as $observacao) : ?>
                    <h3 class="col-12"><?= $observacao->getMilitarResponsavel() .' - '. $observacao->getDataBr() ?></h3>
                    <p class="col-10"><?= $observacao->getObservacao() ?></p>
                    <form action="<?= URL_RAIZ . 'observacoes/' . $observacao->getIdObservacao() ?>" method="post" class="col-2">
                        <input type="hidden" name="_metodo" value="DELETE">
                        <a href="" class="btn btn-xs btn-del" title="Deletar" onclick="if(confirm('Deseja excluir a observação do <?= $militar->getMilitarCompleto() ?>?')){
                                event.preventDefault(); 
                                this.parentNode.submit()
                            }">
                            <img class="icone" src="<?= URL_PUBLICO . '/img/excluir.png'  ?>" alt="">
                        </a>
                    </form>
                <?php endforeach ?>
            </div>
       
    </div>
</div>
