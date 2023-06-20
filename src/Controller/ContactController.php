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
        $number = random_int(0, 100);

        return $this->render('contact/contact.html.twig', [
            'number' => $number,
        ]);

//        $content = $twig->render($template, $data);
//
//        return new Response($content);
    }
}