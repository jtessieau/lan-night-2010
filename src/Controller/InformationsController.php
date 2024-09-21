<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class InformationsController extends AbstractController
{
    #[Route('/informations', name: 'app_informations')]
    public function index(): Response
    {
        return $this->render('pages/informations.html.twig');
    }
}
