<?php

namespace App\Controller;

use App\Entity\Header;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    private $entitymanager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entitymanager = $entityManager;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function index(): Response
    {
        $products = $this->entitymanager->getRepository(Product::class)->findByIsBest(1);
        $headers = $this->entitymanager->getRepository(Header::class)->findAll();

        return $this->render('home/home.html.twig', [
            'products' => $products,
            'headers' => $headers
        ]);
    }
}
