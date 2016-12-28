<?php

namespace MPC\mediathequeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MPC\mediathequeBundle\Entity\Reservation;

class ReservationController extends Controller {

    public function reservationAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $ouvrage_id = $request->get('id');

        $today = new \DateTime();
        $objetOuvrage = $em->getRepository('MPCmediathequeBundle:Ouvrage')->find($ouvrage_id);

        $User = $this->getUser();
        $reservation = new Reservation;

        $reservation->setOuvrage($objetOuvrage);
        $reservation->setDate($today);
        $reservation->setUtilisateur($User);
        $em->persist($reservation);
        $em->flush();

        return $this->render('MPCmediathequeBundle:Default:confirm_resa.html.twig', array('User' => $User,));
    }

    public function listeResaAction() {
        $em = $this->getDoctrine()->getManager();

        $listResa = $em->getRepository('MPCmediathequeBundle:Reservation')->findAll();

        return $this->render('MPCmediathequeBundle:Default:listeResa.html.twig', array('listeResa' => $listResa,));
    }

    public function userListresaAction() {
        $em = $this->getDoctrine()->getManager();

        $User = $this->getUser();
        $reservations = $em->getRepository('MPCmediathequeBundle:Reservation')->findByUtilisateur($this->getUser());


        return $this->render('MPCmediathequeBundle:Default:userListResa.html.twig', array('reservation' => $reservations, 'User' => $User));
    }
}
