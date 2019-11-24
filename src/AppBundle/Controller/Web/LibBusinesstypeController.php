<?php

namespace AppBundle\Controller\Web;

use AppBundle\Entity\LibBusinesstype;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Libbusinesstype controller.
 *
 * @Route("libbusinesstype")
 */
class LibBusinesstypeController extends Controller
{
    /**
     * Lists all libBusinesstype entities.
     *
     * @Route("/", name="libbusinesstype_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $libBusinesstypes = $em->getRepository('AppBundle:LibBusinesstype')->findAll();

        return $this->render('libbusinesstype/index.html.twig', array(
            'libBusinesstypes' => $libBusinesstypes,
        ));
    }

    /**
     * Creates a new libBusinesstype entity.
     *
     * @Route("/new", name="libbusinesstype_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $libBusinesstype = new Libbusinesstype();
        $form = $this->createForm('AppBundle\Form\LibBusinesstypeType', $libBusinesstype);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($libBusinesstype);
            $em->flush();

            return $this->redirectToRoute('libbusinesstype_show', array('businesstypeid' => $libBusinesstype->getBusinesstypeid()));
        }

        return $this->render('libbusinesstype/new.html.twig', array(
            'libBusinesstype' => $libBusinesstype,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a libBusinesstype entity.
     *
     * @Route("/{businesstypeid}", name="libbusinesstype_show")
     * @Method("GET")
     */
    public function showAction(LibBusinesstype $libBusinesstype)
    {
        $deleteForm = $this->createDeleteForm($libBusinesstype);

        return $this->render('libbusinesstype/show.html.twig', array(
            'libBusinesstype' => $libBusinesstype,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing libBusinesstype entity.
     *
     * @Route("/{businesstypeid}/edit", name="libbusinesstype_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LibBusinesstype $libBusinesstype)
    {
        $deleteForm = $this->createDeleteForm($libBusinesstype);
        $editForm = $this->createForm('AppBundle\Form\LibBusinesstypeType', $libBusinesstype);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('libbusinesstype_edit', array('businesstypeid' => $libBusinesstype->getBusinesstypeid()));
        }

        return $this->render('libbusinesstype/edit.html.twig', array(
            'libBusinesstype' => $libBusinesstype,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a libBusinesstype entity.
     *
     * @Route("/{businesstypeid}", name="libbusinesstype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LibBusinesstype $libBusinesstype)
    {
        $form = $this->createDeleteForm($libBusinesstype);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($libBusinesstype);
            $em->flush();
        }

        return $this->redirectToRoute('libbusinesstype_index');
    }

    /**
     * Creates a form to delete a libBusinesstype entity.
     *
     * @param LibBusinesstype $libBusinesstype The libBusinesstype entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LibBusinesstype $libBusinesstype)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('libbusinesstype_delete', array('businesstypeid' => $libBusinesstype->getBusinesstypeid())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
