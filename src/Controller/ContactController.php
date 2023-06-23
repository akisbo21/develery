<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends AbstractController
{
    public static function getSubscribedServices(): array
    {
        return [
            'twig' => '?'. \Twig\Environment::class,
        ];
    }

    public function contactAction(): Response
    {
        return $this->render('contact/contact.html.twig');
    }

    public function saveAction(): Response
    {
        return new Response(json_encode([
            'content' => 'ok'
        ]));
    }
}