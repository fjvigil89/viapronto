<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ShipmentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('description')->add('value')->add('deliverycode')->add('alternatereceiver')->add('width')->add('length')->add('height')->add('weight')->add('sizeunit')->add('weightunit')->add('price')->add('currency')->add('comments')->add('deadline')->add('deliverydate')->add('signature1url')->add('signature2url')->add('deliveryoption')->add('deliverytype')->add('shipmentstatus')->add('shipper')->add('handler')->add('receiver')->add('deliveryagent')->add('pickupagent');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Shipment'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_shipment';
    }


}
