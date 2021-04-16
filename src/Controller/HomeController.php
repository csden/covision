<?php

namespace App\Controller;

use App\Helper\HomeHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(HomeHelper $helper): Response
    {
        return $this->render('full/home.html.twig', [
            'homeRandomImage'   =>  $helper->getRandomImage(),
        ]);
    }
}
