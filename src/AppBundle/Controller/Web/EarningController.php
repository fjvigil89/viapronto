<?php

namespace AppBundle\Controller\Web;

use AppBundle\Entity\Earning;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Earning controller.
 *
 * @Route("earning")
 */
class EarningController extends Controller
{
    /**
     * Lists all earning entities.
     *
     * @Route("/", name="earning_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $earnings = $em->getRepository('AppBundle:Earning')->findAll();

        return $this->render('earning/index.html.twig', array(
            'earnings' => $earnings,
        ));
    }

    /**
     * Creates a new earning entity.
     *
     * @Route("/new", name="earning_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $earning = new Earning();
        $form = $this->createForm('AppBundle\Form\EarningType', $earning);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($earning);
            $em->flush();

            return $this->redirectToRoute('earning_show', array('earningid' => $earning->getEarningid()));
        }

        return $this->render('earning/new.html.twig', array(
            'earning' => $earning,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a earning entity.
     *
     * @Route("/{earningid}", name="earning_show")
     * @Method("GET")
     */
    public function showAction(Earning $earning)
    {
        $deleteForm = $this->createDeleteForm($earning);

        return $this->render('earning/show.html.twig', array(
            'earning' => $earning,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing earning entity.
     *
     * @Route("/{earningid}/edit", name="earning_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Earning $earning)
    {
        $deleteForm = $this->createDeleteForm($earning);
        $editForm = $this->createForm('AppBundle\Form\EarningType', $earning);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('earning_edit', array('earningid' => $earning->getEarningid()));
        }

        return $this->render('earning/edit.html.twig', array(
            'earning' => $earning,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a earning entity.
     *
     * @Route("/{earningid}", name="earning_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Earning $earning)
    {
        $form = $this->createDeleteForm($earning);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($earning);
            $em->flush();
        }

        return $this->redirectToRoute('earning_index');
    }

    /**
     * Creates a form to delete a earning entity.
     *
     * @param Earning $earning The earning entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Earning $earning)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('earning_delete', array('earningid' => $earning->getEarningid())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
