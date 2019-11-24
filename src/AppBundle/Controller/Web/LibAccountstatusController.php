<?php

namespace AppBundle\Controller\Web;

use AppBundle\Entity\LibAccountstatus;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Libaccountstatus controller.
 *
 * @Route("libaccountstatus")
 */
class LibAccountstatusController extends Controller
{
    /**
     * Lists all libAccountstatus entities.
     *
     * @Route("/", name="libaccountstatus_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $libAccountstatuses = $em->getRepository('AppBundle:LibAccountstatus')->findAll();

        return $this->render('libaccountstatus/index.html.twig', array(
            'libAccountstatuses' => $libAccountstatuses,
        ));
    }

    /**
     * Creates a new libAccountstatus entity.
     *
     * @Route("/new", name="libaccountstatus_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $libAccountstatus = new Libaccountstatus();
        $form = $this->createForm('AppBundle\Form\LibAccountstatusType', $libAccountstatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($libAccountstatus);
            $em->flush();

            return $this->redirectToRoute('libaccountstatus_show', array('accountstatusid' => $libAccountstatus->getAccountstatusid()));
        }

        return $this->render('libaccountstatus/new.html.twig', array(
            'libAccountstatus' => $libAccountstatus,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a libAccountstatus entity.
     *
     * @Route("/{accountstatusid}", name="libaccountstatus_show")
     * @Method("GET")
     */
    public function showAction(LibAccountstatus $libAccountstatus)
    {
        $deleteForm = $this->createDeleteForm($libAccountstatus);

        return $this->render('libaccountstatus/show.html.twig', array(
            'libAccountstatus' => $libAccountstatus,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing libAccountstatus entity.
     *
     * @Route("/{accountstatusid}/edit", name="libaccountstatus_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LibAccountstatus $libAccountstatus)
    {
        $deleteForm = $this->createDeleteForm($libAccountstatus);
        $editForm = $this->createForm('AppBundle\Form\LibAccountstatusType', $libAccountstatus);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('libaccountstatus_edit', array('accountstatusid' => $libAccountstatus->getAccountstatusid()));
        }

        return $this->render('libaccountstatus/edit.html.twig', array(
            'libAccountstatus' => $libAccountstatus,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a libAccountstatus entity.
     *
     * @Route("/{accountstatusid}", name="libaccountstatus_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LibAccountstatus $libAccountstatus)
    {
        $form = $this->createDeleteForm($libAccountstatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($libAccountstatus);
            $em->flush();
        }

        return $this->redirectToRoute('libaccountstatus_index');
    }

    /**
     * Creates a form to delete a libAccountstatus entity.
     *
     * @param LibAccountstatus $libAccountstatus The libAccountstatus entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LibAccountstatus $libAccountstatus)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('libaccountstatus_delete', array('accountstatusid' => $libAccountstatus->getAccountstatusid())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
