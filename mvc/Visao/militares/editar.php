<div class="row justify-content-md-center">
    <script type="text/javascript" src="<?= URL_PUBLICO . '/js/javascript.js'  ?>">
    </script>
    <script type="text/javascript">
        function mascaraCpf(i){
   
           var v = i.value;
           
           if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
              i.value = v.substring(0, v.length-1);
              return;
           }
           
           i.setAttribute("maxlength", "14");
           if (v.length == 3 || v.length == 7) i.value += ".";
           if (v.length == 11) i.value += "-";

        }

        function mascaraIdt(i){
   
           var v = i.value;
           
           if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
              i.value = v.substring(0, v.length-1);
              return;
           }
           
           i.setAttribute("maxlength", "13");
           if (v.length == 3 || v.length == 7) i.value += ".";
           if (v.length == 11) i.value += "-";

        }

        function mascaraCEP(i){
   
           var v = i.value;
           
           if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
              i.value = v.substring(0, v.length-1);
              return;
           }
           
           i.setAttribute("maxlength", "9");
           if (v.length == 5) i.value += "-";

        }

        document.getElementById('cpf').onpaste = function(){
            return false;
        }
    </script>
    <div class="col-8">
        <h2 class="">Editar Informações do Militar</h2>
        <form action="<?= URL_RAIZ . 'militares/'. $militar->getId() ?>" method="post" class="margin-bottom row">
            <input type="hidden" name="_metodo" value="PATCH">
            <div class="form-group col-2">
                <label class="control-label" for="posto-grad">Posto/Graduação</label>
                <select name="posto-grad" id="" class="form-control" required>
                    <?php if (empty($posto_graduacoes)) : ?>
                        <option value="">Não existem postos e graduações cadastradas</option>
                    <?php endif ?>
                    <option value="">Selecionar Posto/Grad</option>
                    <?php foreach ($posto_graduacoes as $posto_graduacao) : ?>
                        <option value="<?= $posto_graduacao->getId() ?>" <?php if($posto_graduacao->getId() == $militar->getIdPostoGrad()){ echo 'selected';} ?>><?= $posto_graduacao->getPostoGrad() ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group col-2">
                <label class="control-label" for="numero">Número (SFC)</label>
                <input id="numero" name="numero" value="<?= $militar->getNumero() ?>" class="form-control" autofocus required>
            </div>
            <div class="form-group col-4">
                <label class="control-label" for="qualificacao">Qualificação Militar</label>
                <select name="qualificacao" id="" class="form-control" required>
                    <?php if (empty($qualificacoes)) : ?>
                        <option value="">Não existem postos e graduações cadastradas</option>
                    <?php endif ?>
                    <option value="">Qualificação Militar</option>
                    <?php foreach ($qualificacoes as $qualificacao) : ?>
                        <option value="<?= $qualificacao->getId() ?>" <?php if($qualificacao->getId() == $militar->getIdQualificacaoMilitar()){ echo 'selected';} ?>><?= $qualificacao->getQualificacaoMilitar() ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group col-2">
                <label class="control-label" for="su">SU do Militar</label>
                <select name="su" id="" class="form-control">
                    <?php if (empty($subunidades)) : ?>
                        <option value="1">Não existem Subunidades cadastradas</option>
                    <?php endif ?>
                    <option value="0">Selecionar Subunidade</option>
                    <?php foreach ($subunidades as $subunidade) : ?>
                        <option value="<?= $subunidade->getId_su() ?>" <?php if($subunidade->getId_su() == $militar->getIdSu()){ echo 'selected';}; ?>><?= $subunidade->getNome() ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group col-2">
                <label class="control-label" for="su">Pelotão</label>
                <select name="pelotao" id="" class="form-control">
                    <option value="">Selecionar PEL</option>
                    <option value="pelotaoforpron" <?php if($militar->getPelotao() == 'pelotaoforpron'){ echo 'selected';}; ?>>Pelotão Forpron</option>
                    <option value="1ºpelotao" <?php if($militar->getPelotao() == '1ºpelotao'){ echo 'selected';}; ?>>1º Pelotão</option>
                    <option value="2ºpelotao" <?php if($militar->getPelotao() == '2ºpelotao'){ echo 'selected';}; ?>>2º Pelotão</option>
                    <option value="3ºpelotao" <?php if($militar->getPelotao() == '3ºpelotao'){ echo 'selected';}; ?>>3º Pelotão</option>
                    <option value="4ºpelotao" <?php if($militar->getPelotao() == '4ºpelotao'){ echo 'selected';}; ?>>4º Pelotão</option>
                    <option value="5ºpelotao" <?php if($militar->getPelotao() == '5ºpelotao'){ echo 'selected';}; ?>>5º Pelotão</option>
                    <option value="6ºpelotao" <?php if($militar->getPelotao() == '6ºpelotao'){ echo 'selected';}; ?>>6º Pelotão</option>
                </select>
            </div>

            <div class="form-group col-8">
                <label class="control-label" for="nome">Nome completo</label>
                <input id="nome" name="nome" value="<?= $militar->getNome() ?>" class="form-control" value="" autofocus required>
            </div>

            <div class="form-group col-4">
                <label class="control-label" for="nome-guerra">Nome de Guerra</label>
                <input id="nome-guerra" value="<?= $militar->getNomeGuerra() ?>" name="nome-guerra" class="form-control" autofocus required>
            </div>
            <div class="form-group col-6">
                <label class="control-label" for="cpf">CPF</label>
                <input id="cpf" name="cpf" value="<?= $militar->getCpf() ?>" oninput="mascaraCpf(this)" type="text" class="form-control" placeholder="Ex.: 000.000.000-00" autofocus required>
            </div>
            <div class="form-group col-6">
                <label class="control-label" for="idt">Identidade Militar</label>
                <input id="idt" name="idt"  value="<?= $militar->getIdtMilitar() ?>" oninput="mascaraIdt(this)" type="text" class="form-control" placeholder="Ex.: 000.000.000-0" autofocus>
            </div>

            <h3 class="col-12">Endereço</h3>

            <?php
                $endereco = explode(',', $militar->getEndereco());
                $rua = $endereco[0];
                $numero = $endereco[1];
                $bairro = $endereco[2];
                $cidade = $endereco[3];
                $cep = $endereco[4];
            ?>

             <div class="form-group col-9">
                <label class="control-label" for="rua">Rua</label>
                <input id="rua" name="rua" value="<?= $rua ?>" class="form-control" autofocus required>
            </div>
            <div class="form-group col-3">
                <label class="control-label" for="numero-endereco">Número da Residência</label>
                <input id="numero-endereco" name="numero-endereco" value="<?= $numero ?>" class="form-control" autofocus required>
            </div>

             <div class="form-group col-4">
                <label class="control-label" for="bairro">Bairro</label>
                <input id="bairro" name="bairro" value="<?= $bairro ?>" class="form-control" autofocus required>
            </div>
            <div class="form-group col-4">
                <label class="control-label" for="cidade">Cidade</label>
                <input id="cidade" name="cidade" value="<?= $cidade ?>" class="form-control" autofocus required>
            </div>
            <div class="form-group col-4">
                <label class="control-label" for="cep">CEP</label>
                <input id="cep" name="cep" value="<?= $cep ?>" oninput="mascaraCEP(this)" placeholder="Ex.: 00000-000" class="form-control" autofocus required>
            </div>
    
            <div class="col-12">
                <button type="submit" class="btn btn-success col-8 offset-2">Editar</button>
                 
                <p class="col-12 text-center">
                    <a class="text-success" href="<?= URL_RAIZ . 'militares' ?>">Voltar para Militares Cadastrados</a>
                </p>
            </div>
            
        </form>
       
    </div>
</div>
