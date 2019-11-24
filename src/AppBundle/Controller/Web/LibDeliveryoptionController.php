<?php

namespace AppBundle\Controller\Web;

use AppBundle\Entity\LibDeliveryoption;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Libdeliveryoption controller.
 *
 * @Route("libdeliveryoption")
 */
class LibDeliveryoptionController extends Controller
{
    /**
     * Lists all libDeliveryoption entities.
     *
     * @Route("/", name="libdeliveryoption_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $libDeliveryoptions = $em->getRepository('AppBundle:LibDeliveryoption')->findAll();

        return $this->render('libdeliveryoption/index.html.twig', array(
            'libDeliveryoptions' => $libDeliveryoptions,
        ));
    }

    /**
     * Creates a new libDeliveryoption entity.
     *
     * @Route("/new", name="libdeliveryoption_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $libDeliveryoption = new Libdeliveryoption();
        $form = $this->createForm('AppBundle\Form\LibDeliveryoptionType', $libDeliveryoption);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($libDeliveryoption);
            $em->flush();

            return $this->redirectToRoute('libdeliveryoption_show', array('deliveryoptionid' => $libDeliveryoption->getDeliveryoptionid()));
        }

        return $this->render('libdeliveryoption/new.html.twig', array(
            'libDeliveryoption' => $libDeliveryoption,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a libDeliveryoption entity.
     *
     * @Route("/{deliveryoptionid}", name="libdeliveryoption_show")
     * @Method("GET")
     */
    public function showAction(LibDeliveryoption $libDeliveryoption)
    {
        $deleteForm = $this->createDeleteForm($libDeliveryoption);

        return $this->render('libdeliveryoption/show.html.twig', array(
            'libDeliveryoption' => $libDeliveryoption,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing libDeliveryoption entity.
     *
     * @Route("/{deliveryoptionid}/edit", name="libdeliveryoption_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LibDeliveryoption $libDeliveryoption)
    {
        $deleteForm = $this->createDeleteForm($libDeliveryoption);
        $editForm = $this->createForm('AppBundle\Form\LibDeliveryoptionType', $libDeliveryoption);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('libdeliveryoption_edit', array('deliveryoptionid' => $libDeliveryoption->getDeliveryoptionid()));
        }

        return $this->render('libdeliveryoption/edit.html.twig', array(
            'libDeliveryoption' => $libDeliveryoption,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a libDeliveryoption entity.
     *
     * @Route("/{deliveryoptionid}", name="libdeliveryoption_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LibDeliveryoption $libDeliveryoption)
    {
        $form = $this->createDeleteForm($libDeliveryoption);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($libDeliveryoption);
            $em->flush();
        }

        return $this->redirectToRoute('libdeliveryoption_index');
    }

    /**
     * Creates a form to delete a libDeliveryoption entity.
     *
     * @param LibDeliveryoption $libDeliveryoption The libDeliveryoption entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LibDeliveryoption $libDeliveryoption)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('libdeliveryoption_delete', array('deliveryoptionid' => $libDeliveryoption->getDeliveryoptionid())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
