<?php

namespace AppBundle\Controller\Web;

use AppBundle\Entity\LibProvince;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Libprovince controller.
 *
 * @Route("libprovince")
 */
class LibProvinceController extends Controller
{
    /**
     * Lists all libProvince entities.
     *
     * @Route("/", name="libprovince_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $libProvinces = $em->getRepository('AppBundle:LibProvince')->findAll();

        return $this->render('libprovince/index.html.twig', array(
            'libProvinces' => $libProvinces,
        ));
    }

    /**
     * Creates a new libProvince entity.
     *
     * @Route("/new", name="libprovince_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $libProvince = new Libprovince();
        $form = $this->createForm('AppBundle\Form\LibProvinceType', $libProvince);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($libProvince);
            $em->flush();

            return $this->redirectToRoute('libprovince_show', array('provinceid' => $libProvince->getProvinceid()));
        }

        return $this->render('libprovince/new.html.twig', array(
            'libProvince' => $libProvince,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a libProvince entity.
     *
     * @Route("/{provinceid}", name="libprovince_show")
     * @Method("GET")
     */
    public function showAction(LibProvince $libProvince)
    {
        $deleteForm = $this->createDeleteForm($libProvince);

        return $this->render('libprovince/show.html.twig', array(
            'libProvince' => $libProvince,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing libProvince entity.
     *
     * @Route("/{provinceid}/edit", name="libprovince_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LibProvince $libProvince)
    {
        $deleteForm = $this->createDeleteForm($libProvince);
        $editForm = $this->createForm('AppBundle\Form\LibProvinceType', $libProvince);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('libprovince_edit', array('provinceid' => $libProvince->getProvinceid()));
        }

        return $this->render('libprovince/edit.html.twig', array(
            'libProvince' => $libProvince,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a libProvince entity.
     *
     * @Route("/{provinceid}", name="libprovince_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LibProvince $libProvince)
    {
        $form = $this->createDeleteForm($libProvince);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($libProvince);
            $em->flush();
        }

        return $this->redirectToRoute('libprovince_index');
    }

    /**
     * Creates a form to delete a libProvince entity.
     *
     * @param LibProvince $libProvince The libProvince entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LibProvince $libProvince)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('libprovince_delete', array('provinceid' => $libProvince->getProvinceid())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
