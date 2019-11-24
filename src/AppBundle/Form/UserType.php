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
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username')->add('salt')->add('password')->add('isActive')->add('firstname')->add('lastname')->add('email')->add('phoneprimary')->add('phonealternate')->add('communicationpreference')->add('preferredlanguage')->add('address')->add('zipcode')->add('ccnameoncard')->add('ccnumber')->add('banknumber')->add('bankname')->add('branchnumber')->add('accountnumber')->add('accountstatus')->add('cityid')->add('paymentmethod');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_user';
    }


}