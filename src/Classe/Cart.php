<?php

namespace App\Classe;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Cart
{
    private $session;
    private $manager;

    public function __construct(SessionInterface $session, EntityManagerInterface $manager)
    {
        $this->session = $session;
        $this->manager = $manager;
    }

    public function add($id)
    {
        $cart = $this->session->get('cart', []);

        if (!empty($cart[$id])) {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }

        $this->session->set('cart', $cart);
    }

    public function get()
    {
        return $this->session->get('cart');
    }

    public function remove()
    {
        return $this->session->remove('cart');
    }

    public function delete($id)
    {
        $cart = $this->session->get('cart', []);
        unset($cart[$id]);

        return $this->session->set('cart', $cart);
    }

    public function decrease($id)
    {
        // supprimer un produit depuis le panier
        $cart = $this->session->get('cart', []);

        if ($cart[$id] > 1) {
            // retirer une quantité (-1)
            $cart[$id]--;
        } else {
            // suprimer le produit
            unset($cart[$id]);
        }

        return $this->session->set('cart', $cart);
    }

    public function getFull()
    {
        $cartComplete = [];

        if ($this->get()) {
            foreach ($this->get() as $id => $quantity) {
                $product_object = $this->manager->getRepository(Product::class)->findOneById($id);

                if (!$product_object) {
                    // si le produit n'existe pas dans la base de donnée on le supprime du panier
                    $this->delete($id);
                    continue; // sortir de la boucle foreach sans retourner le produit qui n'existe pas
                }

                $cartComplete[] = [
                    'product' => $product_object,
                    'quantity' => $quantity
                ];
            }
        }

        return $cartComplete;
    }
}
