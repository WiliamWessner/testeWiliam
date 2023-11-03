<?php
    include_once '../config.php';
?>
<!doctype html>
<html lang="en" dir="ltr">

<?php
    include 'head.php';
?>

<body class="">
    <div class="page">
        <div class="page-main">
            <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
                <div class="container">
                    <div class="row align-items-center">                        
                        <div class="col-lg order-lg-first">
                            <ul class="nav nav-tabs border-0 flex-column flex-lg-row">                                
                                <li class="nav-item">
                                    <a href="<?=sprintf('%s/src/Route/index.php', URL)?>" class="nav-link active"><i class="fe fe-user"></i> Pessoa</a>
                                </li>                                                              
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if (isset($_GET['sucesso']) && $_GET['sucesso'] == 'true') {
                printf(
                    '<div class="alert alert-success" role="alert">
                        <h4 class="alert-title">Dados salvos com sucesso!</h4>
                        <div class="text-secondary">Os dados foram salvos com sucesso!</div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>'
                );
            } elseif(isset($_GET['erro']) && $_GET['erro'] == 1){
                printf(
                    '<div class="alert alert-danger" role="alert">
                        <h4 class="alert-title">CPF já cadastrado!</h4>
                        <div class="text-secondary">Não foi possível salvar os dados!</div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>'
                );
            } elseif(isset($_GET['erro']) && $_GET['erro'] == 2){
                printf(
                    '<div class="alert alert-danger" role="alert">
                        <h4 class="alert-title">Nome em branco</h4>
                        <div class="text-secondary">Não foi possível salvar os dados!</div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>'
                );
            }
            ?>
            <div class="my-3 my-md-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="card" method="POST" action="<?=sprintf('%s/src/Route/index.php', URL)?>">
                                <div class="card-body">
                                    <h3 class="card-title"><?= empty($_GET['acao']) ? 'Nova' : 'Alterar'?> Pessoa</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Nome</label>
                                                <input type="text" class="form-control" name="nome" value="<?= empty($_GET['nome']) ? '' : $_GET['nome'] ?>" placeholder="" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">CPF</label>
                                                <input pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Digite o CPF no formato 000.000.000-00" class="form-control" name="cpf" value="<?= empty($_GET['cpf']) ? '' : $_GET['cpf'] ?>" placeholder="000.000.000-00" title="Digite um CPF no formato: xxx.xxx.xxx-xx">
                                            </div>
                                        </div>
                                        <input type="hidden" name="acao" value="<?= empty($_GET['acao']) ? 'inserirPessoa' : $_GET['acao']?>">
                                        <input type="hidden" name="idPessoa" value="<?= empty($_GET['idPessoa']) ? 0 : $_GET['idPessoa'] ?>">
                                    </div>
                                </div>
                                <div class="card-footer text-left" style="display: flex; justify-content: space-between">
                                    <div>
                                        <a href="<?=sprintf('%s/src/Route/index.php', URL)?>" class="btn btn-secondary">Voltar para a listagem de Pessoas</a>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary">Confirmar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>