<?php

namespace App\Entity;

use App\Repository\PessoaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PessoaRepository::class)]
class Pessoa
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 60)]
    private $Nome;

    #[ORM\Column(type: 'string', length: 14)]
    private $CPF;

    #[ORM\Column(type: 'date')]
    private $DataNascimento;

    #[ORM\Column(type: 'string', length: 60)]
    private $Email;

    #[ORM\Column(type: 'string', length: 15)]
    private $Telefone;

    #[ORM\Column(type: 'string', length: 150)]
    private $Logradouro;

    #[ORM\Column(type: 'string', length: 100)]
    private $Cidade;

    #[ORM\Column(type: 'string', length: 100)]
    private $Estado;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->Nome;
    }

    public function setNome(string $Nome): self
    {
        $this->Nome = $Nome;

        return $this;
    }

    public function getCPF(): ?string
    {
        return $this->CPF;
    }

    public function setCPF(string $CPF): self
    {
        $this->CPF = $CPF;

        return $this;
    }

    public function getDataNascimento(): ?\DateTimeInterface
    {
        return $this->DataNascimento;
    }

    public function setDataNascimento(\DateTimeInterface $DataNascimento): self
    {
        $this->DataNascimento = $DataNascimento;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getTelefone(): ?string
    {
        return $this->Telefone;
    }

    public function setTelefone(string $Telefone): self
    {
        $this->Telefone = $Telefone;

        return $this;
    }

    public function getLogradouro(): ?string
    {
        return $this->Logradouro;
    }

    public function setLogradouro(string $Logradouro): self
    {
        $this->Logradouro = $Logradouro;

        return $this;
    }

    public function getCidade(): ?string
    {
        return $this->Cidade;
    }

    public function setCidade(string $Cidade): self
    {
        $this->Cidade = $Cidade;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->Estado;
    }

    public function setEstado(string $Estado): self
    {
        $this->Estado = $Estado;

        return $this;
    }
}
