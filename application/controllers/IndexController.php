<?php
class IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {
        // modelos
        $user = new User();
        $product = new Product();

        // restaga os 3 últimos produtos cadastrados
        $latestProducts = $product->getLatest(3);
        $this->view->assign('latestProducts', $latestProducts);

        // restaga os produtos de R$20,00 até R$50,00
        $productsByPrice = $product->findByPriceRange(20.00, 50.00);
        $this->view->assign('productsByPrice', $productsByPrice);

        // resgata usuários que contenha 'Diogo' no nome
        $usersByName = $user->findByPartialName('Diogo');
        $this->view->assign('usersByName', $usersByName);

        // resgata um usuário pelo email
        $userByEmail = $user->findByEmail('thiago@gmail.com');
        $this->view->assign('userByEmail', $userByEmail);
    }
}