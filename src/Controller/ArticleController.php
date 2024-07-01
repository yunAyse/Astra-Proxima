<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article')]
    public function index(TagRepository $tagRepository, ArticleRepository $articleRepository): Response
    {

        $tags = $tagRepository->findAll();
        $articles = $articleRepository->findAll();

        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'tags' => $tags,
            'articles' => $articles
        ]);
    }

    #[Route('/article/{id}', name: 'app_article_id')]
    public function article(int $id, ArticleRepository $articleRepository, TagRepository $tagRepository): Response
    {

        $article = $articleRepository->find($id);
        $tags = $article->getTagId();

        if (!$article) {
            throw $this->createNotFoundException('The article does not exist');
        }    

        return $this->render('article/article.html.twig', [
            'controller_name' => 'ArticleController',
            'article' => $article,
            'tags' => $tags
        ]);
    }
}
