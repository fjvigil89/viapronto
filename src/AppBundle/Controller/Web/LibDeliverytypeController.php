<?php

namespace AppBundle\Controller\Web;

use AppBundle\Entity\LibDeliverytype;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Libdeliverytype controller.
 *
 * @Route("libdeliverytype")
 */
class LibDeliverytypeController extends Controller
{
    /**
     * Lists all libDeliverytype entities.
     *
     * @Route("/", name="libdeliverytype_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $libDeliverytypes = $em->getRepository('AppBundle:LibDeliverytype')->findAll();

        return $this->render('libdeliverytype/index.html.twig', array(
            'libDeliverytypes' => $libDeliverytypes,
        ));
    }

    /**
     * Creates a new libDeliverytype entity.
     *
     * @Route("/new", name="libdeliverytype_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $libDeliverytype = new Libdeliverytype();
        $form = $this->createForm('AppBundle\Form\LibDeliverytypeType', $libDeliverytype);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($libDeliverytype);
            $em->flush();

            return $this->redirectToRoute('libdeliverytype_show', array('deliverytypeid' => $libDeliverytype->getDeliverytypeid()));
        }

        return $this->render('libdeliverytype/new.html.twig', array(
            'libDeliverytype' => $libDeliverytype,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a libDeliverytype entity.
     *
     * @Route("/{deliverytypeid}", name="libdeliverytype_show")
     * @Method("GET")
     */
    public function showAction(LibDeliverytype $libDeliverytype)
    {
        $deleteForm = $this->createDeleteForm($libDeliverytype);

        return $this->render('libdeliverytype/show.html.twig', array(
            'libDeliverytype' => $libDeliverytype,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing libDeliverytype entity.
     *
     * @Route("/{deliverytypeid}/edit", name="libdeliverytype_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LibDeliverytype $libDeliverytype)
    {
        $deleteForm = $this->createDeleteForm($libDeliverytype);
        $editForm = $this->createForm('AppBundle\Form\LibDeliverytypeType', $libDeliverytype);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('libdeliverytype_edit', array('deliverytypeid' => $libDeliverytype->getDeliverytypeid()));
        }

        return $this->render('libdeliverytype/edit.html.twig', array(
            'libDeliverytype' => $libDeliverytype,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a libDeliverytype entity.
     *
     * @Route("/{deliverytypeid}", name="libdeliverytype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LibDeliverytype $libDeliverytype)
    {
        $form = $this->createDeleteForm($libDeliverytype);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($libDeliverytype);
            $em->flush();
        }

        return $this->redirectToRoute('libdeliverytype_index');
    }

    /**
     * Creates a form to delete a libDeliverytype entity.
     *
     * @param LibDeliverytype $libDeliverytype The libDeliverytype entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LibDeliverytype $libDeliverytype)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('libdeliverytype_delete', array('deliverytypeid' => $libDeliverytype->getDeliverytypeid())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
