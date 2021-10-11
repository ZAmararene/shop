<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Classe\Mail;
use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OrderSuccessController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/order/thankyou/{stripeSessionId}", name="order_validate")
     */
    public function index(Cart $cart, $stripeSessionId): Response
    {
        $order = $this->entityManager->getRepository(Order::class)->findOneByStripeSessionId($stripeSessionId);

        if (!$order || $order->getUser() != $this->getUser()) {
            return $this->redirectToRoute('homepage');
        }

        if (!$order->getIsPaid()) {
            // Vider la session  "cart"
            $cart->remove();

            // Modifier le status isPaid de notre commande en mettant 1
            $order->setIsPaid(1);

            $this->entityManager->flush();

            // Envoyer un email au client pour lui confirmer sa commande
            $mail = new Mail();
            $content = "Merci pour votre commande sur le site de La Boutique Française.";
            $mail->send($order->getUser()->getEmail(), $order->getUser()->getFullName(), "Votre commande La Boutique Française est bien validée.", $content);
        }

        return $this->render('order_success/success.html.twig', [
            'order' => $order
        ]);
    }
}
