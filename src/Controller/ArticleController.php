<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Comment;
use App\Form\CommentType;
use App\Repository\ArticleRepository;
use App\Service\Paginator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/article")
 */
class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="article_index", methods={"GET"})
     * @Cache(smaxage="5")
     */
    public function index(Paginator $paginator, ArticleRepository $articleRepository): Response
    {
        $page = $paginator->getPage();
        $articles = $paginator->getItemList($articleRepository, $page);
        $nbPages = $paginator->countPage($articles);

        return $this->render('Article/home/index.html.twig', [
            'articles' => $articles,
            'nbPages' => $nbPages,
            'page' => $page,
        ]);
    }

    /**
     * @Route("/{id}", name="article_show")
     */
    public function show(Article $article): Response
    {
        return $this->render('Article/article/show.html.twig', [
            'article' => $article,
        ]);
    }

    /**
     * @Route("/{slug}/comment/new", name="comment_new", methods={"POST"})
     */
    public function newComment(Request $request, Article $article): Response
    {
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user = $this->getUser();
            $article->addComment($comment);
            $user->addComment($comment);

            $em->persist($comment);
            $em->flush();
        }

        return $this->redirectToRoute('article_show', ['id' => $article->getId()]);
    }

    /**
     * 
     */
    public function commentForm(Article $article): Response
    {
        $form = $this->createForm(CommentType::class);

        return $this->render('Article/article/_comment_form.html.twig', [
            'form' => $form->createView(),
            'article' => $article,
        ]);
    }

    /**
     * @Route("/switch-locale/{locale}", name="switch_locale", methods={"GET"})
     */
    public function switchLocale(Request $request, string $locale)
    {
        $request->getSession()->set('locale', $locale);

        return $this->redirectToRoute('homepage');
    }
}

