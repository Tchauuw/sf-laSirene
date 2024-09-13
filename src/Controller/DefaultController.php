<?php

namespace App\Controller;

use App\Entity\Geste;
use App\Entity\Tag;
use App\Repository\GesteRepository;
use App\Repository\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route("/static", name:"app_static")]
    public function index(): Response
    {
        return $this->render('default/index.html.twig', []);
    }

    #[Route("/", name:"app_homepage")]
    public function home(GesteRepository $gesteRepository)
    {
        $gestes=$gesteRepository->findAll();
        return $this->render('default/indexbd.html.twig', [
            'geste'=>$gestes
        ]);
    }

    #[Route("/geste/{id}", name:"app_geste")]
    public function geste(Geste $geste,GesteRepository $gesteRepository)
    {
        $collections=$gesteRepository->findAll();
        return $this->render('default/geste.html.twig', [
            'geste'=>$geste,
            'collections'=>$collections
        ]);
    }
}