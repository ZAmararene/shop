<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $admin =  new User();
        $password = $this->passwordHasher->hashPassword($admin, 'password');

        $admin->setFirstName('Lena')
            ->setLastName('Lebon')
            ->setEmail('admin@gmail.com')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($password);

        $manager->persist($admin);

        $user =  new User();
        $user->setFirstName('Linda')
            ->setLastName('Lemaire')
            ->setEmail('linda@gmail.com')
            ->setPassword($password);

        $manager->persist($user);

        $manager->flush();
    }
}
