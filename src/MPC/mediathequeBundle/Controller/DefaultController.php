<?php

namespace MPC\mediathequeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MPCmediathequeBundle:Default:index.html.twig');
    }
    
    public function loginAction()
    {
        return $this->render('MPCmediathequeBundle:Default:login.html.twig');
    }
    
    public function registerAction()
    {
        return $this->render('MPCmediathequeBundle:Default:register.html.twig');
    }
    
    public function catalogueAction()
    { 
        $em = $this->getDoctrine()->getManager();
        
        $ouvrages = $em->getRepository('MPCmediathequeBundle:Ouvrage')->findBy ([], ['date' => 'DESC']);

        return $this->render('MPCmediathequeBundle:Default:catalogue.html.twig', array(
            'ouvrages' => $ouvrages,
        ));      
    }
}
