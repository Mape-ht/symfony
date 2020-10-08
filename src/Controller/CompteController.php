<?php

namespace App\Controller;

use App\Entity\ClientMoral;
use App\Entity\ClientPhysique;
use App\Entity\Compte;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CompteController extends AbstractController
{
    
    /**
     * @Route("/compte/form", name="form_compte")
     */
    public function afficheForm()
    {
        
        $em = $this->getDoctrine()->getManager(); 
        
        
        $data['clientmorals'] = $em->getRepository(ClientMoral::class)->findAll();
        $data['clientphysiques'] = $em->getRepository(ClientPhysique::class)->findAll();
        return $this->render('compte/add.html.twig', $data);
    }
    
    /**
     * @Route("/compte/list", name="list_compte")
     */
    public function listCompte()
    {
        $em = $this->getDoctrine()->getManager(); 
        
        
        $data['comptes'] = $em->getRepository(Compte::class)->findAll();

        return $this->render('compte/list.html.twig', $data);
    }
        
    
    /**
     * @Route("/compte/add", name="compte")
     */
    public function add(Request $request)
    {

        if(isset($_POST))
        {

            extract($_POST);
            $em =$this->getDoctrine()->getManager();
            $clientEntreprise = $em->getRepository(ClientMoral::class)->find($clientM);
            $clientParticulier = $em->getRepository(ClientPhysique::class)->find($clientP);
            //var_dump($clientEntreprise,$clientParticulier);
            //die;

            $cpte = new Compte();
            $cpte->setNumero($numero);
            $cpte->setClerib($clerib);
            $cpte->setSolde($solde);
            $cpte->setTypeFrais($typefrais);
            $cpte->setTypeCompte($typecompte);
            $cpte->setDateOuverture(new \DateTime());
            $cpte->setClientMoral($clientEntreprise);
            $cpte->setClientPhysique($clientParticulier);

            $em->persist($cpte);
            $em->flush();
        }
        return $this->redirectToRoute("form_compte");
    }
}
