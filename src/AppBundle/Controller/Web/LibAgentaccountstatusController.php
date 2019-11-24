<?php

namespace AppBundle\Controller\Web;

use AppBundle\Entity\LibAgentaccountstatus;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Libagentaccountstatus controller.
 *
 * @Route("libagentaccountstatus")
 */
class LibAgentaccountstatusController extends Controller
{
    /**
     * Lists all libAgentaccountstatus entities.
     *
     * @Route("/", name="libagentaccountstatus_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $libAgentaccountstatuses = $em->getRepository('AppBundle:LibAgentaccountstatus')->findAll();

        return $this->render('libagentaccountstatus/index.html.twig', array(
            'libAgentaccountstatuses' => $libAgentaccountstatuses,
        ));
    }

    /**
     * Creates a new libAgentaccountstatus entity.
     *
     * @Route("/new", name="libagentaccountstatus_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $libAgentaccountstatus = new Libagentaccountstatus();
        $form = $this->createForm('AppBundle\Form\LibAgentaccountstatusType', $libAgentaccountstatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($libAgentaccountstatus);
            $em->flush();

            return $this->redirectToRoute('libagentaccountstatus_show', array('accountstatusid' => $libAgentaccountstatus->getAccountstatusid()));
        }

        return $this->render('libagentaccountstatus/new.html.twig', array(
            'libAgentaccountstatus' => $libAgentaccountstatus,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a libAgentaccountstatus entity.
     *
     * @Route("/{accountstatusid}", name="libagentaccountstatus_show")
     * @Method("GET")
     */
    public function showAction(LibAgentaccountstatus $libAgentaccountstatus)
    {
        $deleteForm = $this->createDeleteForm($libAgentaccountstatus);

        return $this->render('libagentaccountstatus/show.html.twig', array(
            'libAgentaccountstatus' => $libAgentaccountstatus,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing libAgentaccountstatus entity.
     *
     * @Route("/{accountstatusid}/edit", name="libagentaccountstatus_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LibAgentaccountstatus $libAgentaccountstatus)
    {
        $deleteForm = $this->createDeleteForm($libAgentaccountstatus);
        $editForm = $this->createForm('AppBundle\Form\LibAgentaccountstatusType', $libAgentaccountstatus);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('libagentaccountstatus_edit', array('accountstatusid' => $libAgentaccountstatus->getAccountstatusid()));
        }

        return $this->render('libagentaccountstatus/edit.html.twig', array(
            'libAgentaccountstatus' => $libAgentaccountstatus,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a libAgentaccountstatus entity.
     *
     * @Route("/{accountstatusid}", name="libagentaccountstatus_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LibAgentaccountstatus $libAgentaccountstatus)
    {
        $form = $this->createDeleteForm($libAgentaccountstatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($libAgentaccountstatus);
            $em->flush();
        }

        return $this->redirectToRoute('libagentaccountstatus_index');
    }

    /**
     * Creates a form to delete a libAgentaccountstatus entity.
     *
     * @param LibAgentaccountstatus $libAgentaccountstatus The libAgentaccountstatus entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LibAgentaccountstatus $libAgentaccountstatus)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('libagentaccountstatus_delete', array('accountstatusid' => $libAgentaccountstatus->getAccountstatusid())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
