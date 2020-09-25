<?php

namespace App\Controller;

use App\Entity\ClientMoral;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ClientMoralController extends AbstractController
{
    /**
     * @Route("/clientmoral/add", name="client_moral")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager(); 
        $data['clientmorals'] = $em->getRepository(ClientMoral::class)->findAll();
        return $this->render('client_moral/add.html.twig', $data);
    }
    
    /**
     * @Route("/clientmoral/add", name="client_moral")
     */
    public function add()
    {
        $clientmoral = new ClientMoral();
        $clientmoral->setRaisonsocial("Air France");
        $clientmoral->setAdresse("Dakar");
        $clientmoral->setTelephone("777777777"); 
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($clientmoral);
        $em->flush();
        return $this->render('client_moral/add.html.twig');
    }
}
