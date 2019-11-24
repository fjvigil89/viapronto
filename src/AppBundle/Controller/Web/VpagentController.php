<?php

namespace AppBundle\Controller\Web;

use AppBundle\Entity\Vpagent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Vpagent controller.
 *
 * @Route("vpagent")
 */
class VpagentController extends Controller
{
    /**
     * Lists all vpagent entities.
     *
     * @Route("/", name="vpagent_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vpagents = $em->getRepository('AppBundle:Vpagent')->findAll();

        return $this->render('vpagent/index.html.twig', array(
            'vpagents' => $vpagents,
        ));
    }

    /**
     * Creates a new vpagent entity.
     *
     * @Route("/new", name="vpagent_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vpagent = new Vpagent();
        $form = $this->createForm('AppBundle\Form\VpagentType', $vpagent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vpagent);
            $em->flush();

            return $this->redirectToRoute('vpagent_show', array('vpagentid' => $vpagent->getVpagentid()));
        }

        return $this->render('vpagent/new.html.twig', array(
            'vpagent' => $vpagent,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vpagent entity.
     *
     * @Route("/{vpagentid}", name="vpagent_show")
     * @Method("GET")
     */
    public function showAction(Vpagent $vpagent)
    {
        $deleteForm = $this->createDeleteForm($vpagent);

        return $this->render('vpagent/show.html.twig', array(
            'vpagent' => $vpagent,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vpagent entity.
     *
     * @Route("/{vpagentid}/edit", name="vpagent_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Vpagent $vpagent)
    {
        $deleteForm = $this->createDeleteForm($vpagent);
        $editForm = $this->createForm('AppBundle\Form\VpagentType', $vpagent);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vpagent_edit', array('vpagentid' => $vpagent->getVpagentid()));
        }

        return $this->render('vpagent/edit.html.twig', array(
            'vpagent' => $vpagent,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vpagent entity.
     *
     * @Route("/{vpagentid}", name="vpagent_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Vpagent $vpagent)
    {
        $form = $this->createDeleteForm($vpagent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vpagent);
            $em->flush();
        }

        return $this->redirectToRoute('vpagent_index');
    }

    /**
     * Creates a form to delete a vpagent entity.
     *
     * @param Vpagent $vpagent The vpagent entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Vpagent $vpagent)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vpagent_delete', array('vpagentid' => $vpagent->getVpagentid())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
