<?php

namespace App\Controller;

use App\Classe\Mail;
use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegisterController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/registeration", name="register")
     */
    public function register(Request $request, UserPasswordHasherInterface $encoder): Response
    {
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $encoder->hashPassword($user, $user->getPassword());
            $user->setPassword($password);

            $this->entityManager->persist($user);
            $this->entityManager->flush();

            $mail = new Mail();
            $content = "Tout d'abord, bienvenue à La Boutique Française. Nous sommes heureux de vous compter parmi nos clients et nous vous remercions vivement de votre confiance. <br /> MERCI";
            $mail->send($user->getEmail(), $user->getFullName(), "CONFIRMATION D'INSCRIPTION", $content);

            $this->addFlash(
                'notice',
                'Votre ête bien inscrit sur notre site, vous pouvez dès à présent vous connecter à votre compte'
            );

            return $this->redirectToRoute('app_login');
        }

        return $this->render('register/register.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
