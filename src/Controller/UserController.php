<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function user(UserRepository $userRepository): Response
    {

        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            
        ]);
    }
}
