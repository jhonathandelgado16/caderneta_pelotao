<div class="row justify-content-md-center">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?= URL_PUBLICO . '/js/javascript.js'  ?>">
    </script>
    <script type="text/javascript">
        $(window).on("scroll load", function(){
   
           var tabela_top = $(".TableCSS table").offset().top;
           var window_top = $(this).scrollTop();

           $(".TableCSS table thead th").css({
              'top': tabela_top-window_top <= 0 ? window_top-tabela_top+'px' : '0',
              'z-index':'9',
              'padding':'10px 0'
           });
        });
    </script>
    <div class="col-8">
    <h2 class="">Lista de Itens</h1>
    <div class="row">
        <form class="col-12 row" action="<?= URL_RAIZ . 'itens/pesquisar' ?>" method='post'>
            <input type="hidden" name="_metodo" value="SEARCH">
            <input class="col-8 form-control" type="text" name="descricao" value="<?php if(!empty($_POST['descricao'])){ echo $_POST['descricao']; } ?>">
            <button class="col-4 btn btn-primary" type="submit">Buscar</button>
        </form>
    </div>
    <div class="row">
        
    </div>
    <table class="table">
        <tbody class="col-12">
        <tr>
            <th class="col-1">Cat Mat</th>
            <th class="col-3">Descricao</th>
            <th class="col-1">Status</th>
            <th class="col-2">Estoque Min</th>
            <th class="col-3">Categoria</th>
        </tr>
        <?php if (empty($itens)) : ?>
            <tr>
                <td colspan="99" class="text-center">Nenhum Item encontrado.</td>
            </tr>
        <?php endif ?>
        <?php foreach ($itens as $item) : ?>
            <tr>
                <td><?= $item->getId() ?></td>
                <td><?= $item->getDescricao() ?></td>
                <td><?php if($item->getStatus() == 1){echo 'Ativo';} else {echo 'Inativo';} ?></td>
                <td><?= $item->getEstoqueMin() ?></td>
                <td><?= $item->getCategoria()->getCategoria() ?></td>
                
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    </div>
</div>
