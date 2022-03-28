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
        return $this->renderForm('Pessoa/CadastrarPessoa.html.twig');
    }

    /**
     * @Route("/Create", name="Create")
     */
    public function Create(Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $nome = $request->request->get('nome');
        $cpf = $request->request->get('cpf');
        $dataNascimento = $request->request->get('dataNascimento');
        $email = $request->request->get('email');
        $telefone = $request->request->get('telefone');
        $logradouro = $request->request->get('logradouro');
        $cidade = $request->request->get('cidade');
        $estado = $request->request->get('estado');

        try {
            $pessoa = new Pessoa();
            $pessoa->setNome($nome);
            $pessoa->setCPF($cpf);
            $pessoa->setDataNascimento(new \DateTime($dataNascimento));
            $pessoa->setEmail($email);
            $pessoa->setTelefone($telefone);
            $pessoa->setLogradouro($logradouro);
            $pessoa->setCidade($cidade);
            $pessoa->setEstado($estado);

            $entityManagerInterface->persist($pessoa);
            $entityManagerInterface->flush();
            $json = '{
                "retorno": {
                    "success": true
                }
            }';
            return $this->json($json);
        } catch (Exception $exception) {
            return $this->json($exception->getMessage());
        }
    }

    /**
     * @Route("/", name="ListarPessoas")
     */
    public function ListPessoas(PessoaRepository $pessoaRepository): Response
    {
        try {
            $data['pessoas'] = $pessoaRepository->findAll();
        } catch (Exception $exception) {
            return $this->json($exception->getMessage());
        }

        return $this->renderForm('Pessoa/ListarPessoa.html.twig', $data);
    }
    
    /**
     * @Route("/Delete/{id}", name="Delete")
     */
    public function Delete(int $id, EntityManagerInterface $entityManagerInterface, PessoaRepository $pessoaRepository): Response
    {
        try {
            $pessoa = $pessoaRepository->find($id);
            $entityManagerInterface->remove($pessoa);
            $entityManagerInterface->flush();

            $json = '{
                "retorno": {
                    "success": true
                }
            }';

            return $this->json($json);
        } catch (Exception $exception) {
            return $this->json($exception->getMessage());
        }
    }

    /**
     * @Route("/CarregarDadosPessoa/{id}", name="CarregarDadosPessoa")
     */
    public function CarregarDadosPessoa(int $id, PessoaRepository $pessoaRepository): Response
    {
        try {
            $data['pessoa'] = $pessoaRepository->find($id);
        } catch (Exception $exception) {
            return $this->json($exception->getMessage());
        }

        return $this->renderForm('Pessoa/CarregarDadosPessoa.html.twig', $data);
    }

    /**
     * @Route("/Update/{id}", name="Update")
     */
    public function Update(int $id, Pessoa $pessoa, Request $request, EntityManagerInterface $entityManagerInterface, PessoaRepository $pessoaRepository): Response
    {
        try {
            $pessoaEstadoAtualDoObjeto = $pessoaRepository->find($id);

            if ($pessoaEstadoAtualDoObjeto->getNome() != $request->request->get('nome')) {
                $pessoa->setNome($request->request->get('nome'));
            }

            if ($pessoaEstadoAtualDoObjeto->getCPF() != $request->request->get('cpf')) {
                $pessoa->setCPF($request->request->get('cpf'));
            }

            if ($pessoaEstadoAtualDoObjeto->getDataNascimento() != (new \DateTime($request->request->get('dataNascimento')))) {
                $pessoa->setDataNascimento(new \DateTime($request->request->get('dataNascimento')));
            }

            if ($pessoaEstadoAtualDoObjeto->getEmail() != $request->request->get('email')) {
                $pessoa->setEmail($request->request->get('email'));
            }

            if ($pessoaEstadoAtualDoObjeto->getTelefone() != $request->request->get('telefone')) {
                $pessoa->setTelefone($request->request->get('telefone'));
            }

            if ($pessoaEstadoAtualDoObjeto->getLogradouro() != $request->request->get('logradouro')) {
                $pessoa->setLogradouro($request->request->get('logradouro'));
            }

            if ($pessoaEstadoAtualDoObjeto->getCidade() != $request->request->get('cidade')) {
                $pessoa->setCidade($request->request->get('cidade'));
            }

            if ($pessoaEstadoAtualDoObjeto->getEstado() != $request->request->get('estado')) {
                $pessoa->setEstado($request->request->get('estado'));
            }

            $entityManagerInterface->persist($pessoa);
            $entityManagerInterface->flush();

            $json = '{
                "retorno": {
                    "success": true
                }
            }';

            return $this->json($json);
        } catch (Exception $exception) {
            return $this->json($exception->getMessage());
        }
    }
}
