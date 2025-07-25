<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class AppController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('app/index.html.twig', []);
    }


    #[Route('/utilisateurs', name: 'app_show')]
    public function show(): Response
    {
        $utilisateurs = [
            [
                'id' => 1,
                'nom' => 'Benoit',
                'email' => 'benoit@exemple.com',
                'date_naissance' => '1990-05-12',
                'adresse' => [
                    'rue' => '10 Rue des Lilas',
                    'code_postal' => '75001',
                    'ville' => 'Paris'
                ],
                'est_actif' => true,
                'image' => null
            ],
            [
                'id' => 2,
                'nom' => 'Carine',
                'email' => 'carine@exemple.com',
                'date_naissance' => '1988-03-22',
                'adresse' => [
                    'rue' => '20 Avenue des Champs',
                    'code_postal' => '69002',
                    'ville' => 'Lyon'
                ],
                'est_actif' => true,
                'image' => 'carine.jpg'
            ],
            [
                'id' => 3,
                'nom' => 'Edgar',
                'email' => 'edgar@exemple.com',
                'date_naissance' => '1995-09-10',
                'adresse' => [
                    'rue' => '5 Boulevard Voltaire',
                    'code_postal' => '31000',
                    'ville' => 'Toulouse'
                ],
                'est_actif' => false,
                'image' => 'edgar.jpg'
            ],
            [
                'id' => 4,
                'nom' => 'Isabelle',
                'email' => 'isabelle@exemple.com',
                'date_naissance' => '1982-12-01',
                'adresse' => [
                    'rue' => '3 Rue du Bac',
                    'code_postal' => '44000',
                    'ville' => 'Nantes'
                ],
                'est_actif' => true,
                'image' => 'isabelle.jpg'
            ],
            [
                'id' => 5,
                'nom' => 'Julie',
                'email' => 'julie@exemple.com',
                'date_naissance' => '1993-07-08',
                'adresse' => [
                    'rue' => '42 Rue de Bretagne',
                    'code_postal' => '33000',
                    'ville' => 'Bordeaux'
                ],
                'est_actif' => true,
                'image' => 'julie.jpg'
            ],
            [
                'id' => 6,
                'nom' => 'Marion',
                'email' => 'marion@exemple.com',
                'date_naissance' => '1991-11-30',
                'adresse' => [
                    'rue' => '15 Rue Saint-Michel',
                    'code_postal' => '67000',
                    'ville' => 'Strasbourg'
                ],
                'est_actif' => false,
                'image' => 'marion.jpg'
            ]
        ];
  
        return $this->render('app/utilisateur.html.twig', [
            "utilisateurs"=>$utilisateurs
        ]);
    }


    #[Route('/detail/{id}', name: 'app_detail')]
    public function detail(int $id): Response
    {
      
        //dd($id);

        $utilisateurs = [
            [
                'id' => 1,
                'nom' => 'Benoit',
                'email' => 'benoit@exemple.com',
                'date_naissance' => '1990-05-12',
                'adresse' => [
                    'rue' => '10 Rue des Lilas',
                    'code_postal' => '75001',
                    'ville' => 'Paris'
                ],
                'est_actif' => true,
                'image' => 'benoit.jpg'
            ],
            [
                'id' => 2,
                'nom' => 'Carine',
                'email' => 'carine@exemple.com',
                'date_naissance' => '1988-03-22',
                'adresse' => [
                    'rue' => '20 Avenue des Champs',
                    'code_postal' => '69002',
                    'ville' => 'Lyon'
                ],
                'est_actif' => true,
                'image' => 'carine.jpg'
            ],
            [
                'id' => 3,
                'nom' => 'Edgar',
                'email' => 'edgar@exemple.com',
                'date_naissance' => '1995-09-10',
                'adresse' => [
                    'rue' => '5 Boulevard Voltaire',
                    'code_postal' => '31000',
                    'ville' => 'Toulouse'
                ],
                'est_actif' => false,
                'image' => 'edgar.jpg'
            ],
            [
                'id' => 4,
                'nom' => 'Isabelle',
                'email' => 'isabelle@exemple.com',
                'date_naissance' => '1982-12-01',
                'adresse' => [
                    'rue' => '3 Rue du Bac',
                    'code_postal' => '44000',
                    'ville' => 'Nantes'
                ],
                'est_actif' => true,
                'image' => 'isabelle.jpg'
            ],
            [
                'id' => 5,
                'nom' => 'Julie',
                'email' => 'julie@exemple.com',
                'date_naissance' => '1993-07-08',
                'adresse' => [
                    'rue' => '42 Rue de Bretagne',
                    'code_postal' => '33000',
                    'ville' => 'Bordeaux'
                ],
                'est_actif' => true,
                'image' => 'julie.jpg'
            ],
            [
                'id' => 6,
                'nom' => 'Marion',
                'email' => 'marion@exemple.com',
                'date_naissance' => '1991-11-30',
                'adresse' => [
                    'rue' => '15 Rue Saint-Michel',
                    'code_postal' => '67000',
                    'ville' => 'Strasbourg'
                ],
                'est_actif' => false,
                'image' => 'marion.jpg'
            ]
        ];
        
        $utilisateur=[];
        foreach ($utilisateurs as $u) {
            if($u["id"] === $id){
                $utilisateur = $u;
            }
        }

        return $this->render('app/detail.html.twig', [
            "utilisateur"=>$utilisateur
        ]);
    }


    #[Route('/couleur', name: 'app_couleur')]
    public function page2(): Response
    {   
        header("Access-Control-Allow-Origin: *");
        $couleurs = [
            'rouge' => '#FF0000',
            'vert' => '#00FF00',
            'bleu' => '#0000FF',
            'jaune' => '#FFFF00',
            'noir' => '#000000'
        ];

        return $this->json($couleurs, 200);
    }
}

