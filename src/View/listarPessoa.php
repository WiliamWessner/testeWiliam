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
            <div class="header py-4">
                <div class="container">
                    <div class="d-flex">
                        <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                            <span class="header-toggler-icon"></span>
                        </a>
                    </div>
                </div>
            </div>
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
            <div class="my-3 my-md-5">
                <div class="container">
                    <div class="col-lg-12 p-5 ml-auto center">
                        <form method="POST" action="<?=sprintf('%s/src/Route/index.php', URL)?>">
                            <input type="text" name="nome" class="form-control header-search" placeholder="Nome da pessoa" tabindex="1" style="margin-bottom:5px; text-align: center">
                            <input type="hidden" name="acao" value="buscarPessoas">
                            <span>
                                <button type="submit" class="btn btn-primary form-control" tabindex="1">Buscar</button>
                            </span>
                        </form>
                    </div>
                    <div class="row row-cards row-deck">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Pessoas cadastradas</h3>
                                    <div class="card-options">
                                        <a href="<?=sprintf('%s/src/View/alterarPessoa.php', URL)?>" class="btn btn-azure">Adicionar</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table card-table table-vcenter text-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="w-1">#</th>
                                                <th>Nome</th>
                                                <th>CPF</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sHtmlPessoa = '
                                                    <tr>
                                                        <td><span class="text-muted">%d</span></td>
                                                        <td>%s</td>
                                                        <td>%s</td>
                                                        <td style="float:right;">
                                                            <a class="icon m-1" href="%s/src/View/alterarContato.php?idPessoa=%d&nome=%s&cpf=%s&acao=inserirContato" title="Adicionar contato">
                                                                <i class="fe fe-plus"></i>
                                                            </a>
                                                            <a class="icon m-1" href="%s/src/Route/index.php?idPessoa=%d&nome=%s&cpf=%s&acao=listarContatosPessoa" title="Mostrar contatos">
                                                                <i class="fe fe-search"></i>
                                                            </a>
                                                            <a class="icon m-1" href="%s/src/View/alterarPessoa.php?idPessoa=%d&nome=%s&cpf=%s&acao=atualizarPessoa" title="Editar pessoa">
                                                                <i class="fe fe-edit"></i>
                                                            </a>
                                                            <a class="icon m-1" onclick="return confirm(\'Você tem certeza que deseja excluir o CPF %s?\')" href="%s/src/Route/index.php?idPessoa=%d&acao=removerPessoa" title="Excluir pessoa">
                                                                <i class="fe fe-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                ';
                                                if (isset($aPessoas)) {
                                                    foreach ($aPessoas as $aPessoa) {
                                                        printf(
                                                            $sHtmlPessoa,
                                                            $aPessoa->getId(),
                                                            $aPessoa->getNome(),
                                                            $aPessoa->getCpf(),
                                                            URL,
                                                            $aPessoa->getId(),
                                                            $aPessoa->getNome(),
                                                            $aPessoa->getCpf(),
                                                            URL,
                                                            $aPessoa->getId(),
                                                            $aPessoa->getNome(),
                                                            $aPessoa->getCpf(),
                                                            URL,
                                                            $aPessoa->getId(),
                                                            $aPessoa->getNome(),                                                        
                                                            $aPessoa->getCpf(),
                                                            $aPessoa->getCpf(),
                                                            URL,
                                                            $aPessoa->getId()
                                                        );
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>