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
                                    <a href="<?=sprintf('%s/src/Route/index.php', URL)?>"><i class="fe fe-user"></i> Pessoa</a>
                                </li> 
                                <li class="nav-item">
                                    <a href="" class="nav-link active"><i class="fe fe-phone"></i> Contato</a>
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
            }
            ?>
            <div class="my-3 my-md-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="card" method="POST" action="<?=sprintf('%s/src/Route/index.php', URL)?>">
                                <div class="card-body">
                                    <h3 class="card-title">Pessoa</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Nome</label>
                                                <input type="text" class="form-control" name="nome" value="<?= empty($_GET['nome']) ? '' : $_GET['nome'] ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">CPF</label>
                                                <input type="text" class="form-control" name="cpf" value="<?= empty($_GET['cpf']) ? '' : $_GET['cpf'] ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="row row-cards row-deck">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Contatos</h3>
                                    <div class="card-options">
                                        <a href="<?=sprintf('%s/src/View/alterarContato.php?idPessoa=%d&nome=%s&cpf=%s&acao=inserirContato', URL, $_GET['idPessoa'], $_GET['nome'], $_GET['cpf']); ?>" class="btn btn-azure">Adicionar</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table card-table table-vcenter text-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="w-1">#</th>
                                                <th>Tipo</th>
                                                <th>Descrição</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sHtmlContato = '
                                                    <tr>
                                                        <td><span class="text-muted">%d</span></td>
                                                        <td>%s</td>
                                                        <td>%s</td>
                                                        <td style="float:right;">                                                            
                                                            <a class="icon m-1" href="%s/src/View/alterarContato.php?idPessoa=%s&idContato=%d&tipo=%s&descricao=%s&nome=%s&cpf=%s&acao=atualizarContato" title="Editar">
                                                                <i class="fe fe-edit"></i>
                                                            </a>
                                                            <a class="icon m-1" onclick="return confirm(\'Você tem certeza que deseja excluir este contato?\')" href="%s/src/Route/index.php?idContato=%d&idPessoa=%s&nome=%s&cpf=%s&acao=removerContato" title="Excluir">
                                                                <i class="fe fe-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                ';
                                            if (isset($aContatos)) {
                                                foreach ($aContatos as $aContato) {
                                                    printf(
                                                        $sHtmlContato,
                                                        $aContato->getId(),
                                                        $aContato->getTipo(),
                                                        $aContato->getDescricao(),
                                                        URL,
                                                        $aContato->getPessoa()->getId(),
                                                        $aContato->getId(),                                                        
                                                        $aContato->getTipo(),
                                                        $aContato->getDescricao(),
                                                        $aContato->getPessoa()->getNome(),
                                                        $aContato->getPessoa()->getCpf(),
                                                        URL,
                                                        $aContato->getId(),
                                                        $aContato->getPessoa()->getId(),
                                                        $aContato->getPessoa()->getNome(),
                                                        $aContato->getPessoa()->getCpf()
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
