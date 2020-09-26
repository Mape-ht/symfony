<?php

namespace App\Controller;

use App\Entity\ClientMoral;
use App\Form\ClientMoralType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ClientMoralController extends AbstractController
{
    /**
     * @Route("/clientmoral/list", name="list_client_moral")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager(); 
        
        
        $data['clientmorals'] = $em->getRepository(ClientMoral::class)->findAll();
                
        return $this->render('client_moral/list.html.twig', $data);
    }

    /**
     * @Route("/clientmoral/form", name="form_client_moral")
     */
    public function afficheForm()
    {
        return $this->render('client_moral/add.html.twig');

    }
    
    /**
     * @Route("/clientmoral/add", name="client_moral")
     */
    public function add(Request $request)
    {
        if (isset($_POST))
        
        {
            extract($_POST);
            //var_dump($raison_social); 
            //die();
            $em = $this->getDoctrine()->getManager();
            $clientmoral = new ClientMoral();
            $clientmoral->setRaisonsocial($raison_social);
            $clientmoral->setAdresse($adresse);
            $clientmoral->setTelephone($telephone);
            $em->persist($clientmoral);
            $em->flush();

        }
        
            return $this->redirectToRoute("form_client_moral",  );
            //return $this->render('client_moral/add.html.twig');
    }
}
