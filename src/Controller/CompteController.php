<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CompteController extends AbstractController
{
    /**
     * @Route("/compte/add", name="compte")
     */
    public function index()
    {
        return $this->render('compte/add.html.twig');
    }
}
