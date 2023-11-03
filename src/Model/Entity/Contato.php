<?php

namespace Wiliam\Prova\Model\Entity;
use Doctrine\ORM\Mapping as ORM;
use Wiliam\Prova\Model\Entity\Pessoa;

/**
 * 
 * @ORM\Entity
 * @ORM\Table(name="contato")
 */
class Contato
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\ManyToOne(targetEntity="Pessoa")
     * @ORM\JoinColumn(name="pessoa_id", referencedColumnName="id")
     */
    private Pessoa $pessoa;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private string $tipo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $descricao; 

    private $entityManager; 
    
    public function __construct(?int $id, Pessoa $pessoa, string $tipo, ?string $descricao, $entityManager)
    {
        $this->id = $id;
        $this->pessoa = $pessoa;
        $this->tipo = $tipo;
        $this->descricao = $descricao;
        $this->entityManager = $entityManager;
    }

    public function setId(?int $id):void
    {
        $this->id = $id;
    }

    public function setPessoa(Pessoa $pessoa):void
    {
        $this->pessoa = $pessoa;
    }
    
    public function setTipo(string $tipo):void
    {
        $this->tipo = $tipo;
    }

    public function setDescricao(string $descricao):void
    {
        $this->descricao = $descricao;
    }

    public function getId():?int
    {
        return $this->id;
    }

    public function getPessoa()
    {
        return $this->pessoa;
    }

    public function getTipo():string
    {
        return $this->tipo;
    }

    public function getDescricao():string
    {
        return $this->descricao;
    }

    public function inserir():void
    {
        $this->entityManager->merge($this);
        $this->entityManager->flush();        
    }

    public function listar()
    {
        $query = $this->entityManager->createQuery(sprintf("SELECT c FROM Wiliam\Prova\Model\Entity\Contato c WHERE c.pessoa = %d", $this->getPessoa()->getId()));        
        return $query->getResult();
    }

    public function atualizar($id, $tipo, $descricao, $entityManager)
    {   
        $aContatos = $entityManager->getRepository(Contato::class);  
        $aContato = $aContatos->find($id);
        $aContato->setTipo($tipo);
        $aContato->setDescricao($descricao);
        $this->entityManager->flush($aContato);  
    }

    public function remover($id, $entityManager)
    { 
        $aContato = $entityManager->getReference(Contato::class, $id);      
        $entityManager->remove($aContato);  
        $entityManager->flush($aContato); 
    }

    public function removerTodosContatosPessoa()
    { 
        $query = $this->entityManager->createQuery(sprintf("DELETE FROM Wiliam\Prova\Model\Entity\Contato c WHERE c.pessoa = %d", $this->getPessoa()->getId()));        
        return $query->getResult();
    }
}