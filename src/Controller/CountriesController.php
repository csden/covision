<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CountriesController extends AbstractController
{
    /**
     * @Route("/countries", name="countries")
     */
    public function index(): Response
    {
        return $this->render('full/countries.html.twig', [
            'controller_name' => 'CountriesController',
        ]);
    }
}
