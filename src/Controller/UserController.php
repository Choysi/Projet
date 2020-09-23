<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="users_list")
     */
    public function index()
    {
        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->getAll();

        return $this->render('user/index.html.twig', [
            'users' => $users,
        ]);
    }

    /**
     * @Route("/add", name="user_add")
     * @Route("/{id}/edit", name="user_edit")
     */
    public function add_edit(User $user = null, Request $request)
    {
        // si le user n'existe pas, on instancie un nouveau User (on est dans le cas d'un ajout)
        if (!$user) {
            $user = new User();
        }

        // il faut créer un UserType au préalable (php bin/console make:form
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        // si on soumet le formulaire et que le form est valide
        if ($form->isSubmitted() && $form->isValid()) {
            // on récupère les données du formulaire
            $user = $form->getData();
            // on ajoute le nouveau user
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            // on redirige vers la liste des users (users_list étant le nom de la route qui liste tous les users dans UserController)
            return $this->redirectToRoute('users_list');
        }

        /* on renvoie à la vue correspondante : 
            - le formulaire
            - le booléen editMode (si vrai, on est dans le cas d'une édition sinon on est dans le cas d'un ajout)
        */
        return $this->render('user/add_edit.html.twig', [
            'formUser' => $form->createView(),
            'editMode' => $user->getId() !== null
        ]);
    }

    /**
     * @Route("/{id}/delete", name="user_delete")
     */
    public function delete(User $user = null)
    {
        if (!$user) {
            $user = new User();
        }
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($user);
        $entityManager->flush();

        return $this->redirectToRoute('users_list');
    }

    /**
     * @Route("/{id}", name="user_show", methods="GET")
     */
    public function show(User $user): Response
    {
        return $this->render('user/index.html.twig', [
            'user' => $user
        ]);
    }
}
