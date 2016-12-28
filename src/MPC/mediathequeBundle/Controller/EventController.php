<?php

namespace MPC\mediathequeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EventController extends Controller {

    public function EventAction() {
        return $this->render('MPCmediathequeBundle:Default:index.html.twig');
    }

    public function showEventsAction() {
        $em = $this->getDoctrine()->getManager();

        $evenements = $em->getRepository('MPCmediathequeBundle:Evenements')->findBy([], ['date' => 'ASC']);

        return $this->render('MPCmediathequeBundle:Default:evenements.html.twig', array('evenements' => $evenements,));
    }

}
