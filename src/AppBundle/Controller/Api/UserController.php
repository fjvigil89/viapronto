<?php
/**
 * Created by PhpStorm.
 * User: jrhod
 * Date: 2017-11-15
 * Time: 8:12 PM
 */

namespace AppBundle\Controller\Api;


use AppBundle\Controller\BaseController;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends BaseController
{
    /**
     * @Route("/api/users")
     * @Method("POST")
     * @param Request $request
     * @return Response
     */
    public function newAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class,$user);
        $this->processForm($request, $form);

        if(!$form->isValid())
        {
            return $this->createValidationErrorResponse($form);
        }


        //--SET USER PENDING BY DEFAULT
        $repository = $this->getDoctrine()->getRepository('AppBundle:LibAccountstatus');
        $accountStatus = $repository->findOneByStatus("Pending");
        $user->setAccountstatus($accountStatus);

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        $userUrl = $this->generateUrl('rte_api_users_show', ['id' => $user->getUserid()]);

        $response = $this->createApiResponse($user, 201);
        $response->headers->set('Location',$userUrl );

        return $response;
    }

    /**
     * @Route("/api/users/{id}")
     * @Method("PUT")
     */
    public function updateAction($id,Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:User');
        $user = $repository->find($id);

        if (!$user) {
            throw $this->createNotFoundException(sprintf(
                'No user found with id "%s"',
                $id
            ));
        }

        $form = $this->createForm(UserType::class,$user);
        $this->processForm($request, $form);

        if(!$form->isValid())
        {
            return $this->createValidationErrorResponse($form);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        $response = $this->createApiResponse($user, 200);
        return $response;
    }

    /**
     * @Route("api/users/{id}", name="rte_api_users_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:User');
        $user = $repository->find($id);

        $response = $this->createApiResponse($user, 200);
        return $response;
    }

    /**
     * @Route("/api/users")
     * @Method("GET")
     */
    public function listAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:User');
        $users = $repository->findAll();

        $response = $this->createApiResponse(['users' => $users], 200);
        return $response;
    }

    /**
     * @Route("/api/users/{id}")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Users');
        $user = $repository->find($id);

       if($user)
       {
           $em = $this->getDoctrine()->getManager();
           $em->remove($user);
           $em->flush();
       }

        $response = $this->createApiResponse(null, 204);
        return $response;
    }
}