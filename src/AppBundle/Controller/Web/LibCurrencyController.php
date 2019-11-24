<?php

namespace AppBundle\Controller\Web;

use AppBundle\Entity\LibCurrency;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Libcurrency controller.
 *
 * @Route("libcurrency")
 */
class LibCurrencyController extends Controller
{
    /**
     * Lists all libCurrency entities.
     *
     * @Route("/", name="libcurrency_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $libCurrencies = $em->getRepository('AppBundle:LibCurrency')->findAll();

        return $this->render('libcurrency/index.html.twig', array(
            'libCurrencies' => $libCurrencies,
        ));
    }

    /**
     * Creates a new libCurrency entity.
     *
     * @Route("/new", name="libcurrency_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $libCurrency = new Libcurrency();
        $form = $this->createForm('AppBundle\Form\LibCurrencyType', $libCurrency);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($libCurrency);
            $em->flush();

            return $this->redirectToRoute('libcurrency_show', array('currencyid' => $libCurrency->getCurrencyid()));
        }

        return $this->render('libcurrency/new.html.twig', array(
            'libCurrency' => $libCurrency,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a libCurrency entity.
     *
     * @Route("/{currencyid}", name="libcurrency_show")
     * @Method("GET")
     */
    public function showAction(LibCurrency $libCurrency)
    {
        $deleteForm = $this->createDeleteForm($libCurrency);

        return $this->render('libcurrency/show.html.twig', array(
            'libCurrency' => $libCurrency,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing libCurrency entity.
     *
     * @Route("/{currencyid}/edit", name="libcurrency_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LibCurrency $libCurrency)
    {
        $deleteForm = $this->createDeleteForm($libCurrency);
        $editForm = $this->createForm('AppBundle\Form\LibCurrencyType', $libCurrency);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('libcurrency_edit', array('currencyid' => $libCurrency->getCurrencyid()));
        }

        return $this->render('libcurrency/edit.html.twig', array(
            'libCurrency' => $libCurrency,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a libCurrency entity.
     *
     * @Route("/{currencyid}", name="libcurrency_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LibCurrency $libCurrency)
    {
        $form = $this->createDeleteForm($libCurrency);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($libCurrency);
            $em->flush();
        }

        return $this->redirectToRoute('libcurrency_index');
    }

    /**
     * Creates a form to delete a libCurrency entity.
     *
     * @param LibCurrency $libCurrency The libCurrency entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LibCurrency $libCurrency)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('libcurrency_delete', array('currencyid' => $libCurrency->getCurrencyid())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
