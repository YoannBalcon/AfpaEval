<?php

namespace MPC\mediathequeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MPC\mediathequeBundle\Entity\Reservation;
use MPC\mediathequeBundle\Entity\Emprunt;

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

        $ouvrages = $em->getRepository('MPCmediathequeBundle:Ouvrage')->findBy([], ['date' => 'DESC']);

        return $this->render('MPCmediathequeBundle:Default:catalogue.html.twig', array(
                    'ouvrages' => $ouvrages,));
    }
    
    /**Méthodes pour les réservations**/

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

        return $this->render('MPCmediathequeBundle:Default:listeResa.html.twig', array( 'listeResa' => $listResa,));            
    }
   
    public function userListresaAction() {
        $em = $this->getDoctrine()->getManager();

        $User = $this->getUser();
        $reservations = $em->getRepository('MPCmediathequeBundle:Reservation')->findByUtilisateur($this->getUser());
        
        
        return $this->render('MPCmediathequeBundle:Default:userListResa.html.twig', array('reservation' => $reservations, 'User' => $User));
    }
    
    
    /**Méthodes pour les emprunts**/
    
    
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
        
        return $this->render('MPCmediathequeBundle:Default:confirm_emprunt.html.twig', array('emprunt' => $emprunt, 'retour' =>$retour));
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
    
    public function EventAction() {
        return $this->render('MPCmediathequeBundle:Default:index.html.twig');       
    }
    
    public function phantomAction() {
        $em = $this->getDoctrine()->getManager();

        $evenements = $em->getRepository('MPCmediathequeBundle:Evenements')->findAll();

        return $this->render('MPCmediathequeBundle:Default:phantom.html.twig', array( 'evenements' => $evenements,));     
    }
    
    }
