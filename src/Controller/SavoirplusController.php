<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SavoirplusController extends AbstractController
{
    #[Route('/savoirplus', name: 'app_savoirplus')]
    public function index(): Response
    {
        return $this->render('savoirplus/index.html.twig', [
            'controller_name' => 'SavoirplusController',
        ]);
    }
}
