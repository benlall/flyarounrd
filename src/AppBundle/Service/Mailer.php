<?php

namespace AppBundle\Service;

class Mailer
{
    private $mailer;
    private $templating;

    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

     public function sendEmail($from, $to, $subject, $name)
    {
        $mail = new \Swift_Message;

        $mail
        ->setFrom($from)
        ->setTo($to)
        ->setSubject($subject)
        ->setBody($this->templating->render('email/contact.hml.twig', ['name' => $name]))
        ->setContentType('text/html');

        $this->mailer->send($mail);
    }

}