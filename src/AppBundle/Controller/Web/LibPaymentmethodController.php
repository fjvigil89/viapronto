<?php

namespace AppBundle\Controller\Web;

use AppBundle\Entity\LibPaymentmethod;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Libpaymentmethod controller.
 *
 * @Route("libpaymentmethod")
 */
class LibPaymentmethodController extends Controller
{
    /**
     * Lists all libPaymentmethod entities.
     *
     * @Route("/", name="libpaymentmethod_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $libPaymentmethods = $em->getRepository('AppBundle:LibPaymentmethod')->findAll();

        return $this->render('libpaymentmethod/index.html.twig', array(
            'libPaymentmethods' => $libPaymentmethods,
        ));
    }

    /**
     * Creates a new libPaymentmethod entity.
     *
     * @Route("/new", name="libpaymentmethod_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $libPaymentmethod = new Libpaymentmethod();
        $form = $this->createForm('AppBundle\Form\LibPaymentmethodType', $libPaymentmethod);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($libPaymentmethod);
            $em->flush();

            return $this->redirectToRoute('libpaymentmethod_show', array('paymentmethodid' => $libPaymentmethod->getPaymentmethodid()));
        }

        return $this->render('libpaymentmethod/new.html.twig', array(
            'libPaymentmethod' => $libPaymentmethod,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a libPaymentmethod entity.
     *
     * @Route("/{paymentmethodid}", name="libpaymentmethod_show")
     * @Method("GET")
     */
    public function showAction(LibPaymentmethod $libPaymentmethod)
    {
        $deleteForm = $this->createDeleteForm($libPaymentmethod);

        return $this->render('libpaymentmethod/show.html.twig', array(
            'libPaymentmethod' => $libPaymentmethod,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing libPaymentmethod entity.
     *
     * @Route("/{paymentmethodid}/edit", name="libpaymentmethod_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LibPaymentmethod $libPaymentmethod)
    {
        $deleteForm = $this->createDeleteForm($libPaymentmethod);
        $editForm = $this->createForm('AppBundle\Form\LibPaymentmethodType', $libPaymentmethod);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('libpaymentmethod_edit', array('paymentmethodid' => $libPaymentmethod->getPaymentmethodid()));
        }

        return $this->render('libpaymentmethod/edit.html.twig', array(
            'libPaymentmethod' => $libPaymentmethod,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a libPaymentmethod entity.
     *
     * @Route("/{paymentmethodid}", name="libpaymentmethod_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LibPaymentmethod $libPaymentmethod)
    {
        $form = $this->createDeleteForm($libPaymentmethod);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($libPaymentmethod);
            $em->flush();
        }

        return $this->redirectToRoute('libpaymentmethod_index');
    }

    /**
     * Creates a form to delete a libPaymentmethod entity.
     *
     * @param LibPaymentmethod $libPaymentmethod The libPaymentmethod entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LibPaymentmethod $libPaymentmethod)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('libpaymentmethod_delete', array('paymentmethodid' => $libPaymentmethod->getPaymentmethodid())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
