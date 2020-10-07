<?php

namespace App\Controller;

use App\Entity\ClientPhysique;
use App\Entity\ClientMoral;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ClientPhysiqueController extends AbstractController
{
    /**
     * @Route("/clientphysique/form", name="form_client_physique")
     */
    public function afficheForm()
    {
        $em = $this->getDoctrine()->getManager(); 
        
        
        $data['clientmorals'] = $em->getRepository(ClientMoral::class)->findAll();
                
        return $this->render('client_physique/add.html.twig', $data);
    }
    
    /**
     * @Route("/clientphysique/list", name="list_client_physique")
     */
    public function listCP()
    {
        $em = $this->getDoctrine()->getManager(); 
        
        
        $data['clientphysiques'] = $em->getRepository(ClientPhysique::class)->findAll();

        return $this->render('client_physique/list.html.twig', $data);
    }
    /**
     * @Route("/clientphysique/add", name="client_physique")
     */
    public function add(Request $request)
    {
     
        if(isset($_POST))
        {

            extract($_POST);
            
            
            $em = $this->getDoctrine()->getManager();
            $clientmoral = $em->getRepository(ClientMoral::class)->find($employeur);
            //var_dump($clientmoral);
            //die;
            $clientp = new ClientPhysique();
            $clientp->setNom($nom);
            $clientp->setPrenom($prenom);
            $clientp->setAdresse($adresse);
            $clientp->setTelephone($telephone);
            $clientp->setStatut($statut);
            $clientp->setSalaire($salaire);
            $clientp->setClientmoral($clientmoral);
            $em->persist($clientp);
            $em->flush();

        }
        
        //$form = $this->createForm(ClientPhysiqueType::class, $clientp,array('action'=>$this->generateUrl('clientphysique_add')));
        //$data['form'] = $form->createView();        
        return $this->redirectToRoute("form_client_physique");
    }
}
