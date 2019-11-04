<?php

namespace App\Controller;

use App\Entity\LigneVente;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Form\AjoutCommandeType;

class LigneVenteController extends AbstractController
{
    /**
     * @Route("/ligne/vente", name="ligne_vente")
     */
    public function index()
    {
        return $this->render('ligne_vente/index.html.twig', [
            'controller_name' => 'LigneVenteController',
        ]);
    }
    /**
     * @Route("/commande", name="commande")
     */
    public function commande(Request $request, ObjectManager $manager)
    {
        $ligneVente= new LigneVente();
      
               
      
                $form = $this->createForm(AjoutCommandeType::class, $ligneVente);
                $form->handleRequest($request);
        
                      if($form->isSubmitted() && $form->isValid()){
                         
                              $manager->persist($ligneVente);
                              $manager->flush();
                          }
                          
                         
        return $this->render('ligne_vente/menuAchat.html.twig',[
         'formCommande' =>$form->createView()
        ]);
    }
    /**
     * @Route("/affichageCommande", name="affichageCommande")
     * 
     */ 
    public function afficheCommande()
    {
        $repo = $this->getDoctrine()->getRepository(LigneVente::class);
        $commandes = $repo->findAll();
        return $this->render('ligne_vente/affichageCommande.html.twig',[
            'controller_name' => 'LigneVenteController',
            'commandes'=> $commandes
        ]);
    }
}
