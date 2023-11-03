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
                            <form class="card" method="POST" action="<?=sprintf("%s/src/Route/index.php?idPessoa=%d&nome=%s&cpf=%s", URL, $_GET['idPessoa'], empty($_GET['nome']) ? '' : $_GET['nome'], empty($_GET['cpf']) ? '' : $_GET['cpf'])?>">
                                <div class="card-body"> 
                                    <h3 class="card-title">Pessoa</h3>                                      
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Nome</label>
                                                <input type="text" class="form-control" name="nome" value="<?= empty($_GET['nome']) ? '' : $_GET['nome'] ?>" disabled="false">
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
                                <div class="card-body">
                                    <h3 class="card-title"><?= !empty($_GET['acao']) && $_GET['acao'] == 'inserirContato' ? 'Nova' : 'Alterar' ?> Contato</h3>                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Tipo</label>
                                                <select id="tipo" name="tipo" class="form-control" onchange="return jAlteraTipo($('#tipo'));">
                                                    <option value="Telefone" <?= !empty($_GET['tipo']) && $_GET['tipo'] == 'Telefone' ? 'selected' : '' ?>>Telefone</option>
                                                    <option value="E-mail" <?= !empty($_GET['tipo']) && $_GET['tipo'] == 'E-mail' ? 'selected' : '' ?>>E-mail</option>                                                   
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Descrição</label>
                                                <input type="text" class="form-control" id="descricao" required name="descricao" value="<?= empty($_GET['descricao']) ? '' : $_GET['descricao'] ?>">
                                            </div>
                                        </div>
                                        <input type="hidden" name="acao" value="<?= empty($_GET['acao']) ? 'listarContatosPessoa' : $_GET['acao'] ?>">
                                        <input type="hidden" name="idContato" value="<?= empty($_GET['idContato']) ? 0 : $_GET['idContato'] ?>">
                                        <input type="hidden" name="idPessoa" value="<?= empty($_GET['idPessoa']) ? 0 : $_GET['idPessoa'] ?>">
                                    </div>
                                </div>                                
                                <div class="card-footer text-left" style="display: flex; justify-content: space-between">
                                    <div>
                                        <a href="<?=sprintf('%s/src/Route/index.php?idPessoa=%d&nome=%s&cpf=%s&acao=listarContatosPessoa', URL, $_GET['idPessoa'], empty($_GET['nome']) ? '' : $_GET['nome'], empty($_GET['cpf']) ? '' : $_GET['cpf'])?>" class="btn btn-secondary">Voltar para a listagem de Contatos</a>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary">Salvar</button>
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

<script>    
    function jTrocarValidacao(campo){
        if(campo.val() == 'Telefone'){
            $('#descricao').attr('type', 'text'); 
            $('#descricao').attr('pattern', '\\([0-9]{2}\\)[0-9]{5}-[0-9]{4}');
            $('#descricao').attr('title', 'O número de telefone precisa ser no formato (00)00000-0000');
            $('#descricao').attr('placeholder', '(00)00000-0000');                       
        } else{
            $('#descricao').attr('type', 'email');       
            $('#descricao').removeAttr('pattern')
            $('#descricao').removeAttr('title');            
            $('#descricao').attr('placeholder', 'teste@magazord.com.br');    
        }
    }

    function jAlteraTipo(campo){
        $('#descricao').val('');
        jTrocarValidacao(campo);
    }

    $(function() {
        jTrocarValidacao($('#tipo'));
    });
</script>