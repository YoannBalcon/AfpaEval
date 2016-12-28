<?php

namespace MPC\mediathequeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction() {
        return $this->render('MPCmediathequeBundle:Default:index.html.twig');
    }

    public function loginAction() {
        return $this->render('MPCmediathequeBundle:Default:login.html.twig');
    }

    public function registerAction() {
        return $this->render('MPCmediathequeBundle:Default:register.html.twig');
    }

    public function catalogueAction() {
        $em = $this->getDoctrine()->getManager();

        $ouvrages = $em->getRepository('MPCmediathequeBundle:Ouvrage')->findAll();
        $dispos = $em->getRepository('MPCmediathequeBundle:Reservation')->findAll();
        $emprunts = $em->getRepository('MPCmediathequeBundle:Emprunt')->findAll();
        return $this->render('MPCmediathequeBundle:Default:catalogue.html.twig', array(
                    'ouvrages' => $ouvrages, 'dispos' => $dispos, 'emprunts' => $emprunts));
    }

    public function nouveauteAction() {
        $em = $this->getDoctrine()->getManager();

        $ouvrages = $em->getRepository('MPCmediathequeBundle:Ouvrage')->findBy([], ['date' => 'DESC']);
        $dispos = $em->getRepository('MPCmediathequeBundle:Reservation')->findAll();
        $emprunts = $em->getRepository('MPCmediathequeBundle:Emprunt')->findAll();

        return $this->render('MPCmediathequeBundle:Default:nouveaute.html.twig', array(
                    'ouvrages' => $ouvrages, 'dispos' => $dispos, 'emprunts' => $emprunts));
    }

}
