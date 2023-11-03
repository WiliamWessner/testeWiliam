<?php
include_once '../config.php';
use Wiliam\Prova\Controller\PessoaController;
use Wiliam\Prova\Controller\ContatoController;

$sAcao = empty($_POST['acao']) ? (empty($_GET['acao']) ? 'listarPessoas' : $_GET['acao']) : $_POST['acao'];

switch ($sAcao) {
  case 'listarPessoas':    
    PessoaController::listarPessoas($entityManager);    
    break;
  case 'inserirPessoa':
    PessoaController::inserirPessoa($_POST['nome'], $_POST['cpf'], $entityManager);
    break;
  case 'atualizarPessoa':
    PessoaController::atualizarPessoa($_POST['idPessoa'], $_POST['nome'], $_POST['cpf'], $entityManager);
    break;
  case 'removerPessoa':
    PessoaController::removerPessoa($_GET['idPessoa'], $entityManager);
    break;
  case 'buscarPessoas':
      PessoaController::buscarPessoas($_POST['nome'], $entityManager);
      break;
  case 'inserirContato':
      ContatoController::inserirContato($_POST['idPessoa'], $_POST['tipo'], $_POST['descricao'],  $_GET['nome'], $_GET['cpf'], $entityManager);
      break;
  case 'listarContatosPessoa':    
      ContatoController::listarContatosPessoa($_GET['idPessoa'], $entityManager);
      break;
  case 'atualizarContato':    
      ContatoController::atualizarContato($_GET['idPessoa'], $_POST['idContato'], $_POST['tipo'], $_POST['descricao'], $_GET['nome'], $_GET['cpf'], $entityManager);
      break;   
  case 'removerContato':
      ContatoController::removerContato($_GET['idContato'], $_GET['idPessoa'], $_GET['nome'], $_GET['cpf'], $entityManager);
      break; 
  
  default:
    PessoaController::listarPessoas($entityManager);    
    break;
}