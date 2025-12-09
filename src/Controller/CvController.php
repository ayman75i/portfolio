<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CvController extends AbstractController
{
    #[Route('/cv', name: 'app_cv')]
    public function index(\Symfony\Component\HttpFoundation\Request $request): Response
    {
        $session = $request->getSession();


        if ($session->get('cv_access_granted')) {
            return $this->render('cv/index.html.twig', [
                'controller_name' => 'CvController',
            ]);
        }

        if ($request->isMethod('POST')) {
            $nom = $request->request->get('nom');
            $prenom = $request->request->get('prenom');
            $email = $request->request->get('email');

            if ($nom && $prenom && $email) {
                $session->set('cv_access_granted', true);

                return $this->redirectToRoute('app_cv');
            } else {
                $this->addFlash('error', 'Veuillez remplir tous les champs.');
            }
        }

        return $this->render('cv/access.html.twig');
    }
}
