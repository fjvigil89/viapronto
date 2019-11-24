<?php

namespace AppBundle\Controller\Web;

use AppBundle\Entity\LibItemcategory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Libitemcategory controller.
 *
 * @Route("libitemcategory")
 */
class LibItemcategoryController extends Controller
{
    /**
     * Lists all libItemcategory entities.
     *
     * @Route("/", name="libitemcategory_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $libItemcategories = $em->getRepository('AppBundle:LibItemcategory')->findAll();

        return $this->render('libitemcategory/index.html.twig', array(
            'libItemcategories' => $libItemcategories,
        ));
    }

    /**
     * Creates a new libItemcategory entity.
     *
     * @Route("/new", name="libitemcategory_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $libItemcategory = new Libitemcategory();
        $form = $this->createForm('AppBundle\Form\LibItemcategoryType', $libItemcategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($libItemcategory);
            $em->flush();

            return $this->redirectToRoute('libitemcategory_show', array('itemcategoryid' => $libItemcategory->getItemcategoryid()));
        }

        return $this->render('libitemcategory/new.html.twig', array(
            'libItemcategory' => $libItemcategory,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a libItemcategory entity.
     *
     * @Route("/{itemcategoryid}", name="libitemcategory_show")
     * @Method("GET")
     */
    public function showAction(LibItemcategory $libItemcategory)
    {
        $deleteForm = $this->createDeleteForm($libItemcategory);

        return $this->render('libitemcategory/show.html.twig', array(
            'libItemcategory' => $libItemcategory,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing libItemcategory entity.
     *
     * @Route("/{itemcategoryid}/edit", name="libitemcategory_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LibItemcategory $libItemcategory)
    {
        $deleteForm = $this->createDeleteForm($libItemcategory);
        $editForm = $this->createForm('AppBundle\Form\LibItemcategoryType', $libItemcategory);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('libitemcategory_edit', array('itemcategoryid' => $libItemcategory->getItemcategoryid()));
        }

        return $this->render('libitemcategory/edit.html.twig', array(
            'libItemcategory' => $libItemcategory,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a libItemcategory entity.
     *
     * @Route("/{itemcategoryid}", name="libitemcategory_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LibItemcategory $libItemcategory)
    {
        $form = $this->createDeleteForm($libItemcategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($libItemcategory);
            $em->flush();
        }

        return $this->redirectToRoute('libitemcategory_index');
    }

    /**
     * Creates a form to delete a libItemcategory entity.
     *
     * @param LibItemcategory $libItemcategory The libItemcategory entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LibItemcategory $libItemcategory)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('libitemcategory_delete', array('itemcategoryid' => $libItemcategory->getItemcategoryid())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
