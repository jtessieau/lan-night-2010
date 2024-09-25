<?php

namespace App\Controller;

use Exception;
use App\Entity\Attendant;
use App\Form\EventRegistrationType;
use Symfony\Component\Form\FormError;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SignupController extends AbstractController
{
    #[Route('/signup', name: 'app_signup')]
    public function index(Request $request, EntityManagerInterface $manager): Response
    {
        $attendant = new Attendant();
        $form = $this->createForm(EventRegistrationType::class, $attendant);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            try {
                $manager->persist($attendant);
                $manager->flush();

                $this->addFlash('success', 'success');

            } catch (UniqueConstraintViolationException $e) {
                // Handle the duplicate email case
                $form->get('email')->addError(new FormError('This email is already in use.'));
                $errorMessage = "e-mail";
            } catch (\Exception $e) {
                $errorMessage = "An error occured. Please try again later.";
            }

        }

        return $this->render('pages/signup.html.twig',[
            'form' => $form->createView(),
            'errorMessage' => isset($errorMessage) ? $errorMessage : null
        ]);
    }
}
