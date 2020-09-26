<?php

namespace App\Controller;

use App\Entity\ClientPhysique;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ClientPhysiqueController extends AbstractController
{
    /**
     * @Route("/clientphysique/add", name="client_physique")
     */
    public function index()
    {
     
        $clientp = new ClientPhysique();
        $form = $this->createForm(ClientPhysiqueType::class, $clientp,array('action'=>$this->generateUrl('clientphysique_add')));
        $data['form'] = $form->createView();        
        return $this->render('client_physique/add.html.twig', $data);
    }
}
