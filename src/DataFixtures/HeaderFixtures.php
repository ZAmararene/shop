<?php

namespace App\DataFixtures;

use App\Entity\Header;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HeaderFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $header1 = new Header();
        $header1->setTitle('Mode sans modération')
            ->setContent("Laissez vos envies s'exprimer")
            ->setBtnTitle('Découvrir la sélection')
            ->setBtnUrl('uploads/')
            ->setIllustration('header1.jpg');
        $manager->persist($header1);

        $header2 = new Header();
        $header2->setTitle('Cadeaux de goût')
            ->setContent("Trouvez le cadeau parfait (en moins de temps qu'il n'en faut pour le clic)")
            ->setBtnTitle('Un cadeau sur mesure')
            ->setBtnUrl('uploads/')
            ->setIllustration('header2.jpg');
        $manager->persist($header2);

        $header3 = new Header();
        $header3->setTitle('Inspiration mode hiver')
            ->setContent('Tous les styles vous attendent...')
            ->setBtnTitle('Découvrir la sélection')
            ->setBtnUrl('uploads/')
            ->setIllustration('header3.jpeg');
        $manager->persist($header3);

        $manager->flush();
    }
}
