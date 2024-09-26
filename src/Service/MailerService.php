<?php

namespace App\Service;

use App\Entity\Attendant;
use Psr\Log\LoggerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mime\Email;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Mailer\MailerInterface;

class MailerService

{
    private $mailer;
    private $logger;

    public function __construct(MailerInterface $mailer, LoggerInterface $logger)
    {
        $this->mailer = $mailer;
        $this->logger = $logger;
    }

    public function sendContatFormEmail(FormInterface $form): void
    {
        $data = $form->getData();

        $email = (new Email())
            ->from($data['email'])
            ->to('me@example.com')
            ->subject($data['subject'])
            ->html(htmlspecialchars($data['message']));

        $this->sendEmail($email);
    }

    public function sendNewAttendantRegisrationEmail(Attendant $attendant): void
    {
        $email = (new TemplatedEmail())
            ->from('admin@exemple.com')
            ->to('admin@exemple.com')
            ->subject('new attendant registration')
            ->htmlTemplate('emails/newRegistrationToAdmin.html.twig')
            ->context([
                'attendant' => $attendant
            ]);

        $this->sendEmail($email);
    }

    public function sendNewAttendantWelcomeEmail(Attendant $attendant): void
    {
        $email = (new TemplatedEmail())
            ->from('no-reply@example.com')
            ->to($attendant->getEmail())
            ->subject('Merci de votre inscription lan ')
            ->htmlTemplate('emails/newRegistrationToAttendant.html.twig')
            ->context([
                'attendant' => $attendant
            ]);

        $this->sendEmail($email);
    }

    public function sendEmail($email): void
    {
        try {
            // Try sending the email
            $this->mailer->send($email);
        } catch (\Symfony\Component\Mailer\Exception\TransportExceptionInterface $e) {

            $this->logger->error('Failed to send contact form email: ' . $e->getMessage());

            throw new \RuntimeException('There was a problem sending the email. Please try again later.');
        } catch (\Exception $e) {
            $this->logger->error('An unexpected error occurred while sending the email: ' . $e->getMessage());

            throw new \RuntimeException('Something went wrong. Please contact support.');
        }
    }
}
