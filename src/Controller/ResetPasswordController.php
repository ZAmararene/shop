<?php

namespace App\Controller;

use App\Classe\Mail;
use App\Entity\User;
use App\Entity\ResetPassword;
use App\Form\ResetPasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ResetPasswordController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/reset/password", name="reset_password")
     */
    public function index(Request $request): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('homepage');
        }

        if ($request->get('email')) {
            $user = $this->entityManager->getRepository(User::class)->findOneByEmail($request->get('email'));

            if ($user) {
                // enregister en BD la demande de reset password avec user, token, createdAt
                $resetPassword = new ResetPassword();
                $resetPassword->setUser($user);
                $resetPassword->setToken(uniqid());
                $resetPassword->setCreatedAt(new \DateTimeImmutable());

                $this->entityManager->persist($resetPassword);
                $this->entityManager->flush();

                // envoyer un mail à l'utilisateur  vec un lien lui permettant de mettre a jour son mot de passe
                $mail = new Mail();

                $url = $this->generateUrl('update_password', [
                    'token' => $resetPassword->getToken()
                ]);
                $content = "Bonjour " . $user->getFullname() . " ,<br /><br /> Vous avez demandé à réinitialiser votre mot de passe sur le site La Boutique Française.<br /><br />";
                $content .= "Merci de bien vouloir cliquer sur le lien suivant pour <a href='" . $url . "'>mettre à jour votre mot de passe</a> : ";

                $mail->send($user->getEmail(), $user->getFullname(), 'Réinitialiser votre mot de passe', $content);

                $this->addFlash(
                    'notice',
                    'Vous allez recevoir un email pour réinitialiser votre mot de passe.'
                );
            } else {
                $this->addFlash(
                    'notice',
                    'Cette adresse email est inconnue.'
                );
            }
        }

        return $this->render('reset_password/reset-password.html.twig');
    }

    /**
     * @Route("/update/password/{token}", name="update_password")
     */
    public function updatePassword($token, Request $request, UserPasswordHasherInterface $encoder): Response
    {
        $resetPassword = $this->entityManager->getRepository(ResetPassword::class)->findOneByToken($token);

        if (!$resetPassword) {
            return $this->redirectToRoute('reset_password');
        }

        // vérifier si le createdAt = now - 3h
        $now = new \DateTimeImmutable();

        if ($now > $resetPassword->getCreatedAt()->modify('+ 3 hour')) {
            //modifier mon mot de passe
            $this->addFlash(
                'notice',
                'Votre demande de mot de passe a expirée. Merci de la renouveller.'
            );

            return $this->redirectToRoute('reset_password');
        }

        // rendre une vue avec pour entrer le nouveau mot de passe
        $form = $this->createForm(ResetPasswordType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newPassword = $form->get('new_password')->getData();
            $password = $encoder->hashPassword($resetPassword->getUser(), $newPassword);

            $resetPassword->getUser()->setPassword($password);

            $this->entityManager->flush();

            $this->addFlash(
                'notice',
                'Votre mot de passe à bien été mis à jour.'
            );

            return $this->redirectToRoute('app_login');
        }


        return $this->render('reset_password/update-password.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
