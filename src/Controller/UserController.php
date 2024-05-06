<?php

namespace App\Controller;

use App\Entity\Tag;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    private $security;

    public function __construct(Security $security) {
        $this->security = $security;
    }

    #[Route('/user', name: 'app_user')]
    public function user(UserRepository $userRepository, Tag $tag): Response
    {

        $user = $this->security->getUser();

        $userName = '';
        if ($user instanceof User) {
            $userName = $user->getFirstName();
        }

        $userTag = $userRepository->getTagId($tag);
        dd($userTag);


        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'user_name' => $userName
        ]);
    }

    #[Route('/user/{id}/follow', name: 'tag_follow')]
    public function followTag(Tag $tag, EntityManagerInterface $entityManager, SessionInterface $session)
    {
        $user = $this->getUser();
        if (!$user instanceof User) {
            // throw new \Exception('User is not valid');
            $session->getFlashBag()->add('error', 'You must be logged in to follow a tag.');
            return $this->redirectToRoute('app_article');
        }

        $user->addTag($tag);
        $entityManager->flush();

        $session->getFlashBag()->add('success', 'Tag unfollowed successfully.');
        return $this->redirectToRoute('app_user');

    }

    #[Route('/user/{id}/follow', name: 'tag_unfollow')]
    public function unfollowTag(Tag $tag, EntityManagerInterface $entityManager, SessionInterface $session) {
        $user = $this->getUser();
        if (!$user instanceof User) {
            // throw new \Exception('User is not valid');
            $session->getFlashBag()->add('error', 'You must be logged in to unfollow a tag.');
            return $this->redirectToRoute('app_article');
        }

        $user->removeTag($tag);
        $entityManager->flush();

        $session->getFlashBag()->add('success', 'Tag unfollowed successfully.');
        return $this->redirectToRoute('app_user');
    }
}
