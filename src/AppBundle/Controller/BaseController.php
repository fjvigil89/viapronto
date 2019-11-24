<?php
/**
 * Created by PhpStorm.
 * User: jrhod
 * Date: 2017-11-22
 * Time: 8:40 PM
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class BaseController extends Controller
{
    protected function processForm(Request $request, FormInterface $form)
    {
        $data = json_decode($request->getContent(), true);
        $form->submit($data);
    }

    protected function serialize($data,$format="json")
    {
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);
        $jsonData = $serializer->serialize($data, $format);

        return $jsonData;
    }

    protected function createApiResponse($data, $statusCode = 200)
    {
        $json = $this->serialize($data);

        return new Response($json,$statusCode, array('Content-Type' => 'application/json'));
    }

    protected function getErrorsFromForm(FormInterface $form)
    {
        $errors = array();
        foreach ($form->getErrors() as $error) {
            $errors[] = $error->getMessage();
        }
        foreach ($form->all() as $childForm) {
            if ($childForm instanceof FormInterface) {
                if ($childErrors = $this->getErrorsFromForm($childForm)) {
                    $errors[$childForm->getName()] = $childErrors;
                }
            }
        }
        return $errors;
    }

    protected function createValidationErrorResponse(FormInterface $form)
    {
        $errors = $this->getErrorsFromForm($form);
        $data = array(
            'type' => 'validation_error',
            'title' => 'There was a validation error',
            'errors' => $errors
        );

        //return new JsonResponse($data,400);
        return $this->createApiResponse($data,400);
    }
}