<?php
/**
 * Created by PhpStorm.
 * User: jrhod
 * Date: 2017-11-21
 * Time: 5:19 AM
 */

namespace AppBundle\Form;


use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname',TextType::class)
            ->add('lastname',TextType::class)
            ->add('phoneprimary',TextType::class)
            ->add('phonealternate',TextType::class)
            ->add('communicationpreference',TextType::class)
            ->add('preferredlanguage',TextType::class)
            ->add('address',TextType::class)
            ->add('zipcode',TextType::class)
            ->add('ccnameoncard',TextType::class)
            ->add('ccnumber',TextType::class)
            ->add('banknumber',TextType::class)
            ->add('bankname',TextType::class)
            ->add('branchnumber',TextType::class)
            ->add('accountnumber',TextType::class)
            ->add('email', EmailType::class)
            ->add('username', TextType::class)
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
            'csrf_protection' => false,
        ));
    }
}