<?php

namespace App\Controller;

use App\Entity\Message;
use App\Form\MessageType;
use App\Message\Notification;
use DateTime;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Enqueue\RdKafka\RdKafkaConnectionFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\BusNameStamp;
use Symfony\Component\Messenger\Stamp\DelayStamp;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="send_message")
     */
    public function index(Request $request, MessageBusInterface $bus): Response
    {
        $message = new Message();
        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
                $message = $form->getData();
                $message->setCreated(new DateTime('now'));
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($message);
                $manager->flush();

                $notification = new Notification($message);
                $envelope = new Envelope($notification);
                $bus->dispatch($envelope);
                $message->setSended(new DateTime('now'));
                $manager->persist($message);
                $manager->flush();

        }

        return $this->render('default/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
