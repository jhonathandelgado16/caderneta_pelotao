<!DOCTYPE html>
<html>
<head>
    <title><?= APLICACAO_NOME ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= URL_CSS . 'bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?= URL_CSS . 'geral.css' ?>">
    <script src="<?= URL_JS . 'jquery-3.1.1.min.js' ?>"></script>
    <script src="<?= URL_JS . 'bootstrap.min.js' ?>"></script>
</head>
<body>
    <header class="header-top">
	<nav class="nav-principal navbar row justify-content-md-center nav-color">
            <div class="center-block site col-8 ">
                <div class="row">
                    <img class="col-2" src="<?= URL_PUBLICO . '/img/caderneta.png' ?>" alt="" align="right" id="logo">
                    <div class="col-8">
                        <h1 class="navbar-brand col" href="#" id="logo-inicio">
                        Caderneta de Pelotão
                        </h1>                
                    </div>                    
                </div>
            </div>
        </nav>
        <nav class="navbar row justify-content-md-center nav-color">
            <div id='menu' class="col col-lg-8" align="right">
            </div>
        </nav>
    </header>
    
    <?php if ($mensagem) : ?>
    <div class="row justify-content-md-center">
        <div class="col-8">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?= $mensagem ?>
            </div>
        </div>
    </div>
    <?php endif ?>

	<?php $this->imprimirConteudo() ?>

</body>
</html>
