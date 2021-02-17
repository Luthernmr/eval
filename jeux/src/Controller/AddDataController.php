<?php

namespace App\Controller;

use App\Entity\Game;
use App\Entity\Player;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class AddDataController extends AbstractController
{
    /**
     * @Route("/add/data/game", name="add_game")
     */
     public function addGame(Request $request, ManagerRegistry $managerRegistry){
         $game = new Game();

         $form = $this->createFormBuilder($game)
                      ->add('title', TextareaType::class)
                      ->add('MinPlayers', NumberType::class)
                      ->add('MaxPlayer', NumberType::class)
                      ->add('valider', SubmitType::class)
                      ->getForm();


        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $managerRegistry->getManager();
            $em->persist($game);
            $em->flush();
            $this->addFlash('gameSuccess' , 'Le jeu à bien été ajouté');
        

        return $this->redirectToRoute('add_data');
        }
        return $this->render('add_data/game.html.twig', [
            'formGame' => $form->createView()
        ]);

       
         
     }
     /**
     * @Route("/add/data/player", name="add_player")
     */
    public function addPlayer(Request $request, ManagerRegistry $managerRegistry){
        $player = new Player();

        $form = $this->createFormBuilder($player)
                     ->add('email')
                     ->add('nickname')
                     ->add('Ajouter', SubmitType::class)
                     ->getForm();


       $form->handleRequest($request);

       if($form->isSubmitted() && $form->isValid()) {
           $em = $managerRegistry->getManager();
           $em->persist($player);
           $em->flush();
           $this->addFlash('success' , 'joueur a été  jouté');
       

       return $this->redirectToRoute('add_data');
       }
       return $this->render('add_data/player.html.twig', [
           'formPlayer' => $form->createView()
       ]);
    }
     
    /**
     * @Route("/add/data", name="add_data")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Player::class);
        $repo = $this->getDoctrine()->getRepository(Game::class);

        $players = $repo->findAll();
        $games = $repo->findAll();

        return $this->render('add_data/index.html.twig', [
            'controller_name' => 'AddDataController',
            'players' => $players,
            'games' => $games
            
        ]);
        
       
    }
    

    

}
