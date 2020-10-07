<?php

namespace App\Controller;

use App\Entity\Compte;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CompteController extends AbstractController
{
    
    /**
     * @Route("/compte/form", name="form_compte")
     */
    public function afficheForm()
    {
        return $this->render('compte/add.html.twig');
    }
    
    
    
    /**
     * @Route("/compte/add", name="compte")
     */
    public function add()
    {

        if(isset($_POST))
        {

            extract($_POST);
            $em =$this->getDoctrine()->getManager();
            $cpte = new Compte();
            $cpte->setNumero($numero);
            $cpte->setClerib($clerib);
            $cpte->setSolde($solde);
            $cpte->setTypeFrais($typefrais);
            $cpte->setTypeCompte($typecompte);
            $cpte->setDateOuverture(new \DateTime());

            $em->persist($cpte);
            $em->flush();
        }
        return $this->redirectToRoute("form_compte");
    }
}
