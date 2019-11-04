<?php

namespace App\Controller;

use App\Entity\Produite;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Form\AjoutProduiteType;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="produit")
     */
    public function index()
    {
        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
        ]);
    }

     /**
     * @Route("/ajoutProduit", name="ajoutProduit")
     * 
     */
    public function creation(Request $request, ObjectManager $manager){
        $produite= new Produite();
       
        $form = $this->createForm(AjoutProduiteType::class, $produite);
         $form->handleRequest($request);
         
         if($form->isSubmitted() && $form->isValid()){
             $manager->persist($produite);
             $manager->flush();
 
             
         }
 
         return $this->render('produit/menuProduit.html.twig',[
             'formProduit' =>$form->createView()
         ]);
     }
     /**
     * @Route("/afficheProduit", name="afficheProduit")
     * 
     */ 
    public function afficheProduit()
    {
        $repo = $this->getDoctrine()->getRepository(Produite::class);
        $produites = $repo->findAll();
        return $this->render('produit/affichageProduit.html.twig',[
            'controller_name' => 'ProduitController',
            'produites'=> $produites
        ]);
    }
    /**
     * @Route("/deleteProduit/{id}", name="deleteProduit")
     * 
     */
    public function remove(Produite $produite)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($produite);
        $em->flush();

        return $this->redirect($this->generateUrl('afficheProduit'));
    }
    /**
     * @Route("/{id}/editProduit", name="editProduit")
     */
    public function edit(Produite $produite=null, Request $request, ObjectManager $manager)
    {
        $form = $this->createForm(AjoutProduiteType::class, $produite);
        $form->handleRequest($request);

              if($form->isSubmitted() && $form->isValid()){
                 
                      $manager->persist($produite);
                      $manager->flush();
                  }
                  
                 
        return $this->render('produit/menuProduit.html.twig',[
        'formProduit' =>$form->createView()
]);
       
    }
    
}
