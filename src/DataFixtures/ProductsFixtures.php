<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProductsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category1 = new Category();
        $category1->setName('Robes');
        $manager->persist($category1);

        $category2 = new Category();
        $category2->setName('Costumes');
        $manager->persist($category2);

        $category3 = new Category();
        $category3->setName('Pantalons');
        $manager->persist($category3);

        $category4 = new Category();
        $category4->setName('Accessoires');
        $manager->persist($category4);

        $category5 = new Category();
        $category5->setName('Pulls');
        $manager->persist($category5);

        $category6 = new Category();
        $category6->setName('Jupes');
        $manager->persist($category6);

        $category7 = new Category();
        $category7->setName('Chemisiers');
        $manager->persist($category7);

        $product1 = new Product();
        $product1->setName('Costume vert')
            ->setSlug('costume-vert')
            ->setIllustration('img1.jpeg')
            ->setSubtitle('Lorem ipsum dolor sit amet, consectetur adipiscing elit.')
            ->setDescription('Quisque condimentum nisi nec ullamcorper luctus. Nulla facilisi. Integer maximus posuere tortor id bibendum. Morbi ac massa eget quam hendrerit commodo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi dapibus quis neque suscipit tincidunt. Integer id aliquam tellus. Donec facilisis interdum tincidunt. Etiam ultricies rutrum lorem eget imperdiet.')
            ->setPrice(250 * 100)
            ->setCategory($category2)
            ->setIsBest(false);
        $manager->persist($product1);

        $product2 = new Product();
        $product2->setName('Robe rouge')
            ->setSlug('robe-rouge')
            ->setIllustration('img2.jpeg')
            ->setSubtitle('Nunc ultricies ex in mi fermentum, quis ullamcorper enim sagittis.')
            ->setDescription('In suscipit nunc lectus, quis mattis augue mattis eget. Donec sed nibh vel justo finibus egestas. Donec enim erat, cursus in vulputate quis, consequat eget felis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. ')
            ->setPrice(250 * 100)
            ->setCategory($category1)
            ->setIsBest(true);
        $manager->persist($product2);

        $product3 = new Product();
        $product3->setName('Costume femme')
            ->setSlug('costume-femme')
            ->setIllustration('img3.jpeg')
            ->setSubtitle('Vestibulum tellus libero, imperdiet vel orci quis, placerat fermentum erat.')
            ->setDescription('Condimentum nisi nec ullasuere tortor id bibendum. Morbi ac massa eget quam hendrerit commodo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi dapibus quis neque suscipit tincidunt. Integer id aliquam tellus. Donec facilisis interdum tincidunt. Etiam ultricies rutrum lorem eget imperdiet.')
            ->setPrice(50 * 100)
            ->setCategory($category2)
            ->setIsBest(true);
        $manager->persist($product3);

        $product4 = new Product();
        $product4->setName('Costume bleu')
            ->setSlug('costume-bleu')
            ->setIllustration('img4.jpeg')
            ->setSubtitle('Fusce maximus sapien odio, eleifend vulputate tellus scelerisque non.')
            ->setDescription('Condimentum nisi nec ullasuere tortor id bibendum. Morbi ac massa eget quam hendrerit commodo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi dapibus quis neque suscipit tincidunt. Integer id aliquam tellus. Donec facilisis interdum tincidunt. Etiam ultricies rutrum lorem eget imperdiet.')
            ->setPrice(450 * 100)
            ->setCategory($category2)
            ->setIsBest(true);
        $manager->persist($product4);

        $product5 = new Product();
        $product5->setName('Pantalon slim')
            ->setSlug('pantalon-slim')
            ->setIllustration('img5.jpeg')
            ->setSubtitle('Praesent bibendum eleifend aliquet. Aenean tincidunt purus.')
            ->setDescription('Condimentum nisi nec ullasuere tortor id bibendum. Morbi ac massa eget quam hendrerit commodo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi dapibus quis neque suscipit tincidunt. Integer id aliquam tellus. Donec facilisis interdum tincidunt. Etiam ultricies rutrum lorem eget imperdiet.')
            ->setPrice(45 * 100)
            ->setCategory($category3)
            ->setIsBest(false);
        $manager->persist($product5);

        $product6 = new Product();
        $product6->setName('Boucle d\'oreille')
            ->setSlug('boucle-d-oreille')
            ->setIllustration('img6.jpeg')
            ->setSubtitle('Cras tortor diam, commodo non purus eget, vulputate ornare eros.')
            ->setDescription('Condimentum nisi nec ullasuere tortor id bibendum. Morbi ac massa eget quam hendrerit commodo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi dapibus quis neque suscipit tincidunt. Integer id aliquam tellus. Donec facilisis interdum tincidunt. Etiam ultricies rutrum lorem eget imperdiet.')
            ->setPrice(80 * 100)
            ->setCategory($category4)
            ->setIsBest(false);
        $manager->persist($product6);

        $product7 = new Product();
        $product7->setName('Foulard en soie')
            ->setSlug('foulard-en-soie')
            ->setIllustration('img7.jpg')
            ->setSubtitle('Fusce bibendum, quam nec blandit ullamcorper, turpis elit ullamcorper mauris.')
            ->setDescription('Condimentum nisi nec ullasuere tortor id bibendum. Morbi ac massa eget quam hendrerit commodo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi dapibus quis neque suscipit tincidunt. Integer id aliquam tellus. Donec facilisis interdum tincidunt. Etiam ultricies rutrum lorem eget imperdiet.')
            ->setPrice(100 * 100)
            ->setCategory($category4)
            ->setIsBest(true);
        $manager->persist($product7);

        $product8 = new Product();
        $product8->setName('Jupe longue')
            ->setSlug('jupe-longue')
            ->setIllustration('img8.jpeg')
            ->setSubtitle('Nam sed congue ex. In felis lacus, egestas eget consequat et, congue et velit. ')
            ->setDescription('Condimentum nisi nec ullasuere tortor id bibendum. Morbi ac massa eget quam hendrerit commodo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi dapibus quis neque suscipit tincidunt. Integer id aliquam tellus. Donec facilisis interdum tincidunt. Etiam ultricies rutrum lorem eget imperdiet.')
            ->setPrice(40 * 100)
            ->setCategory($category6)
            ->setIsBest(false);
        $manager->persist($product8);

        $product9 = new Product();
        $product9->setName('Chapeau')
            ->setSlug('chapeau')
            ->setIllustration('img9.jpeg')
            ->setSubtitle('Donec enim erat, cursus in vulputate quis, consequat eget felis.')
            ->setDescription('Condimentum nisi nec ullasuere tortor id bibendum. Morbi ac massa eget quam hendrerit commodo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi dapibus quis neque suscipit tincidunt. Integer id aliquam tellus. Donec facilisis interdum tincidunt. Etiam ultricies rutrum lorem eget imperdiet.')
            ->setPrice(50 * 100)
            ->setCategory($category4)
            ->setIsBest(true);
        $manager->persist($product9);

        $product10 = new Product();
        $product10->setName('Sac à main rouge')
            ->setSlug('sac-a-main-rouge')
            ->setIllustration('img10.jpeg')
            ->setSubtitle('Praesent nibh nibh, iaculis quis consectetur quis, fermentum ut urna.')
            ->setDescription('Condimentum nisi nec ullasuere tortor id bibendum. Morbi ac massa eget quam hendrerit commodo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi dapibus quis neque suscipit tincidunt. Integer id aliquam tellus. Donec facilisis interdum tincidunt. Etiam ultricies rutrum lorem eget imperdiet.')
            ->setPrice(80 * 100)
            ->setCategory($category4)
            ->setIsBest(false);
        $manager->persist($product10);

        $product11 = new Product();
        $product11->setName('Colliers')
            ->setSlug('colliers')
            ->setIllustration('img11.jpeg')
            ->setSubtitle('Proin auctor molestie libero, in euismod nibh sodales id..')
            ->setDescription('Condimentum nisi nec ullasuere tortor id bibendum. Morbi ac massa eget quam hendrerit commodo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi dapibus quis neque suscipit tincidunt. Integer id aliquam tellus. Donec facilisis interdum tincidunt. Etiam ultricies rutrum lorem eget imperdiet.')
            ->setPrice(30 * 100)
            ->setCategory($category4)
            ->setIsBest(false);
        $manager->persist($product11);

        $product12 = new Product();
        $product12->setName('Costard homme')
            ->setSlug('costard-homme')
            ->setIllustration('img12.jpeg')
            ->setSubtitle('Fusce maximus sapien odio, eleifend vulputate tellus scelerisque non.')
            ->setDescription('Condimentum nisi nec ullasuere tortor id bibendum. Morbi ac massa eget quam hendrerit commodo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi dapibus quis neque suscipit tincidunt. Integer id aliquam tellus. Donec facilisis interdum tincidunt. Etiam ultricies rutrum lorem eget imperdiet.')
            ->setPrice(450 * 100)
            ->setCategory($category2)
            ->setIsBest(true);
        $manager->persist($product12);

        $product13 = new Product();
        $product13->setName('Lunette de soleil')
            ->setSlug('lunette-de-soleil')
            ->setIllustration('img13.jpeg')
            ->setSubtitle('Fusce maximus sapien odio, eleifend vulputate tellus scelerisque non.')
            ->setDescription('Condimentum nisi nec ullasuere tortor id bibendum. Morbi ac massa eget quam hendrerit commodo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi dapibus quis neque suscipit tincidunt. Integer id aliquam tellus. Donec facilisis interdum tincidunt. Etiam ultricies rutrum lorem eget imperdiet.')
            ->setPrice(60 * 100)
            ->setCategory($category4)
            ->setIsBest(false);
        $manager->persist($product13);

        $product14 = new Product();
        $product14->setName('Baskets')
            ->setSlug('baskets')
            ->setIllustration('img14.jpeg')
            ->setSubtitle('Cras tortor diam, commodo non purus eget, vulputate ornare eros.')
            ->setDescription('Condimentum nisi nec ullasuere tortor id bibendum. Morbi ac massa eget quam hendrerit commodo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi dapibus quis neque suscipit tincidunt. Integer id aliquam tellus. Donec facilisis interdum tincidunt. Etiam ultricies rutrum lorem eget imperdiet.')
            ->setPrice(74 * 100)
            ->setCategory($category4)
            ->setIsBest(false);
        $manager->persist($product14);

        $product15 = new Product();
        $product15->setName('Ensemble homme')
            ->setSlug('ensemble-homme')
            ->setIllustration('img15.jpeg')
            ->setSubtitle(' Etiam eget risus non ante viverra ornare eget ut odio.')
            ->setDescription('Condimentum nisi nec ullasuere tortor id bibendum. Morbi ac massa eget quam hendrerit commodo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi dapibus quis neque suscipit tincidunt. Integer id aliquam tellus. Donec facilisis interdum tincidunt. Etiam ultricies rutrum lorem eget imperdiet.')
            ->setPrice(350 * 100)
            ->setCategory($category2)
            ->setIsBest(true);
        $manager->persist($product15);

        $product16 = new Product();
        $product16->setName('Foulardfemme')
            ->setSlug('foulard-femme')
            ->setIllustration('img16.jpg')
            ->setSubtitle(' Pellentesque non metus at mi tristique pretium.')
            ->setDescription('Condimentum nisi nec ullasuere tortor id bibendum. Morbi ac massa eget quam hendrerit commodo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi dapibus quis neque suscipit tincidunt. Integer id aliquam tellus. Donec facilisis interdum tincidunt. Etiam ultricies rutrum lorem eget imperdiet.')
            ->setPrice(74 * 100)
            ->setCategory($category4)
            ->setIsBest(false);
        $manager->persist($product16);

        $product17 = new Product();
        $product17->setName('Pull Femme')
            ->setSlug('pull-femme')
            ->setIllustration('img17.jpeg')
            ->setSubtitle('Integer sit amet arcu sit amet nisi egestas pellentesque.')
            ->setDescription('Condimentum nisi nec ullasuere tortor id bibendum. Morbi ac massa eget quam hendrerit commodo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi dapibus quis neque suscipit tincidunt. Integer id aliquam tellus. Donec facilisis interdum tincidunt. Etiam ultricies rutrum lorem eget imperdiet.')
            ->setPrice(50 * 100)
            ->setCategory($category5)
            ->setIsBest(false);
        $manager->persist($product17);

        $product18 = new Product();
        $product18->setName('Cravates')
            ->setSlug('cravates')
            ->setIllustration('img18.jpg')
            ->setSubtitle(' Quisque nec enim vitae lorem posuere aliquam.')
            ->setDescription('Condimentum nisi nec ullasuere tortor id bibendum. Morbi ac massa eget quam hendrerit commodo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi dapibus quis neque suscipit tincidunt. Integer id aliquam tellus. Donec facilisis interdum tincidunt. Etiam ultricies rutrum lorem eget imperdiet.')
            ->setPrice(40 * 100)
            ->setCategory($category4)
            ->setIsBest(false);
        $manager->persist($product18);

        $product19 = new Product();
        $product19->setName('Blouse Femme')
            ->setSlug('blouse-femme')
            ->setIllustration('img19.jpeg')
            ->setSubtitle(' Ut dignissim dolor lacus, id feugiat ipsum ullamcorper.')
            ->setDescription('Condimentum nisi nec ullasuere tortor id bibendum. Morbi ac massa eget quam hendrerit commodo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi dapibus quis neque suscipit tincidunt. Integer id aliquam tellus. Donec facilisis interdum tincidunt. Etiam ultricies rutrum lorem eget imperdiet.')
            ->setPrice(60 * 100)
            ->setCategory($category7)
            ->setIsBest(false);
        $manager->persist($product19);

        $product20 = new Product();
        $product20->setName('Collier et boucle d’oreille')
            ->setSlug('collier-et-boucle-d-oreille')
            ->setIllustration('img20.jpeg')
            ->setSubtitle('Fusce in volutpat nunc, et rutrum ipsum.')
            ->setDescription('Condimentum nisi nec ullasuere tortor id bibendum. Morbi ac massa eget quam hendrerit commodo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi dapibus quis neque suscipit tincidunt. Integer id aliquam tellus. Donec facilisis interdum tincidunt. Etiam ultricies rutrum lorem eget imperdiet.')
            ->setPrice(120 * 100)
            ->setCategory($category4)
            ->setIsBest(true);
        $manager->persist($product20);

        $product21 = new Product();
        $product21->setName('Escarpin')
            ->setSlug('escarpin')
            ->setIllustration('img21.jpg')
            ->setSubtitle('Nullam efficitur rutrum iaculis, ligula, ac suscipit')
            ->setDescription('Condimentum nisi nec ullasuere tortor id bibendum. Morbi ac massa eget quam hendrerit commodo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi dapibus quis neque suscipit tincidunt. Integer id aliquam tellus. Donec facilisis interdum tincidunt. Etiam ultricies rutrum lorem eget imperdiet.')
            ->setPrice(83 * 100)
            ->setCategory($category4)
            ->setIsBest(false);
        $manager->persist($product21);

        $product22 = new Product();
        $product22->setName('Boucle d’oreille')
            ->setSlug('boucle-d-oreille')
            ->setIllustration('img22.jpeg')
            ->setSubtitle('Quisque quis tellus ut mi ultricies pellentesque.')
            ->setDescription('Condimentum nisi nec ullasuere tortor id bibendum. Morbi ac massa eget quam hendrerit commodo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi dapibus quis neque suscipit tincidunt. Integer id aliquam tellus. Donec facilisis interdum tincidunt. Etiam ultricies rutrum lorem eget imperdiet.')
            ->setPrice(50 * 100)
            ->setCategory($category4)
            ->setIsBest(false);
        $manager->persist($product22);

        $product23 = new Product();
        $product23->setName('Escarpin Beige')
            ->setSlug('escarpin-beige')
            ->setIllustration('img23.jpg')
            ->setSubtitle('Aenean porta commodo libero quis porta. In suscipit nunc lectus.')
            ->setDescription('Condimentum nisi nec ullasuere tortor id bibendum. Morbi ac massa eget quam hendrerit commodo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi dapibus quis neque suscipit tincidunt. Integer id aliquam tellus. Donec facilisis interdum tincidunt. Etiam ultricies rutrum lorem eget imperdiet.')
            ->setPrice(60 * 100)
            ->setCategory($category4)
            ->setIsBest(false);
        $manager->persist($product23);

        $product24 = new Product();
        $product24->setName('Costume homme')
            ->setSlug('costume-homme')
            ->setIllustration('img24.jpeg')
            ->setSubtitle('Praesent nibh nibh, iaculis quis consectetur quis, fermentum ut urna.')
            ->setDescription('Condimentum nisi nec ullasuere tortor id bibendum. Morbi ac massa eget quam hendrerit commodo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi dapibus quis neque suscipit tincidunt. Integer id aliquam tellus. Donec facilisis interdum tincidunt. Etiam ultricies rutrum lorem eget imperdiet.')
            ->setPrice(200 * 100)
            ->setCategory($category2)
            ->setIsBest(false);
        $manager->persist($product24);

        $manager->flush();
    }
}
