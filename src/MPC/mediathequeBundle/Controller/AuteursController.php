<?php

namespace MPC\mediathequeBundle\Controller;

use MPC\mediathequeBundle\Entity\Auteurs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Auteur controller.
 *
 */
class AuteursController extends Controller
{
    /**
     * Lists all auteur entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $auteurs = $em->getRepository('MPCmediathequeBundle:Auteurs')->findAll();

        return $this->render('auteurs/index.html.twig', array(
            'auteurs' => $auteurs,
        ));
    }

    /**
     * Creates a new auteur entity.
     *
     */
    public function newAction(Request $request)
    {
        $auteur = new Auteur();
        $form = $this->createForm('MPC\mediathequeBundle\Form\AuteursType', $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($auteur);
            $em->flush($auteur);

            return $this->redirectToRoute('auteurs_show', array('id' => $auteur->getId()));
        }

        return $this->render('auteurs/new.html.twig', array(
            'auteur' => $auteur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a auteur entity.
     *
     */
    public function showAction(Auteurs $auteur)
    {
        $deleteForm = $this->createDeleteForm($auteur);

        return $this->render('auteurs/show.html.twig', array(
            'auteur' => $auteur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing auteur entity.
     *
     */
    public function editAction(Request $request, Auteurs $auteur)
    {
        $deleteForm = $this->createDeleteForm($auteur);
        $editForm = $this->createForm('MPC\mediathequeBundle\Form\AuteursType', $auteur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('auteurs_edit', array('id' => $auteur->getId()));
        }

        return $this->render('auteurs/edit.html.twig', array(
            'auteur' => $auteur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a auteur entity.
     *
     */
    public function deleteAction(Request $request, Auteurs $auteur)
    {
        $form = $this->createDeleteForm($auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($auteur);
            $em->flush($auteur);
        }

        return $this->redirectToRoute('auteurs_index');
    }

    /**
     * Creates a form to delete a auteur entity.
     *
     * @param Auteurs $auteur The auteur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Auteurs $auteur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('auteurs_delete', array('id' => $auteur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
