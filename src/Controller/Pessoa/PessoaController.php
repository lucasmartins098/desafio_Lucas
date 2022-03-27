<?php

namespace App\Controller\Pessoa;

use App\Entity\Pessoa;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use App\Repository\PessoaRepository;

class PessoaController extends AbstractController
{
    /**
     * @Route("/CadastrarPessoa", name="CadastrarPessoa")
     */
    public function CadastrarPessoa(): Response
    {
        $data['titulo'] = 'Adicionar nova Pessoa';
        
        return $this->renderForm('Pessoa/CadastrarPessoa.html.twig', $data);
    }

    /**
     * @Route("/Create", name="Create")
     */
    public function Create(Request $request, EntityManagerInterface $entityManagerInterface) : Response
    {
        try
        {
            $pessoa = new Pessoa();
            $pessoa->setNome($request->request->get('nome'));
            $pessoa->setCPF($request->request->get('cpf'));
            $pessoa->setDataNascimento(new \DateTime($request->request->get('dataNascimento')));
            $pessoa->setEmail($request->request->get('email'));
            $pessoa->setTelefone($request->request->get('telefone'));
            $pessoa->setLogradouro($request->request->get('logradouro'));
            $pessoa->setCidade($request->request->get('cidade'));
            $pessoa->setEstado($request->request->get('estado'));
            
            $entityManagerInterface->persist($pessoa);
            $entityManagerInterface->flush();

           return $this->json("Success: 'True'");
        }
        catch(Exception $exception)
        {
            return $this->json($exception->getMessage());
        }
    }

    /**
     * @Route("/ListarPessoas", name="ListarPessoas")
     */
    public function ListPessoas(PessoaRepository $pessoaRepository): Response
    {
        $data['titulo'] = 'Listar Pessoas';
        try
        {
           $data['pessoas'] = $pessoaRepository->findAll();
        }
        catch(Exception $exception)
        {
            return $this->json($exception->getMessage());
        }

        return $this->renderForm('Pessoa/ListarPessoa.html.twig', $data);
    }

    /**
     * @Route("/Delete/{id}", name="Create")
     */
    public function Delete(int $id, EntityManagerInterface $entityManagerInterface, PessoaRepository $pessoaRepository) : Response
    {
        try
        {
            $categoria = $pessoaRepository->find($id);
            $entityManagerInterface->remove($categoria);
            $entityManagerInterface->flush();

           return $this->json("Success: 'True'");
        }
        catch(Exception $exception)
        {
            return $this->json($exception->getMessage());
        }
    }
}