<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Service\MailerService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(MailerService $mailer, Request $request): Response
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $mailer->sendContatFormEmail($form);
                $this->addFlash('success','Message sent with success!');
                
                return $this->redirect($request->getUri());
            } catch (\RuntimeException $e) {
                $errorMessage = $e->getMessage();
            }
        }
        return $this->render('pages/contact.html.twig', [
            'form' => $form->createView(),
            'errorMessage' => isset($errorMessage)? $errorMessage : null,
        ]);
    }
}
