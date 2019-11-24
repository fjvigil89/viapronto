<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 24/11/2017
 * Time: 04:51
 */

// src/AppBundle/Controller/RegistrationController.php
namespace AppBundle\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Form\UserType;
use AppBundle\Form\RegisterType;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="user_registration")
     */
    public function registerAction(Request $request)
    {
        // 1) Construimos el formulario
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);

        // 2) Manejamos el envío (sólo pasará con POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // 3) Codificamos el password (también se puede hacer a través de un Doctrine listener)
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, "lalalala");
            $user->setPassword($password);
            $user->setUsername($user->getEmail());

            // 4) Guardar el User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // ... hacer cualquier otra cosa, como enviar un email, etc
            // establecer un mensaje "flash" de éxito para el usuario

            return $this->redirectToRoute('homepage');
        }

        return $this->render(
            'registration/register.html.twig',
            array('form' => $form->createView())
        );
    }
}