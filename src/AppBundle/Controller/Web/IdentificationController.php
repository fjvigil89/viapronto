<?php

namespace AppBundle\Controller\Web;

use AppBundle\Entity\Identification;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Identification controller.
 *
 * @Route("identification")
 */
class IdentificationController extends Controller
{
    /**
     * Lists all identification entities.
     *
     * @Route("/", name="identification_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $identifications = $em->getRepository('AppBundle:Identification')->findAll();

        return $this->render('identification/index.html.twig', array(
            'identifications' => $identifications,
        ));
    }

    /**
     * Creates a new identification entity.
     *
     * @Route("/new", name="identification_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $identification = new Identification();
        $form = $this->createForm('AppBundle\Form\IdentificationType', $identification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($identification);
            $em->flush();

            return $this->redirectToRoute('identification_show', array('identificationid' => $identification->getIdentificationid()));
        }

        return $this->render('identification/new.html.twig', array(
            'identification' => $identification,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a identification entity.
     *
     * @Route("/{identificationid}", name="identification_show")
     * @Method("GET")
     */
    public function showAction(Identification $identification)
    {
        $deleteForm = $this->createDeleteForm($identification);

        return $this->render('identification/show.html.twig', array(
            'identification' => $identification,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing identification entity.
     *
     * @Route("/{identificationid}/edit", name="identification_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Identification $identification)
    {
        $deleteForm = $this->createDeleteForm($identification);
        $editForm = $this->createForm('AppBundle\Form\IdentificationType', $identification);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('identification_edit', array('identificationid' => $identification->getIdentificationid()));
        }

        return $this->render('identification/edit.html.twig', array(
            'identification' => $identification,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a identification entity.
     *
     * @Route("/{identificationid}", name="identification_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Identification $identification)
    {
        $form = $this->createDeleteForm($identification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($identification);
            $em->flush();
        }

        return $this->redirectToRoute('identification_index');
    }

    /**
     * Creates a form to delete a identification entity.
     *
     * @param Identification $identification The identification entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Identification $identification)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('identification_delete', array('identificationid' => $identification->getIdentificationid())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
