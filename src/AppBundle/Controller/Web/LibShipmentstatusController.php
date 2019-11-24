<?php

namespace AppBundle\Controller\Web;

use AppBundle\Entity\LibShipmentstatus;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Libshipmentstatus controller.
 *
 * @Route("libshipmentstatus")
 */
class LibShipmentstatusController extends Controller
{
    /**
     * Lists all libShipmentstatus entities.
     *
     * @Route("/", name="libshipmentstatus_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $libShipmentstatuses = $em->getRepository('AppBundle:LibShipmentstatus')->findAll();

        return $this->render('libshipmentstatus/index.html.twig', array(
            'libShipmentstatuses' => $libShipmentstatuses,
        ));
    }

    /**
     * Creates a new libShipmentstatus entity.
     *
     * @Route("/new", name="libshipmentstatus_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $libShipmentstatus = new Libshipmentstatus();
        $form = $this->createForm('AppBundle\Form\LibShipmentstatusType', $libShipmentstatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($libShipmentstatus);
            $em->flush();

            return $this->redirectToRoute('libshipmentstatus_show', array('shipmentstatusid' => $libShipmentstatus->getShipmentstatusid()));
        }

        return $this->render('libshipmentstatus/new.html.twig', array(
            'libShipmentstatus' => $libShipmentstatus,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a libShipmentstatus entity.
     *
     * @Route("/{shipmentstatusid}", name="libshipmentstatus_show")
     * @Method("GET")
     */
    public function showAction(LibShipmentstatus $libShipmentstatus)
    {
        $deleteForm = $this->createDeleteForm($libShipmentstatus);

        return $this->render('libshipmentstatus/show.html.twig', array(
            'libShipmentstatus' => $libShipmentstatus,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing libShipmentstatus entity.
     *
     * @Route("/{shipmentstatusid}/edit", name="libshipmentstatus_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LibShipmentstatus $libShipmentstatus)
    {
        $deleteForm = $this->createDeleteForm($libShipmentstatus);
        $editForm = $this->createForm('AppBundle\Form\LibShipmentstatusType', $libShipmentstatus);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('libshipmentstatus_edit', array('shipmentstatusid' => $libShipmentstatus->getShipmentstatusid()));
        }

        return $this->render('libshipmentstatus/edit.html.twig', array(
            'libShipmentstatus' => $libShipmentstatus,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a libShipmentstatus entity.
     *
     * @Route("/{shipmentstatusid}", name="libshipmentstatus_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LibShipmentstatus $libShipmentstatus)
    {
        $form = $this->createDeleteForm($libShipmentstatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($libShipmentstatus);
            $em->flush();
        }

        return $this->redirectToRoute('libshipmentstatus_index');
    }

    /**
     * Creates a form to delete a libShipmentstatus entity.
     *
     * @param LibShipmentstatus $libShipmentstatus The libShipmentstatus entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LibShipmentstatus $libShipmentstatus)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('libshipmentstatus_delete', array('shipmentstatusid' => $libShipmentstatus->getShipmentstatusid())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
