<?php
namespace App\Notification;

use App\Entity\PresentationContactMessage;
use App\Entity\MessageMail;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class EMailSender
{

    /**
     * @var MailerInterface
     */
    protected $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendMailToAdmin(PresentationContactMessage $messageMail): void{

        $email = (new TemplatedEmail())
            ->from('noreply@spmgnt.fr')
            ->to('contact@spmgnt.fr')
            ->subject($messageMail->getSubject()->getSubjectText())
            ->replyTo($messageMail->getMailAddress())
            ->htmlTemplate('emails/contact.html.twig')
            ->context([
                'message'=>$messageMail
            ]);
        $this->mailer->send($email);
    }
}
