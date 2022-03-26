<?php

namespace App\Controller\Pessoa;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CadastroPessoaController extends AbstractController
{
    /**
     * @Route("/", name="pessoa")
     */
    public function index(): Response
    {
        return $this->render('Pessoa/CadastrarPessoa.html.twig');
    }
}