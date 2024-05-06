<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    public function index(User $user, UserRepository $userRepository ): Response
    {
        $user = new \App\Entity\User();

        if ($user instanceof User) {
            $userTag = $user->getTags();
        }

        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
            'userTag' => $userTag,
        ]);
    }
}
