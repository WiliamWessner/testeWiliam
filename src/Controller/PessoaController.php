<?php

namespace Wiliam\Prova\Controller;
use Wiliam\Prova\Model\Entity\Pessoa;
use Wiliam\Prova\Model\Entity\Contato;

include_once '../config.php';

class PessoaController
{
    public static function listarPessoas($entityManager)
    {
        $pessoa = new Pessoa(null, '', '', $entityManager);
        $aPessoas =  $pessoa->listar();          
        include_once '../View/listarPessoa.php';
    }
    public static function inserirPessoa($nome, $cpf, $entityManager)
    {
        if (!empty($nome)) {           
            $pessoa = new Pessoa(null, $nome, $cpf, $entityManager);
            if($pessoa->cpfCadastrado($cpf, $entityManager)) {
                header(sprintf('Location: %s/src/View/alterarPessoa.php?sucesso=false&erro=1', URL));
            } else{
                $pessoa->inserir();
                header(sprintf('Location: %s/src/View/alterarPessoa.php?sucesso=true', URL));       
            }                 
        } else{
            header(sprintf('Location: %s/src/View/alterarPessoa.php?sucesso=false&erro=2', URL));
        }
    }

    public static function atualizarPessoa($id, $nome, $cpf, $entityManager)
    {
        if (!empty($nome)) {           
            $pessoa = new Pessoa($id, $nome, $cpf, $entityManager);

            //Se o CPF já está cadastrado
            if($pessoa->cpfCadastrado($cpf, $entityManager)) {
                //Caso o id deste cpf seja diferente do já cadastrado, não deixa inserir outro cpf igual
                if($pessoa->buscarPeloCpf($cpf, $entityManager)[0]->getId() != $id) {
                    header(sprintf('Location: %s/src/View/alterarPessoa.php?sucesso=false&erro=1', URL));
                } else{
                    $pessoa->atualizar($id, $nome, $cpf, $entityManager);
                    header(sprintf('Location: %s/src/View/alterarPessoa.php?sucesso=true', URL));     
                }                
            } else{
                $pessoa->atualizar($id, $nome, $cpf, $entityManager);
                header(sprintf('Location: %s/src/View/alterarPessoa.php?sucesso=true', URL));     
            }    
        } else{
            header(sprintf('Location: %s/src/View/alterarPessoa.php?sucesso=false&erro=2', URL));
        }
    }

    public static function removerPessoa($id, $entityManager)
    {
        if (!empty($id)) {           
            $pessoa = new Pessoa($id, '', '', $entityManager);
            $contato = new Contato(null, $pessoa, '', '', $entityManager);
            //Caso tenha contato, apaga todos desta pessoa
            if(!empty($contato->listar())) {
                $contato->removerTodosContatosPessoa();
            } 
            $pessoa->remover($id, $entityManager);                  
        } 
        header(sprintf('Location: %s/src/Route/index.php', URL)); 
    }

    public static function buscarPessoas($nome = '', $entityManager)
    {              
        $pessoa = new Pessoa(null, $nome, '', $entityManager);
        $aPessoas = $pessoa->buscarPeloNome($nome, $entityManager); 
        include_once '../View/listarPessoa.php';
    }
}
