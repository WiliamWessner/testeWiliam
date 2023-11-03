<?php

namespace Wiliam\Prova\Controller;
use Wiliam\Prova\Model\Entity\Pessoa;
use Wiliam\Prova\Model\Entity\Contato;

include_once '../config.php';

class ContatoController
{    
    public static function inserirContato($idpessoa, $tipo, $descricao, $nome, $cpf, $entityManager)
    {
        if (!empty($descricao)) { 
            $pessoa = new Pessoa($idpessoa, $nome, $cpf, $entityManager);                      
            $contato = new Contato(null, $pessoa, $tipo, $descricao, $entityManager);
            $contato->inserir();
            header(sprintf('Location: %s/src/Route/index.php?idPessoa=%s&nome=%s&cpf=%s&acao=listarContatosPessoa&sucesso=true', URL, $idpessoa, $nome, $cpf));           
        } else{
            header(sprintf('Location: %S/src/View/alterarContato.php?idPessoa=%s&nome=%s&cpf=%s&acao=listarContatosPessoa&sucesso=false', URL, $idpessoa, $nome, $cpf));
        }
    }

    public static function listarContatosPessoa($idPessoa, $entityManager)
    {        
        $contato = new Contato(null, new Pessoa($idPessoa, '', '', $entityManager), '', '', $entityManager);
        $aContatos =  $contato->listar();          
        include_once '../View/listarContato.php';
    }

    public static function atualizarContato($idPessoa, $idContato, $tipo, $descricao, $nome, $cpf, $entityManager)
    {
        if (!empty($descricao)) {           
            $contato = new Contato($idContato, new Pessoa($idPessoa, $nome, $cpf, $entityManager), $tipo, $descricao, $entityManager);
            $contato->atualizar($idContato, $tipo, $descricao, $entityManager);
            header(sprintf('Location: %s/src/View/alterarContato.php?idPessoa=%d&nome=%s&cpf=%s&sucesso=true', URL, $idPessoa, $nome, $cpf));           
        } else{
            header(sprintf('Location: %s/src/View/alterarContato.php?idPessoa=%d&nome=%s&cpf=%s&sucesso=false', URL, $idPessoa, $nome, $cpf));
        }
    }

    public static function removerContato($id, $idPessoa, $nome, $cpf, $entityManager)
    {
        if (!empty($id)) {           
            $contato = new Contato($id, new Pessoa($idPessoa, $nome, $cpf , $entityManager), '', '', $entityManager);
            $contato->remover($id, $entityManager);            
        } 
        header(sprintf('Location: %s/src/Route/index.php?idPessoa=%d&nome=%s&cpf=%s&acao=listarContatosPessoa', URL, $idPessoa, $nome, $cpf)); 
    }    
    
}
