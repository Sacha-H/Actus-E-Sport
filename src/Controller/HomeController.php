<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\EquipeRepository;
use App\Repository\EsportRepository;
use App\Repository\JoueurRepository;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(UserRepository $userRepository, EsportRepository $esportRepository, EquipeRepository $equipeRepository, JoueurRepository $joueurRepository, ArticleRepository $articleRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'users' => $userRepository->findAll(),
            'esports' => $esportRepository->findAll(),
            'equipes' => $equipeRepository->findAll(),
            'joueurs' => $joueurRepository->findAll(),
            'articles' => $articleRepository->findAll(),
            'articlesByDate' => $articleRepository->findByDate(),
            
        ]);
    }

    
    
}
