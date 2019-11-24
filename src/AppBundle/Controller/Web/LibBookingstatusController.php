<?php

namespace AppBundle\Controller\Web;

use AppBundle\Entity\LibBookingstatus;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Libbookingstatus controller.
 *
 * @Route("libbookingstatus")
 */
class LibBookingstatusController extends Controller
{
    /**
     * Lists all libBookingstatus entities.
     *
     * @Route("/", name="libbookingstatus_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $libBookingstatuses = $em->getRepository('AppBundle:LibBookingstatus')->findAll();

        return $this->render('libbookingstatus/index.html.twig', array(
            'libBookingstatuses' => $libBookingstatuses,
        ));
    }

    /**
     * Creates a new libBookingstatus entity.
     *
     * @Route("/new", name="libbookingstatus_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $libBookingstatus = new Libbookingstatus();
        $form = $this->createForm('AppBundle\Form\LibBookingstatusType', $libBookingstatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($libBookingstatus);
            $em->flush();

            return $this->redirectToRoute('libbookingstatus_show', array('bookingstatusid' => $libBookingstatus->getBookingstatusid()));
        }

        return $this->render('libbookingstatus/new.html.twig', array(
            'libBookingstatus' => $libBookingstatus,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a libBookingstatus entity.
     *
     * @Route("/{bookingstatusid}", name="libbookingstatus_show")
     * @Method("GET")
     */
    public function showAction(LibBookingstatus $libBookingstatus)
    {
        $deleteForm = $this->createDeleteForm($libBookingstatus);

        return $this->render('libbookingstatus/show.html.twig', array(
            'libBookingstatus' => $libBookingstatus,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing libBookingstatus entity.
     *
     * @Route("/{bookingstatusid}/edit", name="libbookingstatus_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LibBookingstatus $libBookingstatus)
    {
        $deleteForm = $this->createDeleteForm($libBookingstatus);
        $editForm = $this->createForm('AppBundle\Form\LibBookingstatusType', $libBookingstatus);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('libbookingstatus_edit', array('bookingstatusid' => $libBookingstatus->getBookingstatusid()));
        }

        return $this->render('libbookingstatus/edit.html.twig', array(
            'libBookingstatus' => $libBookingstatus,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a libBookingstatus entity.
     *
     * @Route("/{bookingstatusid}", name="libbookingstatus_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LibBookingstatus $libBookingstatus)
    {
        $form = $this->createDeleteForm($libBookingstatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($libBookingstatus);
            $em->flush();
        }

        return $this->redirectToRoute('libbookingstatus_index');
    }

    /**
     * Creates a form to delete a libBookingstatus entity.
     *
     * @param LibBookingstatus $libBookingstatus The libBookingstatus entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LibBookingstatus $libBookingstatus)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('libbookingstatus_delete', array('bookingstatusid' => $libBookingstatus->getBookingstatusid())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
