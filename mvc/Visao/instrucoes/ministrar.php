<div class="row justify-content-md-center">
    <div class="col-xs-12 col-md-8">
    <h2 class="">Realizar <?= $instrucao->getMateria(). ' ' .$instrucao->getIdentificacao() ?></h2>
    <?php
        if($usuario->getTipoOperador() != 'cmt pelotao'){
            if($instrucao->getFase() != 'IIB'){
    ?>
    <form class="margin-bottom row" action="<?= URL_RAIZ . 'instrucoes/'. $instrucao->getIdinstrucao() .'/ministrar' ?>" method='post'>
        <input type="hidden" name="_metodo" value="SEARCH">
        <label class="form-group col-12" for="">Filtrar Informações</label>
        <div class="form-group col-4">
            <?php 
                $pesquisa_qm = "";
                if(!empty($_POST['qm'])){ 
                    $pesquisa_qm =  $_POST['qm']; 
                } 
            ?>
            <select name="qm" id="" class="form-control">
                <?php if (empty($qualificacoes)) : ?>
                    <option value="">Não existem QM cadastradas</option>
                <?php endif ?>
                <option value="">Todas as QM</option>
                <?php foreach ($qualificacoes as $qualificacao) : ?>
                    <option value="<?= $qualificacao->getId() ?>" <?php if($qualificacao->getId() == $pesquisa_qm){ echo 'selected';} ?>><?= $qualificacao->getQualificacaoMilitar() ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group col-4">
            <select name="su" id="" class="form-control">
            <?php 
                $pesquisa_su = "";
                if(!empty($_POST['su'])){ 
                    $pesquisa_su =  $_POST['su']; 
                } 
            ?>
                <?php if (empty($subunidades)) : ?>
                    <option value="">Não existem SU cadastradas</option>
                <?php endif ?>
                <option value="">Todas as Subunidades</option>
                <?php foreach ($subunidades as $su) : ?>
                    <option value="<?= $su->getId_su() ?>" <?php if($su->getId_su() == $pesquisa_su){ echo 'selected';} ?>><?= $su->getNome() ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group col-4">
            <button class="col-12 btn btn-success" type="submit">Buscar</button>
        </div>
    </form>
    <?php 
            } else {
    ?>

    <form class="margin-bottom row" action="<?= URL_RAIZ . 'instrucoes/'. $instrucao->getIdinstrucao() .'/ministrar' ?>" method='post'>
        <input type="hidden" name="_metodo" value="SEARCH">
        <label class="form-group col-12" for="">Filtrar Informações</label>
        <div class="form-group col-8">
            <select name="pelotao" id="" class="form-control">
                <?php 
                $pesquisa = "";
                if(!empty($_POST['pelotao'])){ 
                    $pesquisa =  $_POST['pelotao']; 
                } 
                ?>
                <option value="" selected>Selecione um Pelotão</option>
                <option value="pelotaoforpron" <?php if( $pesquisa == '1ºpelotao'){ echo 'selected';}; ?>>Pelotão Forpron</option>
                <option value="1ºpelotao" <?php if( $pesquisa == '1ºpelotao'){ echo 'selected';}; ?>>1º Pelotão</option>
                <option value="2ºpelotao" <?php if( $pesquisa == '2ºpelotao'){ echo 'selected';}; ?>>2º Pelotão</option>
                <option value="3ºpelotao" <?php if( $pesquisa == '3ºpelotao'){ echo 'selected';}; ?>>3º Pelotão</option>
                <option value="4ºpelotao" <?php if( $pesquisa == '4ºpelotao'){ echo 'selected';}; ?>>4º Pelotão</option>
                <option value="5ºpelotao" <?php if( $pesquisa == '5ºpelotao'){ echo 'selected';}; ?>>5º Pelotão</option>
                <option value="6ºpelotao" <?php if( $pesquisa == '6ºpelotao'){ echo 'selected';}; ?>>6º Pelotão</option>
            </select>
        </div>
        <div class="form-group col-4">
            <button class="col-12 btn btn-success" type="submit">Buscar</button>
        </div>
    </form>
    <?php
            }
        }
    ?>
    <form action="<?= URL_RAIZ . 'instrucoes/'. $instrucao->getIdinstrucao() .'/ministrar' ?>" method="post" class="margin-bottom row">
        <div class="form-group col-8 text-left">
            <label class="control-label" for="">Instrução</label>
            <p><?= $instrucao->getMateria(). ' - ' .$instrucao->getIdentificacao() ?></p>
            <label class="control-label" for="">Fase</label>
            <p><?= $instrucao->getFase() ?></p>
            <label class="control-label" for="">Instrutor</label>
            <?php
                if($usuario->getTipoOperador() == 'cmt pelotao'){
            ?>
            <input name="nome_instrutor" type="text" placeholder="Ex: 1º TEN SOBEL" class="form-control col-6">
            <?php
                } else {
            ?>
            <input name="nome_instrutor" type="text" value="<?= $usuario->getMilitarResponsavel() ?>" class="form-control col-6">
            <?php
                }
            ?>
        </div>
            <input name="id_instrutor" style="display:none" type="text" value="<?= $usuario->getId() ?>" class="form-control">
            <input style="display:none" type="text" name="id-instrucao" value="<?= $instrucao->getIdinstrucao() ?>" class="form-control" value="" autofocus required>
        <div class="form-group col-md-4 col-xs-12">
            <label class="control-label" for="su">Data de realização</label>
            <input type="date" name="data" value="<?= date('Y-m-d'); ?>" class="form-control" value="" autofocus required>
        </div>
        
        <table class="table">
            <tbody class="col-xs-12">
            <tr>
                <th class="col-md-6 col-xs-6">Militar</th>
                <th class="col-md-3 col-xs-3">Participou</th>
                <th class="col-md-3 col-xs-3">Alcançou o Padrão Mínimo</th>
            </tr>
            <?php if (empty($militares)) : ?>
                <tr>
                    <td colspan="99" class="text-center">Nenhum Militar encontrado.</td>
                </tr>
            <?php endif ?>
            <?php
            $counter = 0;
             foreach ($militares as $militar) : 
                ?>
                <tr>
                    <td><?= $militar->getPostoGrad()->getPostoGrad() . ' ' .$militar->getNumero() .' '.$militar->getNomeGuerra() ?></td>
                    <td>
                        <select name="militares[<?= $counter ?>][0]" id="" class="form-control text-center">
                            <option value="<?= $militar->getId() ?>" selected>Participou</option>
                            <option value="0">Não Participou</option>                            
                        </select>
                    </td>
                    <td>
                        <select name="militares[<?= $counter ?>][1]" id="" class="form-control text-center">
                            <option value="1" selected>Alcançou</option>
                            <option value="2">Não Alcançou</option>                            
                        </select>
                    </td>
                </tr>
            <?php $counter++;
             endforeach ?>
            </tbody>
        </table>

        <button type="submit" class="btn btn-success col-xs-12 col-md-8 offset-md-2">Concluir</button>
        <div class="col-md-12 col-xs-12">
                <p class="col-12 text-center">
                    <a class="text-success" href="<?= URL_RAIZ . 'instrucoes' ?>">Voltar para a tela de Inicial</a>
                </p>
            </div>
    </form>
    </div>
</div>
