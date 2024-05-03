<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProfileController extends AbstractController
{
    private $security;

    public function __construct(Security $security) {
        $this->security = $security;
    }

    #[Route('/profile', name: 'app_profile')]
    public function profile(): Response
    {
        $user = $this->security->getUser();

        $userName = '';
        if ($user instanceof User) {
            $userName = $user->getFirstName();
        }

        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
            'user_name' => $userName
        ]);
    }
}
