<?php

namespace App\Controller;

use App\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route as SensioRoute;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Mime\Message;
use App\Form\AjoutClientType;

class ClientController extends AbstractController
{
    /**
     * @Route("/menu", name="menu")
     */
    public function index()
    {
        return $this->render('client/index.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }
    /**
     * @Route("/menuClient", name="menuClient")
     */  
    public function menu_client()
    {
        return $this->render('client/menuClient.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }

    /**
     * @Route("/ajoutClient", name="ajoutClient")
     */
    public function create(Request $request, ObjectManager $manager){
        $client= new Client();
      
               
      
                $form = $this->createForm(AjoutClientType::class, $client);
                $form->handleRequest($request);
        
                      if($form->isSubmitted() && $form->isValid()){
                         
                              $manager->persist($client);
                              $manager->flush();
                          }
                          
                         
        return $this->render('client/menuClient.html.twig',[
         'formClient' =>$form->createView()
        ]);
    }
   /**
     * @Route("/affiche", name="affiche")
     * 
     */ 
    public function afficheClient()
    {
        $repo = $this->getDoctrine()->getRepository(Client::class);
        $clients = $repo->findAll();
        return $this->render('client/affichage.html.twig',[
            'controller_name' => 'ClientController',
            'clients'=> $clients
        ]);
    }
    /**
     * @Route("/delete/{id}", name="delete")
     * 
     */
    public function remove(Client $client)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($client);
        $em->flush();

        return $this->redirect($this->generateUrl('affiche'));
    }
    /**
     * @Route("/{id}/edit", name="edit")
     */
    public function edit(Client $client=null, Request $request, ObjectManager $manager)
    {
        $form = $this->createForm(AjoutClientType::class, $client);
        $form->handleRequest($request);

              if($form->isSubmitted() && $form->isValid()){
                 
                      $manager->persist($client);
                      $manager->flush();
                  }
                  
                 
        return $this->render('client/menuClient.html.twig',[
        'formClient' =>$form->createView()
    ]);
        }
                  
    }
