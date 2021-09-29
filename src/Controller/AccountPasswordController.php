<?php

namespace App\Controller;

use App\Form\ChangePasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AccountPasswordController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/account/change-password", name="change_password")
     */
    public function changePassword(Request $request, UserPasswordHasherInterface $encoder): Response
    {
        $user  = $this->getUser();

        $form = $this->createForm(ChangePasswordType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $oldPassword = $form->get('old_password')->getData();

            if ($encoder->isPasswordValid($user, $oldPassword)) {
                $newPassword = $form->get('new_password')->getData();

                $password = $encoder->hashPassword($user, $newPassword);

                $user->setPassword($password);

                $this->entityManager->flush();

                $this->addFlash('success', 'votre mot de passe a bien été modifié');
            } else {
                $this->addFlash('success', "Votre mot de passe n'est pas valide");
            }
        }

        return $this->render('account/password.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
