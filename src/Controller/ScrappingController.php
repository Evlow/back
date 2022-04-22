<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DomCrawler\Crawler;



class ScrappingController extends AbstractController
{
    #[Route('/scrapping', name: 'app_scrapping')]
    public function index(): Response
    {
        $html = file_get_contents("https://ktarena.com/fr/classement/equipes");
      
        $crawler = new Crawler($html);
        $html = $crawler->filter('div');
        

        return $this->render('scrapping/index.html.twig', [
            'controller_name' => 'ScrappingController',
        ]);
    }
}
