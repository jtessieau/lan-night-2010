<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ToolsController extends AbstractController
{
    #[Route('/tools', name: 'app_tools')]
    public function index(): Response
    {
        return $this->render('pages/tools.html.twig');
    }
}
