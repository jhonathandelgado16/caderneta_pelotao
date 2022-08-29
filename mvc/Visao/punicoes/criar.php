<div class="row justify-content-md-center">
    <div class="col-6">
        <h2 class="">Punição Disciplinar</h2>

        <?php
            if($usuario->getTipoOperador() != 'cmt pelotao'){
        ?>

        <form action="<?= URL_RAIZ . 'punicoes' ?>" method="post" class="margin-bottom row">

            <div class="form-group col-12 text-center">
                <label class="control-label" for="militar">Militar</label>
                <input type="hidden" name="id_militar" value="<?= $militar->getId() ?>">
                <p><?= $militar->getPostoGrad()->getPostoGrad() .' '. $militar->getNumero() .' '. $militar->getNomeGuerra() ?></p>
            </div>
            <div class="form-group col-6">
                <label class="control-label" for="punicao">Punição</label>
                <select name="punicao" id="" class="form-control">
                    <option value="">Selecionar Punição</option>
                    <option value="fo-">FO-</option>
                    <option value="advertencia">Advertência</option>
                    <option value="impedimento">Impedimento</option>
                    <option value="repreensao">Repreensão</option>
                    <option value="detencao">Detenção</option>
                    <option value="prisao">Prisão</option>
                </select>
            </div>
            <div class="form-group col-6">
                <label class="control-label" for="bi">Boletim Interno</label>
                <div class="col-12 row">
                    <div class="col-3">
                        BI nº
                    </div>
                    <input class="form-control col-2" value="" type="text" name="numero_bi" placeholder="0">
                    <div class="col-2">
                        de
                    </div>
                    <input class="form-control col-5" type="date" name="data_bi">
                </div>
            </div>
            <div class="form-group col-6">
                <label class="control-label" for="data">Data de Início da Punição</label>
                <input class="form-control" type="date" name="data_inicio">
            </div>
            <div class="form-group col-6">
                <label class="control-label" for="data">Data de Término da Punição</label>
                <input class="form-control" type="date" name="data_termino">
            </div>
            <div class=
            "form-group col-12">
                <label class="control-label" for="motivo">Motivo da Punição</label>
                <textarea name="motivo" class="form-control" rows="3"></textarea>
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-success col-8 offset-2">Cadastrar</button>
                 
                <p class="col-12 text-center">
                    <a class="text-success" href="<?= URL_RAIZ . 'punicoes' ?>">Voltar para a tela de Punições</a>
                </p>
            </div>
            
        </form>

    <?php } else { ?>

        <form action="<?= URL_RAIZ . 'punicoes/cmtpel' ?>" method="post" class="margin-bottom row">

            <div class="form-group col-12 text-center">
                <label class="control-label" for="militar">Militar</label>
                <input type="hidden" name="id_militar" value="<?= $militar->getId() ?>">
                <p><?= $militar->getPostoGrad()->getPostoGrad() .' '. $militar->getNumero() .' '. $militar->getNomeGuerra() ?></p>
            </div>
            <div class="form-group col-6">
                <label class="control-label" for="punicao">Punição</label>
                <select name="punicao" id="" class="form-control">
                    <option value="">Selecionar Punição</option>
                    <option value="fo-">FO-</option>
                </select>
            </div>
            <div class="form-group col-6">
                <label class="control-label" for="data">Data da Punição</label>
                <input class="form-control" type="date" name="data_punicao">
            </div>
            <div class=
            "form-group col-12">
                <label class="control-label" for="motivo">Motivo da Punição</label>
                <textarea name="motivo" class="form-control" rows="3"></textarea>
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-success col-8 offset-2">Cadastrar</button>
                 
                <p class="col-12 text-center">
                    <a class="text-success" href="<?= URL_RAIZ . 'punicoes' ?>">Voltar para a tela de Punições</a>
                </p>
            </div>
            
        </form>
       
    </div>
    <?php
    }
    ?>
</div>
