<?php


namespace App\Controller;

use App\Entity\ContactForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
//        die(phpinfo());

        return $this->render('contact/contact.html.twig');
    }

    public function saveAction(Request $request, EntityManagerInterface $em): Response
    {
        $post = json_decode($request->getContent(), true);
//        echo '<pre>';print_r($post);die();

        if (!isset($post['name'])) {
            throw new \Exception('Name is missing.');
        }

        if (!isset($post['email'])) {
            throw new \Exception('Email is missing.');
        }

        if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            throw new \Exception('Email is not valid.');
        }

        if (!isset($post['message'])) {
            throw new \Exception('Message is missing.');
        }

        $contactForm = new ContactForm();
        $contactForm->setName($post['name']);
        $contactForm->setEmail($post['email']);
        $contactForm->setMessage($post['message']);

        $em->persist($contactForm);
        $em->flush();

        return new Response(json_encode([
            'content' => 'ok'
        ]));
    }
}