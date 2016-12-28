<?php

namespace MPC\mediathequeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MPC\mediathequeBundle\Entity\Emprunt;

class EmpruntController extends Controller {

    public function empruntAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $id_select = $request->get('id');

        $date = new \DateTime();

        $today = new \DateTime();
        $delai = new \DateInterval("P14D");
        $retour = $today->add($delai);

        $objetEmprunt = $em->getRepository('MPCmediathequeBundle:Reservation')->findOneBy(array('id' => $id_select));

        $emprunt = new Emprunt;
        $emprunt->setOuvrage($objetEmprunt->getOuvrage());
        $emprunt->SetdateEmprunt($date);
        $emprunt->setUtilisateur($objetEmprunt->getUtilisateur());
        $emprunt->setdateRetour($retour);
        $em->persist($emprunt);

        $reservation = $em->getRepository('MPCmediathequeBundle:Reservation')->findOneBy(array('id' => $id_select));

        $em->remove($reservation);
        $em->flush();

        return $this->render('MPCmediathequeBundle:Default:confirm_emprunt.html.twig', array('emprunt' => $emprunt, 'retour' => $retour));
    }

    public function listeEmpruntAction() {
        $em = $this->getDoctrine()->getManager();

        $today = new \DateTime();
        $emprunts = $em->getRepository('MPCmediathequeBundle:Emprunt')->findAll();

        return $this->render('MPCmediathequeBundle:Default:listeEmprunt.html.twig', array('emprunts' => $emprunts, 'today' => $today));
    }

    public function userListEmpruntAction() {
        $em = $this->getDoctrine()->getManager();

        $User = $this->getUser();
        $today = new \DateTime();
        $emprunts = $em->getRepository('MPCmediathequeBundle:Emprunt')->findByUtilisateur($this->getUser());


        return $this->render('MPCmediathequeBundle:Default:userListEmprunt.html.twig', array('emprunts' => $emprunts, 'today' => $today, 'User' => $User));
    }

    public function retourAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $id_select = $request->get('id');

        $emprunts = $em->getRepository('MPCmediathequeBundle:Emprunt')->findOneBy(array('id' => $id_select));
        $em->remove($emprunts);
        $em->flush();

        return $this->render('MPCmediathequeBundle:Default:confirm_retour.html.twig', array('retours' => $emprunts,));
    }

}
