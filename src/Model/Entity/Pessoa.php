<?php

namespace Wiliam\Prova\Model\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * 
 * @ORM\Entity
 * @ORM\Table(name="pessoa")
 */
class Pessoa
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $nome;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private string $cpf;  
    
    private $entityManager;   

    
    public function __construct(?int $id, string $nome, ?string $cpf, $entityManager)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->entityManager = $entityManager;
    }

    public function setId(?int $id):void
    {
        $this->id = $id;
    }
    
    public function setNome(string $nome):void
    {
        $this->nome = $nome;
    }

    public function setCpf(string $cpf):void
    {
        $this->cpf = $cpf;
    }

    public function getId():?int
    {
        return $this->id;
    }

    public function getNome():string
    {
        return $this->nome;
    }

    public function getCpf():string
    {
        return $this->cpf;
    }

    public function inserir():void
    {
        $this->entityManager->persist($this);
        $this->entityManager->flush();        
    }

    public function listar()
    {   
        $aPessoas = $this->entityManager->getRepository(Pessoa::class);  
        return $aPessoas->findAll();
    }

    public function atualizar($id, $nome, $cpf, $entityManager)
    {   
        $aPessoas = $entityManager->getRepository(Pessoa::class);  
        $aPessoa = $aPessoas->find($id);
        $aPessoa->setNome($nome);
        $aPessoa->setCpf($cpf);
        $this->entityManager->flush($aPessoa);  
    }
    
    public function remover($id, $entityManager)
    { 
        $aPessoa = $entityManager->getReference(Pessoa::class, $id);      
        $this->entityManager->remove($aPessoa);  
        $this->entityManager->flush($aPessoa); 
    }

    public function buscarPeloNome($nome, $entityManager)
    { 
        $query = $entityManager->createQuery(sprintf("SELECT p FROM Wiliam\Prova\Model\Entity\Pessoa p WHERE p.nome LIKE '%%%s%%'", $nome));
        return $query->getResult();        
    }

    public function buscarPeloCpf($cpf, $entityManager)
    { 
        $query = $entityManager->createQuery(sprintf("SELECT p FROM Wiliam\Prova\Model\Entity\Pessoa p WHERE p.cpf = '%s'", $cpf));
        return $query->getResult();        
    }

    public function cpfCadastrado($cpf, $entityManager)
    { 
        
        return !empty($this->buscarPeloCpf($cpf, $entityManager));  
    }
}
