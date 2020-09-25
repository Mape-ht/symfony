<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ClientMoralController extends AbstractController
{
    /**
     * @Route("/clientmoral/add", name="client_moral")
     */
    public function index()
    {
        return $this->render('client_moral/add.html.twig');
    }
}
