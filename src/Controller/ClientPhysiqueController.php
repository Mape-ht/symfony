<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ClientPhysiqueController extends AbstractController
{
    /**
     * @Route("/clientphysique/add", name="client_physique")
     */
    public function index()
    {
        return $this->render('client_physique/add.html.twig');
    }
}
