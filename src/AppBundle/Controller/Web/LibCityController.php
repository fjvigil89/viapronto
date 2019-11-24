<?php

namespace AppBundle\Controller\Web;

use AppBundle\Entity\LibCity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Libcity controller.
 *
 * @Route("libcity")
 */
class LibCityController extends Controller
{
    /**
     * Lists all libCity entities.
     *
     * @Route("/", name="libcity_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $libCities = $em->getRepository('AppBundle:LibCity')->findAll();

        return $this->render('libcity/index.html.twig', array(
            'libCities' => $libCities,
        ));
    }

    /**
     * Creates a new libCity entity.
     *
     * @Route("/new", name="libcity_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $libCity = new Libcity();
        $form = $this->createForm('AppBundle\Form\LibCityType', $libCity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($libCity);
            $em->flush();

            return $this->redirectToRoute('libcity_show', array('cityid' => $libCity->getCityid()));
        }

        return $this->render('libcity/new.html.twig', array(
            'libCity' => $libCity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a libCity entity.
     *
     * @Route("/{cityid}", name="libcity_show")
     * @Method("GET")
     */
    public function showAction(LibCity $libCity)
    {
        $deleteForm = $this->createDeleteForm($libCity);

        return $this->render('libcity/show.html.twig', array(
            'libCity' => $libCity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing libCity entity.
     *
     * @Route("/{cityid}/edit", name="libcity_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LibCity $libCity)
    {
        $deleteForm = $this->createDeleteForm($libCity);
        $editForm = $this->createForm('AppBundle\Form\LibCityType', $libCity);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('libcity_edit', array('cityid' => $libCity->getCityid()));
        }

        return $this->render('libcity/edit.html.twig', array(
            'libCity' => $libCity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a libCity entity.
     *
     * @Route("/{cityid}", name="libcity_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LibCity $libCity)
    {
        $form = $this->createDeleteForm($libCity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($libCity);
            $em->flush();
        }

        return $this->redirectToRoute('libcity_index');
    }

    /**
     * Creates a form to delete a libCity entity.
     *
     * @param LibCity $libCity The libCity entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LibCity $libCity)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('libcity_delete', array('cityid' => $libCity->getCityid())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
