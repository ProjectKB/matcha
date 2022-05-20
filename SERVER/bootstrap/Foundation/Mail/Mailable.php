<?php

namespace Boot\Foundation\Mail;

use Jenssegers\Blade\Blade;
use Swift_Mailer as Mailer;
use Swift_Message as Email;

class Mailable
{
    public function __construct(protected Mailer $mailer, protected Email $email, protected Blade $view)
    {
    }

    public function subject(string $subject): self
    {
        $this->email->setSubject($subject);

        return $this;
    }

    public function from($address, $name = ''): self
    {
        $this->email->setFrom([$address => $name]);

        return $this;
    }

    public function to($address, $name = ''): self
    {
        $this->email->setTo([$address => $name]);

        return $this;
    }

    public function description($description): self
    {
        $this->email->setDescription($description);

        return $this;
    }

    public function view($path, $with): self
    {
        $template = $this->view->make($path, $with)->render();

        $this->email->setBody($template, 'text/html');

        return $this;
    }

    public function send()
    {
        return $this->mailer->send($this->email);
    }
}