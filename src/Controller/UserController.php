<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/user')]
final class UserController extends AbstractController
{
    #[Route('', name: 'user_index')]
    public function index(UserRepository $userRepository): Response
    {
        // affiche la liste des utilisateurs
        $users =$userRepository->findAll();
    
        return $this->render('user/index.html.twig', [
            "users"=> $users
        ]);
    }

    #[Route('/show/{id}', name: 'user_show')]
    public function show(User $user): Response
    {
        // affiche la liste des utilisateurs
       
       
        return $this->render('user/show.html.twig', [
            "user"=> $user
        ]);
    }
   
    #[Route('/create', name: 'user_create')]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        
        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
             // Si un formulaire a été soumis
            // je traite les info du formulaire
            // j'enregistre les infos en base de donnée
            //  on redirige l'utilisateur ailleur : la liste ou afficher le détail 
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute("user_index");
        
        }
       
       // dd($form);
        // j'affiche le formulaire

        return $this->render('user/create.html.twig', [
            "form"=>$form
        ]);
    }

    #[Route('/update/{id}', name: 'user_update')]
    public function update(Request $request, EntityManagerInterface $em, User $user): Response
    {
    
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
             // Si un formulaire a été soumis
            // je traite les info du formulaire
            // j'enregistre les infos en base de donnée
            //  on redirige l'utilisateur ailleur : la liste ou afficher le détail 
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute("user_index");
        
        }
       
       // dd($form);
        // j'affiche le formulaire

        return $this->render('user/create.html.twig', [
            "form"=>$form
        ]);
    }
   
}
