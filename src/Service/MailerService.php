<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
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

    public function sendContatFormEmail(FormInterface $form)
    {
        $data = $form->getData();

        $email = (new Email())
            ->from($data['email'])
            ->to('me@example.com')
            ->subject($data['subject'])
            ->html(htmlspecialchars($data['message']))
        ;

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